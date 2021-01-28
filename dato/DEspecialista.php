<?php

class DEspecialista{
    private $id;
    private $ci;
    private $nombre;
    private $id_cargo;
    private $edad;
    private $telefono;
    private $db;

    public function __construct(){
        $this->db = new Connection();
    }

    public function getId(){
        return $this->id;
    }

    public function getCi(){
        return $this->ci;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getId_cargo(){
        return $this->id_cargo;
    }
    
    public function getEdad(){
		return $this->edad;
    }
    
    public function getTelefono(){
		return $this->telefono;
	}
    
    public function setId($id){
		$this->id = $id;
    }

	public function setCi($ci){
		$this->ci = $ci;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
    }
    
    public function setId_cargo($id_cargo){
		$this->id_cargo = $id_cargo;
	}

	public function setEdad($edad){
		$this->edad = $edad;
    }

	public function setTelefono($telefono){
		$this->telefono = $telefono;
    }

    public function index(){
        $database = $this->db->connect();
        $sql = "SELECT e.id, e.ci, e.nombre, c.nombre as cargo, e.edad, e.telefono FROM especialista as e, cargo as c WHERE c.id = e.id_cargo";
        $query=$database->prepare($sql);
        $query->execute();
        if ($query)
            $result = $query;
        else $resutl = false;
        $this->db->close();
        return $result;
    }

    public function getEspecialista(){
        $database = $this->db->connect();
        $sql = "SELECT e.id, e.ci, e.nombre, c.nombre as cargo, e.edad, e.telefono FROM especialista as e, cargo as c WHERE c.id = e.id_cargo AND e.id = {$this->getId()}";
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
        $sql = "INSERT INTO especialista VALUES(null, '{$this->getCi()}', '{$this->getNombre()}', {$this->getId_cargo()}, {$this->getEdad()}, '{$this->getTelefono()}')";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }
  
    public function edit(){
        $database = $this->db->connect();
        $sql = "UPDATE especialista SET ci='{$this->getCi()}', nombre='{$this->getNombre()}', id_cargo={$this->getId_cargo()}, edad={$this->getEdad()}, telefono='{$this->getTelefono()}'";
        $sql.=" WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }
  
    public function delete(){
        $database = $this->db->connect();
        $sql = "DELETE FROM especialista WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }
}