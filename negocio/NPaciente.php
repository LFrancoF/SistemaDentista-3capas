<?php

require_once "dato/DPaciente.php";

class NPaciente{
    private $DPaciente;

    public function __construct(){
        $this->DPaciente = new DPaciente();
    }

    public function index(){
        $list = $this->DPaciente->Index();
        return $list;
    }

    public function getPaciente($id){
        $this->DPaciente->setId($id);
        $paciente = $this->DPaciente->getPaciente();
        return $paciente;
    }
    
    public function create($ci, $nombre, $edad, $telefono){
        $this->DPaciente->setCi($ci);
        $this->DPaciente->setNombre($nombre);
        $this->DPaciente->setEdad($edad);
        $this->DPaciente->setTelefono($telefono);
        $this->DPaciente->create();
    }

    public function edit($id, $ci, $nombre, $edad, $telefono){
        $this->DPaciente->setId($id);
        $this->DPaciente->setCi($ci);
        $this->DPaciente->setNombre($nombre);
        $this->DPaciente->setEdad($edad);
        $this->DPaciente->setTelefono($telefono);
        $this->DPaciente->edit();
    }

    public function delete($id){
        $this->DPaciente->setId($id);
        $this->DPaciente->delete();
    }
}