<?php
// in comtroller file delas with any code that not related to database

namespace App\Controllers;
use PDO;

use App\Models\Product;

class ProductController {

    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;}


    public function getProduct(){
        $Product = new Product($this->conn);
        $stmt = $Product->get_Product_info();

        $Products = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        return $Products;
    }


    public function createProduct($name, $catagoryId, $price){
        
        $Product = new Product($this->conn);
        $Product->name = $name;
        $Product->catagoryId = $catagoryId;
        $Product->price = $price;

        
        if ($Product->saveData()) { 
            return "Product created";
        }else{
            return "Product not created";
        }
    }

    public function deleteProduct($id) {
        $Product = new Product($this->conn);

        
        if ($Product->delete($id)) { 
            return "Product deleted";
        }else{
            return "Product not deleted";
        }
    }

    
    public function updateProduct($id,$name, $catagoryId, $price){
        
        $Product = new Product($this->conn);
        $Product->name = $name;
        $Product->catagoryId = $catagoryId;
        $Product->id = $id;
        $Product->price = $price;

        
        if ($Product->update($id)) { 
            return "Product updated";
        }else{
            return "Product not updated";
        }
    }


}