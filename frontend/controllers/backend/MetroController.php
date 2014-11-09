<?php
namespace frontend\controllers\backend;

use common\controllers\BackendController;

use frontend\models\Metro;
use yii\web\Response;
use Yii;

/**
 *  Metro controller
 */
class MetroController extends BackendController
{
	public function actionList()
	{
		if (!Yii::$app->request->isPost) {
			return 'Создай вьюху и раскоменть'; //$this->renderPartial($this->action->id);
		}
		Yii::$app->response->format = Response::FORMAT_JSON;
		$model = new Metro();

		return [
			'data' => $model->find()->asArray()->all(),
			'fields' => $model->labels()
		];
	}
}
