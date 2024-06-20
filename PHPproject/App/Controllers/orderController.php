<?php
// in comtroller file delas with any code that not related to database

namespace App\Controllers;
use PDO;

use App\Models\Order;

class OrderController {

    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;}


    public function getOrder(){
        $Order = new Order($this->conn);
        $stmt = $Order->get_Order_info();

        $Orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        return $Orders;
    }


    public function createOrder($custmerID, $item, $total){
        
        $Order = new Order($this->conn);
        $Order->custmerID = $custmerID;
        $Order->item = $item;
        $Order->total = $total;

        
        if ($Order->saveData()) { 
            return "Order created";
        }else{
            return "Order not created";
        }
    }

    public function deleteOrder($id) {
        $Order = new Order($this->conn);

        
        if ($Order->delete($id)) { 
            return "Order deleted";
        }else{
            return "Order not deleted";
        }
    }

    
    public function updateOrder($id,$custmerID, $item, $total){
        
        $Order = new Order($this->conn);
        $Order->custmerID = $custmerID;
        $Order->item = $item;
        $Order->id = $id;
        $Order->total = $total;

        
        if ($Order->update($id)) { 
            return "Order updated";
        }else{
            return "Order not updated";
        }
    }


}