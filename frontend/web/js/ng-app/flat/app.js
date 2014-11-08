/**
 * App services module
 * */
var services = angular.module('app.services', []);

/**
 * App controllers module
 * */
var controllers = angular.module('app.controllers', ['app.services']);

/**
 * App module
 * */
var app = angular.module('app', ['ui.router', 'app.controllers', 'app.services'])
	.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
    	$urlRouterProvider.otherwise('/');
    	$stateProvider
			.state('list', {
				url: '/',
				templateUrl: '/backend/flat/list',
				controller: 'FlatListController'
			})
			.state('create', {
				url: '/create',
				templateUrl: '/backend/flat/create',
				controller: 'FlatCreateController'
			})
		;
	}]);