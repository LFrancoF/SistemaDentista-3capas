<?php

class DTipo_servicio{

    private $id;
    private $nombre;
    private $descripcion;
    private $db;

    public function __construct(){
        $this->db = new Connection();
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function index(){
        $database = $this->db->connect();
        $sql = "SELECT * FROM tipo_servicio";
        $query=$database->prepare($sql);
        $query->execute();
        if ($query)
            $result = $query;
        else $resutl = false;
        $this->db->close();
        return $result;
    }

    public function create(){
        $database = $this->db->connect();
        $sql = "INSERT INTO tipo_servicio VALUES(null, '{$this->getNombre()}', '{$this->getDescripcion()}')";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function edit(){
        $database = $this->db->connect();
        $sql = "UPDATE tipo_servicio SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}'";
        $sql.=" WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function delete(){
        $database = $this->db->connect();
        $sql = "DELETE FROM tipo_servicio WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

}