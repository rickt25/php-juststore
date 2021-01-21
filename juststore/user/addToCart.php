<?php

include('../database/Database.php');

$product_id = $_POST['product_id'];
$user_id = $_POST['user_id'];

$database = new Database();
$conn = $database->getConnection();

$stmt = $conn->prepare('INSERT INTO `cart`(user_id,product_id,quantity) VALUES(:user_id,:product_id,1)');
$stmt->bindParam(":user_id",$user_id);
$stmt->bindParam(":product_id",$product_id);
$stmt->execute();

header('Location: http://localhost/juststore/?page=cart');

?>