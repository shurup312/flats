<?php

namespace common\models;

use Yii;

/**
 * Parent class for project models.
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
	public function labels()
	{
		$result = [];
		foreach ($this->attributeLabels() as $name => $label) {
			$result[] = [
				'name' => $name,
				'label' => $label
			];
		}
		return $result;
	}
}
