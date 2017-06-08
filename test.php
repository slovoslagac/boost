<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 8.6.2017
 * Time: 12:49
 */
include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));



$page = "https://'na1'.api.riotgames.com/lol/summoner/v3/summoners/by-name/misternixxx?api_key=d3695a41-c367-41e6-9abf-cf6a90ea8d6d";
$fullData = file_get_contents($page);

echo $fullData;

