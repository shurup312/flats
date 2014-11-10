<?php
namespace frontend\controllers\backend;

use frontend\models\Flat;
use frontend\assets\FlatAsset;
use common\controllers\BackendController;
use frontend\models\Image;
use frontend\models\Owner;
use frontend\models\searchList\backend\flat\ListSearchList;
use yii\helpers\FileHelper;
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
		$bodyParams = Yii::$app->request->getBodyParams();

		$model = new Flat();
		$model->load($bodyParams);

		$owner = new Owner();
		$owner->load($bodyParams);

		if (!$model->validate() | !$owner->validate()) {
			return [
				'hasErrors' => true,
				'errors' => [
					$model->formName() => $model->errors,
					$owner->formName() => $owner->errors
				]
			];
		}

		$images = [];
		if (is_array($bodyParams['Image'])) {
			foreach ($bodyParams['Image'] as $src) {
				$fileBody = base64_decode(substr($src, strpos($src, ',')));
				$fileExtensions = FileHelper::getExtensionsByMimeType(substr($src, $d = strpos($src, ':') + 1, strpos($src, ';') - $d));
				$fileName = md5($fileBody) . '.' . $fileExtensions[count($fileExtensions)-1];
				file_put_contents('content/' . $fileName, $fileBody);
				$image = new Image();
				$image->path = $fileName;
				$images[] = $image;
			}
		}

		$model->populateRelation('owner', $owner);
		$model->populateRelation('images', $images);
		$model->save(false);

		return [
			'hasErrors' => false,
		];
	}
}
