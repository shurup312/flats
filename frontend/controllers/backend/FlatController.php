<?php
namespace frontend\controllers\backend;

use frontend\models\Flat;
use frontend\assets\FlatAsset;
use common\controllers\BackendController;
use Yii;
use yii\web\Response;

/**
 *  Flat controller
 */
class FlatController extends BackendController
{
	public function actionIndex()
	{
		FlatAsset::register($this->view);
		return $this->render($this->action->id);
	}

	public function actionList()
	{
		if (!Yii::$app->request->isPost) {
			return $this->renderPartial($this->action->id);
		}
		Yii::$app->response->format = Response::FORMAT_JSON;
		$model = new Flat();
		return [
			'data' => $model->find()->asArray()->all(),
			'fields' => $model->labels()
		];
	}

	public function actionCreate()
	{
		if (!Yii::$app->request->isPost) {
			return $this->renderPartial($this->action->id);
		}
		$model = new Flat();
		$model->load(Yii::$app->request->getBodyParams());
		$model->user_id = Yii::$app->user->id;
		Yii::$app->response->format = Response::FORMAT_JSON;
		if (!$model->save()) {
			return [
				'hasErrors' => true,
				'errors' => $model->getErrors(),
			];
		}

		return [
			'hasErrors' => false,
		];
	}
}
