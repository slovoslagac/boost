<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 8.6.2017
 * Time: 11:48
 */
$server = 'euw1';
$summonerid= 80427490;

$fullData = file_get_contents("https://$server.api.riotgames.com/lol/league/v3/positions/by-summoner/$summonerid?api_key=d3695a41-c367-41e6-9abf-cf6a90ea8d6d");
$playerDecoded = json_decode($fullData);

foreach($playerDecoded as $item){
    if($item->queueType == 'RANKED_SOLO_5x5') {
        $playerDetails = $item;
    }
}


var_dump( $playerDetails);