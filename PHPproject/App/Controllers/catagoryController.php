<?php
// in comtroller file delas with any code that not related to database

namespace App\Controllers;
use PDO;

use App\Models\Catagory;

class CatagoryController {

    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;}


    public function getCatagory(){
        $Catagory = new Catagory($this->conn);
        $stmt = $Catagory->get_Catagory_info();

        $Catagorys = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        return $Catagorys;
    }


    public function createCatagory($name){
        
        $Catagory = new Catagory($this->conn);
        $Catagory->name = $name;
        
        
        if ($Catagory->saveData()) { 
            return "Catagory created";
        }else{
            return "Catagory not created";
        }
    }

    public function deleteCatagory($id) {
        $Catagory = new Catagory($this->conn);

        
        if ($Catagory->delete($id)) { 
            return "Catagory deleted";
        }else{
            return "Catagory not deleted";
        }
    }

    
    public function updateCatagory($id,$name){
        
        $Catagory = new Catagory($this->conn);
        $Catagory->name = $name;
     
        $Catagory->id = $id;

        
        if ($Catagory->update($id)) { 
            return "Catagory updated";
        }else{
            return "Catagory not updated";
        }
    }


}