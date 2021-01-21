<?php

    include('../database/Database.php');
    include('validation.php');

    $database = new Database();
    $conn = $database->getConnection();

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM `product_gallery` WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute(); 

    session_start();

    $_SESSION['success'] = 'Delete gallery success';

    header("Location: ". $_SERVER['HTTP_REFERER']);
    exit;

?>