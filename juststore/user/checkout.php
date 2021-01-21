<?php

    include('../database/Database.php');
    include('validation.php');
    $database = new Database();
    $conn = $database->getConnection();

    $user_id = $_POST['user_id'];
    $address = $_POST['address'];
    $courier = $_POST['courier'];
    $phone = $_POST['phone'];
    $notes = $_POST['notes'];
    $transaction_date = date("Y-m-d");
    
    if(validateCheckOut($address,$courier,$phone)){
        $stmt = $conn->prepare("SELECT c.id,c.user_id,c.product_id,c.quantity,p.name,p.price,g.image FROM `cart` AS c JOIN `products` AS p ON c.product_id=p.id JOIN `product_gallery` AS g ON p.id=g.product_id WHERE c.user_id=:id GROUP BY g.product_id");
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $stmt = $conn->prepare("SELECT * FROM `couriers` WHERE id=:id");
        $stmt->bindParam(':id', $courier);
        $stmt->execute();
        $cour = $stmt->fetch(PDO::FETCH_ASSOC);

        $total = 0;
        foreach ($cart as $c) {
            $total = $total + ($c["price"] * $c["quantity"]);
        }

        $stmt = $conn->prepare("SELECT * FROM `transactions` WHERE user_id=:id ORDER BY transaction_id DESC LIMIT 1");
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            $transaction_id = 1;
        }else{
            $trans = $stmt->fetch(PDO::FETCH_ASSOC);
            $transaction_id = $trans['transaction_id']+1;
        }
        
        $stmt = $conn->prepare("INSERT INTO `transactions`(transaction_id,transaction_date,address,courier_name,courier_cost,phone,notes,total,user_id) VALUES(:transaction_id,:transaction_date,:address,:courier_name,:courier_cost,:phone,:notes,:total,:user_id)");
        $stmt->bindParam(':transaction_id',$transaction_id);
        $stmt->bindParam(':transaction_date',$transaction_date);
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':courier_name',$cour['name']);
        $stmt->bindParam(':courier_cost',$cour['cost']);
        $stmt->bindParam(':phone',$phone);
        $stmt->bindParam(':notes',$notes);
        $stmt->bindParam(':total',$total);
        $stmt->bindParam(':user_id',$user_id);
        $stmt->execute();

        $new_id = $conn->lastInsertId();

        foreach($cart as $c){
    
            $stmt = $conn->prepare("INSERT INTO `transaction_details`(transaction_id,product_id,product_name,quantity,price) VALUES(:transaction_id,:product_id,:product_name,:quantity,:price)");
            $stmt->bindParam(':transaction_id',$new_id);
            $stmt->bindParam(':product_id',$c['product_id']);
            $stmt->bindParam(':product_name',$c['name']);
            $stmt->bindParam(':quantity',$c['quantity']);
            $stmt->bindParam(':price',$c['price']);
            $stmt->execute();
        }

        $stmt = $conn->prepare("DELETE FROM `cart` WHERE user_id=:id");
        $stmt->bindParam(':id',$user_id);
        $stmt->execute();

        session_start();
        if(isset($_SESSION['error']['transaction'])){ unset($_SESSION['error']['transaction']); }

    }

    header('Location: http://localhost/juststore/?page=cart&tab=history');
?>