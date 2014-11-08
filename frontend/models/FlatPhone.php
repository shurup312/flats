<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "flats_phones".
 *
 * @property integer $flat_id
 * @property integer $phone_id
 *
 * @property Phones $phone
 * @property Flats $flat
 */
class FlatPhone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flats_phones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flat_id', 'phone_id'], 'required'],
            [['flat_id', 'phone_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'flat_id' => 'Flat ID',
            'phone_id' => 'Phone ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhone()
    {
        return $this->hasOne(Phones::className(), ['id' => 'phone_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlat()
    {
        return $this->hasOne(Flats::className(), ['id' => 'flat_id']);
    }
}
