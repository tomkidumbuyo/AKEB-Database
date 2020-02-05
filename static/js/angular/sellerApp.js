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
    templateUrl : base_url+'seller/home',
    controller  : 'home'
  }).
  when('/inventory', {
    templateUrl : base_url+'seller/inventory',
    controller  : 'inventory'
  }).
  when('/vehicles', {
    templateUrl : base_url+'seller/vehicles',
    controller  : 'vehicles'
  }).
  when('/sellers', {
    templateUrl : base_url+'seller/seller',
    controller  : 'seller'
  }).
  when('/customers', {
    templateUrl : base_url+'seller/customer',
    controller  : 'customer'
  }).
  when('/reports', {
    templateUrl : base_url+'seller/report',
    controller  : 'report'
  }).
  otherwise({
    redirectTo: 'home'
  });
}]);