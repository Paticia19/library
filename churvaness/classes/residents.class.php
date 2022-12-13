<?php

require_once 'database.php';

Class Residents{
    //attributes

    public $id;
    public $lname;
    public $fname;
    public $mname;
    public $bdate;
    public $bplace;
    public $age;
    public $barangay;
    public $zone;
    public $code;
    public $totalhousehold;
    public $differentlyabledperson;
    public $bloodtype;
    public $civilstatus;
    public $occupation;
    public $monthlyincome;
    public $religion;
    public $nationality;
    public $gender;
    public $philhealthNo;
    public $highestEducationalAttainment;
    public $houseOwnershipStatus;
    public $landOwnershipStatus;
    public $waterUsage;
    public $lightningFacilities;
    public $formerAddress;
    public $image;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO residents (`lname`, `fname`, `mname`, `bdate`, `bplace`, `age`, `barangay`, `zone`, `totalhousehold`, `differentlyabledperson`, `bloodtype`, `civilstatus`, `occupation`, `monthlyincome`, `householdnum`, `religion`, `nationality`, `gender`, `philhealthNo`, `highestEducationalAttainment`, `houseOwnershipStatus`, `landOwnershipStatus`, `formerAddress`, `image`) VALUES
        (:lname, :fname, :mname, :bdate, :bplace, :age, :barangay, :zone, :totalhousehold, :differentlyabledperson, :bloodtype, :civilstatus, :occupation, :monthlyincome, :householdnum, :religion, :nationality, :gender, :philhealthNo, :highestEducationalAttainment, :houseOwnershipStatus, :landOwnershipStatus, :formerAddress, :image);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':lname', $this->lname);
        $query->bindParam(':fname', $this->fname);
        $query->bindParam(':mname', $this->mname);
        $query->bindParam(':bdate', $this->bdate);
        $query->bindParam(':bplace', $this->bplace);
        $query->bindParam(':age', $this->age);
        $query->bindParam(':barangay', $this->barangay);
        $query->bindParam(':zone', $this->zone);
        $query->bindParam(':totalhousehold', $this->totalhousehold);
        $query->bindParam(':differentlyabledperson', $this->differentlyabledperson);
        $query->bindParam(':bloodtype', $this->bloodtype);
        $query->bindParam(':civilstatus', $this->civilstatus);
        $query->bindParam(':occupation', $this->occupation);
        $query->bindParam(':monthlyincome', $this->monthlyincome);
        $query->bindParam(':religion', $this->religion);
        $query->bindParam(':nationality', $this->nationality);
        $query->bindParam(':gender', $this->gender);
        $query->bindParam(':philhealthNo', $this->philhealthNo);
        $query->bindParam(':highestEducationalAttainment', $this->highestEducationalAttainment);
        $query->bindParam(':houseOwnershipStatus', $this->houseOwnershipStatus);
        $query->bindParam(':landOwnershipStatus', $this->landOwnershipStatus);
        $query->bindParam(':formerAddress', $this->formerAddress);
        $query->bindParam(':image', $this->image);

        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE residents SET lname=:lname, fname=:fname, mname=:mname, bdate=:bdate, bplace=:bplace,age=:age, barangay=:barangay, zone=:zone, totalhousehold=:totalhousehold, differentlyabledperson=:differentlyabledperson, relationtohead=:relationtohead, maritalstatus=:maritalstatus, bloodtype=:bloodtype, civilstatus=:civilstatus, occupation=:occupation, monthlyincome=:monthlyincome, householdnum=:householdnum, lengthofstay=:lengthofstay, religion=:religion, nationality=:nationality, gender=:gender, skills=:skills, igpitID=:igpitID, philhealthNo=:philhealthNo, highestEducationalAttainment=:highestEducationalAttainment, houseOwnershipStatus=:houseOwnershipStatus, landOwnershipStatus=:landOwnershipStatus, dwellingtype=:dwellingtype, waterUsage=:waterUsage, lightningFacilities=:lightningFacilities, sanitaryToilet=:sanitaryToilet, formerAddress=:formerAddress, remarks=:remarks:, image=:image WHERE  id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':lname', $this->lname);
        $query->bindParam(':fname', $this->fname);
        $query->bindParam(':mname', $this->mname);
        $query->bindParam(':bdate', $this->bdate);
        $query->bindParam(':bplace', $this->bplace);
        $query->bindParam(':age', $this->age);
        $query->bindParam(':barangay', $this->barangay);
        $query->bindParam(':zone', $this->zone);
        $query->bindParam(':totalhousehold', $this->totalhousehold);
        $query->bindParam(':differentlyabledperson', $this->differentlyabledperson);
        $query->bindParam(':bloodtype', $this->bloodtype);
        $query->bindParam(':civilstatus', $this->civilstatus);
        $query->bindParam(':occupation', $this->occupation);
        $query->bindParam(':monthlyincome', $this->monthlyincome);
        $query->bindParam(':religion', $this->religion);
        $query->bindParam(':nationality', $this->nationality);
        $query->bindParam(':gender', $this->gender);
        $query->bindParam(':philhealthNo', $this->philhealthNo);
        $query->bindParam(':highestEducationalAttainment', $this->highestEducationalAttainment);
        $query->bindParam(':houseOwnershipStatus', $this->houseOwnershipStatus);
        $query->bindParam(':landOwnershipStatus', $this->landOwnershipStatus);
        $query->bindParam(':formerAddress', $this->formerAddress);
        $query->bindParam(':remarks', $this->remarks);
        $query->bindParam(':image', $this->image);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM residents WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
    }

    function delete($record_id){
        $sql = "DELETE FROM residents WHERE id = :id;";
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
        $sql = "SELECT * FROM residents ORDER BY id ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>