<?php
/**
 * Created by PhpStorm.
 * User: Santos
 * Date: 29/04/2018
 * Time: 14:53
 */

class Vista
{

    public static function crear($path,$key=null,$value=null){
        //comprobamos si existe la variable path
        if($path != "") {
            $paths = explode(".", $path); //convertimos en un array separado por puntos
            $ruta = ""; //inicializamos
            for($i =0 ; $i < count($paths); $i++){ //para recorrer el path
                if($i == count($paths)-1){ //comprobamos si es el ultimmo
                    $ruta .= $paths[$i] . ".php"; //le ponemos php
                }else {
                    $ruta .= $paths[$i] . "/";
                }
            }
            //Comprobar si ese metodo existe
            if(file_exists(VISTA_RUTA.$ruta)){
                // comprobar si eciste el key
                if(!is_null($key)){
                    if(is_array($key)){
                        //extraer los keys y los convierte a variables
                        extract($key,EXTR_PREFIX_SAME,"");
                    }else{
                        //("index","usus",$usuarios)
                        //%usus = $usuarios
                        ${$key} = $value;
                    }
                }
                include VISTA_RUTA.$ruta;
            }else{
                die("no existe la vista");
            }
        }

        return null;
    }
}