<?php

    include('../database/Database.php');
    include('validation.php');

    $database = new Database();
    $conn = $database->getConnection();

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM `couriers` WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute(); 

    session_start();

    $_SESSION['success'] = 'Delete Courier success';

    header("Location: ". $_SERVER['HTTP_REFERER']);
    exit;

?>