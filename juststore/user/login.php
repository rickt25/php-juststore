<?php

    include_once('../database/Database.php');
    include('validation.php');

    $database = new Database();
    $conn = $database->getConnection();
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!validateLogin($email,$password)){

        $stmt = $conn->prepare('SELECT * FROM `users` WHERE email = :email');

        $stmt->bindParam(":email",$email);
        
        $stmt->execute();

        session_start();

        if($stmt->rowCount() == 0){
            $_SESSION['error']['login'] = array('email'=>'Email tidak terdaftar');
            header("Location: http://localhost/juststore");
            die();
        }

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!password_verify($password , $row['password'])){
            $_SESSION['error']['login'] = array('password'=>'Password salah');
            $_SESSION['value']['login'] = array('email'=>$email);
            header("Location: http://localhost/juststore");
            die();
        }

        if(isset($_SESSION['error']['login'])){ unset($_SESSION['error']['login']); }
        if(isset($_SESSION['value']['login'])){ unset($_SESSION['value']['login']); }
        if(isset($_SESSION['isRegister'])){ unset($_SESSION['isRegister']); }
            
        $_SESSION['user'] = $row;
        $_SESSION['isLogin'] = true;
        
        header("Location: http://localhost/juststore");

    }

?>