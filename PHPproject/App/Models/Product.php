<?php 
//  here in model any opration that deals with database

namespace App\Models;


class Product {

    private $conn;

    private $tableName= 'Product';
   public $name;
   public $catagoryId;
   public $price;
   public $id;

    public function __construct($conn){
        $this->conn = $conn;

    }
    public function get_Product_info(){

                
        $query = "SELECT * FROM " . $this->tableName; // select name , email form users
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }



    public function saveData() : bool {
        $query = "INSERT INTO ".$this->tableName." ( name,catagoryId, price) VALUES ( :name, :catagoryId, :price) ";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $name = htmlspecialchars(strip_tags($this->name));
        $price = htmlspecialchars(strip_tags($this->price));
        $catagoryId = htmlspecialchars(strip_tags($this->catagoryId));



        // bind values
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":catagoryId", $catagoryId);


        if($stmt->execute()) {
           return true;
        } else {
            return false;
        }
    }

    public function update($id) : bool {
        $query = "UPDATE ".$this->tableName.' SET name= :name , price = :price , catagoryId = :catagoryId where id = '. $id;
        $stmt = $this->conn->prepare($query);

         // sanitize
         $name = htmlspecialchars(strip_tags($this->name));
         $price = htmlspecialchars(strip_tags($this->price));
         $catagoryId = htmlspecialchars(strip_tags($this->catagoryId));
 
 
 
         // bind values
         $stmt->bindParam(":name", $name);
         $stmt->bindParam(":price", $price);
         $stmt->bindParam(":catagoryId", $catagoryId);
 
        if($stmt->execute()) {
           return true;
        } else {
            return false;
        }
    }


    // delete from tableName where id = 5
    public function delete($id) {
        $query = "Delete from " . $this->tableName. ' where id ='. $id; // select name , email form users

        $stmt = $this->conn->prepare($query);
        if($stmt->execute()) {
            return true;
         } else {
             return false;
         }
    }
    
        

}