<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Квартиры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-flat" data-ng-app="app">
	<h1><?= Html::encode($this->title) ?></h1>
	<div data-ui-view></div>
</div>
