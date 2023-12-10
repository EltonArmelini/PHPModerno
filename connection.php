<?php
//CONEXION A LA BASE DE DATOS CON PDO COMO DRIVER DE CONEXION, USANDO EL TRYCATCH PARA CAPTURAR EL ERROR


/* //FUNCION ESPECIFICA PARA LA CONEXION
function pdoConnect(){
    try{
       return new PDO('mysql:host=127.0.0.1;dbname=to-do','root','');//CREACION DEL OBJETO PARA LA CONEXION
    }catch(PDOException $e){//EN CASO DE ERROR LANZAMOS LA EXCEPCION Y DETENEMOS EJECUCION
        echo "Ha ocurrido un problema! Comuniquese con el administrador del Sistema. \n";
        echo $e->getMessage();//OBTENEMOS EL MENSAJE Y LO MOSTRAMOS
        exit;
    }
} 
Se lo movio a una clase de connection.php

*/

/* function consultarTareas($pdo){
    $query = $pdo->prepare("SELECT * FROM task;");//PREPARAMOS LA QUERY EN SQL
    $query->execute();//EJECUTAMOS LA QUERY
    // $tasks = $query->fetchAll(PDO::FETCH_OBJ);//GUARDAMOS EL RESULTADO DE LA QUERY EN UN ARRAY DE TIPO OBJETO STDCLASS
    $tasks = $query->fetchAll(PDO::FETCH_CLASS, 'Task');//GUARDAMOS EL RESULTADO DE LA QUERY EN ARRAY DE OBJ DEL TIPO DE LA CLASE ESPECIFICADO
    return $tasks; //RETURNAMOS ESOS DATOS
}
Se lo movio a un contructor de consultas para que se haga mas abstracto 

*/