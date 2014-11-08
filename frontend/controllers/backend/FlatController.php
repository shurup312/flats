<?php
namespace frontend\controllers\backend;

use frontend\models\Flats;
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
		if (Yii::$app->request->isPost) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			$model = new Flats();
			return [
				'data' => $model->find()->asArray()->all(),
				'fields' => $model->labels()
			];
		}
		return $this->renderPartial($this->action->id);
	}

	public function actionCreate()
	{
		if (Yii::$app->request->isPost) {
			$model = new Flats();
			$model->setAttributes(Yii::$app->request->getBodyParams());
			$model->user_id = Yii::$app->user->id;
			Yii::$app->response->format = Response::FORMAT_JSON;
			if ($model->save()) {
				return [
					'hasErrors' => false,
				];
			} else {
				return [
					'hasErrors' => true,
					'errors' => $model->getErrors(),
				];
			}
		}

		return $this->renderPartial($this->action->id);
	}
}
