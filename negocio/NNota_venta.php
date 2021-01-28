<?php

require_once "dato/DNota_venta.php";
require_once "dato/DDetalle_venta.php";

class NNota_venta{

    private $DNota_venta;
    private $DDetalle_venta;

    public function __construct(){
        $this->DNota_venta = new DNota_venta();
        $this->DDetalle_venta = new DDetalle_venta();
    }

    public function index(){
        $list = $this->DNota_venta->index();
        return $list;
    }

    public function getVenta($id){
        $this->DNota_venta->setId($id);
        $venta = $this->DNota_venta->getVenta();
        return $venta;
    }

    public function create($id_paciente, $id_especialista, $monto, $observacion, $detalles){
        //primero creamos la cabecera de la nota de venta
        $this->DNota_venta->setId_paciente($id_paciente);
        $this->DNota_venta->setId_especialista($id_especialista);
        $this->DNota_venta->setMonto($monto);
        $this->DNota_venta->setObservacion($observacion);
        $this->DNota_venta->create();

        //luego guardamos los detalles que se encuentran en el array detalles
        foreach($detalles as $producto){
            $id_prod = $producto[0];
            $cantidad = $producto[1];
            $precio = $producto[2];
            $this->DDetalle_venta->setId_producto($id_prod);
            $this->DDetalle_venta->setCantidad($cantidad);
            $this->DDetalle_venta->setPrecio($precio);
            $this->DDetalle_venta->create();
        }
    }

    public function edit($id_venta, $id_paciente, $id_especialista, $monto, $observacion, $detalles){
        //primero creamos la cabecera de la nota de venta
        $this->DNota_venta->setId($id_venta);
        $this->DNota_venta->setId_paciente($id_paciente);
        $this->DNota_venta->setId_especialista($id_especialista);
        $this->DNota_venta->setMonto($monto);
        $this->DNota_venta->setObservacion($observacion);
        $this->DNota_venta->edit();

        //luego actualizamos los detalles de esta venta que se encuentran en el array detalles
        $this->DDetalle_venta->setId_nota_venta($id_venta);
        //primero eliminamos todos para insertar los nuevos
        $this->DDetalle_venta->delete();
        foreach($detalles as $producto){
            $id_prod = $producto[0];
            $cantidad = $producto[1];
            $precio = $producto[2];
            $this->DDetalle_venta->setId_producto($id_prod);
            $this->DDetalle_venta->setCantidad($cantidad);
            $this->DDetalle_venta->setPrecio($precio);
            $this->DDetalle_venta->edit();
        }
    }

    public function delete($id){
        //primero borramos todos los detalles de esta venta
        $this->DDetalle_venta->setId_nota_venta($id);
        $this->DDetalle_venta->delete();

        //Ahora eliminamos la cabecera de la nota de venta
        $this->DNota_venta->setId($id);
        $this->DNota_venta->delete();
    }

    public function getDetalles($id_venta){
        $this->DDetalle_venta->setId_nota_venta($id_venta);
        $detalles = $this->DDetalle_venta->getDetalles();
        return $detalles;
    }

}