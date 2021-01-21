<?php

    include_once('../database/Database.php');
    include('validation.php');

    $database = new Database();
    $conn = $database->getConnection();

    $id = $_POST['id'];

    $profile_name = $_FILES['profile']['name'];
    $profile_tmp = $_FILES['profile']['tmp_name'];
    $profile_size = $_FILES["profile"]["size"];

    $target_dir = "../assets/profile/";
    $target_file = $target_dir . $profile_name;
    $target_file_client = 'assets/profile/' . $profile_name;
    $imageFileType = strtoLower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(validateProfilePicture($profile_name,$profile_size,$imageFileType)){

        $stmt = $conn->prepare('UPDATE users SET profile=:profile WHERE id=:id');
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":profile",$target_file_client);
        $stmt->execute();
        
        move_uploaded_file($profile_tmp,$target_file);

        $stmt = $conn->prepare('SELECT * FROM `users` WHERE id = :id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        session_start();

        if(isset($_SESSION['error']['profile'])){ unset($_SESSION['error']['profile']); }
        
        $_SESSION['user'] = $row;
        $_SESSION['success'] = 'Update data success';

    }

    header("Location: ". $_SERVER['HTTP_REFERER']);
    exit;

?>