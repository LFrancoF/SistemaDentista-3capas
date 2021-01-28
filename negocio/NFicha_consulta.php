<?php

require_once "dato/DFicha_consulta.php";
require_once "dato/DDetalle_consulta.php";

class NFicha_consulta{

    private $DFicha_consulta;
    private $DDetalle_consulta;

    public function __construct(){
        $this->DFicha_consulta = new DFicha_consulta();
        $this->DDetalle_consulta = new DDetalle_consulta();
    }

    public function index(){
        $list = $this->DFicha_consulta->index();
        return $list;
    }

    public function getConsulta($id){
        $this->DFicha_consulta->setId($id);
        $consulta = $this->DFicha_consulta->getConsulta();
        return $consulta;
    }

    public function create($id_paciente, $id_especialista, $monto, $estado, $detalles){
        //primero creamos la cabecera de la ficha
        $this->DFicha_consulta->setId_paciente($id_paciente);
        $this->DFicha_consulta->setId_especialista($id_especialista);
        $this->DFicha_consulta->setMonto($monto);
        $this->DFicha_consulta->setEstado($estado);
        $this->DFicha_consulta->create();

        //luego guardamos los detalles que se encuentran en el array detalles
        foreach($detalles as $servicio){
            $id_serv = $servicio[0];
            $cantidad = $servicio[1];
            $precio = $servicio[2];
            $this->DDetalle_consulta->setId_servicio($id_serv);
            $this->DDetalle_consulta->setCantidad($cantidad);
            $this->DDetalle_consulta->setPrecio($precio);
            $this->DDetalle_consulta->create();
        }
    }

    public function edit($id_consulta, $id_paciente, $id_especialista, $monto, $estado, $detalles){
        //primero editamos la cabecera de la ficha
        $this->DFicha_consulta->setId($id_consulta);
        $this->DFicha_consulta->setId_paciente($id_paciente);
        $this->DFicha_consulta->setId_especialista($id_especialista);
        $this->DFicha_consulta->setMonto($monto);
        $this->DFicha_consulta->setEstado($estado);
        $this->DFicha_consulta->edit();

        //luego actualizamos los detalles de esta consulta que se encuentran en el array detalles
        $this->DDetalle_consulta->setId_ficha_consulta($id_consulta);
        //primero eliminamos todos para insertar los nuevos
        $this->DDetalle_consulta->delete();
        foreach($detalles as $servicio){
            $id_serv = $servicio[0];
            $cantidad = $servicio[1];
            $precio = $servicio[2];
            $this->DDetalle_consulta->setId_servicio($id_serv);
            $this->DDetalle_consulta->setCantidad($cantidad);
            $this->DDetalle_consulta->setPrecio($precio);
            $this->DDetalle_consulta->edit();
        }
    }

    public function delete($id){
        //primero borramos todos los detalles de esta consulta
        $this->DDetalle_consulta->setId_ficha_consulta($id);
        $this->DDetalle_consulta->delete();

        //Ahora eliminamos la cabecera de la ficha
        $this->DFicha_consulta->setId($id);
        $this->DFicha_consulta->delete();
    }

    public function getDetalles($id_consulta){
        $this->DDetalle_consulta->setId_ficha_consulta($id_consulta);
        $detalles = $this->DDetalle_consulta->getDetalles();
        return $detalles;
    }

}