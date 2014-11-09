<?php
namespace frontend\controllers\backend;

use common\controllers\BackendController;

use frontend\models\Street;
use yii\web\Response;
use Yii;

/**
 *  Street controller
 */
class StreetController extends BackendController
{
	public function actionList()
	{
		if (!Yii::$app->request->isPost) {
			return 'Создай вьюху и раскоменть'; //$this->renderPartial($this->action->id);
		}
		Yii::$app->response->format = Response::FORMAT_JSON;
		$model = new Street();

		return [
			'data' => $model->find()->asArray()->all(),
			'fields' => $model->labels()
		];
	}
}
