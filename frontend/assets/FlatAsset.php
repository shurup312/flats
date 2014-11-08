<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class FlatAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [

	];
	public $js = [
		'js/ng-app/flat/app.js',
		'js/ng-app/flat/controllers.js',
	];
	public $depends = [
		'frontend\assets\AppAsset',
		'frontend\assets\AngularAsset',
	];
}
