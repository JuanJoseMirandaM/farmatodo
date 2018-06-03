
var ventaApp = angular.module("ventaApp",[]);
ventaApp.controller('ventaController',['$scope','$http','$filter',function ($scope,$http,$filter){

    $scope.productos = [];
    $scope.productosAdd = [];
    $scope.producto = {};
    $scope.url = $("#urlPrincipal").val();

    $scope.cargarProductos = function () {
        $http.get($scope.url + "producto/todos").then(function ($request) {
            $scope.productos = $request.data;
        });
    };

    $scope.seleccionarProducto = function($id_producto){
        var prod = $filter("filter")($scope.productos,{
            id: $id_producto
        })[0];

        var agregar = true;

        if($scope.productosAdd.length == 0){
            $scope.agregarProdcuto(prod);
            agregar = false;
        }else{
            angular.forEach($scope.productosAdd,function (value, key) {
                if(value["id"] == $id_producto){
                    value.cantidad++;
;                   value.subtotal = value.cantidad * value.precio;
                    agregar = false;
                }
            });
        }

        if(agregar){
            $scope.agregarProdcuto(prod);
        }

        $('#listaProductos').modal('hide');
    };

    $scope.agregarProdcuto = function (prod) {
        $scope.producto = {
            id: prod.id,
            codigo: prod.codigo,
            nombre: prod.nombre,
            proveedor: prod.proveedor,
            peso: prod.peso,
            unid_med: prod.unid_med,
            cantidad: 1,
            precio: prod.precio,
            subtotal: prod.precio
        };

        $scope.productosAdd.push($scope.producto);
    };

    $scope.getTotal = function () {
        var total = 0;
        angular.forEach($scope.productosAdd,function (value, key) {
            total = total + parseInt(value.subtotal);
        });
        return total;
    }
    
    $scope.removerProducto = function (index) {
        $scope.productosAdd.splice(index,1)
    }
}]);