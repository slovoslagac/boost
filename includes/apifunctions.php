<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 8.6.2017
 * Time: 12:43
 */

function getSummonerDetails($server, $summonername)
{
    $page = "https://$server.api.riotgames.com/lol/summoner/v3/summoners/by-name/$summonername?api_key=d3695a41-c367-41e6-9abf-cf6a90ea8d6d";
    $file_headers = @get_headers($page);

    if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        logAction("Problem sa dohvatanjem podataka sa API-a", " $server, $summonername,", 'error.txt');
        return false;
    } else {
        $fullData = file_get_contents($page);
        $playerDecoded = json_decode($fullData);
        $newsummoner = new summoners($playerDecoded->id, $playerDecoded->accountId, $playerDecoded->name, $playerDecoded->profileIconId, $playerDecoded->revisionDate, $playerDecoded->summonerLevel);
        $boostuser = $newsummoner->checkIfSummonerExists();
        $serbouser = serialize($playerDecoded);
        logAction("Skidanje detalja usera", "$server, $summonername, $fullData", $summonername . '.txt');
        if ($boostuser == '') {
            $newsummoner->addNewSummoner();
            $boostuser = $newsummoner->checkIfSummonerExists();
        }
        return $boostuser;


    }




}


function getSummonerRanking($server, $summonerid, $queuetype)
{
    $fullData = file_get_contents("https://$server.api.riotgames.com/lol/league/v3/positions/by-summoner/$summonerid?api_key=d3695a41-c367-41e6-9abf-cf6a90ea8d6d");
    $playerDecoded = json_decode($fullData);
    logAction("Skidanje pozicija usera", "$server, $summonerid, $queuetype, $fullData", $summonerid . '.txt');
    foreach ($playerDecoded as $item) {
        if ($item->queueType == $queuetype) {
            $playerDetails = $item;
        }
    }
    return $playerDetails;
}




