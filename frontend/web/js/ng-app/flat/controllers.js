/**
 * Flat controllers
 **/
controllers
	.controller('FlatController', ['$scope', function ($scope) {
		$scope.navActive = 'all';
	}])
	.controller('FlatListController', ['$scope', '$state', '$stateParams', 'Flat', function ($scope, $state, $stateParams, Flat) {
		$scope.$parent.navActive = 'all';

		$scope.orderProp = 'id';
		$scope.setOrderBy = function(field) {
			$scope.orderProp = field;
		}

		Flat.getList()
			.success(function (response) {
				$scope.data = response.data;
				$scope.fields = response.fields;
			});
	}])
	.controller('FlatCreateController', ['$scope', '$state', '$stateParams', 'Flat', 'City', 'Street', 'Metro', function ($scope, $state, $stateParams, Flat, City, Street, Metro) {

		$scope.$parent.navActive = 'create';

		City.getList()
			.success(function (response) {
				$scope.cities = response.data;
			});

		Street.getList()
			.success(function (response) {
				$scope.streets = response.data;
			});

		Metro.getList()
			.success(function (response) {
				$scope.metroList = response.data;
			});

		$scope.setStreetList = function () {
			$scope.streetFilter = {city_id: $scope.data.City.id}
		}

		$scope.create = function () {
			Flat.create($scope.data)
				.success(function (response) {
					$scope.errors = {};
					if (!response.hasErrors) {
						$state.go('list');
					} else {
						$scope.errors = response.errors;
					}
				});
		}

	}]);