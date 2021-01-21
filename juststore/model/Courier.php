<?php


class Courier{
    private $conn = '';

    public function __construct($database){
        $this->conn = $database->getConnection(); 
    }

    public function getCourier(){
        $stmt = $this->conn->prepare("SELECT * FROM `couriers`");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function addCourier($name,$cost,$image){
        $stmt = $this->conn->prepare('INSERT INTO `couriers` (name,cost,icon) VALUES (:name,:cost,:icon)');

        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":cost",$cost);
        $stmt->bindParam(":icon",$image);
        
        $stmt->execute();

        session_start();

        if(isset($_SESSION['error']['courier'])){ unset($_SESSION['error']['courier']); }
        $_SESSION['success'] = 'Add data success';

        return true;
    }

    public function editCourier($id,$name,$cost,$image){
        $stmt = $this->conn->prepare('UPDATE `couriers` SET name=:name,cost=:cost,icon=:icon WHERE id=:id');

        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":cost",$cost);
        $stmt->bindParam(":icon",$image);
        
        $stmt->execute();
        
        session_start();

        if(isset($_SESSION['error']['courier'])){ unset($_SESSION['error']['courier']); }
        $_SESSION['success'] = 'Update data success';

        return true;
    }
}

?>