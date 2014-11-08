<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Добавление объекта';
?>
<div class="backend-flat-create container">

	<h1><?= Html::encode($this->title) ?></h1>

	<form id="company-form" role="form" data-ng-submit="submit('<?= Url::to('/backend/flat/create')?>')" novalidate>
		<div class="form-group" data-ng-class="{'has-error' : errors.user_agent}">
			<label for="user_agent">Агент</label>
			<input name="user_agent" type="text" class="form-control" ng-model="data.user_agent">
			<div class="help-block" data-ng-show="errors.user_agent" data-ng-bind="errors.user_agent"></div>
		</div>
		<div class="form-group" data-ng-class="{'has-error' : errors.area_total}">
			<label for="area_total">Полная площадь</label>
			<input name="area_total" type="text" class="form-control" ng-model="data.area_total">
			<div class="help-block" data-ng-show="errors.area_total" data-ng-bind="errors.area_total"></div>
		</div>
		<div class="form-group" data-ng-class="{'has-error' : errors.area_live}">
			<label for="area_live">Жилая площадь</label>
			<input name="area_live" type="text" class="form-control" ng-model="data.area_live">
			<div class="help-block" data-ng-show="errors.area_live" data-ng-bind="errors.area_live"></div>
		</div>
		<div class="form-group" data-ng-class="{'has-error' : errors.area_kitchen}">
			<label for="area_kitchen">Площадь кухни</label>
			<input name="area_kitchen" type="text" class="form-control" ng-model="data.area_kitchen">
			<div class="help-block" data-ng-show="errors.area_kitchen" data-ng-bind="errors.area_kitchen"></div>
		</div>
		<pre>data:{{data}}</pre>
		<pre>errors:{{errors}}</pre>
		<button type="submit" class="btn btn-default">Сохранить</button>
	</form>

</div>