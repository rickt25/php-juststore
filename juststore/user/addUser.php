<?php

    include('../model/User.php');
    include('../database/Database.php');
    include('validation.php');

    $database = new Database();

    $name = $_POST['name'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $hash_password = password_hash($password,PASSWORD_BCRYPT);

    $profile_name = $_FILES['profile']['name'];
    $profile_tmp = $_FILES['profile']['tmp_name'];
    $profile_size = $_FILES["profile"]["size"];

    $target_dir = "../assets/profile/";
    $target_file = $target_dir . $profile_name;
    $target_file_client = 'assets/profile/' . $profile_name;
    $imageFileType = strtoLower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(!$profile_name){ $target_file_client = ''; }

    if(validateAddUser($name,$gender,$address,$phone,$email,$password,$profile_size,$imageFileType)){
        $data = new User($database);
        $result = $data->addUser($name,$gender,$address,$phone,$email,$hash_password,$target_file_client,$role);
        
        if($profile_name){
            move_uploaded_file($profile_tmp,$target_file);
        }

        session_start();

        if(isset($_SESSION['error']['register'])){ unset($_SESSION['error']['register']); }
        if(isset($_SESSION['value']['register'])){ unset($_SESSION['value']['register']); }

        $_SESSION['success'] = 'Add user success';
    }
    header('Location: http://localhost/juststore/?page=admin');
?>