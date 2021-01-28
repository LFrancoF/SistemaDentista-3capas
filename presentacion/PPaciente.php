<?php

require_once "negocio/NPaciente.php";

class PPaciente{

    private $id;
    private $ci;
    private $nombre;
    private $edad;
    private $telefono;
    private $NPaciente;

    public function __construct(){
        $this->NPaciente = new NPaciente();
    }

    public function index(){
        $pacientes = $this->NPaciente->Index();
        require_once "public/views/layout/nav.php";
        require_once "public/views/paciente/index.php";
    }

    public function getPaciente(){
        $paciente=false;
        if($_POST['id_paciente']){
            $id = $_POST['id_paciente'];
            $paciente = $this->NPaciente->getPaciente($id);
        }
        return $paciente;
    }

    public function create(){
        if($_POST){
            $this->ci = $_POST['ci'];
            $this->nombre = $_POST['nombre'];
            $this->edad = $_POST['edad'];
            $this->telefono = $_POST['telefono'];
            $this->NPaciente->create($this->ci, $this->nombre, $this->edad, $this->telefono);
        }
        //volver a listar los pacientes llamando al metodo index para limpiar la url
        header("Location:".ROOT.'paciente/index');
    }

    public function edit(){
        if($_POST){
            $this->id = $_POST['id'];
            $this->ci = $_POST['ci'];
            $this->nombre = $_POST['nombre'];
            $this->edad = $_POST['edad'];
            $this->telefono = $_POST['telefono'];
            $this->NPaciente->edit($this->id, $this->ci, $this->nombre, $this->edad, $this->telefono);
        }
        //volver a listar los pacientes llamando al metodo index para limpiar la url
        header("Location:".ROOT.'paciente/index');
    }

    public function delete(){
        if(isset($_POST['id'])){
            $this->id = $_POST['id'];
            $this->NPaciente->delete($this->id);
        }
        //volver a listar los pacientes llamando al metodo index para limpiar la url
        header("Location:".ROOT.'paciente/index');
    }

}