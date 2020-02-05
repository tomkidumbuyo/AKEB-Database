mainControllers.controller('report', ['$location','$route','$routeParams','$scope','$q','$http','$interval','$timeout','mainFactory', function($location,$routeParams,$route,$scope, $q,$http, $interval,$timeout,mainFactory) {
	
	mainFactory.setPage('report')

	$scope.max_date = new Date()
	$scope.max_date_string = $scope.max_date.toString()

	$scope.refreshData = function(){

		$scope.from_date = new Date($scope.from)

		console.log($scope.from)
		console.log($scope.from_date)

		$scope.DailyReportPromice = mainFactory.ajax('ajax/report/getDailyReport/'+formatDate($scope.from_date),null);
		$scope.DailyReportPromice.then(function(v){
			$scope.dailyReport = v;
			console.log(v)
		});
	}
	$scope.refreshData();

	function formatDate(date) {
		var d = date,
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		return [year, month, day].join('-');
	}

	$scope.select_page = function(page){
		$scope.page = page;
	}
	$scope.select_page('sales');
	
	
}]);

