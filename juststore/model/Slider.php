<?php


class Slider{
    private $conn = '';

    public function __construct($database){
        $this->conn = $database->getConnection(); 
    }

    public function getSlider(){
        $stmt = $this->conn->prepare("SELECT * FROM `sliders` ORDER BY sequence");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function addSlider($name,$hyperlink,$start,$end,$sequence,$target_file_client){
        $stmt = $this->conn->prepare('INSERT INTO `sliders` (name,image,sequence,start_date,end_date,hyperlink)
        VALUES (:name,:image,:sequence,:start_date,:end_date,:hyperlink)');

        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":image",$target_file_client);
        $stmt->bindParam(":sequence",$sequence);
        $stmt->bindParam(":start_date",$start);
        $stmt->bindParam(":end_date",$end);
        $stmt->bindParam(":hyperlink",$hyperlink);
        
        $stmt->execute();

        return true;
    }

    public function editSlider($id,$name,$hyperlink,$start,$end,$sequence,$target_file_client){
        $stmt = $this->conn->prepare('UPDATE `sliders` SET name=:name,hyperlink=:hyperlink,start_date=:start_date,end_date=:end_date,sequence=:sequence,image=:image WHERE id=:id');

        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":hyperlink",$hyperlink);
        $stmt->bindParam(":start_date",$start);
        $stmt->bindParam(":end_date",$end);
        $stmt->bindParam(":sequence",$sequence);
        $stmt->bindParam(":image",$target_file_client);
        
        $stmt->execute();
        
        session_start();

        if(isset($_SESSION['error']['slider'])){ unset($_SESSION['error']['slider']); }
        $_SESSION['success'] = 'Update data success';

        return true;
    }
}

?>