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
                <h1 class="page-header">Listado de usuarios | <a href="<?php url("usuario/nuevo")?>" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Usuario</a> </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!--INICIO CONTENIDO -->
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Accion</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php foreach ($usuarios as $usuario) { ?>
                    <tr>
                        <td><?php echo $usuario->id ?></td>
                        <td><?php echo $usuario->nombre ?></td>
                        <td><?php echo $usuario->apellido ?></td>
                        <td><?php echo $usuario->email ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?php url("usuario/editar/" .$usuario->id)?>">Editar</a>
                            <button class="btn btn-danger btn-sm" onclick="confirmar('<?php url("usuario/eliminar/" .$usuario->id)?>')" >Eliminar</button>
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