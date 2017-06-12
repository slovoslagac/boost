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
    private $currentdiv;
    private $enddiv;
    private $startpoints;
    private $price;
    private $status = 0;
    private $autopoints;
    private $ordertype;
    private $currency = 1;
    private $siteid;
    private $gamenumber;
    private $winnumber;
    private $playerusername;



    public function __construct($userid, $sumid, $srvid, $sdiv, $ediv, $points, $price, $cdiv, $ap, $ord, $cur, $sid, $gnum, $wnum, $pun)
    {
        $this->userid = $userid;
        $this->summonerid = $sumid;
        $this->serverid = $srvid;
        $this->startdiv = $sdiv;
        $this->currentdiv = $cdiv;
        $this->enddiv = $ediv;
        $this->startpoints = $points;
        $this->price = $price;
        $this->autopoints = $ap;
        $this->ordertype = $ord;
        $this->currency = $cur;
        $this->siteid = $sid;
        $this->gamenumber=$gnum;
        $this->winnumber = $wnum;
        $this->playerusername = $pun;
    }

    public function addorder()
    {
        global $conn;
        $sql = $conn->prepare("insert into orders (boostusername,server,startdiv, currentdiv,enddiv,points,price,status,playerid, autopoints,ordertype, currency, siteid, gamenumber, winnumber,playerusername  )
                                values (:bu,:sr,:sd,:cd,:ed,:po,:pr,:st,:pl,:ap, :ot, :cr, :sid, :gn, :wn, :pun)");
        $sql->bindParam(":bu", $this->summonerid);
        $sql->bindParam(":sr", $this->serverid);
        $sql->bindParam(":sd", $this->startdiv);
        $sql->bindParam(":cd", $this->currentdiv);
        $sql->bindParam(":ed", $this->enddiv);
        $sql->bindParam(":po", $this->startpoints);
        $sql->bindParam(":pr", $this->price);
        $sql->bindParam(":st", $this->status);
        $sql->bindParam(":pl", $this->userid);
        $sql->bindParam(":ap", $this->autopoints);
        $sql->bindParam(":ot", $this->ordertype);
        $sql->bindParam(":cr", $this->currency);
        $sql->bindParam(":sid", $this->siteid);
        $sql->bindParam(":wn", $this->winnumber);
        $sql->bindParam(":gn", $this->gamenumber);
        $sql->bindParam(":pun", $this->playerusername);
        $sql->execute();
    }

}