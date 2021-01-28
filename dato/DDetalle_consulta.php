<?php

class DDetalle_consulta{
    private $id_ficha_consulta;
    private $id_servicio;
    private $cantidad;
    private $precio;

    public function __construct(){
        $this->db = new Connection();
    }

    public function getId_ficha_consulta(){
        return $this->id_ficha_consulta;
    }

    public function getId_servicio(){
        return $this->id_servicio;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setId_ficha_consulta($id_ficha_consulta){
        $this->id_ficha_consulta = $id_ficha_consulta;
    }

    public function setId_servicio($id_servicio){
        $this->id_servicio = $id_servicio;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getDetalles(){
        $database = $this->db->connect();
        $sql = "SELECT s.nombre, d.id_servicio, d.cantidad, d.precio FROM detalle_consulta as d, servicio as s WHERE d.id_ficha_consulta={$this->getId_ficha_consulta()} AND d.id_servicio = s.id";
        $query=$database->prepare($sql);
        $query->execute();
        if ($query)
            $result = $query;
        else $resutl = false;
        $this->db->close();
        return $result;
    }

    public function create(){
        //obtenemos el id del ultimo registro de la ficha consulta, que es la que estamos guardando actualmente
        $database = $this->db->connect();
        $sql = "SELECT MAX(id) as 'ficha_consulta' FROM ficha_consulta";
        $query=$database->prepare($sql);
        $query->execute();
        $id_ficha = $query->fetch((PDO::FETCH_OBJ))->ficha_consulta;
        
        //ahora insertamos cada detalle que nos llega por parametro a la tabla pivota detalle_consulta
        $sql = "INSERT into detalle_consulta VALUES(null, {$id_ficha}, {$this->getId_servicio()}, {$this->getCantidad()}, {$this->getPrecio()})";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function edit(){
        //insertamos los nuevos servicios del detalle
        $database = $this->db->connect();
        $sql = "INSERT into detalle_consulta VALUES(null, {$this->getId_ficha_consulta()}, {$this->getId_servicio()}, {$this->getCantidad()}, {$this->getPrecio()})";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

    public function delete(){
        $database = $this->db->connect();
        $sql = "DELETE FROM detalle_consulta WHERE id_ficha_consulta={$this->getId_ficha_consulta()}";
        $query=$database->prepare($sql);
        $query->execute();
        $this->db->close();
    }

}