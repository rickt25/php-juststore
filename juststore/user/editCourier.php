<?php

    include('../model/Courier.php');
    include('../database/Database.php');
    include('validation.php');

    $database = new Database();

    $id = $_POST['id'];
    $name = $_POST['name'];
    $cost = $_POST['cost'];

    $image_name = $_FILES['icon']['name'];
    $image_tmp = $_FILES['icon']['tmp_name'];
    $image_size = $_FILES["icon"]["size"];

    $target_dir = "../assets/courier/";
    $target_file = $target_dir . $image_name;
    $target_file_client = $image_name;
    $imageFileType = strtoLower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if(!$image_name){ $target_file_client = ''; }

    if(validateAddCourier($name,$cost,$image_name,$image_size,$imageFileType)){
        $data = new Courier($database);
        $result = $data->editCourier($id,$name,$cost,$target_file_client);

        
        
        move_uploaded_file($image_tmp,$target_file);

        session_start();

        if(isset($_SESSION['error']['courier'])){ unset($_SESSION['error']['courier']); }

        $_SESSION['success'] = 'Add courier success';
    }
    header('Location: http://localhost/juststore/?page=admin&tab=courier');
?>