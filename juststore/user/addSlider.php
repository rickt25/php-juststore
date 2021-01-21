<?php

    include('../model/Slider.php');
    include('../database/Database.php');
    include('validation.php');

    $database = new Database();

    $name = $_POST['name'];
    $hyperlink = $_POST['hyperlink'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $sequence = $_POST['sequence'];

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES["image"]["size"];

    $target_dir = "../assets/slider/";
    $target_file = $target_dir . $image_name;
    $target_file_client = 'assets/slider/' . $image_name;
    $imageFileType = strtoLower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(!$image_name){ $target_file_client = ''; }

    if(validateAddSlider($name,$hyperlink,$start,$end,$sequence,$image_name,$image_size,$imageFileType)){
        $data = new Slider($database);
        $result = $data->addSlider($name,$hyperlink,$start,$end,$sequence,$target_file_client);
        
        move_uploaded_file($image_tmp,$target_file);

        session_start();

        if(isset($_SESSION['error']['slider'])){ unset($_SESSION['error']['slider']); }

        $_SESSION['success'] = 'Add slider success';
    }
    header('Location: http://localhost/juststore/?page=admin&tab=slider');
?>