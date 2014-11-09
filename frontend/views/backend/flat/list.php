<table class="table table-striped">
	<thead>
		<tr>
			<th data-ng-repeat="field in fieldsLabel"  data-ng-click="setOrderBy(field.name)" class="small">{{field.label}}</th>
		</tr>
	</thead>
	<tbody>
		<tr data-ng-repeat="item in allFlatsInformation | orderBy:orderProp">
			<td data-ng-repeat="field in fieldsLabel">{{item[field.name]}}</td>
		</tr>
	</tbody>
</table>
<style type="text/css">
	.verticalText {
		-webkit-transform: rotate(-90deg);
		-moz-transform: rotate(-90deg);
		-o-transform: rotate(-90deg);
		transform: rotate(-90deg);		
	}
</style>

