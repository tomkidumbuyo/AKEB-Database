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
    templateUrl : base_url+'agent/home',
    controller  : 'home'
  }).
  when('/inventory', {
    templateUrl : base_url+'agent/inventory',
    controller  : 'inventory'
  }).
  when('/vehicles', {
    templateUrl : base_url+'agent/vehicles',
    controller  : 'vehicles'
  }).
  when('/agents', {
    templateUrl : base_url+'agent/agent',
    controller  : 'agent'
  }).
  when('/customers', {
    templateUrl : base_url+'agent/customer',
    controller  : 'customer'
  }).
  when('/reports', {
    templateUrl : base_url+'agent/report',
    controller  : 'report'
  }).
  otherwise({
    redirectTo: 'home'
  });
}]);