directives
	.directive('uploader', function() {
		return {
			restrict: 'E',
			template: '<div class="form-group">' +
				'<input type="file" multiple="multiple" style="display:none">' +
				'<button type="button" class="btn btn-success">+ Добавить картинку</button><br><br>' +
				'<img data-ng-repeat="file in files" src="{{file}}" alt="" height="120">' +
			'<div>',
			scope: {
				callback: '='
			},
			link: function($scope, elem, $attrs) {
				var file = elem.find('input');
				var button = elem.find('button');

				$scope.files = [];
				$scope.callback($scope.files);

				file.bind('change', function(evt) {
					for (var i = 0, file; file = evt.target.files[i]; i++){
						if (!file.type.match('image.*')){
							continue;
						}
						var readerUrl = new FileReader();
						readerUrl.onload = (function(theFile){
							var mimeType = theFile.type;
							return function(e){
								var binary = e.target.result;
								$scope.$apply(function() {
									$scope.files.push('data:'+ mimeType +';base64,' + btoa(binary));
								});
							};
						})(file);
						readerUrl.readAsBinaryString(file);
					}
				});

				button.bind('click', function(){
					angular.element(file)[0].click();
				});
			}
		};
	});