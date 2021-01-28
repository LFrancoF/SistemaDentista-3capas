<?php

class DProducto{

    private $id;
    private $nombre;
    private $precio;
    private $marca;
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

    public function getPrecio(){
        return $this->precio;
    }

    public function getMarca(){
        return $this->marca;
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

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function index(){
        $database = $this->db->connect();
        $sql = "SELECT * FROM producto";
        $query=$database->prepare($sql);
        $query->execute();
        if ($query)
            $result = $query;
        else $resutl = false;
        $this->db->close();
        return $result;
    }

    public function getProducto(){
        $database = $this->db->connect();
        $sql = "SELECT * FROM producto WHERE id={$this->getId()}";
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
        $sql = "INSERT INTO producto VALUES(null, '{$this->getNombre()}', '{$this->getPrecio()}', '{$this->getMarca()}', '{$this->getDescripcion()}')";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function edit(){
        $database = $this->db->connect();
        $sql = "UPDATE producto SET nombre='{$this->getNombre()}', precio={$this->getPrecio()}, marca='{$this->getMarca()}', descripcion='{$this->getDescripcion()}'";
        $sql.=" WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function delete(){
        $database = $this->db->connect();
        $sql = "DELETE FROM producto WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

}