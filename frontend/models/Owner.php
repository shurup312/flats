<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "owners".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property integer $age
 *
 * @property Flats[] $flats
 */
class Owner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'owners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['first_name', 'middle_name', 'last_name'], 'required'],
            [['age'], 'integer'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'age' => 'Age',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlats()
    {
        return $this->hasMany(Flats::className(), ['owner_id' => 'id']);
    }
}
