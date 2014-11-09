/**
 * Flat services
 * */
services
	.factory('Flat', ['$http', function ($http) {
		return {
			getList: function () {
				return $http.post('/backend/flat/list');
			},
			create: function (data) {
				return $http.post('/backend/flat/create', data);
			}
		}
	}])
	.factory('City', ['$http', function ($http) {
		return {
			getList: function () {
				return $http.post('/backend/city/list');
			}
		}
	}])
	.factory('Street', ['$http', function ($http) {
		return {
			getList: function () {
				return $http.post('/backend/street/list');
			}
		}
	}])
	.factory('Metro', ['$http', function ($http) {
		return {
			getList: function () {
				return $http.post('/backend/metro/list');
			}
		}
	}]);
