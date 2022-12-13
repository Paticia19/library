<?php

require_once 'database.php';

class blotter{
    //attributes

    public $id;
    public $yearRecorded;
    public $dateRecorded;
    public $complainant;
    public $cage;
    public $caddress;
    public $ccontact;
    public $personToComplain;
    public $page;
    public $paddress;
    public $pcontact;
    public $complaint;
    public $actionTaken;
    public $sStatus;
    public $locationOfIncidence;
    public $recordedby;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO blotter (`id`, `yearRecorded`, `dateRecorded`, `complainant`, `cage`, `caddress`, `ccontact`, `personToComplain`, `page`, `paddress`, `pcontact`, `complaint`, `actionTaken`, `sStatus`, `locationOfIncidence`, `recordedby`) VALUES 
        (:id, :yearRecorded, :dateRecorded, :complainant, :cage, :caddress, :ccontact, :personToComplain, :page, :paddress, :pcontact, :complaint, :actionTaken,:sStatus, :locationOfIncidence :recordedby);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);
        $query->bindParam(':yearRecorded', $this->yearRecorded);
        $query->bindParam(':dateRecorded', $this->dateRecorded);
        $query->bindParam(':complainant', $this->complainant);
        $query->bindParam(':cage', $this->cage);
        $query->bindParam(':caddress', $this->caddress);
        $query->bindParam(':ccontact', $this->ccontact);
        $query->bindParam(':personToComplain', $this->personToComplain);
        $query->bindParam(':page', $this->page);
        $query->bindParam(':paddress', $this->paddress);
        $query->bindParam(':pcontact', $this->pcontact);
        $query->bindParam(':complaint', $this->complaint);
        $query->bindParam(':actionTaken', $this->actionTaken);
        $query->bindParam(':sStatus', $this->sStatus);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':locationOfIncidence', $this->locationOfIncidence);
        $query->bindParam(':recordedby', $this->recordedby);

        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE blotter SET yearRecorded=:yearRecorded, dateRecorded=:dateRecorded, complainant=:complainant, cage=:cage, caddress=:caddress, ccontact=:ccontact, personToComplain=:personToComplain, page=:page, paddress=:paddress, pcontact=:pcontact, complaint=:complaint, actionTaken=:actionTaken, sStatus=:sStatus, locationOfIncidence=:locationOfIncidence. recordedby=:recordedby WHERE  id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':yearRecorded', $this->yearRecorded);
        $query->bindParam(':dateRecorded', $this->dateRecorded);
        $query->bindParam(':complainant', $this->complainant);
        $query->bindParam(':cage', $this->cage);
        $query->bindParam(':caddress', $this->caddress);
        $query->bindParam(':ccontact', $this->ccontact);
        $query->bindParam(':personToComplain', $this->personToComplain);
        $query->bindParam(':page', $this->page);
        $query->bindParam(':paddress', $this->paddress);
        $query->bindParam(':pcontact', $this->pcontact);
        $query->bindParam(':complaint', $this->complaint);
        $query->bindParam(':actionTaken', $this->actionTaken);
        $query->bindParam(':sStatus', $this->sStatus);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':locationOfIncidence', $this->locationOfIncidence);
        $query->bindParam(':recordedby', $this->recordedby);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	



    function fetch($record_id){
        $sql = "SELECT * FROM blotter WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }
    
    function delete($record_id){
        $sql = "DELETE FROM blotter WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM blotter ORDER BY id ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}
}

?>