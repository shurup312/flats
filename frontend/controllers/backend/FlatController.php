<?php
namespace frontend\controllers\backend;

use frontend\models\Flat;
use frontend\assets\FlatAsset;
use common\controllers\BackendController;
use frontend\models\Owner;
use frontend\models\searchList\backend\flat\ListSearchList;
use yii\web\Response;
use Yii;

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
		$params = array();
		$sl = new ListSearchList();
		$sl->setParams($params);
		return $sl->getResults();
	}

	public function actionCreate()
	{
		if (!Yii::$app->request->isPost) {
			return $this->renderPartial($this->action->id);
		}

		Yii::$app->response->format = Response::FORMAT_JSON;

		$model = new Flat();
		$model->load(Yii::$app->request->getBodyParams());
		$model->user_id = Yii::$app->user->id;

		$owner = new Owner();
		$owner->load(Yii::$app->request->getBodyParams());

		if (!$owner->save()) {
			$model->validate();
			return [
				'hasErrors' => true,
				'errors' => [
					$model->formName() => $model->errors,
					$owner->formName() => $owner->errors
				]
			];
		}

		$model->owner_id = $owner->id;

		if (!$model->save()) {
			return [
				'hasErrors' => true,
				'errors' => [
					$model->formName() => $model->errors
				]
			];
		}

		return [
			'hasErrors' => false,
		];
	}
}
