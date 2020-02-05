// JavaScript Document
myApp = angular.module('myApp', [
	'ngRoute',
	'ngSanitize',
	'ngResource',
	'mainControllers',
  '720kb.datepicker'
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
  when('/inventory', {
    templateUrl : base_url+'admin/inventory',
    controller  : 'inventory'
  }).
  when('/student', {
    templateUrl : base_url+'admin/student',
    controller  : 'student'
  }).
  when('/subdealer', {
    templateUrl : base_url+'admin/subdealer',
    controller  : 'subdealer'
  }).
  when('/users', {
    templateUrl : base_url+'admin/user',
    controller  : 'user'
  }).
  otherwise({
    redirectTo: 'student'
  });
}]);