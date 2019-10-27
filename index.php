<?php

use DBControlador\CrearTablas;
use DBControlador\oConexion;
$config = parse_ini_file(__DIR__ . "/.env");



spl_autoload_register(function($className){

    if(strpos($className, 'DBControlador\\')===0) {
        $className = str_replace('DBControlador\\', '', $className);
        if (file_exists("src/$className.php")) {
            require "src/$className.php";
        }
    }
});

$oConexion = new oConexion($config["HOST"], $config["DB"], $config["USER"], $config["PASS"]);
$crearTabla = new CrearTablas($oConexion);
