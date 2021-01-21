<?php

class Database{

    private $hostname = 'localhost';
    private $db_name = 'juststore';
    private $username = 'root';
    private $password = '';

    function getConnection(){
        try{
            $conn = new PDO("mysql:host=$this->hostname;dbname=$this->db_name",$this->username,$this->password);

            return $conn;
        }
        catch(PDOException $e){
            echo "connection failed. ".$e->getMessage();
        }
    }
}

?>