<?php

require_once "dato/DTipo_servicio.php";

class NTipo_servicio{

    private $DTipo_servicio;

    public function __construct(){
        $this->DTipo_servicio = new DTipo_servicio();
    }

    public function index(){
        $list = $this->DTipo_servicio->index();
        return $list;
    }

    public function create($nombre, $descripcion){
        $this->DTipo_servicio->setNombre($nombre);
        $this->DTipo_servicio->setDescripcion($descripcion);
        $this->DTipo_servicio->create();
    }

    public function edit($id, $nombre, $descripcion){
        $this->DTipo_servicio->setId($id);
        $this->DTipo_servicio->setNombre($nombre);
        $this->DTipo_servicio->setDescripcion($descripcion);
        $this->DTipo_servicio->edit();
    }

    public function delete($id){
        $this->DTipo_servicio->setId($id);
        $this->DTipo_servicio->delete();
    }

}