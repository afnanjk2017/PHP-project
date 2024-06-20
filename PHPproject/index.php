<?php

use App\Database\Database;

use App\Controllers\UserController;
use App\Controllers\catagoryController;
use App\Controllers\OrderController;
use App\Controllers\ProductController; 
require './vendor/autoload.php'; 



$config = include './config/DB.php';
$database = new Database($config);
$db = $database->getConnection();



$userController = new UserController($db);
echo $userController->createUser("afnanjk", "any@gmail.com") . '<br>';
echo $userController->createUser("afnanjk", "any@gmail.com") . '<br>';
echo $userController->updateUser(2,"afnan", "afnan@gmail.com") . '<br>';
echo $userController->deleteUser(1) . '<br>';
$users = $userController->getUser();
foreach ($users as $user) {
    
   echo "ID: " . $user['id'] . "<br>";
   echo "Name: " . $user['name'] . "<br>";
   echo "Email: " . $user['email'] . "<br><br>";
   echo "Created At: " . $user['createdAt'] . "<br><br>";

}




$productController = new ProductController($db);
echo $productController->createProduct("cup", 1,10) . '<br>';
echo $productController->createProduct("cup", 1,30) . '<br>';
echo $productController->updateProduct(2,"spoon", 1,87) . '<br>';
echo $productController->deleteProduct(1) . '<br>';
$products = $productController->getProduct();
foreach ($products as $product) {
    
   echo "ID: " . $product['id'] . "<br>";
   echo "Name: " . $product['name'] . "<br>";
   echo "catagory: " . $product['catagoryId'] . "<br><br>";
   echo "price " . $product['price'] . "<br><br>";

}




$orderController= new OrderController($db);
echo $orderController->createOrder(3, 'hat',78) . '<br>';
echo $orderController->createOrder(3, 'hat',50) . '<br>';
echo $orderController->updateOrder(1,3,"tie", 44). '<br>';
echo $orderController->deleteOrder(2) . '<br>';
$orders = $orderController->getOrder();
foreach ($orders as $order) {
    
   echo "ID: " . $order['id'] . "<br>";
   echo "item: " . $order['item'] . "<br>";
   echo "custmer ID: " . $order['custmerID'] . "<br><br>";
   echo "total " . $order['total'] . "<br><br>";

}





$catagoryController= new catagoryController($db);
echo $catagoryController->createCatagory('games') . '<br>';
echo $catagoryController->createCatagory('games') . '<br>';
echo $catagoryController->updateCatagory(2,"technologies") . '<br>';
echo $catagoryController->deleteCatagory(1) . '<br>';
$catagorys = $catagoryController->getCatagory();
foreach ($catagorys as $catagory) {
    
   echo "ID: " . $catagory['id'] . "<br>";
   echo "name: " . $catagory['name'] ."<br><br>";
  

}

