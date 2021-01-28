<?php

require_once "negocio/NPaciente.php";
require_once "negocio/NEspecialista.php";
require_once "negocio/NNota_venta.php";
require_once "negocio/NProducto.php";

class PNota_venta{
    private $id;
    private $id_paciente;
    private $id_especialista;
    private $monto;
    private $fecha;
    private $hora;
    private $observacion;
    private $NPaciente;
    private $NEspecialista;
    private $NProducto;
    private $NNota_venta;

    public function __construct(){
        $this->NPaciente = new NPaciente();
        $this->NEspecialista = new NEspecialista();
        $this->NProducto = new NProducto();
        $this->NNota_venta = new NNota_venta();
    }

    public function index(){
        $ventas = $this->NNota_venta->index();
        require_once "public/views/layout/nav.php";
        require_once "public/views/venta/index.php";
    }

    public function getDetalles($id_venta){
        $detalles = $this->NNota_venta->getDetalles($id_venta);
        return $detalles;
    }

    public function new(){
        $pacientes = $this->NPaciente->index();
        $especialistas = $this->NEspecialista->index();
        $productos = $this->NProducto->index();
        require_once "public/views/layout/nav.php";
        require_once "public/views/venta/new.php";
    }

    public function create(){
        if(isset($_POST)){
            $id_paciente = $_POST['id_paciente'];
            $id_especialista = $_POST['id_especialista'];
            $monto = $_POST['monto'];
            $observacion = $_POST['observacion'];
            $detalles = $_POST['detalle'];
            $this->NNota_venta->create($id_paciente, $id_especialista, $monto, $observacion, $detalles);
        }
    }

    public function edit(){
        if(isset($_POST)){
            $id_venta = $_POST['id_venta'];
            $id_paciente = $_POST['id_paciente'];
            $id_especialista = $_POST['id_especialista'];
            $monto = $_POST['monto'];
            $observacion = $_POST['observacion'];
            $detalles = $_POST['detalle'];
            $this->NNota_venta->edit($id_venta, $id_paciente, $id_especialista, $monto, $observacion, $detalles);
        }
    }

    public function delete(){
        if(isset($_POST['id'])){
            $this->id = $_POST['id'];
            $this->NNota_venta->delete($this->id);
        }
        //volver a listar los ventas llamando al metodo index para limpiar la url
        header("Location:".ROOT.'nota_venta/index');
    }

    public function editView(){
        if(isset($_GET)){
            //obtenemos datos de la venta para llenar campos
            $id_venta = $_GET['id'];
            $venta = $this->NNota_venta->getVenta($id_venta)->fetch(PDO::FETCH_OBJ);

            //obtenemos datos del paciente de esta venta para llenar en los campos
            $id_paciente = $_GET['id_p'];
            $paciente_edit = $this->NPaciente->getPaciente($id_paciente)->fetch(PDO::FETCH_OBJ);

            //obtenemos datos del especialista de esta venta para llenar en los campos
            $id_especialista = $_GET['id_e'];
            $especialista_edit = $this->NEspecialista->getEspecialista($id_especialista)->fetch(PDO::FETCH_OBJ);
            
            //obtenemos todos los datos de pacientes especialistas y productos para poder elegir otro de estos
            $pacientes = $this->NPaciente->index();
            $especialistas = $this->NEspecialista->index();
            $productos = $this->NProducto->index();
            require_once "public/views/layout/nav.php";
            require_once "public/views/venta/new.php";
        }
    }
}