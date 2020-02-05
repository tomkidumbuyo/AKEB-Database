// JavaScript Document
myApp = angular.module('myApp', [
	'ngRoute',
	'ngSanitize',
	'ngResource',
	'mainControllers'
])

myApp.config(function($httpProvider) {
  $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
});

myApp.config(['$locationProvider', function($locationProvider) {
  $locationProvider.hashPrefix('');
}]);

myApp.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);

myApp.config(['$routeProvider', function($routeProvider) {
  $routeProvider.
  when('/home', {
    templateUrl : base_url+'driver/home',
    controller  : 'home'
  }).
  when('/inventory', {
    templateUrl : base_url+'driver/inventory',
    controller  : 'inventory'
  }).
  when('/vehicles', {
    templateUrl : base_url+'driver/vehicles',
    controller  : 'vehicles'
  }).
  when('/drivers', {
    templateUrl : base_url+'driver/driver',
    controller  : 'driver'
  }).
  when('/customers', {
    templateUrl : base_url+'driver/customer',
    controller  : 'customer'
  }).
  when('/reports', {
    templateUrl : base_url+'driver/report',
    controller  : 'report'
  }).
  otherwise({
    redirectTo: 'home'
  });
}]);