/**
 * Flat controllers
 **/
controllers
	.controller('FlatController', ['$scope', function ($scope) {
		$scope.navActive = 'all';
	}])
	.controller('FlatListController', ['$scope', '$http', '$state', '$stateParams', function ($scope, $http, $state, $stateParams) {
		$scope.$parent.navActive = 'all';

		$scope.orderProp = 'id';
		$scope.setOrderBy = function(field) {
			$scope.orderProp = field;
		}

		$http.post('/backend/flat/list').success(function(response) {
			$scope.data = response.data;
			$scope.fields = response.fields;
		});
	}])
	.controller('FlatCreateController', ['$scope', '$http', '$state', '$stateParams', function ($scope, $http, $state, $stateParams) {

		$scope.$parent.navActive = 'create';

		$scope.submit = function (url) {
			console.log($scope.data);
			$http.post(url, $scope.data).success(function (response) {
				$scope.errors = {};
				if (!response.hasErrors) {
					$scope.responseSuccess = true;
					$state.go('list');
				} else {
					$scope.errors = response.errors;
				}
			});
		}

	}]);