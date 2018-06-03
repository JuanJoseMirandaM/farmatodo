<?php
/**
 * Created by Juan Jose.
 * User: Santos
 * Date: 01/05/2018
 * Time: 16:17
 */
use App\model\User;
use libreria\ORM\EtORM;

class AuthController
{
    public function index(){
        return Vista::crear("auth.login");
    }


    public function ingresar(){
        //echo hassh(input("password"));
        if(val_csrf()){


            $email = input("email");
            $password = hassh(input("password"));

            $objOrm = new EtORM();
            $data = $objOrm->Ejecutar("login",array($email,$password));
            if(count($data) > 0 ){
                $_SESSION['id'] = $data[0]["id"];
                $_SESSION['nombre'] = $data[0]["nombre"];
                $_SESSION['apellido'] = $data[0]["apellido"];
                $_SESSION['email'] = $data[0]["email"];
                $_SESSION['privilegio'] = $data[0]["privilegio"];

                redirecciona()->to("/admin");

            }else{
                redirecciona()->to("/login")->withMessage(array(
                    "estado"=>"false",
                    "mensaje"=>"Tu correo electrónico o contraseña es incorrecto."
                ));

            }

        }else{
            echo "esta mal";
        }
    }
}