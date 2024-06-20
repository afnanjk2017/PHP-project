<?php 
//  here in model any opration that deals with database

namespace App\Models;


class Catagory {

    private $conn;

    private $tableName= 'Catagory';
   public $name;
     public $id;

    public function __construct($conn){
        $this->conn = $conn;

    }
    public function get_Catagory_info(){

                
        $query = "SELECT * FROM " . $this->tableName; // select name , id form Catagory
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }



    public function saveData() : bool {
        $query = "INSERT INTO ".$this->tableName." (name) VALUES (:name)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $name = htmlspecialchars(strip_tags($this->name));
       
        // bind values
        $stmt->bindParam(":name", $name);
       
        if($stmt->execute()) {
           return true;
        } else {
            return false;
        }
    }

    public function update($id) : bool {
        $query = "UPDATE ".$this->tableName.' SET name= :name  where id = '. $id;
        $stmt = $this->conn->prepare($query);

        // sanitize
        $name = htmlspecialchars(strip_tags($this->name));
        
        // bind values
        $stmt->bindParam(":name", $name);
        
        if($stmt->execute()) {
           return true;
        } else {
            return false;
        }
    }


        public function delete($id) {
        $query = "Delete from " . $this->tableName. ' where id ='. $id; 

        $stmt = $this->conn->prepare($query);
        if($stmt->execute()) {
            return true;
         } else {
             return false;
         }
    }
    
        

}