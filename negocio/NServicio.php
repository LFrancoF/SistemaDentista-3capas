<?php

require_once "dato/DServicio.php";

class NServicio{
    private $DServicio;

    public function __construct(){
        $this->DServicio = new DServicio();
    }

    public function index(){
        $list = $this->DServicio->index();
        return $list;
    }

    public function getServicio($id){
        $this->DServicio->setId($id);
        $servicio = $this->DServicio->getServicio();
        return $servicio;
    }

    public function create($nombre, $id_tipo_servicio, $precio, $duracion){
        $this->DServicio->setNombre($nombre);
        $this->DServicio->setId_tipo_servicio($id_tipo_servicio);
        $this->DServicio->setPrecio($precio);
        $this->DServicio->setDuracion($duracion);
        $this->DServicio->create();
    }

    public function edit($id, $nombre, $id_tipo_servicio, $precio, $duracion){
        $this->DServicio->setId($id);
        $this->DServicio->setNombre($nombre);
        $this->DServicio->setId_tipo_servicio($id_tipo_servicio);
        $this->DServicio->setPrecio($precio);
        $this->DServicio->setDuracion($duracion);
        $this->DServicio->edit();
    }

    public function delete($id){
        $this->DServicio->setId($id);
        $this->DServicio->delete();
    }
}