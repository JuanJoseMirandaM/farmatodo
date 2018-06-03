<?php

use App\model\Ventadetalle;
use App\model\Venta;

class VentaController
{

    public function index(){

        $data["ventas"] = Venta::all();
        return Vista::crear("admin.venta.index",$data);
    }

    public function nuevo(){
        return Vista::crear("admin.venta.crear");
    }

    public function cam_estado($id){
        $venta = Venta::find($id);
        if($venta->estado == 1){
            $venta->estado = 0;
        }
        else{
            $venta->estado = 1;
        }
        $venta->guardar();
        redirecciona()->to("ventas");
    }

    public function agregar(){
        try{
            $venta = new Venta();

            $venta->cliente = input("nombre");
            $venta->nit = input("nit");
            $venta->fecha   = date('Y-m-d');
            $venta->monto_venta = input("monto_total");
            $venta->descuento = input("monto_total");
            $venta->total = input("monto_total");
            if($venta->guardar()){

                $productos = json_decode(input("productos"));

                foreach ($productos as $producto){
                    $vd = new Ventadetalle();
                    $vd->producto_id = $producto->id;
                    $vd->ventas_id = $venta->id;
                    $vd->cantidad = $producto->cantidad;
                    $vd->subtotal = $producto->subtotal;
                    $vd->guardar();
                }

                redirecciona()->to("ventas");
            }
            redirecciona()->to("ventas");
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }
}