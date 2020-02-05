mainControllers.controller('home', ['$location','$route','$routeParams','$scope','$q','$http','$interval','$timeout','mainFactory', function($location,$routeParams,$route,$scope, $q,$http, $interval,$timeout,mainFactory) {
	
	mainFactory.setPage('home')
	
	$scope.static_url = static_url;
	$scope.base_url = base_url;
	$scope.newTrip = {}
	$scope.newTrip.items = [];

	$scope.select_page = function(page){
		$scope.page = page
	}
	$scope.select_page('summary')
		



    $scope.tanksPromice = mainFactory.ajax('ajax/Inventory/gettanks',null);
    $scope.tanksPromice.then(function(v){
      	$scope.tanks = v;
      	$scope.addTripItem();
    });

    $scope.driversPromice = mainFactory.ajax('ajax/driver/getdrivers',null);
    $scope.driversPromice.then(function(v){
      	$scope.drivers = v;		
      	$scope.newTrip.driver = v[0].id
    });

    $scope.vehiclesPromice = mainFactory.ajax('ajax/vehicle/getvehicles',null);
    $scope.vehiclesPromice.then(function(v){
      	$scope.vehicles = v;
      	$scope.newTrip.vehicle = v[0].id		
    });

    $scope.getDailyReport = function(date = ""){
		
		$scope.dailyReportPromice = mainFactory.ajax('ajax/trip/getDailyReport/'+date,null);
		$scope.dailyReportPromice.then(function(v){
			$scope.dailyReport = v;
		});
		
		$today = new Date();
		$yesterday = new Date($today);
		$yesterday.setDate($today.getDate() - 1);
		
		$scope.prevDailyReportPromice = mainFactory.ajax('ajax/trip/getDailyReport/'+formatDate($yesterday),null);
		$scope.prevDailyReportPromice.then(function(v){
			$scope.prevDailyReport = v;
		});
		
		$q.all([$scope.dailyReportPromice,$scope.prevDailyReportPromice]).then(function(result){
			
			$scope.dailyReport = result[0];
			$scope.prevDailyReport = result[1];
			
			console.log($scope.dailyReport.trips.length/$scope.prevDailyReport.trips.length)
			console.log($scope.prevDailyReport.trips.length/$scope.dailyReport.trips.length)
			
			$scope.trip_trend = {}
			
			if($scope.dailyReport.trips.length >= $scope.prevDailyReport.trip.length){
				console.log("up")
				$scope.trip_trend.up = true;
				$scope.trip_trend.percentage = (($scope.prevDailyReport.trip.length/$scope.dailyReport.trips.length)*100) 
			}else{
				console.log("down")
				$scope.trip_trend.up = false;
				$scope.trip_trend.percentage = (($scope.dailyReport.trips.length/$scope.prevDailyReport.trip.length)*100)
			}
			
			console.log($scope.trip_trend)
		})
		
	}
	$scope.getDailyReport();
	
	
	function formatDate(date) {
		var d = date,
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		return [year, month, day].join('-');
	}



    $scope.addTripItem = function(){
		$scope.newTrip.items.push({
			tank : $scope.tanks[0],
			tank_id : $scope.tanks[0].id,
			amount : 1,
		})
		$scope.refreshTotal();
	}

	$scope.refreshTotal = function(){
		$scope.total = 0;
		angular.forEach($scope.newTrip.items, function(item, key) {
			item.price = item.tank.price*item.amount
			$scope.total += item.price
		});
	}
	
	$scope.delete_item = function(item){
		console.log(item)
		$scope.newTrip.items.splice($scope.newTrip.items.indexOf(item),1)
	}

	$scope.changeItemTank = function(item){
		angular.forEach($scope.tanks, function(tank, key) {
			if(tank.id == item.tank_id){
			   item.tank = tank
			}
		});
		$scope.refreshTotal();
	}

	$scope.saveTrip = function(){
		$scope.select_page('trips')
		$.ajax({
            url     : base_url+'ajax/trip/new_trip',
            type    : 'POST',
            dataType: 'json',
            data    : $.param($scope.newTrip),
            success : function( data ) {
				$('#newTripModal').modal('hide')
				$scope.dailyReport.trips.push(data)
				$scope.getDailyReport();
            },
            error   : function( xhr, err ) {
                alert('Error adding stock movement');
				console.log(err)
				console.log(xhr)
            }
        }); 
	}



}]);

