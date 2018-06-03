<?php
/**
 * Created by PhpStorm.
 * User: Santos
 * Date: 29/04/2018
 * Time: 18:27
 */

namespace libreria\ORM;

class Modelo extends EtORM{

    //propiedad que va conectar a todas las propiedades dinamicamente
    private $data = array();
    protected static $table;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        if(array_key_exists($name, $this->data)){
            return $this->data[$name];
        }
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->data[$name] = $value;
    }

    public function getColumnas(){
        return $this->data;
    }
}