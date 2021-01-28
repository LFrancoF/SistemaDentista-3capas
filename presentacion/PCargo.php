<?php

require_once "negocio/NCargo.php";

class PCargo{

    private $id;
    private $nombre;
    private $descripcion;
    private $NCargo;

    public function __construct(){
        $this->NCargo = new NCargo();
    }

    public function index(){
        $cargos = $this->NCargo->index();
        require_once "public/views/layout/nav.php";
        require_once "public/views/cargo/index.php";
    }

    public function create(){
        if($_POST){
            $this->nombre = $_POST['nombre'];
            $this->descripcion = $_POST['descripcion'];
            $this->NCargo->create($this->nombre, $this->descripcion);
        }
        //volver a listar los cargos llamando al metodo index para limpiar la url
        header("Location:".ROOT.'cargo/index');
    }

    public function edit(){
        if($_POST){
            $this->id = $_POST['id'];
            $this->nombre = $_POST['nombre'];
            $this->descripcion = $_POST['descripcion'];
            $this->NCargo->edit($this->id, $this->nombre, $this->descripcion);
        }
        //volver a listar los cargos llamando al metodo index para limpiar la url
        header("Location:".ROOT.'cargo/index');
    }

    public function delete(){
        if(isset($_POST['id'])){
            $this->id = $_POST['id'];
            $this->NCargo->delete($this->id);
        }
        //volver a listar los cargos llamando al metodo index para limpiar la url
        header("Location:".ROOT.'cargo/index');
    }

}