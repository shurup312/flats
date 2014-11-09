<?php

namespace frontend\models;

use common\models\ActiveRecord;
use Yii;

/**
 * This is the model class for table "metro".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Flats[] $flats
 */
class Metro extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'metro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlats()
    {
        return $this->hasMany(Flats::className(), ['metro_id' => 'id']);
    }
}
