<?php

require_once "negocio/NServicio.php";
require_once "negocio/NTipo_servicio.php";

class PServicio{
    private $id;
    private $nombre;
    private $id_tipo_servicio;
    private $precio;
    private $duracion;
    private $NServicio;
    private $NTipo_servicio;

    public function __construct(){
        $this->NServicio = new NServicio();
        $this->NTipo_servicio = new NTipo_servicio();
    }

    public function index(){
        $tipos = $this->NTipo_servicio->index();
        $servicios = $this->NServicio->index();
        require_once "public/views/layout/nav.php";
        require_once "public/views/servicio/index.php";
    }

    public function getServicio(){
        $servicio=false;
        if($_POST['id_serv']){
            $id = $_POST['id_serv'];
            $servicio = $this->NServicio->getServicio($id);
        }
        return $servicio;
    }

    public function create(){
        if($_POST){
            $this->nombre = $_POST['nombre'];
            $this->id_tipo_servicio = $_POST['tipo_servicio'];
            $this->precio = $_POST['precio'];
            $this->duracion = $_POST['duracion'];
            $this->NServicio->create($this->nombre, $this->id_tipo_servicio, $this->precio, $this->duracion);
        }
        //volver a listar los servicios llamando al metodo index para limpiar la url
        header("Location:".ROOT.'servicio/index');
    }

    public function edit(){
        if($_POST){
            $this->id = $_POST['id'];
            $this->nombre = $_POST['nombre'];
            $this->id_tipo_servicio = $_POST['tipo_servicio'];
            $this->precio = $_POST['precio'];
            $this->duracion = $_POST['duracion'];
            $this->NServicio->edit($this->id, $this->nombre, $this->id_tipo_servicio, $this->precio, $this->duracion);
        }
        //volver a listar los servicios llamando al metodo index para limpiar la url
        header("Location:".ROOT.'servicio/index');
    }

    public function delete(){
        if(isset($_POST['id'])){
            $this->id = $_POST['id'];
            $this->NServicio->delete($this->id);
        }
        //volver a listar los servicios llamando al metodo index para limpiar la url
        header("Location:".ROOT.'servicio/index');
    }

}