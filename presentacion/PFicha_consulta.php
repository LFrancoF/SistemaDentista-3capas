<?php

require_once "negocio/NPaciente.php";
require_once "negocio/NEspecialista.php";
require_once "negocio/NFicha_consulta.php";
require_once "negocio/NServicio.php";

class PFicha_consulta{
    private $id;
    private $id_paciente;
    private $id_especialista;
    private $monto;
    private $fecha;
    private $hora;
    private $estado;
    private $NPaciente;
    private $NEspecialista;
    private $NProducto;
    private $NFicha_consulta;

    public function __construct(){
        $this->NPaciente = new NPaciente();
        $this->NEspecialista = new NEspecialista();
        $this->NServicio = new NServicio();
        $this->NFicha_consulta = new NFicha_consulta();
    }

    public function index(){
        $consultas = $this->NFicha_consulta->index();
        require_once "public/views/layout/nav.php";
        require_once "public/views/consulta/index.php";
    }

    public function getDetalles($id_consulta){
        $detalles = $this->NFicha_consulta->getDetalles($id_consulta);
        return $detalles;
    }

    public function new(){
        $pacientes = $this->NPaciente->index();
        $especialistas = $this->NEspecialista->index();
        $servicios = $this->NServicio->index();
        require_once "public/views/layout/nav.php";
        require_once "public/views/consulta/new.php";
    }

    public function create(){
        if(isset($_POST)){
            $id_paciente = $_POST['id_paciente'];
            $id_especialista = $_POST['id_especialista'];
            $monto = $_POST['monto'];
            $estado = $_POST['estado'];
            $detalles = $_POST['detalle'];
            $this->NFicha_consulta->create($id_paciente, $id_especialista, $monto, $estado, $detalles);
        }
    }

    public function edit(){
        if(isset($_POST)){
            $id_consulta = $_POST['id_consulta'];
            $id_paciente = $_POST['id_paciente'];
            $id_especialista = $_POST['id_especialista'];
            $monto = $_POST['monto'];
            $estado = $_POST['estado'];
            $detalles = $_POST['detalle'];
            $this->NFicha_consulta->edit($id_consulta, $id_paciente, $id_especialista, $monto, $estado, $detalles);
        }
    }

    public function delete(){
        if(isset($_POST['id'])){
            $this->id = $_POST['id'];
            $this->NFicha_consulta->delete($this->id);
        }
        //volver a listar las consultas llamando al metodo index para limpiar la url
        header("Location:".ROOT.'ficha_consulta/index');
    }

    public function editView(){
        if(isset($_GET)){
            //obtenemos datos de la consulta para llenar campos
            $id_consulta = $_GET['id'];
            $consulta = $this->NFicha_consulta->getConsulta($id_consulta)->fetch(PDO::FETCH_OBJ);

            //obtenemos datos del paciente de esta venta para llenar en los campos
            $id_paciente = $_GET['id_p'];
            $paciente_edit = $this->NPaciente->getPaciente($id_paciente)->fetch(PDO::FETCH_OBJ);

            //obtenemos datos del especialista de esta venta para llenar en los campos
            $id_especialista = $_GET['id_e'];
            $especialista_edit = $this->NEspecialista->getEspecialista($id_especialista)->fetch(PDO::FETCH_OBJ);
            
            //obtenemos los datos de todos los pacientes, especialistas y servicios para poder elegir otro de estos
            $pacientes = $this->NPaciente->index();
            $especialistas = $this->NEspecialista->index();
            $servicios = $this->NServicio->index();
            require_once "public/views/layout/nav.php";
            require_once "public/views/consulta/new.php";
        }
    }
}