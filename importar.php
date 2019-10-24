<?php

ini_set('error_reporting', E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
require_once 'config.php';
require_once 'CrearTablas.php';

$importar = new CrearTablas();
