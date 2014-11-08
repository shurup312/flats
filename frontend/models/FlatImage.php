<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "flats_images".
 *
 * @property integer $flat_id
 * @property integer $image_id
 *
 * @property Images $image
 * @property Flats $flat
 */
class FlatImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flats_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flat_id', 'image_id'], 'required'],
            [['flat_id', 'image_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'flat_id' => 'Flat ID',
            'image_id' => 'Image ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Images::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlat()
    {
        return $this->hasOne(Flats::className(), ['id' => 'flat_id']);
    }
}
