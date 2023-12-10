<?php 
namespace Core\DataBase;
use PDO;
use PDOException;
class Connection
{

    public static function dbConnect($config){
        try{
            return new PDO("{$config['type']}:host={$config['host']};dbname={$config['database']}",$config['user'],$config['password']);//CREACION DEL OBJETO PARA LA CONEXION
         }catch(PDOException $e){//EN CASO DE ERROR LANZAMOS LA EXCEPCION Y DETENEMOS EJECUCION
             echo "Ha ocurrido un problema! Comuniquese con el administrador del Sistema. \n";
             echo $e->getMessage();//OBTENEMOS EL MENSAJE Y LO MOSTRAMOS
             exit;
         }
    }


}