<?php

require_once 'database.php';

Class Officials{
    //attributes

    public $id;
    public $sPosition;
    public $completeName;
    public $pcontact;
    public $paddress;
    public $termStart;
    public $termEnd;
    public $status;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO officials (`sPosition`, `completeName`, `pcontact`, `paddress`, `termStart`, `termEnd`, `status`) VALUES
        (:sPosition, :completeName, :pcontact, :paddress, :termStart, :termEnd, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':sPosition', $this->sPosition);
        $query->bindParam(':completeName', $this->completeName);
        $query->bindParam(':pcontact', $this->pcontact);
        $query->bindParam(':paddress', $this->paddress);
        $query->bindParam(':termStart', $this->termStart);
        $query->bindParam(':termEnd', $this->termEnd);
        $query->bindParam(':status', $this->status);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE officials SET sPosition=:sPosition, completeName=:completeName, pcontact=:pcontact, paddress=:paddress, termStart=:termStart, termEnd=:termEnd, status=:status WHERE  id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':sPosition', $this->sPosition);
        $query->bindParam(':completeName', $this->completName);
        $query->bindParam(':pcontact', $this->pcontact);
        $query->bindParam(':paddress', $this->paddress);
        $query->bindParam(':termStart', $this->termStart);
        $query->bindParam(':termEnd', $this->termEnd);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM officials WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM officials WHERE id = :id;";
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
        $sql = "SELECT * FROM officials ORDER BY id ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>