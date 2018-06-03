<?php
/**
 * Created by PhpStorm.
 * User: Santos
 * Date: 04/05/2018
 * Time: 11:16
 */

class Session
{
    //permite validar si existe una session
    public static function has($variable_session){
        if(isset($_SESSION[$variable_session])){
            return true;
        }else{
            return false;
        }
    }

    //obtiene una variable session
    public static function get($variable_session){
        try{
            $mensaje = $_SESSION[$variable_session];
            unset($_SESSION[$variable_session]);
            return $mensaje;
        }catch (Exception $ex){}
    }

}