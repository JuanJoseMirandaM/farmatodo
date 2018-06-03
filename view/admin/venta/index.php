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
                <h1 class="page-header">Lista de Ventas |
                    <a href="<?php url("ventas/nuevo")?>" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva Venta</a> </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!--INICIO CONTENIDO -->
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>NIT/CI</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ventas as $venta) { ?>
                <tr>
                    <td><?php echo $venta->id ?></td>
                    <td><?php echo $venta->cliente ?></td>
                    <td><?php echo $venta->nit ?></td>
                    <td><?php echo "Bs ".number_format($venta->total,2) ?></td>
                    <td><?php echo $venta->fecha ?></td>
                    <td>
                        <button onclick="confirmarEstFac('<?php url("ventas/cam_estado/".$venta->id) ?>')" class="<?php if($venta->estado == 0){ echo "btn btn-danger btn-sm";}else{echo "btn btn-success btn-sm";}?>" ><?php if($venta->estado == 0) {echo "Anulado";}else{echo "Activo";}?></button>
                    </td>
                </tr>
                <?php }?>
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