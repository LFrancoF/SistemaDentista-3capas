<?php

class DNota_venta{
    private $id;
    private $id_paciente;
    private $id_especialista;
    private $monto;
    private $fecha;
    private $hora;
    private $observacion;
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

    public function getObservacion(){
        return $this->observacion;
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

    public function setObservacion($observacion){
        $this->observacion = $observacion;
    }

    public function __construct(){
        $this->db = new Connection();
    }

    public function index(){
        $database = $this->db->connect();
        $sql = "SELECT * FROM nota_venta";
        $query=$database->prepare($sql);
        $query->execute();
        if ($query)
            $result = $query;
        else $resutl = false;
        $this->db->close();
        return $result;
    }

    public function getVenta(){
        $database = $this->db->connect();
        $sql = "SELECT * FROM nota_venta WHERE id={$this->getId()}";
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
        $sql = "INSERT INTO nota_venta VALUES(null, {$this->getId_paciente()}, {$this->getId_especialista()}, {$this->getMonto()}, CURDATE(), CURTIME(), '{$this->getObservacion()}')";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function edit(){
        $database = $this->db->connect();
        $sql = "UPDATE nota_venta SET id_paciente={$this->getId_paciente()}, id_especialista={$this->getId_especialista()}, monto={$this->getMonto()}, fecha=CURDATE(), hora=CURTIME(), observacion='{$this->getObservacion()}'";
        $sql.=" WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function delete(){    
        $database = $this->db->connect();
        $sql = "DELETE FROM nota_venta WHERE id={$this->getId()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

}