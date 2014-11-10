<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property string $path
 *
 * @property FlatsImages[] $flatsImages
 * @property Flats[] $flats
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path'], 'required'],
            [['path'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlatsImages()
    {
        return $this->hasMany(FlatImage::className(), ['image_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlats()
    {
        return $this->hasMany(Flat::className(), ['id' => 'flat_id'])->viaTable('flats_images', ['image_id' => 'id']);
    }
}
