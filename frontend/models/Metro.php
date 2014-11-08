<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "metro".
 *
 * @property integer $id
 * @property string $name
 *
 * @property FlatMetro[] $flatMetros
 * @property Flats[] $flats
 */
class Metro extends \yii\db\ActiveRecord
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
    public function getFlatMetros()
    {
        return $this->hasMany(FlatMetro::className(), ['metro_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlats()
    {
        return $this->hasMany(Flats::className(), ['id' => 'flat_id'])->viaTable('flat_metro', ['metro_id' => 'id']);
    }
}
