<?php

require_once "negocio/NTipo_servicio.php";

class PTipo_servicio{

    private $id;
    private $nombre;
    private $descripcion;
    private $NTipo_servicio;

    public function __construct(){
        $this->NTipo_servicio = new NTipo_servicio();
    }

    public function index(){
        $tipos = $this->NTipo_servicio->index();
        require_once "public/views/layout/nav.php";
        require_once "public/views/tipo_servicio/index.php";
    }

    public function create(){
        if($_POST){
            $this->nombre = $_POST['nombre'];
            $this->descripcion = $_POST['descripcion'];
            $this->NTipo_servicio->create($this->nombre, $this->descripcion);
        }
        //volver a listar los tipos de servicios llamando al metodo index para limpiar la url
        header("Location:".ROOT.'tipo_servicio/index');
    }

    public function edit(){
        if($_POST){
            $this->id = $_POST['id'];
            $this->nombre = $_POST['nombre'];
            $this->descripcion = $_POST['descripcion'];
            $this->NTipo_servicio->edit($this->id, $this->nombre, $this->descripcion);
        }
        //volver a listar los tipos de servicios llamando al metodo index para limpiar la url
        header("Location:".ROOT.'tipo_servicio/index');
    }

    public function delete(){
        if(isset($_POST['id'])){
            $this->id = $_POST['id'];
            $this->NTipo_servicio->delete($this->id);
        }
        //volver a listar los tipos de servicios llamando al metodo index para limpiar la url
        header("Location:".ROOT.'tipo_servicio/index');
    }

}