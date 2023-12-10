<?php 
require 'Core/bootstrap.php'; // llamamos al archivo que inicia la conexion,manejo de errores y el constructor de consultas generico

use Core\Router;
use Core\Request;
 


$routes = require 'routes.php'; //ALMACENAMOS LA RUTAS DE NUESTRO PROYECTO EN UNA VARIBALE
$url = Request::url(); //RECIBIMOS LA URL DEL NAVEGADOR Y LA FORMATEAMOS PARA MANEJARLA
$router = new Router; // CREAMOS LA INSTANCIA DEL ROUTER
$router->register($routes);// REGISTRAMO LAS RUTAS EN NUESTRO ROUTER
$router->handle($url);// LE PASAMOS LA URL PARA QUE LAS MANEJE EL SISTEMA

