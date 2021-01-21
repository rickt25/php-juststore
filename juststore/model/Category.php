<?php


class Category{
    private $conn = '';

    public function __construct($database){
        $this->conn = $database->getConnection(); 
    }

    public function getCategory(){
        $stmt = $this->conn->prepare("SELECT * FROM `categories`");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function addCategory($name,$image){
        $stmt = $this->conn->prepare('INSERT INTO `categories` (name,icon) VALUES (:name,:icon)');

        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":icon",$image);
        
        $stmt->execute();

        session_start();

        if(isset($_SESSION['error']['category'])){ unset($_SESSION['error']['category']); }
        $_SESSION['success'] = 'Add data success';

        return true;
    }

    public function editCategory($id,$name,$image){
        $stmt = $this->conn->prepare('UPDATE `categories` SET name=:name,icon=:icon WHERE id=:id');

        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":icon",$image);
        
        $stmt->execute();
        
        session_start();

        if(isset($_SESSION['error']['category'])){ unset($_SESSION['error']['category']); }
        $_SESSION['success'] = 'Update data success';

        return true;
    }
}

?>