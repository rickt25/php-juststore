<?php

    include_once('../database/Database.php');
    include('validation.php');

    $database = new Database();
    $conn = $database->getConnection();

    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $profile_name = $_FILES['profile']['name'];
    $profile_tmp = $_FILES['profile']['tmp_name'];
    $profile_size = $_FILES["profile"]["size"];

    $target_dir = "../assets/profile/";
    $target_file = $target_dir . $profile_name;
    $target_file_client = 'assets/profile/' . $profile_name;
    $imageFileType = strtoLower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if(validateEditUser($name,$gender,$address,$phone,$email)){

        $stmt = $conn->prepare('UPDATE users SET name=:name,gender=:gender,address=:address,phone=:phone,email=:email WHERE id=:id');

        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":gender",$gender);
        $stmt->bindParam(":address",$address);
        $stmt->bindParam(":phone",$phone);
        $stmt->bindParam(":email",$email);
        
        $stmt->execute();
        
        session_start();

        if(isset($_SESSION['error']['edit'])){ unset($_SESSION['error']['edit']); }
        $_SESSION['success'] = 'Update data success';

    }

    header("Location: ". $_SERVER['HTTP_REFERER']);
    exit;

?>