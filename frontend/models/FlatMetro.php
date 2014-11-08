<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "flat_metro".
 *
 * @property integer $flat_id
 * @property integer $metro_id
 *
 * @property Metro $metro
 * @property Flats $flat
 */
class FlatMetro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flat_metro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flat_id', 'metro_id'], 'required'],
            [['flat_id', 'metro_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'flat_id' => 'Flat ID',
            'metro_id' => 'Metro ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetro()
    {
        return $this->hasOne(Metro::className(), ['id' => 'metro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlat()
    {
        return $this->hasOne(Flats::className(), ['id' => 'flat_id']);
    }
}
