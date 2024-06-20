<?php 
//  here in model any opration that deals with database

namespace App\Models;


class Order {

    private $conn;

    private $tableName= 'Orders';
   public $custmerID;
   public $item;
   public $total;
   public $id;

    public function __construct($conn){
        $this->conn = $conn;

    }
    public function get_Order_info(){

                
        $query = "SELECT * FROM " . $this->tableName; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }



    public function saveData() : bool {
        $query = "INSERT INTO ".$this->tableName." ( custmerID, total, item) VALUES ( :custmerID , :total , :item)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $custmerID = htmlspecialchars(strip_tags($this->custmerID));
        $total = htmlspecialchars(strip_tags($this->total));
        $item = htmlspecialchars(strip_tags($this->item));

        // bind values
        $stmt->bindParam(":custmerID", $custmerID);
        $stmt->bindParam(":total", $total);
        $stmt->bindParam(":item", $item);

        if($stmt->execute()) {
           return true;
        } else {
            return false;
        }
    }

    public function update($id) : bool {
        $query = "UPDATE ".$this->tableName.' SET custmerID= :custmerID , total = :total , item = :item where id = '. $id;
        $stmt = $this->conn->prepare($query);

         // sanitize
         $custmerID = htmlspecialchars(strip_tags($this->custmerID));
         $total = htmlspecialchars(strip_tags($this->total));
         $item = htmlspecialchars(strip_tags($this->item));
 
         // bind values
         $stmt->bindParam(":custmerID", $custmerID);
         $stmt->bindParam(":total", $total);
         $stmt->bindParam(":item", $item);
 

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