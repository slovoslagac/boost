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
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            logAction("Problem sa dohvatanjem podataka sa API-a", " $server, $summonername,", 'error.txt');
            return false;
        }
        else {


            $fullData = file_get_contents($page);

            $playerDecoded = json_decode($fullData);

            $newsummoner = new summoners($playerDecoded->id, $playerDecoded->accountId, $playerDecoded->name, $playerDecoded->profileIconId, $playerDecoded->revisionDate, $playerDecoded->summonerLevel);


            $boostuser = $newsummoner->checkIfSummonerExists();
            if ($boostuser == '') {
                $newsummoner->addNewSummoner();
                $boostuser = $newsummoner->checkIfSummonerExists();
            }
            return $boostuser;
        }
}

function getSummonerRanking($server, $summonerid)
{
    $fullData = file_get_contents("https://$server.api.riotgames.com/lol/league/v3/positions/by-summoner/$summonerid?api_key=d3695a41-c367-41e6-9abf-cf6a90ea8d6d");
    $playerDecoded = json_decode($fullData);
    foreach ($playerDecoded as $item) {
        if ($item->queueType == 'RANKED_SOLO_5x5') {
            $playerDetails = $item;
        }
    }
    return $playerDetails;
}

function getRanksTranslate()
{
    $allranks = getAllRanks();
    $allranktranslate = array();

    foreach ($allranks as $item) {
        $num = array(1, 2, 3, 4, 5, 'Challenger', 'Master');
        $newnum = array('I', 'II', 'III', 'IV', 'V', 'ChallengerI', 'MasterI');
        $newstring = str_replace($num, $newnum, $item->name);


        $allranktranslate[strtoupper(str_replace(' ', '', $newstring))] = $item->id;

    }

    return $allranktranslate;
}


function getSallaryByPlayer($userid){
    global $conn;
    $sql = $conn->prepare("select playerid, sum(round(price*0.6)) profit, case when sum(datediff(end_time, create_time)) > 0 then sum(datediff(end_time, create_time)) else 0 end days
from orders
where status = 1
and playerid = :uid
group by playerid");
    $sql->bindParam(":uid", $userid);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_OBJ);
    return $result;
}