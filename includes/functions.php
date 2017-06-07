<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 5.6.2017
 * Time: 19:50
 */

function redirectTo($location = null)
{
    if ($location != null) {
        header("Location:{$location}");
        exit;
    }
}


if (!function_exists('password_verify')) {
    function password_verify($password, $hash)
    {
        return (crypt($password, $hash) === $hash);
    }
}

function logAction($action, $message, $file = 'log.txt')
{
    $logfile = SITE_ROOT . DS . 'log' . DS . $file;

    if ($handle = fopen($logfile, 'a')) {
        $timestamp = strftime("%d.%m.%Y %H:%M:%S", time());
        $content = "$timestamp | $action : $message\n";
        fwrite($handle, $content);
        fclose($handle);
    } else {
        echo "Nije uspelo logovanje";
    }
}

function getuserbyusername($user)
{
    global $conn;
    $sql = $conn->prepare("select * from users where username = :un ");
    $sql->bindParam(":un", $user);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_OBJ);
    return $result;
}

function getuserbyuserid($userid)
{
    global $conn;
    $sql = $conn->prepare("select * from users where id = :un ");
    $sql->bindParam(":un", $userid);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_OBJ);
    return $result;
}

function updateUser($user, $pass)
{
    global $conn;
    $currentuser = getuserbyusername($user);
    $currentid = $currentuser->id;
    $sql = $conn->prepare("update users set password = :pt where id = :id");
    $sql->bindParam(":pt", $pass);
    $sql->bindParam(":id", $currentid);
    $sql->execute();
}


function getAllServers()
{
    global $conn;
    $sql = $conn->prepare("select * from servers");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

function getAllRanks(){
    global $conn;
    $sql = $conn->prepare("select * from ranks order by name");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

function getSummonerDetails($server, $summonername){
    $fullData = file_get_contents("https://$server.api.riotgames.com/lol/summoner/v3/summoners/by-name/$summonername?api_key=d3695a41-c367-41e6-9abf-cf6a90ea8d6d");
    $playerDecoded = json_decode($fullData);

    $newsummoner = new summoners($playerDecoded->id, $playerDecoded->accountId, $playerDecoded->name, $playerDecoded->profileIconId, $playerDecoded->revisionDate, $playerDecoded->summonerLevel);
    $boostuser = $newsummoner->checkIfSummonerExists();
    if ( $boostuser == '') {
        $newsummoner->addNewSummoner();
        $boostuser = $newsummoner->checkIfSummonerExists();
    }
    return $boostuser;
}

function getDetailedOrders() {
    global $conn;
    $sql = $conn->prepare("select s.name, srv.shortname as server, r.shortname start, o.points, e.shortname as end, o.price as price, round(0.6*o.price) as profit, o.status
from orders o, apisummoners s, servers srv, ranks r, ranks e
where o.boostusername = s.id
and o.server = srv.id
and o.startdiv = r.id
and o.enddiv = e.id");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
}