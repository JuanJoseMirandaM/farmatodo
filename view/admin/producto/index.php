<!DOCTYPE html>
<html lang="es">

<head>
    <!--//video 37 15:19-->
    <?php include(VISTA_RUTA."admininclude/head.php") ?>

</head>

<body>

<div id="wrapper">

    <?php include(VISTA_RUTA."admininclude/menu.php") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Listado de productos | <a href="<?php url("producto/nuevo")?>" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Producto</a> </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!--INICIO CONTENIDO -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Proveedor</th>
                    <th>Peso</th>
                    <th>Unidad Medida</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($productos)){
                    foreach ($productos as $producto) { ?>
                    <tr>
                        <td><?php echo $producto->codigo ?></td>
                        <td><?php echo $producto->nombre ?></td>
                        <td><?php echo $producto->proveedor ?></td>
                        <td><?php echo $producto->peso ?></td>
                        <td><?php echo $producto->unid_med ?></td>
                        <td><?php echo 'Bs.'.number_format($producto->precio,2) ?></td>
                        <td><button type="button"  class="<?php if($producto->cantidad>10){echo " btn btn-success btn-circle";} else {echo " btn btn-danger btn-circle";} ?>"><?php echo $producto->cantidad ?></button></td>
                        <td>
                            <button onclick="confirmarEst('<?php url("producto/desactivar/".$producto->id) ?>')" class="<?php if($producto->activo == 0){ echo "btn btn-warning btn-sm";}else{echo "btn btn-success btn-sm";}?>" ><?php if($producto->activo == 0) {echo "Inactivo";}else{echo "Activo";}?></button>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="<?php url("producto/editar/".$producto->id)?>"><i class="fa fa-edit"></i> Editar</a>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="confirmarProd('<?php url("producto/eliminar/".$producto->id)?>')"><i class="fa fa-trash-o"></i> Eliminar</button>
                        </td>
                    </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <!--FIN CONTENIDO -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include(VISTA_RUTA."admininclude/scripts.php")?>

</body>

</html>