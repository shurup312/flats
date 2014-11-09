<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Добавление объекта';
?>
<div class="backend-flat-create container">

	<h1><?= Html::encode($this->title) ?></h1>

	<form id="company-form" role="form" data-ng-submit="create()" novalidate>

		<!--Adress-->
		<fieldset class="row">
			<legend>Адрес</legend>
			<div class="form-group col-md-3" data-ng-class="{'has-error' : errors.City.city_id}">
				<label>Город</label>
				<select class="form-control" data-ng-model="data.City.id" data-ng-change="setStreetList()">
					<option selected="true" value="">-</option>
					<option data-ng-repeat="city in cities" value="{{city.id}}">{{city.name}}</option>
				</select>
			</div>
			<div class="form-group col-md-3" data-ng-class="{'has-error' : errors.Flat.street_id}">
				<label>Улица</label>
				<select class="form-control" data-ng-model="data.Flat.street_id">
					<option selected="true" value="">-</option>
					<option data-ng-repeat="street in streets | filter:streetFilter" value="{{street.id}}">{{street.name}}</option>
				</select>
			</div>
			<div class="form-group col-md-3" data-ng-class="{'has-error' : errors.Flat.num_house}">
				<label>Дом</label>
				<input type="text" class="form-control" data-ng-model="data.Flat.num_house">
			</div>
			<div class="form-group col-md-3" data-ng-class="{'has-error' : errors.Flat.num_flat}">
				<label>Квартира</label>
				<input type="text" class="form-control" data-ng-model="data.Flat.num_flat">
			</div>
		</fieldset>
		<!--/Adress-->

		<!--Metro-->
		<fieldset class="row">
			<legend>Метро</legend>
			<div class="form-group col-md-4" data-ng-class="{'has-error' : errors.Metro.name}">
				<label>Станция</label>
				<select class="form-control" data-ng-model="data.Flat.metro_id">
					<option selected="true" value="">-</option>
					<option data-ng-repeat="metro in metroList" value="{{metro.id}}">{{metro.name}}</option>
				</select>
			</div>
			<div class="form-group col-md-4" data-ng-class="{'has-error' : errors.Flat.far_minutes}">
				<label>Удаленность [мин.]</label>
				<select class="form-control" data-ng-model="data.Flat.far_minutes">
					<option selected="true" value="0">-</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
				</select>
			</div>
			<div class="form-group col-md-4" data-ng-class="{'has-error' : errors.Flat.far_type}">
				<label>Тип удаленности</label>
				<select class="form-control" data-ng-model="data.Flat.far_type">
					<option selected="true" value="">-</option>
					<option value="1">Пешком</option>
					<option value="2">На транспорте</option>
				</select>
			</div>
		</fieldset>
		<!--/Metro-->

		<!--Object-->
		<fieldset class="row">
			<legend>Объект</legend>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.type_property}">
				<label>Объект</label>
				<select class="form-control" data-ng-model="data.Flat.type_property">
					<option selected="true" value="">-</option>
					<option value="1">Квартира</option>
					<option value="2">Дом</option>
				</select>
			</div>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.rooms_total}">
				<label>Колличество комнат</label>
				<select class="form-control" data-ng-model="data.Flat.rooms_total">
					<option selected="true" value="">-</option>
					<option value="0">Комната</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			</div>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.rooms_type}">
				<label>Тип комнат</label>
				<select class="form-control" data-ng-model="data.Flat.rooms_type">
					<option selected="true" value="">-</option>
					<option value="0">Смежные</option>
					<option value="1">Раздельные</option>
				</select>
			</div>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.area_total}">
				<label>Общая площадь [м<sup>2</sup>]</label>
				<input type="text" class="form-control" data-ng-model="data.Flat.area_total">
			</div>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.area_live}">
				<label>Жилая площадь [м<sup>2</sup>]</label>
				<input type="text" class="form-control" data-ng-model="data.Flat.area_live">
			</div>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.area_kitchen}">
				<label>Площадь кухни [м<sup>2</sup>]</label>
				<input type="text" class="form-control" data-ng-model="data.Flat.area_kitchen">
			</div>
		</fieldset>
		<!--/Object-->

		<!--Owner-->
		<fieldset class="row">
			<legend>Хозяин</legend>
			<div class="form-group col-md-3" data-ng-class="{'has-error' : errors.Owner.first_name}">
				<label>Имя</label>
				<input type="text" class="form-control" data-ng-model="data.Owner.first_name">
			</div>
			<div class="form-group col-md-3" data-ng-class="{'has-error' : errors.Owner.last_name}">
				<label>Фамилия</label>
				<input type="text" class="form-control" data-ng-model="data.Owner.last_name">
			</div>
			<div class="form-group col-md-3" data-ng-class="{'has-error' : errors.Owner.middle_name}">
				<label>Отчество</label>
				<input type="text" class="form-control" data-ng-model="data.Owner.middle_name">
			</div>
			<div class="form-group col-md-3" data-ng-class="{'has-error' : errors.Owner.age}">
				<label>Возраст</label>
				<input type="text" class="form-control" data-ng-model="data.Owner.age">
			</div>
		</fieldset>
		<!--/Owner-->

		<!--Addons-->
		<fieldset class="row">
			<legend>Дополнительно</legend>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.is_furnitured_rooms}">
				<input type="checkbox" data-ng-model="data.Flat.is_furnitured_rooms">
				<label>Мебель в комнатах</label>
			</div>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.is_furnitures_kitchen}">
				<input type="checkbox" data-ng-model="data.Flat.is_furnitures_kitchen">
				<label>Мебель на кухне</label>
			</div>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.is_tv}">
				<input type="checkbox" data-ng-model="data.Flat.is_tv">
				<label>Телевизор</label>
			</div>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.is_refrigerator}">
				<input type="checkbox" data-ng-model="data.Flat.is_refrigerator">
				<label>Холодильник</label>
			</div>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.is_washer}">
				<input type="checkbox" data-ng-model="data.Flat.is_washer">
				<label>Стиральная машина</label>
			</div>
			<div class="form-group col-md-2" data-ng-class="{'has-error' : errors.Flat.is_phone}">
				<input type="checkbox" data-ng-model="data.Flat.is_phone">
				<label>Стиральная машина</label>
			</div>
			<br>
		</fieldset>
		<!--/Addons-->

		<!--Images-->
		<fieldset class="row">
			<legend>Картинки</legend>
			<div class="form-group">
				<input multiple="multiple" id="fileSelector" type="file" onchange="angular.element(this).scope().fileChanged(this)" style="display:none">
				<button onclick="$('#fileSelector').trigger('click')" type="button" class="btn btn-success">+ Добавить картинку</button>
			</div>
		</fieldset>
		<!--/Images-->

		<pre>data:{{data}}</pre>
		<pre>errors:{{errors}}</pre>

		<div class="form-group text-right">
			<button type="submit" class="btn btn-lg btn-primary">Сохранить</button>
		</div>

	</form>
</div>