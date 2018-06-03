<!DOCTYPE html>
<html lang="es">

<head>

    <?php include(VISTA_RUTA."admininclude/head.php") ?>

</head>

<body>

<div id="wrapper">

    <?php include(VISTA_RUTA."admininclude/menu.php") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Listado de proveedores | <a href="<?php url("proveedor/nuevo")?>" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Proveedor</a> </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!--INICIO CONTENIDO -->
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>NIT</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php foreach ($proveedores as $proveedor) { ?>
                    <tr>
                        <td><?php echo $proveedor->nit ?></td>
                        <td><?php echo $proveedor->nombre ?></td>
                        <td><?php echo $proveedor->telefono ?></td>
                        <td><?php echo $proveedor->direccion ?></td>
                        <td><?php echo $proveedor->email ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?php url("proveedor/editar/" .$proveedor->id)?>">Editar</a>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="confirmar('<?php url("proveedor/eliminar/" .$usuario->id)?>')" >Eliminar</button>
                        </td>
                    </tr>
        		<?php } ?>
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