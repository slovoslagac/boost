<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 5.6.2017
 * Time: 19:50
 */

function redirectTo($location = null) {
    if($location != null) {
        header("Location:{$location}");
        exit;
    }
}


if (!function_exists('password_verify')){
    function password_verify($password, $hash){
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

function getuserbyusername($user) {
    global $conn;
    $sql = $conn->prepare("select * from users where username = :un ");
    $sql->bindParam(":un", $user);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_OBJ);
    return $result;
}

function updateUser($user, $pass) {
    global $conn;
    $currentuser = getuserbyusername($user);
    $currentid = $currentuser->id;
    $sql = $conn->prepare("update users set password = :pt where id = :id");
    $sql->bindParam(":pt", $pass);
    $sql->bindParam(":id", $currentid);
    $sql->execute();
}
