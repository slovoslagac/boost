<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 8.6.2017
 * Time: 12:43
 */

$apiKey = 'RGAPI-b029a319-dcff-4cfd-b92b-981d5fa89f9c';

function getSummonerDetails($server, $summonername)
{
    global $apiKey;
    $page = "https://$server.api.riotgames.com/lol/summoner/v3/summoners/by-name/$summonername?api_key=$apiKey";
    $file_headers = @get_headers($page);

    if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        logAction("Nije pronadjen igrac na serveru", " $server, $summonername,", 'error.txt');
        return false;
    } else {
        $fullData = file_get_contents($page);
        $playerDecoded = json_decode($fullData);
        $newsummoner = new summoners($playerDecoded->id, $playerDecoded->accountId, $playerDecoded->name, $playerDecoded->profileIconId, $playerDecoded->revisionDate, $playerDecoded->summonerLevel);
        $boostuser = $newsummoner->checkIfSummonerExists();
        $serbouser = serialize($playerDecoded);
        logAction("Skidanje detalja usera", "$server, $summonername, $fullData", $summonername . '.txt', "API");
        if ($boostuser == '') {
            $newsummoner->addNewSummoner();
            $boostuser = $newsummoner->checkIfSummonerExists();
        }
        return $boostuser;


    }




}


function getSummonerRanking($server, $summonerid, $queuetype)
{
    global $apiKey;
    $fullData = file_get_contents("https://$server.api.riotgames.com/lol/league/v3/positions/by-summoner/$summonerid?api_key=$apiKey");
    $playerDecoded = json_decode($fullData);
    logAction("Skidanje pozicija usera", "$server, $summonerid, $queuetype, $fullData", $summonerid . '.txt', "API");
    foreach ($playerDecoded as $item) {
        if ($item->queueType == $queuetype) {
            $playerDetails = $item;
        }
    }
    return $playerDetails;
}




