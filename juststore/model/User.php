<?php


class User{
    private $conn = '';

    public function __construct($database){
        $this->conn = $database->getConnection(); 
    }

    public function getUser(){
        $stmt = $this->conn->prepare("SELECT * FROM `users` WHERE role='Admin' OR role='Staff' ORDER BY role");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function addUser($name,$gender,$address,$phone,$email,$hash_password,$target_file_client,$role){
        $stmt = $this->conn->prepare('INSERT INTO `users` (name,gender,address,phone,email,password,profile,role)
        VALUES (:name,:gender,:address,:phone,:email,:password,:profile,:role)');

        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":gender",$gender);
        $stmt->bindParam(":address",$address);
        $stmt->bindParam(":phone",$phone);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$hash_password);
        $stmt->bindParam(":role",$role);
        $stmt->bindParam(":profile",$target_file_client);
        
        $stmt->execute();
        
        session_start();

        if(isset($_SESSION['error']['addUser'])){ unset($_SESSION['error']['addUser']); }
        if(isset($_SESSION['value']['addUser'])){ unset($_SESSION['value']['addUser']); }
        
        $_SESSION['success'] = 'Berhasil tambah user';

        header("Location: http://localhost/juststore");
    }

    public function findUser($id){
        $stmt = $this->conn->prepare("SELECT * FROM `users` WHERE id=:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

}


?>