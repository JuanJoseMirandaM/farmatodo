<?php
/**
 * Created by PhpStorm.
 * User: Santos
 * Date: 26/04/2018
 * Time: 0:11
 */
require_once ("help/helps.php");


define("APP_RUTA",RUTA_BASE."app/");
define("VISTA_RUTA",RUTA_BASE."view/");
define("LIBRERIA",RUTA_BASE."libreria/");


define("RUTA",APP_RUTA."rutas/");
define("MODELS",APP_RUTA."model/");


//configuracion
require_once (RUTA_BASE."config/config.php");
require_once (LIBRERIA."ORM/Conexion.php");
require_once (LIBRERIA."ORM/EtORM.php");
require_once (LIBRERIA."ORM/Modelo.php");
require_once ("help/class.inputfilter.php"); 
//C:\xampp\htdocs\sistemaventas\libreria\help\class.inputfilter.php
includeModeles();

//librerias
require_once ("vendor/Redirecciona.php");
require_once ("vendor/Session.php");


//include models
require_once ("Vista.php");
include "Ruta.php";
include RUTA."rutas.php";



// echo APP_RUTA;

