<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * Angular asset bundle.
 */
class AngularAsset extends AssetBundle
{
	public $sourcePath = '@bower';
	public $js = [
		'angular/angular.min.js',
		'angular-ui-router/release/angular-ui-router.min.js',
	];

	public function registerAssetFiles($view)
	{
		$this->js[] = 'angular-i18n/angular-locale_' . strtolower(Yii::$app->language) . '.js';
		parent::registerAssetFiles($view);
	}
}
