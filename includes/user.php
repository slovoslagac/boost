<?php

/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 5.6.2017
 * Time: 20:22
 */
class user
{
    private $name;
    private $lastname;
    private $username;
    private $email;
    private $password;
    private $ggusername;
    private $ggpassword;
    private $status = 1;


    public function __construct($name, $ln, $un, $em, $ps, $ggun, $ggps)
    {
        $this->name = $name;
        $this->lastname = $ln;
        $this->username = $un;
        $this->email = $em;
        $this->password = $ps;
        $this->ggusername = $ggun;
        $this->ggpassword = $ggps;
    }

    public function returnDetails (){
        return $this->name;
    }

    public function addnewuser() {
        global $conn;
        $sql = $conn->prepare("insert into users(name, lastname, username, email, password, ggusername, ggpassword, status) values (:nm, :ln, :un, :em, :ps, :ggun, :ggps, :st)");
        $sql->bindParam(":nm", $this->name);
        $sql->bindParam(":ln", $this->lastname);
        $sql->bindParam(":un", $this->username);
        $sql->bindParam(":em", $this->email);
        $sql->bindParam(":ps", $this->password);
        $sql->bindParam(":ggun", $this->ggusername);
        $sql->bindParam(":ggps", $this->ggpassword);
        $sql->bindParam(":st", $this->status);
        $sql->execute();
    }




}