<?php

    include_once('../database/Database.php');
    include('validation.php');

    $database = new Database();
    $conn = $database->getConnection();

    $name = $_POST['name'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $hash_password = password_hash($password,PASSWORD_BCRYPT);

    $profile_name = $_FILES['profile']['name'];
    $profile_tmp = $_FILES['profile']['tmp_name'];
    $profile_size = $_FILES["profile"]["size"];

    $target_dir = "../assets/profile/";
    $target_file = $target_dir . $profile_name;
    $target_file_client = 'assets/profile/' . $profile_name;
    $imageFileType = strtoLower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(!$profile_name){ $target_file_client = ''; }
    

    if(validateRegister($name,$gender,$address,$phone,$email,$password,$confirm_password,$profile_size,$imageFileType)){

        $stmt = $conn->prepare('INSERT INTO `users` (name,gender,address,phone,email,password,profile,role)
        VALUES (:name,:gender,:address,:phone,:email,:password,:profile,"Customer")');

        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":gender",$gender);
        $stmt->bindParam(":address",$address);
        $stmt->bindParam(":phone",$phone);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$hash_password);
        $stmt->bindParam(":profile",$target_file_client);

        if($profile_name){
            move_uploaded_file($profile_tmp,$target_file);
        }
        
        $stmt->execute();
        
        session_start();

        if(isset($_SESSION['error']['register'])){ unset($_SESSION['error']['register']); }
        if(isset($_SESSION['value']['register'])){ unset($_SESSION['value']['register']); }
        
        $_SESSION['isRegister'] = true;

        header("Location: http://localhost/juststore");
    }else{
        if(isset($_SESSION['isRegister'])){ unset($_SESSION['isRegister']); }
        header("Location: http://localhost/juststore");
        die();
    }

?>