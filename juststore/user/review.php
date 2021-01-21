<?php
    session_start();
    include('../database/Database.php');
    include('validation.php');
    $database = new Database();
    $conn = $database->getConnection();

    $product_id = $_POST['id'];
    $user_id = $_SESSION['user']['id'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $date = date("Y-m-d");

    if(!empty($rating)){
        
        $stmt = $conn->prepare("INSERT INTO `review`(product_id,user_id,rating,review,date) VALUES(:product_id,:user_id,:rating,:review,:date)");
        $stmt->bindParam(':product_id',$product_id);
        $stmt->bindParam(':user_id',$user_id);
        $stmt->bindParam(':rating',$rating);
        $stmt->bindParam(':review',$review);
        $stmt->bindParam(':date',$date);
        $stmt->execute();

    }

    header('Location: http://localhost/juststore/?page=cart&tab=history');
?>