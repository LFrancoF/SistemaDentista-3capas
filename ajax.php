<?php
require_once "config/db.php";
require_once "presentacion/PPaciente.php";
require_once "presentacion/PEspecialista.php";
require_once "presentacion/PProducto.php";
require_once "presentacion/PServicio.php";
require_once "presentacion/PNota_venta.php";
require_once "presentacion/PFicha_consulta.php";

//cargar datos del paciente en el form de venta y consulta
if(isset($_POST['id_paciente'])){
    $PPaciente = new PPaciente();
    $paciente = $PPaciente->getPaciente();
    $paciente = $paciente->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($paciente);
}

//cargar datos del especialista en el form de venta y consulta
if(isset($_POST['id_especialista'])){
    $PEspecialista = new PEspecialista();
    $especialista = $PEspecialista->getEspecialista();
    $especialista = $especialista->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($especialista);
}

//cargar productos para agregar en el form de venta
if(isset($_POST['id_prod'])){
    $PProducto = new PProducto();
    $producto = $PProducto->getProducto();
    $producto = $producto->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($producto);
}

//cargar servicios para agregar en el form de consulta
if(isset($_POST['id_serv'])){
    $PServicio = new PServicio();
    $servicio = $PServicio->getServicio();
    $servicio = $servicio->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($servicio);
}

//recibir datos para crear una venta y sus detalles
if(!isset($_POST['id_venta']) && isset($_POST['id_paciente']) && isset($_POST['id_especialista']) && isset($_POST['observacion'])
&& isset($_POST['monto']) && isset($_POST['detalle'])){
    
    $Nota = new PNota_venta();
    $Nota->create();
    echo "DONE";
}

//obtener detalles de una venta
if(isset($_POST['id_v'])){
    $id_venta = $_POST['id_v'];
    $Nota = new PNota_venta();
    $detalles = $Nota->getDetalles($id_venta)->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($detalles);
}

//recibir datos para editar una venta y sus detalles
if(isset($_POST['id_venta']) && isset($_POST['id_paciente']) && isset($_POST['id_especialista']) && isset($_POST['observacion'])
&& isset($_POST['monto']) && isset($_POST['detalle'])){
    
    $Nota = new PNota_venta();
    $Nota->edit();
    echo "DONE";
}

//recibir datos para crear una consulta y sus detalles
if(!isset($_POST['id_consulta']) && isset($_POST['id_paciente']) && isset($_POST['id_especialista']) && isset($_POST['estado'])
&& isset($_POST['monto']) && isset($_POST['detalle'])){
    
    $Ficha = new PFicha_consulta();
    $Ficha->create();
    echo "DONE";
}

//obtener detalles de una consulta
if(isset($_POST['id_c'])){
    $id_consulta = $_POST['id_c'];
    $Ficha = new PFicha_consulta();
    $detalles = $Ficha->getDetalles($id_consulta)->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($detalles);
}

//recibir datos para editar una consulta y sus detalles
if(isset($_POST['id_consulta']) && isset($_POST['id_paciente']) && isset($_POST['id_especialista']) && isset($_POST['estado'])
&& isset($_POST['monto']) && isset($_POST['detalle'])){
    
    $Ficha = new PFicha_consulta();
    $Ficha->edit();
    echo "DONE";
}