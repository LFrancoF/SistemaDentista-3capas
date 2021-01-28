<?php

class DServicio{
    private $id;
    private $nombre;
    private $id_tipo_servicio;
    private $precio;
    private $duracion;
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

    public function getId_tipo_servicio(){
        return $this->id_tipo_servicio;
    }
    
    public function getPrecio(){
		return $this->precio;
    }
    
    public function getDuracion(){
		return $this->duracion;
	}
    
    public function setId($id){
		$this->id = $id;
    }

	public function setNombre($nombre){
		$this->nombre = $nombre;
    }
    
    public function setId_tipo_servicio($id_tipo_servicio){
		$this->id_tipo_servicio = $id_tipo_servicio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
    }

	public function setDuracion($duracion){
		$this->duracion = $duracion;
    }

    public function index(){
        $database = $this->db->connect();
        $sql = "SELECT s.id, s.nombre, t.nombre as tipo, s.precio, s.duracion FROM servicio as s, tipo_servicio as t WHERE t.id = s.id_tipo_servicio";
        $query=$database->prepare($sql);
        $query->execute();
        if ($query)
            $result = $query;
        else $resutl = false;
        $this->db->close();
        return $result;
    }

    public function getServicio(){
        $database = $this->db->connect();
        $sql = "SELECT * FROM servicio WHERE id={$this->getId()}";
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
        $sql = "INSERT INTO servicio VALUES(null, '{$this->getNombre()}', {$this->getId_tipo_servicio()}, {$this->getPrecio()}, {$this->getDuracion()})";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }
  
    public function edit(){
        $database = $this->db->connect();
        $sql = "UPDATE servicio SET nombre='{$this->getNombre()}', id_tipo_servicio={$this->getId_tipo_servicio()}, precio={$this->getPrecio()}, duracion={$this->getDuracion()}";
        $sql.=" WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }
  
    public function delete(){
        $database = $this->db->connect();
        $sql = "DELETE FROM servicio WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }
}