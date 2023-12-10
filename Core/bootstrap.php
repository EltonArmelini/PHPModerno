<?php


/* require 'DataBase/Connection.php';
require 'DataBase/QueryBuilder.php';
require 'Router.php';
require 'Request.php';
require 'App.php';
require 'Auth.php';
require 'Models/Model.php';
require './Models/Task.php'; // HACEMOS EL PEDIDO DEL ARCHIVO DONDE ESTA LA CLASE TASK
require './Models/User.php'; */

App::set('config',require 'config.php'); // archivo de configuracion del sistema

if(App::get('config')[0]['error_handling']){
    error_reporting(E_ALL);// Muestra todos los errores
    ini_set('display_errors', 1);// Habilita la visualización de errores
    ini_set('display_startup_errors', 1);// Habilita la visualización de errores de inicio
}

App::set('database',
          new QueryBuilder(
                            Connection::dbConnect( // LLAMOS AL METODO ESTATICO PARA INICIAR LA CONEXION
                                                  App::get('config')[0]['database']
                            )
          )
        );

//require __DIR__ . '/connection.php';




// $connection =  new Connection();
// $pdo = (new Connection)->dbConnect();// LLAMOS A LA FUNCION DE CONEXION DE ESTA MANERA ES MAS ABREVIADA
