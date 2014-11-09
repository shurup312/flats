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
	.controller('FlatCreateController', ['$scope', '$state', '$stateParams', 'Flat', 'City', function ($scope, $state, $stateParams, Flat, City) {

		$scope.$parent.navActive = 'create';

		$scope.data = {
			Flat: {},
			City: {}
		};

		$scope.errors = {
			Flat: {}
		};


		City.getList()
			.success(function (response) {
				$scope.cities = response.data;
			});

		$scope.setStreetList = function () {
			alert();
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