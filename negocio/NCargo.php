<?php

require_once "dato/DCargo.php";

class NCargo{

    private $DCargo;

    public function __construct(){
        $this->DCargo = new DCargo();
    }

    public function index(){
        $list = $this->DCargo->index();
        return $list;
    }

    public function create($nombre, $descripcion){
        $this->DCargo->setNombre($nombre);
        $this->DCargo->setDescripcion($descripcion);
        $this->DCargo->create();
    }

    public function edit($id, $nombre, $descripcion){
        $this->DCargo->setId($id);
        $this->DCargo->setNombre($nombre);
        $this->DCargo->setDescripcion($descripcion);
        $this->DCargo->edit();
    }

    public function delete($id){
        $this->DCargo->setId($id);
        $this->DCargo->delete();
    }

}