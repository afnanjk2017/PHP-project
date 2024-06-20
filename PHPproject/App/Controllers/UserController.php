<?php
// in comtroller file delas with any code that not related to database

namespace App\Controllers;
use PDO;

use App\Models\User;

class UserController {

    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;}


    public function getUser(){
        $user = new User($this->conn);
        $stmt = $user->get_user_info();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        return $users;
    }


    public function createUser($name, $email){
        
        $user = new User($this->conn);
        $user->name = $name;
        $user->email = $email;

        
        if ($user->saveData()) { 
            return "user created";
        }else{
            return "user not created";
        }
    }

    public function deleteUser($id) {
        $user = new User($this->conn);

        
        if ($user->delete($id)) { 
            return "user deleted";
        }else{
            return "user not deleted";
        }
    }

    
    public function updateUser($id,$name, $email){
        
        $user = new User($this->conn);
        $user->name = $name;
        $user->email = $email;
        $user->id = $id;

        
        if ($user->update($id)) { 
            return "user updated";
        }else{
            return "user not updated";
        }
    }


}