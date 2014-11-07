<?php
namespace common\controllers;

use Yii;
use yii\helpers\Json;

/**
 * Родительский контроллер для всех контроллеров приложения
 */
class Controller extends \yii\web\Controller
{
	/**
	 * @inheritdoc
	 */
	public function init()
	{
		if (strpos(Yii::$app->request->contentType, 'application/json') !== false) {
			Yii::$app->request->setBodyParams(Json::decode(trim(file_get_contents('php://input')), true));
		}
		parent::init();
	}
}
