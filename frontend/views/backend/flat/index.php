<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Квартиры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-flat" data-ng-app="app" data-ng-controller="FlatController">

	<ul class="nav nav-pills" role="tablist">
		<li role="presentation" data-ng-class="{active: navActive == 'all'}" ui-sref="list">
			<a href="#">Все объекты</a>
		</li>
		<li role="presentation" data-ng-class="{active: navActive == 'rent'}">
			<a ui-sref="list">Аренда</a>
		</li>
		<li role="presentation" data-ng-class="{active: navActive == 'sell'}">
			<a ui-sref="list">Продажа</a>
		</li>
		<li role="presentation" data-ng-class="{active: navActive == 'create'}">
			<a ui-sref="create">Добавить</a>
		</li>
	</ul>

	<hr>

	<div data-ui-view></div>

</div>
