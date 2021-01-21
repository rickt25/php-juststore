<?php

    include('../model/User.php');
    include('../database/Database.php');
    include('validation.php');

    $database = new Database();
    $conn = $database->getConnection();

    $role = $_POST['role'];
    $email = $_POST['email'];

    $stmt = $conn->prepare('SELECT * FROM `users` WHERE email = :email');
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    if($stmt->rowCount() == 0){
        session_start();
        $_SESSION['error']['role'] = 'Email not registered';
        header("Location: http://localhost/juststore/?page=admin");
        die();
    }

    $stmt = $conn->prepare('UPDATE `users` SET role=:role WHERE email = :email');
    $stmt->bindParam(":role",$role);
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    session_start();
    if(isset($_SESSION['errorRole'])){ unset($_SESSION['errorRole']); }
    $_SESSION['success'] = 'Update role success';

    header('Location: http://localhost/juststore/?page=admin');
?>