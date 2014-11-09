'use strict';

var services = angular.module('app.services', []);
var directives = angular.module('app.directives', []);
var controllers = angular.module('app.controllers', ['app.services', , 'app.directives']);

var app = angular.module('app', ['ui.router', 'app.controllers', 'app.services', 'app.directives'])
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