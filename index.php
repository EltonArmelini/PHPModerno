<?php 

require 'vendor/autoload.php';
$query = require 'Core/bootstrap.php'; // llamamos al archivo que inicia la conexion,manejo de errores y el constructor de consultas generico

$routes = require 'routes.php';
$url = Request::url();
$router = new Router;
$router->register($routes);
require $router->handle($url);

