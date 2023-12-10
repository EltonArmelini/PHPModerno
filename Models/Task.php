<?php

// DEFINICION DE CLASES EN PHP
class Task extends Model{
    /*
    // DEFINICION DE ATRIBUTOS DE UNA CLASE EN PHP
    // modificador de acceso + nombre de la propiedad, ej: 
    public $title; 
    public $completed; // = false  // SETEAMOS EL VALOR false para todos los nuevos objetos
    
    
    //FORMA DE CREACION DEL CONSTRUCTOR DE UNA CLASE
    public function __construct($title, $completed = false)// DE ESTA MANERA HACEMOS QUE LOS OBJETOS NUEVO SI NO SE LE ENVIA EL DATO SE ESTABLECE EN FALSE
    { 
        $this->title = $title;    

    }    
    */

    /* Constructor Property Promotion 

    Definimos los atributos y su respectivos valores(en caso de ser necesario) en la definicion del constructor

    
    public $title;
    public $completed = false; 
    public $color = null; 
    public $date = null;
    public function __construct(
        public $title, 
        public $completed = false, 
        public $date = null
    )
    { 
        $this->title = $title;
        $this->completed = $completed;
        $this->date = $date ?? date('Y-m-d');
    }
 */





/*     //DEFINICION DE METODOS EN PHP
    // modificador de acceso + function + nombre del metodo, ej: 
    public function complete() // CON ESTE METODO CAMBIAMOS EL VALOR DE completed
    {  
        $this->completed = true; // CON EL $this-> nos referimos a la propiedad de la clase
    }
 */
    protected $table = 'task';
    public function buildString(){

        //API REFLECTION es es una herramienta poderosa que permite examinar y manipular la estructura interna de clases, interfaces, métodos y propiedades en tiempo de ejecución.
        $me = new ReflectionClass($this); //cremos un objeto y le pasamos la clase actual
        $properties = $me->getProperties();//obtenemos las propiedades y las guardamos
        $string = ""; // la cadena de texto que será devuelto
        foreach ($properties as $property) {
            $propertyName = $property->name;//con esto obtenemos el nombre de la propiedad
            $value =  $this->$propertyName;
            $string .= "{$propertyName}: ". (is_bool($value) ? var_export($value,true) : $value) ." \n"; 
        }


        return $string;  
    }
    
    public function saveFile($name)
    {
        $file = fopen($name,'w');
        fwrite($file,$this->buildString());
        fclose($file);
    }
    public function getStringCompleted(){
        return ($this->completed) ? 'completa' : 'incompleta';
    }
}