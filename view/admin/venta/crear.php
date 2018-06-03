<!DOCTYPE html>
<html lang="es">

<head>

    <?php include(VISTA_RUTA."admininclude/head.php") ?>

</head>

<body>

<div id="wrapper" ng-app="ventaApp" ng-controller="ventaController">

    <?php include(VISTA_RUTA."admininclude/menu.php") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo isset($venta)? "Actualizar":"Nueva"?> Venta |
                    <a href="<?php url("ventas")?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Ver listado</a> </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!--INICIO CONTENIDO -->
        <div class="row">
            <form action="<?php url("ventas/agregar")?>" method="POST" role="form">
                <input type="hidden" value="<?php url('')?>" id="urlPrincipal">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <legend>Datos de la Venta</legend>

                            <?php if(isset($venta)){?>
                                <input  type="hidden" value="<?php echo $venta->id?>" name="venta_id">
                            <?php }?>

                            <div class="form-group">
                                <label for="nombre">Nombre del cliente</label>
                                <input value="<?php echo isset($venta) ? $venta->cliente : '' ?>"
                                       required autofocus type="text" name="nombre" class="form-control" id="nombre" placeholder="Contoso Alfaro">
                            </div>

                            <div class="form-group">
                                <label for="nit">NIT/CI</label>
                                <input value="<?php echo isset($venta) ? $venta->nit:'' ?>"
                                       required autofocus type="text" name="nit" class="form-control" id="nit" placeholder="0">
                            </div>

                            <?php if(isset($venta)){?>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input value="<?php echo isset($venta)? $venta->precio:"" ?>"
                                        required type="text" class="form-control" name="precio" id="precio" placeholder="00.00">
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                    	<div class="panel-body">
                           <button type="button" ng-click="cargarProductos()" data-toggle="modal" data-target="#listaProductos" class="btn btn-sm btn-primary">Agregar Producto</button>
                    	   <hr>
                            <table class="table table-hover">
                    	   	<thead>
                    	   		<tr>
                                    <th>Codigo</th>
                    	   			<th>Producto</th>
                                    <th>Peso</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    <th><i class="fa fa-cog"></i></th>
                    	   		</tr>
                    	   	</thead>
                    	   	<tbody>
                    	   		<tr ng-repeat="pd in productosAdd">
                    	   			<td>{{ pd.codigo }}</td>
                                    <td>{{ pd.nombre }}</td>
                                    <td>{{ pd.peso }}</td>
                                    <td>{{ pd.cantidad }}</td>
                                    <td>{{ pd.precio | currency:'Bs ' }}</td>
                                    <td>{{ pd.subtotal | currency:'Bs ' }}</td>
                                    <td>
                                        <a class="text-danger" href="javascript:;" ng-click="removerProducto($index)"><i class="fa fa-times">

                                            </i></a>
                                    </td>
                    	   		</tr>
                                <tr>
                                    <th colspan="5" class="text-right">SubTotal:</th>
                                    <td>{{getTotal() | currency:'Bs ' }}</td>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Descuento:</th>
                                    <td><input type="int" name="descuento"></td>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Total:</th>
                                    <td>{{getTotal() | currency:'Bs ' }}</td>
                                </tr>
                    	   	</tbody>
                    	   </table>
                    	</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="hidden" name="productos" value="{{productosAdd}}">
                    <input type="hidden" name="monto_total" value="{{getTotal()}}">
                    <button type="submit" class="btn btn-success">Registrar Venta</button>
                </div>
            </form>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="listaProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Listado productos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="buscar" ng-model="buscarProducto">
                        <hr>
                        <table class="table table-striped" width="100%">

                        	<thead>
                        		<tr>
                        			<th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Lab</th>
                                    <th>Peso</th>
                                    <th>Unidad Medida</th>
                                    <th>Precio</th>
                                    <th>Accion</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                        		<tr ng-repeat="product in productos | filter:buscarProducto">
                        			<td>{{ product.codigo }}</td>
                                    <td>{{ product.nombre }}</td>
                                    <td>{{ product.proveedor }}</td>
                                    <td>{{ product.peso }}</td>
                                    <td>{{ product.unid_med}}</td>
                                    <td>{{ product.precio | currency:'Bs ' }}</td>
                                    <td>
                                        <button ng-click="seleccionarProducto(product.id)" type="button" class="btn btn-sm btn-default"><i class="fa fa-plus"></i> Agregar</button>
                                    </td>
                        		</tr>
                        	</tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

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