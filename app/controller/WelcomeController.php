<?php
/**
 * Created by PhpStorm.
 * User: Santos
 * Date: 29/04/2018
 * Time: 13:48
 */

//use vista\Vista;

class WelcomeController
{
    public function index(){
        //echo "raiz del proyecto";
        return Vista::crear("index");
    }
}