mainControllers.controller('trip', ['$location','$route','$routeParams','$scope','$q','$http','$interval','$timeout','mainFactory', function($location,$routeParams,$route,$scope, $q,$http, $interval,$timeout,mainFactory) {
	
	mainFactory.setPage('trip')

	$scope.static_url = static_url;
	$scope.base_url = base_url;
	$scope.newTrip = {}
	$scope.newTrip.items = [];


	
	$scope.tanksPromice = mainFactory.ajax('ajax/Inventory/gettanks',null);
    $scope.tanksPromice.then(function(v){
      	$scope.tanks = v;
      	$scope.addTripItem();
    });

    $scope.select_page = function(page){
    	$scope.page = page
    }
    $scope.select_page('trips')

    $scope.driversPromice = mainFactory.ajax('ajax/driver/getdrivers',null);
    $scope.driversPromice.then(function(v){
      	$scope.drivers = v;		
      	$scope.newTrip.driver = v[0].id+''
    });

    $scope.vehiclesPromice = mainFactory.ajax('ajax/vehicle/getvehicles',null);
    $scope.vehiclesPromice.then(function(v){
      	$scope.vehicles = v;
      	$scope.newTrip.vehicle = v[0].id+''		
    });

    $scope.max_date = new Date()
	$scope.max_date_string = $scope.max_date.toString()

	$scope.refreshData = function(){

		$scope.from_date = new Date($scope.from)

		$scope.from_date_str =formatDate($scope.from_date)
		$scope.max_date_str = formatDate($scope.max_date)

		console.log($scope.from_date_str)
		console.log($scope.max_date_str)

		$scope.dailyReportPromice = mainFactory.ajax('ajax/trip/getDailyReport/'+formatDate($scope.from_date),null);
		$scope.dailyReportPromice.then(function(v){
			$scope.dailyReport = v;
			if(v.trips.length > 0){
				$scope.select_trip(v.trips[0])
			}
		});	
	}

	function formatDate(date) {
		var d = date,
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		return [year, month, day].join('-');
	}

	$scope.getDailyReport = function(date = ""){
			
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
		$.ajax({
            url     : base_url+'ajax/trip/new_trip',
            type    : 'POST',
            dataType: 'json',
            data    : $.param($scope.newTrip),
            success : function( data ) {
				$('#newTripModal').modal('hide')
				$scope.dailyReport.trips.push(data)
				$scope.refreshData();
            },
            error   : function( xhr, err ) {
                alert('Error adding stock movement');
				console.log(err)
				console.log(xhr)
            }
        }); 
	}

	$scope.select_trip = function(trip){
		$scope.selected_trip = trip;
	}

	$scope.select_page = function(page){
		$scope.page = page;
	}
	$scope.select_page("items")


}]);

