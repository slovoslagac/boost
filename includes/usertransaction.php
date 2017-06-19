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


    public function addtransactions()
    {
        global $conn;
        $sql = $conn->prepare("insert into usertransactions (userid, status, value, transactionrequested) values (:uid, :stat, :val, now())");
        $sql->bindParam(":uid", $this->userid);
        $sql->bindParam(":stat", $this->status);
        $sql->bindParam(":val", $this->value);
        $sql->execute();
    }

    public function getAllTransactions()
    {
        global $conn;
        $sql= $conn->prepare("select u.name, date_format(ut.transactionrequested, '%d.%m.%Y') createdate, ut.value, ut.id, ut.status, ut.paidlocation
from usertransactions ut, users u
where u.id = ut.userid
order by id desc");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }


    public function approvedTransaction($id, $pdl){
        global $conn;
        $sql = $conn->prepare("update usertransactions set status = 2, statuschanged = now(),paidlocation = :pl where id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":pl", $pdl);
        $sql->execute();
    }

    public function paidTransaction($id){
        global $conn;
        $sql = $conn->prepare("update usertransactions set status = 4, statuschanged = now() where id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
    }
}