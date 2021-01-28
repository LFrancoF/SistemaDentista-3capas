<?php

class Connection{
    private $host='localhost';
    private $database='dentista';
    private $user='root';
    private $pass='';
    private $db;

    public function connect(){
        try{
            $this->db = new PDO('mysql:host='.$this->host.'; dbname='.$this->database, $this->user, $this->pass);
        }catch(PDOException $e){
            die('Error, no se pudo conectar a la base de datos: '. $e->getMessage());
        }
        return $this->db;
    }

    public function close(){
        $this->db = null;
    }
}

/*$conexion = new Connection();
$db=$conexion->connect();*/