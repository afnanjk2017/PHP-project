<?php 
//  here in model any opration that deals with database

namespace App\Models;


class User {

    private $conn;

    private $tableName= 'users';
   public $name;
   public $email;
   public $id;

    public function __construct($conn){
        $this->conn = $conn;

    }
    public function get_user_info(){

                
        $query = "SELECT * FROM " . $this->tableName; // select name , email form users
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }



    public function saveData() : bool {
        $query = "INSERT INTO ".$this->tableName." (name, email) VALUES (:name, :email)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $name = htmlspecialchars(strip_tags($this->name));
        $email = htmlspecialchars(strip_tags($this->email));

        // bind values
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);

        if($stmt->execute()) {
           return true;
        } else {
            return false;
        }
    }

    public function update($id) : bool {
        $query = "UPDATE ".$this->tableName.' SET name= :name , email = :email where id = '. $id;
        $stmt = $this->conn->prepare($query);

        // sanitize
        $name = htmlspecialchars(strip_tags($this->name));
        $email = htmlspecialchars(strip_tags($this->email));

        // bind values
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);

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