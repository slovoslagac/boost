<?php

/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 6.6.2017
 * Time: 20:40
 */
class summoners
{
    private $summonerid;
    private $accountid;
    private $name;
    private $profileiconid;
    private $revisiondate;
    private $summonerLevel;
    private $status = 1;

    public function __construct($id, $accountid, $name, $profileiconid, $revisiondate, $summonerLevel)
    {
        $this->summonerid = $id;
        $this->accountid = $accountid;
        $this->name = $name;
        $this->profileiconid = $profileiconid;
        $this->revisiondate = $revisiondate;
        $this->summonerLevel = $summonerLevel;
    }

    public function checkIfSummonerExists(){
        global $conn;
        $sql = $conn->prepare("select * from apisummoners where accountid = :ad and summonerid = :si");
        $sql->bindParam(":ad", $this->accountid);
        $sql->bindParam(":si", $this->summonerid);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function addNewSummoner(){
        global $conn;
        $sql=$conn->prepare("insert into apisummoners (name, status, profileiconid, summonerLevel, accountid, summonerid, revisiondate) values (:nm, :st, :pf, :sl, :ac, :sm, :rs)");
        $sql->bindParam(":nm", $this->name);
        $sql->bindParam(":st", $this->status);
        $sql->bindParam(":pf", $this->profileiconid);
        $sql->bindParam(":sl", $this->summonerLevel);
        $sql->bindParam(":ac", $this->accountid);
        $sql->bindParam(":sm", $this->summonerid);
        $sql->bindParam(":rs", $this->revisiondate);
        $sql->execute();
    }
}


