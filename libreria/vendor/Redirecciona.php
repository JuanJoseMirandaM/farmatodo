<?php
/**
 * Created by PhpStorm.
 * User: Santos
 * Date: 04/05/2018
 * Time: 11:16
 */

class Redirecciona
{
    //funcion que direcciona hacia algun lugar
    //parametro: $url - especifica la url a donde se ira ('/hola/nuevo')
    public static function to($url){
        self::redirect($url);
        return new Redirecciona();
    }

    //funcion que redirecciona a algun lugar llevando datos en la variable de sesion
    //$var - nombre de variable de session a crear o Array de variables de session con valores
    //$value - si el parametro var no es un array, este seria el valor
    public static function withMessage($var,$value = null){
        if(is_null($value)){
            foreach($var as $clave => $valor){
                $_SESSION[$clave] = $valor;
            }
        }else{
            $_SESSION[$var] = $value;
        }
        return new Redirecciona();
    }

    private function redirect($rute){
        $urlprin = str_replace("index.php","",$_SERVER["PHP_SELF"]);
        header("location:/".trim($urlprin,"/")."/".trim($rute,"/"));
    }
}