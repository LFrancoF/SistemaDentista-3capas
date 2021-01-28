<?php

require_once "negocio/NEspecialista.php";
require_once "negocio/NCargo.php";

class PEspecialista{
    private $id;
    private $ci;
    private $nombre;
    private $id_cargo;
    private $edad;
    private $telefono;
    private $NEspecialista;
    private $NCargo;

    public function __construct(){
        $this->NEspecialista = new NEspecialista();
        $this->NCargo = new NCargo();
    }

    public function index(){
        $cargos = $this->NCargo->index();
        $especialistas = $this->NEspecialista->Index();
        require_once "public/views/layout/nav.php";
        require_once "public/views/especialista/index.php";
    }

    public function getEspecialista(){
        $especialista=false;
        if(isset($_POST['id_especialista'])){
            $id = $_POST['id_especialista'];
            $especialista = $this->NEspecialista->getEspecialista($id);
        }
        return $especialista;
    }

    public function create(){
        if($_POST){
            $this->ci = $_POST['ci'];
            $this->nombre = $_POST['nombre'];
            $this->id_cargo = $_POST['cargo'];
            $this->edad = $_POST['edad'];
            $this->telefono = $_POST['telefono'];
            $this->NEspecialista->create($this->ci, $this->nombre, $this->id_cargo, $this->edad, $this->telefono);
        }
        //volver a listar los especialistas llamando al metodo index para limpiar la url
        header("Location:".ROOT.'especialista/index');
    }

    public function edit(){
        if($_POST){
            $this->id = $_POST['id'];
            $this->ci = $_POST['ci'];
            $this->nombre = $_POST['nombre'];
            $this->id_cargo = $_POST['cargo'];
            $this->edad = $_POST['edad'];
            $this->telefono = $_POST['telefono'];
            $this->NEspecialista->edit($this->id, $this->ci, $this->nombre, $this->id_cargo, $this->edad, $this->telefono);
        }
        //volver a listar los especialistas llamando al metodo index para limpiar la url
        header("Location:".ROOT.'especialista/index');
    }

    public function delete(){
        if(isset($_POST['id'])){
            $this->id = $_POST['id'];
            $this->NEspecialista->delete($this->id);
        }
        //volver a listar los especialistas llamando al metodo index para limpiar la url
        header("Location:".ROOT.'especialista/index');
    }

}