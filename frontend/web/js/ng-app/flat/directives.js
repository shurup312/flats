directives
	.directive('uploader', function() {
		return {
			restrict: 'E',
			template: '<div>filename: {{ fileName }}</div><input type="file">',
			scope: {},
			link: function(scope, el, attrs) {
				var file = el.find('input');
				scope.fileName = '?';
				file.bind('change', function(ev) {
					var files = event.target.files;
					scope.fileName = files[0].name;
					scope.$apply(function() {
						scope.fileName = files[0].name;
					});
					console.log(files, ev);
				});
			}
		};
	});