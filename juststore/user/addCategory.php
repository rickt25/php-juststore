<?php

    include('../model/Category.php');
    include('../database/Database.php');
    include('validation.php');

    $database = new Database();

    $name = $_POST['name'];

    $image_name = $_FILES['icon']['name'];
    $image_tmp = $_FILES['icon']['tmp_name'];
    $image_size = $_FILES["icon"]["size"];

    $target_dir = "../assets/category/";
    $target_file = $target_dir . $image_name;
    $target_file_client = $image_name;
    $imageFileType = strtoLower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(!$image_name){ $target_file_client = ''; }

    if(validateAddCategory($name,$image_name,$image_size,$imageFileType)){
        $data = new Category($database);
        $result = $data->addCategory($name,$target_file_client);
        
        move_uploaded_file($image_tmp,$target_file);

        session_start();

        if(isset($_SESSION['error']['category'])){ unset($_SESSION['error']['category']); }

        $_SESSION['success'] = 'Add category success';
    }
    header('Location: http://localhost/juststore/?page=admin&tab=category');
    
?>