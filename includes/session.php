<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 15.3.2017
 * Time: 14:04
 */
class session
{
    private $loggedin = false;
    public $userid;

    public function __construct()
    {
        session_start();
        $this->checkLogin();
    }

    public function isLoggedIn()
    {
        return $this->loggedin;
    }

    public function login($user)
    {
        if ($user) {
            $this->loggedin = true;
            $this->userid = $_SESSION["userid"] = $user->id;
            logAction("Login", "userid = $this->userid", 'workerLogin.txt');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->loggedin = false;
        logAction("Logout", "userid = $this->userid", 'workerLogin.txt');
    }

    private function checkLogin()
    {
        if (isset($_SESSION["userid"])) {
            $this->userid = $_SESSION["userid"];
            $this->loggedin = true;
        } else {
            unset($user_id);
            $this->loggedin = false;
        }
    }


}

$session = new session();