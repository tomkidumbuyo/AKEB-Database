mainControllers.controller('header', ['$location','$route','$routeParams','$scope','$rootScope','$http','$interval','$timeout','$window','mainFactory', function($location,$routeParams,$route,$scope,$rootScope, $http, $interval,$timeout,$window,mainFactory) {

  $scope.base_url = base_url;
	$interval(function(){

        $scope.page    = $routeParams.current.controller;
        $scope.subpage = $routeParams.current.params.page;

	},30);

	$interval(function(){$scope.page = $routeParams.current.controller},30);

	var visitortime     = new Date();
  var visitortimezone = "" + -visitortime.getTimezoneOffset()/60;

   

    $http({
        method  : 'GET',
        url     : base_url+'ajax/user/getmainuser',
        data    : null,
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' , "X-CSRFToken": mainFactory.getCookie("csrftoken") }  
    }).then(function(data) {
        $scope.mainuser = data.data;
        console.log(data.data)
    }, function(error) {

    }); 


    $scope.$on('page', function(event, args) {
        $scope.getPage = args.page;
    });
 
    $scope.preview = function(url){
      $window.open(base_url+url);
    };

    $scope.accountpreview = function(url){
      $window.open(account_url+url);
    };

     $scope.getPage = function() {
         return mainFactory.getPage();
     }

    $scope.loading = function(){
        loading = mainFactory.getLoading();
		return loading.requests == 0 ? false : true ; 
	}

    $scope.loading_percentage = function(){
        loading = mainFactory.getLoading();
        return loading.percentage; 
    }

    $rootScope.$on('$routeChangeStart', function(){
   
    });

    $rootScope.$on('$routeChangeSuccess', function(){
        mainFactory.destroyAllRequests()
    });

    $rootScope.$on('$routeChangeError', function(event, current, previous, rejection){
        console.log(event)
        console.log(current)
        console.log(previous)
        console.log(rejection)
        alert('Error loading page. Please click refresh and try again.')
    });

    $scope.config = {
        autoHideScrollbar: false,
        theme: 'minimal-dark',
        advanced:{
            updateOnContentResize: true,
            scrollInertia: 0
        }
    }
    
    $sentText = null;

    

}]);