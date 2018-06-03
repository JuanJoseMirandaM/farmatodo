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
                <h1 class="page-header"><?php echo isset($proveedor)? "Actualizar":"Nuevo"?> proveedor |
                    <a href="<?php url("proveedor")?>" class="btn btn-default"><i class="fa fa-users"></i> Ver listado</a> </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!--INICIO CONTENIDO -->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="<?php url("proveedor/agregar")?>" method="POST" role="form">
                            <legend>Datos del Proveedor</legend>

                            <?php if(isset($proveedor)){?>
                                <input  type="hidden" value="<?php echo $proveedor->id?>" name="proveedor_id">
                            <?php }?>

                            <div class="form-group">
                                <label for="nit">NIT</label>
                                <input value="<?php echo isset($proveedor)? $proveedor->nit: "" ?>"
                                required type="text" class="form-control" name="nit" id="nit" placeholder="11108748">
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input value="<?php echo isset($proveedor)? $proveedor->nombre:"" ?>"
                                       required type="text" class="form-control" name="nombre" id="nombre" placeholder="Company">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input value="<?php echo isset($proveedor)? $proveedor->telefono:"" ?>"
                                       required type="text" class="form-control" name="telefono" id="telefono" placeholder="21212633">
                            </div>                            

                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input value="<?php echo isset($proveedor)? $proveedor->direccion:"" ?>"
                                       required type="text" class="form-control" name="direccion" id="direccion" placeholder="calle ...">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input value="<?php echo isset($proveedor)? $proveedor->email:"" ?>"
                                       required type="email" class="form-control" name="email" id="email" placeholder="Example@gmail.com">
                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo isset($proveedor)? "Guardar":"Registrar"?></button>
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