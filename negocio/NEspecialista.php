<?php

require_once "dato/DEspecialista.php";

class NEspecialista{
    private $DEspecialista;

    public function __construct(){
        $this->DEspecialista = new DEspecialista();
    }

    public function index(){
        $list = $this->DEspecialista->Index();
        return $list;
    }

    public function getEspecialista($id){
        $this->DEspecialista->setId($id);
        $especialista = $this->DEspecialista->getEspecialista();
        return $especialista;
    }

    public function create($ci, $nombre, $id_cargo, $edad, $telefono){
        $this->DEspecialista->setCi($ci);
        $this->DEspecialista->setNombre($nombre);
        $this->DEspecialista->setId_cargo($id_cargo);
        $this->DEspecialista->setEdad($edad);
        $this->DEspecialista->setTelefono($telefono);
        $this->DEspecialista->create();
    }

    public function edit($id, $ci, $nombre, $id_cargo, $edad, $telefono){
        $this->DEspecialista->setId($id);
        $this->DEspecialista->setCi($ci);
        $this->DEspecialista->setNombre($nombre);
        $this->DEspecialista->setId_cargo($id_cargo);
        $this->DEspecialista->setEdad($edad);
        $this->DEspecialista->setTelefono($telefono);
        $this->DEspecialista->edit();
    }

    public function delete($id){
        $this->DEspecialista->setId($id);
        $this->DEspecialista->delete();
    }
}