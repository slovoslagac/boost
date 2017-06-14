<?php

/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 14.6.2017
 * Time: 22:32
 */
class usertransaction
{
    private $userid;
    private $value;
    private $status;

    public function __construct($usr, $val, $stat)
    {
        $this->status = $stat;
        $this->userid = $usr;
        $this->value = $val;
    }

    public function addtransactions(){
        global $conn;
        $sql=$conn->prepare("insert into usertransactions (userid, status, value) values (:uid, :stat, :val)");
        $sql->bindParam(":uid", $this->userid);
        $sql->bindParam(":stat", $this->status);
        $sql->bindParam(":val", $this->value);
        $sql->execute();
    }
}