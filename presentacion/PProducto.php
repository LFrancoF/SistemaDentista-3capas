<?php

require_once "negocio/NProducto.php";

class PProducto{
    private $id;
    private $nombre;
    private $precio;
    private $marca;
    private $descripcion;
    private $NProducto;

    public function __construct(){
        $this->NProducto = new NProducto();
    }

    public function index(){
        $productos = $this->NProducto->index();
        require_once "public/views/layout/nav.php";
        require_once "public/views/producto/index.php";
    }

    public function getProducto(){
        $producto=false;
        if($_POST['id_prod']){
            $id = $_POST['id_prod'];
            $producto = $this->NProducto->getProducto($id);
        }
        return $producto;
    }

    public function create(){
        if($_POST){
            $this->nombre = $_POST['nombre'];
            $this->precio = $_POST['precio'];
            $this->marca = $_POST['marca'];
            $this->descripcion = $_POST['descripcion'];
            $this->NProducto->create($this->nombre, $this->precio, $this->marca, $this->descripcion);
        }
        //volver a listar los productos llamando al metodo index para limpiar la url
        header("Location:".ROOT.'producto/index');
    }

    public function edit(){
        if($_POST){
            $this->id = $_POST['id'];
            $this->nombre = $_POST['nombre'];
            $this->precio = $_POST['precio'];
            $this->marca = $_POST['marca'];
            $this->descripcion = $_POST['descripcion'];
            $this->NProducto->edit($this->id, $this->nombre, $this->precio, $this->marca, $this->descripcion);
        }
        //volver a listar los productos llamando al metodo index para limpiar la url
        header("Location:".ROOT.'producto/index');
    }

    public function delete(){
        if(isset($_POST['id'])){
            $this->id = $_POST['id'];
            $this->NProducto->delete($this->id);
        }
        //volver a listar los productos llamando al metodo index para limpiar la url
        header("Location:".ROOT.'producto/index');
    }
}