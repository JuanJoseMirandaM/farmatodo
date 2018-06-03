<?php
/**
 * Created by Juan Jose.
 * User: Santos
 * Date: 03/05/2018
 * Time: 9:27
 */

class AdminController
{
    public function index(){
        return Vista::crear("admin.index");
    }
}