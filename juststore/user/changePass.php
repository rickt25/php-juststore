<?php
    include('../model/User.php');
    include('../database/Database.php');
    include('validation.php');

    $database = new Database();
    $conn = $database->getConnection();

    $id = $_POST['id'];
    $current = $_POST['current'];
    $new = $_POST['new'];
    $confirm = $_POST['confirm'];
    $hash_password = password_hash($new,PASSWORD_BCRYPT);

    $stmt = $conn->prepare('SELECT * FROM `users` WHERE id = :id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    session_start();

    if(!password_verify($current , $user['password'])){
        $_SESSION['error']['change'] = 'Password salah';
        header("Location: http://localhost/juststore/?page=account");
        die();
    }

    if(strlen($new) < 6){
        $_SESSION['error']['change'] = 'Password harus lebih dari 5 huruf';
        header("Location: http://localhost/juststore/?page=account");
        die();
    }

    if($new != $confirm){
        $_SESSION['error']['change'] = 'Confirm password salah';
        header("Location: http://localhost/juststore/?page=account");
        die();
    }

    $stmt = $conn->prepare('UPDATE `users` SET password=:password WHERE id=:id');
    $stmt->bindParam(":id",$id);
    $stmt->bindParam(":password",$hash_password);
    $stmt->execute();
    
    if(isset($_SESSION['error']['change'])){ unset($_SESSION['error']['change']); }
    $_SESSION['success'] = 'Update password success';

    header('Location: http://localhost/juststore//?page=account');
?>