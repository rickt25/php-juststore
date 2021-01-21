<?php

    include('../model/Product.php');
    include('../database/Database.php');
    include('validation.php');

    $database = new Database();

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $category = isset($_POST['category'])?$_POST['category']: '';

    $images = $_FILES['image'];
    $target_dir = "../assets/product/";

    if(validateAddProduct($name,$description,$price,$stock,$category,$images)){

        for($i=0; $i<count($images['name']);$i++){
            $image_tmp = $images['tmp_name'][$i];
            move_uploaded_file($image_tmp, $target_dir.$images['name'][$i]);
        }
        
        $data = new Product($database);
        $product = $data->addProduct($name,$description,$price,$stock,$category,$images);

        session_start();

        if(isset($_SESSION['error']['product'])){ unset($_SESSION['error']['product']); }

        $_SESSION['success'] = 'Add product success';
    }
    header('Location: http://localhost/juststore/?page=admin&tab=product');

?>