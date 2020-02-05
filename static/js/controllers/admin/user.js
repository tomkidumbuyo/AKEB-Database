mainControllers.controller('user', ['$location','$route','$routeParams','$scope','$q','$http','$interval','$timeout','mainFactory', function($location,$routeParams,$route,$scope, $q,$http, $interval,$timeout,mainFactory) {
	
	mainFactory.setPage('users')
	$scope.static_url = static_url;
	$scope.base_url = base_url;
	
	$scope.usersPromice = mainFactory.ajax('ajax/user/getusers',null);
    $scope.usersPromice.then(function(v){
      	$scope.users = v;
		$scope.select_user(v[0]);
		
    });

    $scope.region_changed = function(){

        console.log('here')
        console.log($scope.newDriver.region)

        $scope.regions.forEach(function (region) {
            console.log(region)
            if(region.id == $scope.newDriver.region){
                $scope.locations = region.locations
                $scope.newDriver.location = $scope.locations[0].id
            }
        });

    }

    $scope.region_changed_2 = function(){

        console.log('here')
        console.log($scope.selected_user.region)

        $scope.regions.forEach(function (region) {
            console.log(region)
            if(region.id == $scope.selected_user.region){
                $scope.locations = region.locations
                $scope.selected_user.location = $scope.locations[0].id
            }
        });

    }

    $scope.regionsPromice = mainFactory.ajax('ajax/user/get_regions',null);
    $scope.regionsPromice.then(function(v){
        $scope.regions = v;
        $scope.newDriver.region = v[0].id
        $scope.region_changed()
    });

	
	$scope.select_user = function(user){
		
		$scope.selected_user = user
		
	}

	$scope.addDriver = function(){
		$.ajax({
            url     : base_url+'ajax/user/create_user',
            type    : 'POST',
            dataType: 'json',
            data    : $.param($scope.newDriver),
            success : function( data ) {
				console.log(data)
				$('#new-user').modal('hide')
				$scope.users.push(data)
            },
            error   : function( xhr, err ) {

                console.log(err.responseJSON.message)
                alert(err.responseJSON.message);
				console.log(err)
				console.log(xhr)
            }
        });    
	}

	$scope.updateDriver = function(){
		$.ajax({
            url     : base_url+'ajax/user/update_user',
            type    : 'POST',
            dataType: 'json',
            data    : $.param($scope.selected_user),
            success : function( data ) {
            },
            error   : function( xhr, err ) {
                alert('Error updating user');
				console.log(err)
				console.log(xhr)
            }
        });  
	}

	$scope.deleteDriver = function(){
		$.ajax({
            url     : base_url+'ajax/user/delete_user',
            type    : 'POST',
            dataType: 'json',
            data    : $.param($scope.selected_user),
            success : function( data ) {
            	$scope.users.splice($scope.users.indexOf($scope.selected_user),1)
            	if($scope.users.length > 0){
            		$scope.select_user($scope.users[0])
            	}else{
            		$scope.select_user(false)
            	}
            },
            error   : function( xhr, err ) {
                alert('Error updating user');
				console.log(err)
				console.log(xhr)
            }
        });
	}

}]);

