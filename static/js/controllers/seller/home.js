mainControllers.controller('home', ['$location','$route','$routeParams','$scope','$q','$http','$interval','$timeout','mainFactory', function($location,$routeParams,$route,$scope, $q,$http, $interval,$timeout,mainFactory) {
	
	mainFactory.setPage('home')
		
	$scope.static_url = static_url;
	$scope.base_url = base_url;

	$scope.loadLeads = function(){
		$scope.leadsPromice = mainFactory.ajax('ajax/lead/getsellerLeads',null);
	    $scope.leadsPromice.then(function(v){
	      	$scope.leads = v;
	    });
	}
	$scope.loadLeads()


	$scope.check_lead = function(){
		
		
		$.ajax({
            url     : base_url+'ajax/lead/check_lead',
            type    : 'POST',
            dataType: 'json',
            data    : $.param({id:$scope.id}),
            success : function( data ) {
				$('#newLeadModal').modal('show')
				$('#checkLeadModal').modal('hide')
				$scope.message = data.message
				$scope.loadLeads()
            },
            error   : function( xhr, err ) {
                alert('Error checking lead');
				console.log(err)
				console.log(xhr)
            }
        }); 
	}

	$scope.promo_code = function(){
		
		
		$.ajax({
            url     : base_url+'ajax/lead/check_code',
            type    : 'POST',
            dataType: 'json',
            data    : $.param({code:$scope.code}),
            success : function( data ) {
				$('#newpromoModal').modal('show')
				$('#promoCodeModal').modal('hide')
				$scope.message = data.message
				$scope.loadLeads()
				if(!data.message_status.isSuccessful){
					alert('Error sending message to user.'+data.message_status.error);
				}
				
            },
            error   : function( xhr, err ) {
                alert('Error checking promo code');
				console.log(err)
				console.log(xhr)
            }
        }); 
	}



}]);

