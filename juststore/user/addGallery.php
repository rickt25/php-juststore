<?php

    include('../model/Product.php');
    include('../database/Database.php');
    include('validation.php');

    $database = new Database();

    $id = $_POST['id'];
    $images = $_FILES['image'];
    $target_dir = '../assets/product/';

    if(validateEditGallery($images)){

        for($i=0; $i<count($images['name']);$i++){
            $image_tmp = $images['tmp_name'][$i];
            move_uploaded_file($image_tmp, $target_dir.$images['name'][$i]);
        }
        
        $data = new Product($database);
        $product = $data->editGallery($id,$images);

        session_start();

        if(isset($_SESSION['error']['product'])){ unset($_SESSION['error']['product']); }

        $_SESSION['success'] = 'Add image success';
    }
    header('Location: http://localhost/juststore/?page=admin&tab=product&id='.$id);

?>