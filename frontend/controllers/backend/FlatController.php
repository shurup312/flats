<?php
namespace frontend\controllers\backend;

use frontend\assets\FlatAsset;
use common\controllers\BackendController;
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
		return $this->renderPartial($this->action->id);
	}
}
