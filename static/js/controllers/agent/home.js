mainControllers.controller('home', ['$location','$route','$routeParams','$scope','$q','$http','$interval','$timeout','mainFactory', function($location,$routeParams,$route,$scope, $q,$http, $interval,$timeout,mainFactory) {
	

	mainFactory.setPage('home')		
	$scope.static_url = static_url;
	$scope.base_url = base_url;


	

    $scope.subdealersPromice = mainFactory.ajax('ajax/subdealer/getuserSubdealers',null);
    $scope.subdealersPromice.then(function(v){
      	$scope.subdealers = v;
        $scope.newSubdealer.region = v[0].id + ''
    });

    $scope.addSubdealer = function(){

        console.log($scope.newSubdealer)

        $.ajax({
            url     : base_url+'ajax/subdealer/add',
            type    : 'POST',
            dataType: 'json',
            data    : $.param($scope.newSubdealer),
            success : function( data ) {
                console.log(data)
                $('#newVehicleModal').modal('hide')
                $scope.subdealers.push(data)
            },
            error   : function( xhr, err ) {
                console.log(err)
                console.log(xhr)
            }
        });   
    }

    

    $scope.region_changed = function(){

        console.log('here')
        console.log($scope.newLead.region)

        $scope.regions.forEach(function (region) {
            console.log(region)
            if(region.id == $scope.newLead.region){
                $scope.locations = region.locations
                $scope.newLead.location = $scope.locations[0].id
            }
        });

    }

    $scope.regionsPromice = mainFactory.ajax('ajax/user/get_regions',null);
    $scope.regionsPromice.then(function(v){
        $scope.regions = v;
        $scope.newLead.region = v[0].id
        $scope.region_changed()
    });


	$scope.addLead = function(){
		
		$.ajax({
            url     : base_url+'ajax/lead/create_lead',
            type    : 'POST',
            dataType: 'json',
            data    : $.param($scope.newLead),
            success : function( data ) {
				$('#newLeadModal').modal('hide')
				$scope.leads.push(data)
            },
            error   : function( xhr, err ) {
                alert('Error adding lead');
				console.log(err)
				console.log(xhr)
            }
        }); 

	}



}]);

