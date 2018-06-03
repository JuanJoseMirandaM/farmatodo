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
                <h1 class="page-header"><?php echo isset($usuario)? "Actualizar":"Nuevo"?> usuario | <a href="<?php url("usuario")?>" class="btn btn-default"><i class="fa fa-user"></i> Ver listado</a> </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!--INICIO CONTENIDO -->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="<?php url("usuario/agregar")?>" method="POST" role="form">
                            <legend>Datos del Usuario</legend>

                            <?php if(isset($usuario)){?>
                                <input  type="hidden" value="<?php echo $usuario->id?>" name="usuario_id">  <!--video 35 12:30 -->
                            <?php }?>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input value="<?php echo isset($usuario)? $usuario->nombre:"" ?>"
                                       required autofocus type="text" class="form-control" name="nombre" id="nombre" placeholder="Example">
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input value="<?php echo isset($usuario)? $usuario->apellido:"" ?>"
                                       required autofocus type="text" class="form-control" name="apellido" id="apellido" placeholder="Example">
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input value="<?php echo isset($usuario)? $usuario->email:"" ?>"
                                        required  type="email" class="form-control" name="email" id="email" placeholder="email@example.com">
                            </div>

                            <div class="form-group">
                                <label for="pwd">Password</label>
                                <input  <?php echo isset($usuario)? "": "required"?>  type="password" class="form-control" name="password" id="pwd" placeholder="********">
                            </div>

                            <div class="form-group">
                                <label for="usuario">Categoria</label>
                                <select name="privilegio" id="privilegio" class="form-control" required="required">
                                	<option <?php echo isset($usuario) && $usuario->privilegio == "admin" ? 'selected':'' ?>
                                            value="admin">Administrador</option>
                                    <option <?php echo isset($usuario) && $usuario->privilegio == "venta" ? 'selected':'' ?>
                                            value="venta">Vendedor</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo isset($usuario)? "Guardar":"Registrar"?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--FIN CONTENIDO -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include(VISTA_RUTA."admininclude/scripts.php")?>

</body>

</html>