<?php

class DFicha_consulta{
    private $id;
    private $id_paciente;
    private $id_especialista;
    private $monto;
    private $fecha;
    private $hora;
    private $estado;
    private $db;

    public function getId(){
        return $this->id;
    }

    public function getId_paciente(){
        return $this->id_paciente;
    }

    public function getId_especialista(){
        return $this->id_especialista;
    }

    public function getMonto(){
        return $this->monto;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getHora(){
        return $this->fecha;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setId_paciente($id_paciente){
        $this->id_paciente = $id_paciente;
    }

    public function setId_especialista($id_especialista){
        $this->id_especialista = $id_especialista;
    }

    public function setMonto($monto){
        $this->monto = $monto;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function __construct(){
        $this->db = new Connection();
    }

    public function index(){
        $database = $this->db->connect();
        $sql = "SELECT * FROM ficha_consulta";
        $query=$database->prepare($sql);
        $query->execute();
        if ($query)
            $result = $query;
        else $resutl = false;
        $this->db->close();
        return $result;
    }

    public function getConsulta(){
        $database = $this->db->connect();
        $sql = "SELECT * FROM ficha_consulta WHERE id={$this->getId()}";
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
        $sql = "INSERT INTO ficha_consulta VALUES(null, {$this->getId_paciente()}, {$this->getId_especialista()}, {$this->getMonto()}, CURDATE(), CURTIME(), '{$this->getEstado()}')";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function edit(){
        $database = $this->db->connect();
        $sql = "UPDATE ficha_consulta SET id_paciente={$this->getId_paciente()}, id_especialista={$this->getId_especialista()}, monto={$this->getMonto()}, fecha=CURDATE(), hora=CURTIME(), estado='{$this->getEstado()}'";
        $sql.=" WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function delete(){    
        $database = $this->db->connect();
        $sql = "DELETE FROM ficha_consulta WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

}