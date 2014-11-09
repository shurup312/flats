/**
 * Flat services
 * */
services
	.factory('Flat', ['$http', function ($http) {
		return {
			getList: function () {
				return $http.post('/backend/flat/list');
			}
		}
	}])
	.factory('City', ['$http', function ($http) {
		return {
			getList: function () {
				return $http.post('/backend/city/list');
			}
		}
	}]);
