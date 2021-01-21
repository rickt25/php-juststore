<?php

    include('../model/Product.php');
    include('../database/Database.php');
    include('validation.php');

    $database = new Database();

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    
    $category = isset($_POST['category'])?$_POST['category']: '';

    if(validateEditProduct($name,$description,$price,$stock,$category)){
        $data = new Product($database);
        $product = $data->editProduct($id,$name,$description,$price,$stock,$category);
        session_start();

        if(isset($_SESSION['error']['product'])){ unset($_SESSION['error']['product']); }

        $_SESSION['success'] = 'Add product success';
    }

    header("Location: http://localhost/juststore/?page=admin&tab=product");

?>