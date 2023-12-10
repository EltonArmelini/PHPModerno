<?php

class Model
{
    protected $properties = [];
    protected $table;

    public function __construct($properties = [])
    {
        $this->properties = $properties;
    }

    public static function all()
    {
        $model = new static;
        $rows = App::get('database')[0]->selectAll($model->getTable());
        return array_map(fn($row) => new static($row) ,$rows);
        //forma abreviada de escribir una funcion que solo retorna algo en una sola linea (arrow functions) 

    }

    public static function findBy($params)
    {
        $model = new static;
        $rows = App::get('database')[0]->findBy($model->getTable(),$params);
        return array_map(fn($row) => new static($row) ,$rows);
        //forma abreviada de escribir una funcion que solo retorna algo en una sola linea (arrow functions) 

    }

    public static function create($properties)
    {
        $model = new static($properties);
        $model->save();
        return $model;
    }

    public function save()
    {
        if (empty($this->table)) {
            throw new Exception("Error. El nombre de la tabla no fue definido. ");
        }

        App::get('database')[0]->create($this->table, $this->properties);
    }

    public function update($properties)
    {
        App::get('database')[0]->update($this->table, $this->properties['id'], $properties);
        $this->setProperties($properties);
        return null;
    }
    public function delete()
    {
        App::get('database')[0]->delete($this->table, $this->properties['id']);
        return $this;
    }


    public static function find($id)
    {
        $model = new static;
        $properties = App::get('database')[0]->find(
            $model->getTable(),
            $id
        );
        $model->setProperties($properties);

        return $model;
    }
    public function getTable()
    {
        return $this->table;
    }
    public function setProperties($properties)
    {
        $this->properties = array_merge($this->properties, $properties);

        return $this;
    }
    public function __get($name){
        if(array_key_exists($name, $this->properties)){
            return $this->properties[$name];
        } 
        throw new Exception("La propiedad {$name} no existe");
    }
}
