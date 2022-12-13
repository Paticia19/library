<?php

require_once 'database.php';

Class Settings{
    //attributes

    public $id;
    public $province;
    public $brgy;
    public $town;
    public $number;
    public $db_txt;
    public $city_logo;
    public $brgy_logo;
    public $db_image;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO brgy_info (`id`, `province`, `town`, `brgy_name`, `number`, `text`, `image`, `city_logo`, `brgy_logo`) VALUES
        (:id, ;province, :town, :brgy_name, :number, :text, :image, :city_logo, :brgy_logo);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);
        $query->bindParam(':province', $this->province);
        $query->bindParam(':brgy', $this->brgy);
        $query->bindParam(':town', $this->town);
        $query->bindParam(':number', $this->number);
        $query->bindParam(':db_txt', $this->db_txt);
        $query->bindParam(':city_logo', $this->city_logo);
        $query->bindParam(':brgy_logo', $this->brgy_logo);
        $query->bindParam(':db_image', $this->db_image);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE brgy_info SET province=:province, town=:town, brgy_name=:brgy_name, number=:number, text=:text, image=:image, city_logo=:city_logo, brgy_logo=:brgy_logo WHERE  id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':province', $this->sPosprovinceition);
        $query->bindParam(':brgy', $this->brgy);
        $query->bindParam(':town', $this->town);
        $query->bindParam(':number', $this->number);
        $query->bindParam(':db_txt', $this->db_txt);
        $query->bindParam(':city_logo', $this->city_logo);
        $query->bindParam(':brgy_logo', $this->brgy_logo);
        $query->bindParam(':db_image', $this->db_image);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM brgy_info WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM brgy_info WHERE id = :id;";
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
        $sql = "SELECT * FROM brgy_info ORDER BY id ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
    }
}

?>