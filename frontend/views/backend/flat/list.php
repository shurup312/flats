<table class="table table-striped">
	<thead>
		<tr>
			<th  data-ng-repeat="field in fields"  data-ng-click="setOrderBy(field.name)">{{field.label}}</th>
		</tr>
	</thead>
	<tbody>
		<tr data-ng-repeat="item in data | orderBy:orderProp">
			<td data-ng-repeat="field in fields">{{item[field.name]}}</td>
		</tr>
	</tbody>
</table>
