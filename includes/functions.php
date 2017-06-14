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

function logAction($action, $message, $file = 'log.txt', $file_loc = '')
{
    ($file_loc == '') ? $logfile = SITE_ROOT . DS . 'log' . DS . $file : $logfile = SITE_ROOT . DS . 'log' . DS . $file_loc . DS . $file;


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

function getAllRanks()
{
    global $conn;
    $sql = $conn->prepare("select * from ranks order by name");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

function getAllOrderTypes()
{
    global $conn;
    $sql = $conn->prepare("select * from ordertypes order by id");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

function getAllCurrencies()
{
    global $conn;
    $sql = $conn->prepare("select * from currency order by id");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

function getAllSites()
{
    global $conn;
    $sql = $conn->prepare("select * from sitesource order by id");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
}


function getDetailedOrders()
{
    global $conn;
    $sql = $conn->prepare("select p.name, p.server, r.shortname start, p.points, e.shortname as end, p.price, p.profit, p.status, cr.shortname cr, p.cp, p.ap, p.playerid, p.currency, p.ordertype, createtime, p.currentrate
from
(
select s.name, srv.shortname as server, o.startdiv , o.points, enddiv, o.price as price, round(0.6*o.price) as profit, o.status, currentdiv, o.currentpoints cp, o.autopoints ap, o.playerid, o.currency, o.ordertype, o.create_time createtime, c.currentrate
from orders o, apisummoners s, servers srv, currency c
where o.boostusername = s.id
and c.id = o.currency
and o.server = srv.id
) p
left join ranks cr on  p.currentdiv = cr.id
left join ranks r on p.startdiv = r.id
left join ranks e on p.enddiv = e.id
order by createtime desc
");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
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


function getSallaryByPlayer($userid)
{
    global $conn;
    $sql = $conn->prepare("select playerid, sum(round(price*0.6)) profit, case when sum(datediff(end_time, create_time)) > 0 then sum(datediff(end_time, create_time)) else 1 end days
from orders
where status = 1
and playerid = :uid
group by playerid");
    $sql->bindParam(":uid", $userid);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_OBJ);
    return $result;
}

function paymentPerPlayer($userid)
{
    global $conn;
    $sql = $conn->prepare("select playerid, sum(price * c.currentrate) value
from orders o, currency c
where o.currency = c.id
and o.status = 1
and playerid = :uid
group by o.playerid");
    $sql->bindParam(":uid", $userid);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_OBJ);
    return $result;
}