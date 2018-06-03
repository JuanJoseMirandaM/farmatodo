<?php
/**
 * Created by PhpStorm.
 * User: Santos
 * Date: 29/04/2018
 * Time: 14:44
 */

use App\model\User;


class UsuarioController
{
    public function index(){
        $usuarios = User::all();
        return Vista::crear("admin.usuario.listado",array(
            "usuarios"=>$usuarios,
        ));
    }

    public function nuevo(){
        return Vista::crear("admin.usuario.crear");
    }

    public function agregar(){
        try{
            $user = new User();
            if(input('usuario_id')){
                $user = User::find(input('usuario_id'));
            }
            $user->email = input("email");
            $user->nombre = input("nombre");
            $user->apellido = input("apellido");
            if(input("password")){
                $user->pass = crypt(input("password"),'$2a$07$usesomesillystringforsalt$');
            }
            $user->privilegio = input("privilegio");
            $user->guardar();

            redirecciona()->to("usuario");
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }
    /*
     * metodo para editar usuario
     * @param int $id id usuario
     * @return redirect
     * */
    public function editar($id){
        $usuario = User::where("id",$id);
            //User::find($id);
        //var_dump(strlen($usuario));
        if(count($usuario)){
            return Vista::crear("admin.usuario.crear", array("usuario"=>$usuario[0]));
        }else {
            return redirecciona()->to("usuario");
        }
    }

    public function eliminar($id){
        $usuario = User::where("id",$id);
        //User::find($id);
        if(count($usuario)){
            $usuario[0]->eliminar();
            return redirecciona()->to("usuario");
        }else {
            return redirecciona()->to("usuario");
        }
    }


}
