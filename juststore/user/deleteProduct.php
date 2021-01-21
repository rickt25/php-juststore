<?php

    include('../database/Database.php');
    include('validation.php');

    $database = new Database();
    $conn = $database->getConnection();

    $id = $_POST['id'];
    
    $stmt = $conn->prepare('DELETE FROM `products` WHERE id=:id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $stmt = $conn->prepare('DELETE FROM `product_category` WHERE product_id=:product_id');
    $stmt->bindParam(":product_id",$id);
    $stmt->execute();
    $stmt = $conn->prepare('DELETE FROM `product_gallery` WHERE product_id=:product_id');
    $stmt->bindParam(":product_id",$id);
    $stmt->execute();
    

    session_start();

    $_SESSION['success'] = 'Delete product success';

    header("Location: ". $_SERVER['HTTP_REFERER']);
    exit;

?>