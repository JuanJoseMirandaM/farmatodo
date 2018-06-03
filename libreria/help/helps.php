<?php

//funcion que nos permite incluir los modelos dinamicamente
function includeModeles(){
    $directorio = opendir(MODELS);
    while($archivo =  readdir($directorio)){
        if(!is_dir($archivo)){
            require_once MODELS.$archivo;
        }
    }
}
/*
 * esta funcion nos va ayudar a retornar un asset
 * -$asset : nombre del archivo que esta dentro del asset
 * */
function asset($asset){
    $urlprin = trim(str_replace("index.php","",$_SERVER["PHP_SELF"]),"/");
    echo "/".$urlprin."/assets/".$asset;
}
/* funcion que nos permite redireccionar hacia otra parte
 * -$rute : ruta hacia donde nos queremos dirigirnos
 * */
function redireccionar($rute){
    $urlprin = str_replace("index.php","",$_SERVER["PHP_SELF"]);
    header("location:/".trim($urlprin,"/")."".$rute);
}

//funcion que nos permite escribir una url por medio de lo que le pasamos
// -$rute : ruta hacia donde se va a ir
function url($ruta){
    $urlprin = str_replace("index.php","",$_SERVER["PHP_SELF"]);
    echo "/".trim($urlprin,"/")."/".$ruta;
}

/*
 * funcionque crea el csfr, para la validacion - token
 * */
session_start();
function csrf_token(){
    if(isset($_SESSION["token"])){
        unset($_SESSION["token"]);
    }
    $csrf_token = md5(uniqid(mt_rand(),true));
    $_SESSION["csrf_token"]=$csrf_token;
    echo $csrf_token;
}

/*
 * Validar csrf_token por medio de secioines
 * */

function val_csrf(){
    if($_REQUEST["_token"] == $_SESSION["csrf_token"]) {
        return true;
    }else{
        return false;
    }
}

/*
 * funcion que permite recuperar un input
 * */
function input($name){
    $re =  new \Library\help\InputFilter();
    return $re->process($_POST[$name]);
}
/*
 * Funcion que nos permite retornar json a partir de un array
 * */
function json_response($data)
{
    header('Content-Type: application/json');
    if (is_array($data)) {
        $array = array();
        foreach ($data as $d) {
            array_push($array, $d->getColumnas());
        }
        return json_encode($array);
    } else {
        return json_encode($data->getColumnas());
    }
}
/*
 * Permite encriptar un string
 * */

function hassh($string){
    return crypt($string ,'$2a$07$usesomesillystringforsalt$');
}

function redirecciona(){
    return new Redirecciona();
}