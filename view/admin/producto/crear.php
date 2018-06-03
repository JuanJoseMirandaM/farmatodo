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
                <h1 class="page-header"><?php echo isset($producto)? "Actualizar":"Nuevo"?> producto |
                    <a href="<?php url("producto")?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Ver listado</a> </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!--INICIO CONTENIDO -->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="<?php url("producto/agregar")?>" method="POST" role="form">
                            <legend>Datos del Producto</legend>

                            <?php if(isset($producto)){?>
                                <input  type="hidden" value="<?php echo $producto->id?>" name="producto_id">
                            <?php }?>

                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input value="<?php echo isset($producto)? $producto->codigo:"" ?>"
                                       required type="text" class="form-control" name="codigo" id="codigo" placeholder="COD-001">
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input value="<?php echo isset($producto)? $producto->nombre:"" ?>"
                                       required type="text" class="form-control" name="nombre" id="nombre" placeholder="Medicamento">
                            </div>

                            <div class="form-group">
                                <label for="proveedor">Proveedor</label>
                                <select name="proveedor" id="proveedor" class="form-control" required="required">
                                    <option <?php echo isset($producto) && $producto->proveedor == "Laboratorios COFAR SA" ? 'selected':'' ?>
                                            value="Laboratorios COFAR SA">Laboratorios COFAR SA</option>
                                    <option <?php echo isset($producto) && $producto->proveedor == "Drogueria INTI SA" ? 'selected':'' ?>
                                            value="Drogueria INTI SA">Drogueria INTI SA</option>
                                    <option <?php echo isset($producto) && $producto->proveedor == "Laboratorios BAGO DE BOLIVIA SA" ? 'selected':'' ?>
                                            value="Laboratorios BAGO DE BOLIVIA SA">Laboratorios BAGO DE BOLIVIA SA</option>
                                    <option <?php echo isset($producto) && $producto->proveedor == "    Laboratorios Farmacéuticos LAFAR SA" ? 'selected':'' ?>
                                            value=" Laboratorios Farmacéuticos LAFAR SA">   Laboratorios Farmacéuticos LAFAR SA</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="peso">Peso</label>
                                <input value="<?php echo isset($producto)? $producto->peso:"" ?>"
                                       required type="text" class="form-control" name="peso" id="peso" placeholder="0.00">
                            </div>
                            <div class="form-group">
                                <label for="unid_med">Unidad de Medida</label>
                                <select name="unid_med" id="unid_med" class="form-control" required="required">
                                    <option <?php echo isset($producto) && $producto->unid_med == "ml" ? 'selected':'' ?>
                                            value="mg">ml</option>
                                    <option <?php echo isset($producto) && $producto->unid_med == "mg" ? 'selected':'' ?>
                                            value="mg">mg</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input value="<?php echo isset($producto)? $producto->precio:"" ?>"
                                        required type="text" class="form-control" name="precio" id="precio" placeholder="00.00">
                            </div>

                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input value="<?php echo isset($producto)? $producto->cantidad:"" ?>"
                                        required type="text" class="form-control" name="cantidad" id="cantidad" placeholder="0">
                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo isset($producto)? "Guardar":"Registrar"?></button>
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