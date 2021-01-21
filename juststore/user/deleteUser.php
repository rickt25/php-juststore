<?php

    include('../database/Database.php');
    include('validation.php');

    $database = new Database();
    $conn = $database->getConnection();

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM `users` WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute(); 

    session_start();

    $_SESSION['success'] = 'Delete data success';

    header("Location: ". $_SERVER['HTTP_REFERER']);
    exit;
?>