<?php
/**
 * Created by PhpStorm.
 * User: Santos
 * Date: 28/04/2018
 * Time: 10:35
 */
// todas las rutas disponibles en nuestra aplicacion
$ruta = new Ruta();
$ruta->controladores(array(
    //"/"=>"WelcomeController",
    "/"=>"AuthController",
    "/login"=>"AuthController",
    "/usuario"=>"UsuarioController",
    "/proveedor"=>"ProveedorController",
    "/ventas"=>"VentaController",
    "/admin" => "AdminController",
    "/producto"=>"ProductoController",
));