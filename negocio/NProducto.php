<?php

require_once "dato/DProducto.php";

class NProducto{

    private $DProducto;

    public function __construct(){
        $this->DProducto = new DProducto();
    }

    public function index(){
        $list = $this->DProducto->index();
        return $list;
    }

    public function getProducto($id){
        $this->DProducto->setId($id);
        $producto = $this->DProducto->getProducto();
        return $producto;
    }

    public function create($nombre, $precio, $marca, $descripcion){
        $this->DProducto->setNombre($nombre);
        $this->DProducto->setPrecio($precio);
        $this->DProducto->setMarca($marca);
        $this->DProducto->setDescripcion($descripcion);
        $this->DProducto->create();
    }

    public function edit($id, $nombre, $precio, $marca, $descripcion){
        $this->DProducto->setId($id);
        $this->DProducto->setNombre($nombre);
        $this->DProducto->setPrecio($precio);
        $this->DProducto->setMarca($marca);
        $this->DProducto->setDescripcion($descripcion);
        $this->DProducto->edit();
    }

    public function delete($id){
        $this->DProducto->setId($id);
        $this->DProducto->delete();
    }

}