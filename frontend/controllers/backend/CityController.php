<?php
namespace frontend\controllers\backend;

use common\controllers\BackendController;
use frontend\models\City;
use yii\web\Response;
use Yii;

/**
 *  Flat controller
 */
class CityController extends BackendController
{
	public function actionList()
	{
		if (!Yii::$app->request->isPost) {
			return 'Создай вьюху и раскоменть'; //$this->renderPartial($this->action->id);
		}
		Yii::$app->response->format = Response::FORMAT_JSON;
		$model = new City();

		return [
			'data' => $model->find()->asArray()->all(),
			'fields' => $model->labels()
		];
	}
}
