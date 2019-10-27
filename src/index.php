<?php

use DBControlador\CrearTablas;
use DBControlador\oConexion;

spl_autoload_register(function($className){
    if(strpos($className, 'DBControlador\\')===0) {
        $className = str_replace('DBControlador\\', '', $className);
        if (file_exists("src/$className.php")) {
            require "src/$className.php";
        }
    }
});


$oConexion = new oConexion("localhost", "COUNTRIESDATA", "root", "");
$crearTabla = new CrearTablas($oConexion);
