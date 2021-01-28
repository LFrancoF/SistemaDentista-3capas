<?php

class DDetalle_venta{
    private $id_nota_venta;
    private $id_producto;
    private $cantidad;
    private $precio;

    public function __construct(){
        $this->db = new Connection();
    }

    public function getId_nota_venta(){
        return $this->id_nota_venta;
    }

    public function getId_producto(){
        return $this->id_producto;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setId_nota_venta($id_nota_venta){
        $this->id_nota_venta = $id_nota_venta;
    }

    public function setId_producto($id_producto){
        $this->id_producto = $id_producto;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getDetalles(){
        $database = $this->db->connect();
        $sql = "SELECT p.nombre, d.id_producto, d.cantidad, d.precio FROM detalle_venta as d, producto as p WHERE d.id_nota_venta={$this->getId_nota_venta()} AND d.id_producto = p.id";
        $query=$database->prepare($sql);
        $query->execute();
        if ($query)
            $result = $query;
        else $resutl = false;
        $this->db->close();
        return $result;
    }

    public function create(){
        //obtenemos el id del ultimo registro de la nota_venta, que es la que estamos guardando actualmente
        $database = $this->db->connect();
        $sql = "SELECT MAX(id) as 'nota_venta' FROM nota_venta";
        $query=$database->prepare($sql);
        $query->execute();
        $id_nota = $query->fetch((PDO::FETCH_OBJ))->nota_venta;
        
        //ahora insertamos cada detalle que nos llega por parametro a la tabla pivota detalle_venta
        $sql = "INSERT into detalle_venta VALUES(null, {$id_nota}, {$this->getId_producto()}, {$this->getCantidad()}, {$this->getPrecio()})";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function edit(){
        //insertamos los nuevos productos del detalle
        $database = $this->db->connect();
        $sql = "INSERT into detalle_venta VALUES(null, {$this->getId_nota_venta()}, {$this->getId_producto()}, {$this->getCantidad()}, {$this->getPrecio()})";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function delete(){
        $database = $this->db->connect();
        $sql = "DELETE FROM detalle_venta WHERE id_nota_venta={$this->getId_nota_venta()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

}