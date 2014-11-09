/**
 * Flat controllers
 **/
controllers
	.controller('FlatController', ['$scope', function ($scope) {
		$scope.navActive = 'all';
	}])
	.controller('FlatListController', ['$scope', '$http', '$state', '$stateParams', 'Flat', function ($scope, $http, $state, $stateParams, Flat) {
		$scope.$parent.navActive = 'all';

		$scope.orderProp = 'id';
		$scope.setOrderBy = function(field) {
			$scope.orderProp = field;
		}

		var flats = Flat.getList();
		$scope.data = flats.data;
		$scope.fields = flats.fields;
	}])
	.controller('FlatCreateController', ['$scope', '$http', '$state', '$stateParams', 'City', function ($scope, $http, $state, $stateParams, City) {

		$scope.$parent.navActive = 'create';

		$scope.cities = City.getList().data;

		console.log($scope.cities);

		$scope.data = {
			Flat: {},
			City: {}
		};

		$scope.errors = {
			Flat: {}
		};

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