<?php

/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 7.6.2017
 * Time: 20:23
 */
class orders
{
    private $userid;
    private $summonerid;
    private $serverid;
    private $startdiv;
    private $enddiv;
    private $startpoints;
    private $price;
    private $status = 0;

    public function __construct($userid, $sumid, $srvid, $sdiv, $ediv, $points, $price)
    {
        $this->userid = $userid;
        $this->summonerid = $sumid;
        $this->serverid = $srvid;
        $this->startdiv = $sdiv;
        $this->enddiv = $ediv;
        $this->startpoints = $points;
        $this->price = $price;
    }

    public function addorder()
    {
        global $conn;
        $sql=$conn->prepare("insert into orders (boostusername,server,startdiv,enddiv,points,price,status,playerid) values (:bu,:sr,:sd,:ed,:po,:pr,:st,:pl)");
        $sql->bindParam(":bu",$this->summonerid);
        $sql->bindParam(":sr",$this->serverid);
        $sql->bindParam(":sd",$this->startdiv);
        $sql->bindParam(":ed",$this->enddiv);
        $sql->bindParam(":po",$this->startpoints);
        $sql->bindParam(":pr",$this->price);
        $sql->bindParam(":st",$this->status);
        $sql->bindParam(":pl",$this->userid);
        $sql->execute();
    }

}