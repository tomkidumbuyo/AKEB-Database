mainControllers.controller('customer', ['$location','$route','$routeParams','$scope','$q','$http','$interval','$timeout','mainFactory', function($location,$routeParams,$route,$scope, $q,$http, $interval,$timeout,mainFactory) {
	
	mainFactory.setPage('customer')
	
	$scope.addCustomer = function(){
		$.ajax({
	            url     : base_url+'ajax/customer/create_customer',
	            type    : 'POST',
	            dataType: 'json',
	            data    : $.param($scope.newCustomer),
	            success : function( data ) {
					console.log(data)
					$('#new-customer').modal('hide')
					$scope.customers.push(data)
	            },
	            error   : function( xhr, err ) {
	                alert('Error');
					console.log(err)
					console.log(xhr)
	            }
	    });    
	}

	$scope.customersPromice = mainFactory.ajax('ajax/customer/getcustomers',null);
    $scope.customersPromice.then(function(v){
      	$scope.customers = v;
		$scope.select_customer(v[0]);
		
    });

    $scope.select_page = function(page){
    	$scope.page = page
    }
    $scope.select_page('sales')
	
	$scope.select_customer = function(customer){
		
		$scope.selected_customer = customer
		
		$scope.salesPromice = mainFactory.ajax('ajax/customer/getcustomersales',{'id':customer.id});
		$scope.salesPromice.then(function(v){
			$scope.sales = v;
		});
		
		
	}

	$scope.updateCustomer = function(){
		$.ajax({
	            url     : base_url+'ajax/customer/update_customer',
	            type    : 'POST',
	            dataType: 'json',
	            data    : $.param($scope.selected_customer),
	            success : function( data ) {

	            },
	            error   : function( xhr, err ) {
	                alert('Error');
					console.log(err)
					console.log(xhr)
	            }
	    });    
	}


	$scope.deleteCustomer = function(){
			$.ajax({
		            url     : base_url+'ajax/customer/delete_customer',
		            type    : 'POST',
		            dataType: 'json',
		            data    : $.param($scope.selected_customer),
		            success : function( data ) {
						$scope.customers.splice($scope.customers.indexOf($scope.selected_customer),1)
		            	if($scope.customers.length > 0){
		            		$scope.select_customer($scope.customers[0])
		            	}else{
		            		$scope.select_customer(false)
		            	}
		            },
		            error   : function( xhr, err ) {
		                alert('Error');
						console.log(err)
						console.log(xhr)
		            }
		    });    
	}



}]);

