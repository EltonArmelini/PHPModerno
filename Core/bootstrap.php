<?php

use Core\App;

App::set('config',require 'config.php'); // archivo de configuracion del sistema



if(App::get('config')[0]['error_handling']){
    error_reporting(E_ALL);// Muestra todos los errores
    ini_set('display_errors', 1);// Habilita la visualización de errores
    ini_set('display_startup_errors', 1);// Habilita la visualización de errores de inicio
}


function view($path,$params = null)
{
  if(is_array($params)) extract($params); 
  

  require "Views/{$path}.view.php";
}

function dd($var)
{

  var_dump($var);

  die;
}

function redirect($location)
{
  return header("Location: {$location}");
}