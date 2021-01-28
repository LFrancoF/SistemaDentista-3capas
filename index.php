<?php
require_once "autoload.php";
define("ROOT","https://localhost/ArquiSoftware/Dentista-3capas/");
require_once "config/db.php";
require_once "public/views/layout/header.php";

if(isset($_GET['presentacion']) && class_exists('P'.ucfirst($_GET['presentacion']))){
    $pres_name= 'P'.ucfirst($_GET['presentacion']);
    $presentacion = new $pres_name();
    if(($_GET['funct']=="")){
        $presentacion->index();
    }else{
        if(method_exists($presentacion, $_GET['funct'])){
            $funct = ucfirst($_GET['funct']);
            $presentacion->$funct();
        }else
            echo "<h2>404 Error, la pagina no existe</h2>";
    }
}elseif(!isset($_GET['presentacion']) && !isset($_GET['funct'])){
    $index = new PInicio();
    $index->index();
    }else
        echo "<h2>404 Error, la pagina no existe</h2>";

require_once "public/views/layout/footer.php";