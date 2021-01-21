<?php


class Product{
    private $conn = '';

    public function __construct($database){
        $this->conn = $database->getConnection(); 
    }

    public function getProduct(){
        $stmt = $this->conn->prepare("SELECT * FROM `products` AS p JOIN `product_gallery` AS g ON p.id=g.product_id GROUP BY g.product_id");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function addProduct($name,$description,$price,$stock,$category,$images){

        $stmt = $this->conn->prepare('INSERT INTO `products` (name,description,price,stock) VALUES (:name,:description,:price,:stock)');
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":description",$description);
        $stmt->bindParam(":price",$price);
        $stmt->bindParam(":stock",$stock);
        $stmt->execute();
        
        $id = $this->conn->lastInsertId();
        
        foreach($category as $c){
            $stmt = $this->conn->prepare('INSERT INTO `product_category` (product_id,category_id) VALUES (:product_id,:category_id)');
            $stmt->bindParam(":product_id",$id);
            $stmt->bindParam(":category_id",$c);
            $stmt->execute();
        }

        $stmt = $this->conn->prepare('SELECT * FROM `product_gallery` WHERE product_id=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $count = count($stmt->fetchAll(PDO::FETCH_ASSOC));

        foreach($images['name'] as $i){
            if($count < 5){
                $target_dir = "assets/product/";
                $target_file = $target_dir . $i;
                $stmt = $this->conn->prepare('INSERT INTO `product_gallery` (product_id,image) VALUES (:product_id,:image)');
                $stmt->bindParam(":product_id",$id);
                $stmt->bindParam(":image",$target_file);
                $stmt->execute();
                $count++;
            }
        }

        session_start();

        if(isset($_SESSION['error']['product'])){ unset($_SESSION['error']['product']); }
        $_SESSION['success'] = 'Add data success';

        return true;
    }

    public function editProduct($id,$name,$description,$price,$stock,$category){

        $stmt = $this->conn->prepare('UPDATE `products` SET name=:name,description=:description,price=:price,stock=:stock WHERE id=:id');
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":description",$description);
        $stmt->bindParam(":price",$price);
        $stmt->bindParam(":stock",$stock);
        $stmt->execute();
        
        $stmt = $this->conn->prepare('DELETE FROM `product_category` WHERE product_id=:product_id');
        $stmt->bindParam(":product_id",$id);
        $stmt->execute();

        foreach($category as $c){
            $stmt = $this->conn->prepare('INSERT INTO `product_category` (product_id,category_id) VALUES (:product_id,:category_id)');
            $stmt->bindParam(":product_id",$id);
            $stmt->bindParam(":category_id",$c);
            $stmt->execute();
        }

        session_start();

        if(isset($_SESSION['error']['product'])){ unset($_SESSION['error']['product']); }
        $_SESSION['success'] = 'Add data success';

        return true;
    }

    public function editGallery($id,$images){
        
        $stmt = $this->conn->prepare('SELECT * FROM `product_gallery` WHERE product_id=:product_id');
        $stmt->bindParam(":product_id",$id);
        $stmt->execute();

        $count = $stmt->rowCount();

        foreach($images['name'] as $i){
            if($count < 5){
                $target_dir = "assets/product/";
                $target_file = $target_dir . $i;
                $stmt = $this->conn->prepare('INSERT INTO `product_gallery` (product_id,image) VALUES (:product_id,:image)');
                $stmt->bindParam(":product_id",$id);
                $stmt->bindParam(":image",$target_file);
                $stmt->execute();
                $count++;
            }
        }

        session_start();

        if(isset($_SESSION['error']['product'])){ unset($_SESSION['error']['product']); }
        $_SESSION['success'] = 'Add data success';

        return true;
    }

    public function getDetail($id){
        $stmt = $this->conn->prepare('SELECT * FROM `products` WHERE id=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getGallery($id){
        
        $stmt = $this->conn->prepare('SELECT * FROM `product_gallery` WHERE product_id=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}

?>