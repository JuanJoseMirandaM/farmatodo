<?php
/**
 * Created by PhpStorm.
 * User: Santos
 * Date: 29/04/2018
 * Time: 14:44
 */

use App\model\Proveedor;


class ProveedorController
{
    public function index(){
        $Proveedor = Proveedor::all();
        return Vista::crear("admin.proveedor.listado",array(
            "proveedores"=>$Proveedor,
        ));
    }

    public function nuevo(){
        return Vista::crear("admin.proveedor.crear");
    }

    public function agregar(){
        try{
            $proveedor = new Proveedor();
            if(input('proveedor_id')){
                $proveedor = Proveedor::find(input('proveedor_id'));
            }
            $proveedor->nit = input("nit");
            $proveedor->nombre = input("nombre");
            $proveedor->telefono = input("telefono");
            $proveedor->direccion= input("direccion");
            $proveedor->email= input("email");
            $proveedor->guardar();
            redirecciona()->to("proveedor");
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
        $proveedor = Proveedor::where("id",$id);
            //User::find($id);
        //var_dump(strlen($usuario));
        if(count($proveedor)){
            return Vista::crear("admin.proveedor.crear", array("proveedor"=>$proveedor[0]));
        }else {
            return redirecciona()->to("proveedor");
        }
    }

    public function eliminar($id){
        $proveedor = User::where("id",$id);
        //User::find($id);
        if(count($proveedor)){
            $proveedor[0]->eliminar();
            return redirecciona()->to("proveedor");
        }else {
            return redirecciona()->to("proveedor");
        }
    }
}