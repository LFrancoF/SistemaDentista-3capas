<?php

function presentations_autoload($classname){
    include 'presentacion/' . $classname . '.php';
}

spl_autoload_register('presentations_autoload');