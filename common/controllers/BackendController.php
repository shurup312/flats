<?php
namespace common\controllers;

use Yii;
use common\models\User;
use yii\filters\AccessControl;

/**
 *  Backend controller
 */
class BackendController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public $layout = 'backend';

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@']
					]
				]
			]
		];
	}
}
