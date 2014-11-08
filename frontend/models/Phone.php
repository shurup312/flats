<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "phones".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $type_id
 * @property string $phone
 *
 * @property FlatsPhones[] $flatsPhones
 * @property Flats[] $flats
 */
class Phone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'type_id'], 'integer'],
            [['phone'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'type_id' => 'Type ID',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlatsPhones()
    {
        return $this->hasMany(FlatsPhones::className(), ['phone_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlats()
    {
        return $this->hasMany(Flats::className(), ['id' => 'flat_id'])->viaTable('flats_phones', ['phone_id' => 'id']);
    }
}
