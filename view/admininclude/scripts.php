<!-- jQuery -->
<script src="<?php asset('vendor/jquery/jquery.min.js')?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php asset('vendor/bootstrap/js/bootstrap.min.js')?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php asset('vendor/metisMenu/metisMenu.min.js')?>"></script>

<!-- Morris Charts JavaScript -->
<!--
<script src="<?php //asset('vendor/raphael/raphael.min.js')?>"></script>
<script src="<?php //asset('vendor/morrisjs/morris.min.js')?>"></script>
<script src="<?php //asset('data/morris-data.js')?>"></script>
-->
<!-- Custom Theme JavaScript -->
<script src="<?php asset('dist/js/sb-admin-2.js')?>"></script>
<script src="<?php asset('js/angular.min.js')?>"></script>
<script src="<?php asset('js/jquery-confirm.min.js')?>"></script>
<script src="<?php asset('js/controladores/VentaController.js')?>"></script>

<script>
    function confirmar(url) {
        $.confirm({
            title: 'Eliminar Usuario',
            content: 'Estas apunto de eliminar el siguiente usuario',
            buttons: {
                /*confirm: function () {
                    $.alert('Confirmar');
                    window.location.href=url;
                },*/
                cancelar: {
                    text: 'Cancelar',
                    cancel: function () {
                        $.alert('Cancelado');
                    }
                },
                confirmar: {
                    text: 'Confirmar',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){
                        $.alert('Eliminado Correctamente');
                        window.location.href=url;
                    }
                }
            }
        });
    }

    function confirmarProd(url) {
        $.confirm({
            title: 'Eliminar Producto',
            content: 'Estas apunto de eliminar el siguiente producto',
            buttons: {
                /*confirm: function () {
                    $.alert('Confirmar');
                    window.location.href=url;
                },*/
                cancelar: {
                    text: 'Cancelar',
                    cancel: function () {
                        $.alert('Cancelado');
                    }
                },
                confirmar: {
                    text: 'Confirmar',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){
                        $.alert('Eliminado Correctamente');
                        window.location.href=url;
                    }
                }
            }
        });
    }

    function confirmarEstFac(url) {
        $.confirm({
            title: 'Estado',
            content: 'Estas apunto de cambiar el estado de esta venta',
            buttons: {
                /*confirm: function () {
                    $.alert('Confirmar');
                    window.location.href=url;
                },*/
                cancelar: {
                    text: 'Cancelar',
                    cancel: function () {
                        $.alert('Cancelado');
                    }
                },
                confirmar: {
                    text: 'Confirmar',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){
                        $.alert('Cambiar correctamente Correctamente');
                        window.location.href=url;
                    }
                }
            }
        });
    }

    function confirmarEst(url) {
        $.confirm({
            title: 'Estado',
            content: 'Estas apunto de cambiar el estado de este producto',
            buttons: {
                /*confirm: function () {
                    $.alert('Confirmar');
                    window.location.href=url;
                },*/
                cancelar: {
                    text: 'Cancelar',
                    cancel: function () {
                        $.alert('Cancelado');
                    }
                },
                confirmar: {
                    text: 'Confirmar',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){
                        $.alert('Cambio correctamente');
                        window.location.href=url;
                    }
                }
            }
        });
    }
</script>