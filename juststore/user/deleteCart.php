<?php

    include('../database/Database.php');

    $database = new Database();
    $conn = $database->getConnection();

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM `cart` WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute(); 

    session_start();

    $_SESSION['success'] = 'Delete Cart success';

    header("Location: ". $_SERVER['HTTP_REFERER']);
    exit;

?>