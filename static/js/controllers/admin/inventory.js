mainControllers.controller('inventory', ['$location','$route','$routeParams','$scope','$q','$http','$interval','$timeout','mainFactory', function($location,$routeParams,$route,$scope, $q,$http, $interval,$timeout,mainFactory) {
	
	mainFactory.setPage('inventory')
	$scope.static_url = static_url;
	$scope.base_url = base_url;
	

	$scope.productsPromice = mainFactory.ajax('ajax/Inventory/getproducts',null);
    $scope.productsPromice.then(function(v){
      	$scope.products = v;
    });
	
	
	$('#newProductModal').on('hidden.bs.modal', function () {
	  $scope.newProduct = {}
	})
	
	
	$scope.addProduct = function(){
		$.ajax({
            url     : base_url+'ajax/inventory/create_product',
            type    : 'POST',
            dataType: 'json',
            data    : $.param($scope.newProduct),
            success : function( data ) {

				console.log(data)
				if($scope.newProduct.id != undefined){
					$scope.products[$scope.products.indexOf($scope.newProduct)] = data;
				}else{
					$scope.products.push(data)
				}
				$('#newProductModal').modal('hide')
								
				$scope.selected_product($scope.products[$scope.products.length-1]);
            },
            error   : function( xhr, err ) {
                alert('Error adding product');
				console.log(err)
				console.log(xhr)
            }
        }); 
	}

	$scope.editProduct = function(product){
		$scope.newProduct = product
		$('#newProductModal').modal('show')
	}
	
	$scope.deleteProduct = function(product){
		$.ajax({
            url     : base_url+'ajax/inventory/delete_product',
            type    : 'POST',
            dataType: 'json',
            data    : $.param(product),
            success : function( data ) {
				$scope.products.splice($scope.products.indexOf(product),1)
            },
            error   : function( xhr, err ) {
                alert('Error Deleting product');
				console.log(err)
				console.log(xhr)
            }
        }); 
	}


	
	
	
	

}]);

