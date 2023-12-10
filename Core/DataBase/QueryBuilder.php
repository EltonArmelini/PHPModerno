<?php 


class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo= $pdo;        
    }

    public function selectAll($table)
    {
        try{
            $query = $this->pdo->prepare("SELECT * FROM {$table};");//PREPARAMOS LA QUERY EN SQL
            $query->execute();//EJECUTAMOS LA QUERY
            // $tasks = $query->fetchAll(PDO::FETCH_OBJ);//GUARDAMOS EL RESULTADO DE LA QUERY EN UN ARRAY DE TIPO OBJETO STDCLASS
            $tasks = $query->fetchAll(PDO::FETCH_ASSOC);//GUARDAMOS EL RESULTADO DE LA QUERY EN ARRAY DE OBJ DEL TIPO DE LA CLASE ESPECIFICADO
            return $tasks; //RETURNAMOS ESOS DATOS
        }catch(PDOException $e){
            echo "Ha ocurrido un problema.  ".$e;
            exit(0);
        }
    }

    public function create($table,$values){ //METODO GENERICO PARA CREAR REGISTROS NUEVOS
        $cols = implode(",  ",(array_keys($values)));//OBTENEMOS LOS KEYS DEL ARRAY PARA INSERTALOS EN EL SQL
        $value = ":".implode(", :",(array_keys($values)));//OBTENEMOS LOS KEYS DE LOS ARRAY PARA GENERAR EL STRING QUE USURA PDO PARA EJECUTAR LA QUERY
        $sql = "INSERT INTO {$table} ({$cols}) values({$value})";//ARMAMOS EL SQL 
        /*
        OBTENIENDO ALGO ASÍ-> INSTER INTO TABLE (col, col, col) VALUES(:val,:val,val);
        PDO REEEMPLAZARA LOS :val por el valor que se le especifique en el array 
        */
        try{
            $query = $this->pdo->prepare($sql);
            $query->execute($values);
        }catch(PDOException $e){
            echo "Ha ocurrido un problema.  ".$e;
            exit(0);
        }

    }

    public function update($table,$id,$values){ // APLICA LOS MISMO PARA LO ANTERIOR DICHO
        $cols = array_keys($values);
        $cols = implode(', ',array_map(function($col){
            return "{$col}=:{$col}";
        },$cols));
        $sql = "UPDATE {$table} SET {$cols} WHERE id=:id";
        try{
            $query = $this->pdo->prepare($sql);
            $values['id'] = $id; //AGREGAMOS UN NUEVO INDICE AL ARRAY, ESTO PORQUE NECESITAMOS SABER EL ID PARA EDITAR ESPECIFICAMENTE ESE
            $query->execute($values);
        }catch(PDOException $e){
            echo "Ha ocurrido un problema.  ".$e;
            exit(0);
        }

    }

    public function delete($table,$id){

        $sql = "DELETE FROM {$table} WHERE id=:id";
        try{
            $query = $this->pdo->prepare($sql);
            $params = ['id' => $id]; //CREAMOS EL ARRAY PARA PASARLE AL METODO DE EJECUCION
            $query->execute($params);
        }catch(PDOException $e){
            echo "Ha ocurrido un problema.  ".$e;
            exit(0);
        }

    }

    public function find($table,$id)
    {
        try{
            $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE id={$id} LIMIT 0,1;");
            $query->execute();
            $task = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            return $task; 
        }catch(PDOException $e){
            echo "Ha ocurrido un problema.  ".$e;
            exit(0);
        }
    }

    public function findBy($table,$params)
    {
        try{
            $cols = array_keys($params);
            $cols = implode(' AND ',array_map(function($col){
                return "{$col}=:{$col}";
            },$cols));
            $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$cols};");
            $query->execute($params);
            return $query->fetchAll(PDO::FETCH_ASSOC); 
        }catch(PDOException $e){
            echo "Ha ocurrido un problema.  ".$e;
            exit(0);
        }
    }


}