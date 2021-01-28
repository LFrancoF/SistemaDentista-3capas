<?php

class DPaciente{
    private $id;
    private $ci;
    private $nombre;
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

	public function setEdad($edad){
		$this->edad = $edad;
  }

	public function setTelefono($telefono){
		$this->telefono = $telefono;
  }

  public function index(){
      $database = $this->db->connect();
      $sql = "SELECT * FROM paciente";
      $query=$database->prepare($sql);
      $query->execute();
      if ($query)
          $result = $query;
      else $resutl = false;
      $this->db->close();
      return $result;
  }

    public function getPaciente(){
        $database = $this->db->connect();
        $sql = "SELECT * FROM paciente WHERE id={$this->getId()}";
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
      $sql = "INSERT INTO paciente VALUES(null, '{$this->getCi()}', '{$this->getNombre()}', {$this->getEdad()}, '{$this->getTelefono()}')";
      $query=$database->prepare($sql);
      $query->execute();
      $this->db->close();
  }

  public function edit(){
      $database = $this->db->connect();
      $sql = "UPDATE paciente SET ci='{$this->getCi()}', nombre='{$this->getNombre()}', edad={$this->getEdad()}, telefono='{$this->getTelefono()}'";
      $sql.=" WHERE id={$this->getId()}";
      $query=$database->prepare($sql);
      $query->execute();
      $this->db->close();
  }

  public function delete(){
      $database = $this->db->connect();
      $sql = "DELETE FROM paciente WHERE id={$this->getId()}";
      $query=$database->prepare($sql);
      $query->execute();
      $this->db->close();
  }

}