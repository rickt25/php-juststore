<?php

    include_once('../database/Database.php');

    $database = new Database();
    $conn = $database->getConnection();

    $id = $_POST['cart_id'];
    $qty = $_POST['qty'];

    $stmt = $conn->prepare("UPDATE cart SET quantity=:quantity WHERE id=:id");
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':quantity',$qty);
    $stmt->execute();

?>