<?php
/**
 * User: Santos
 * Date: 25/04/2018
 * Time: 22:42
 */
class Conexion{
    public static function conectar(){
        try {
            $cn = new PDO("mysql:host=localhost;dbname=db_farmatodo", "root", "");
            return $cn;
        }catch (PDOException $ex) {
            //echo $ex->getMessage();
        }
    }
}

Conexion::conectar();