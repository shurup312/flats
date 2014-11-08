<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "flats".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $type_id
 * @property string $comment
 * @property string $user_agent
 * @property string $ip
 * @property string $date_created
 * @property string $date_updated
 * @property integer $rooms_total
 * @property integer $rooms_offer
 * @property integer $rooms_type
 * @property integer $is_called
 * @property integer $far_minutes
 * @property integer $far_type
 * @property integer $type
 * @property double $area_total
 * @property double $area_live
 * @property double $area_kitchen
 * @property double $cost
 * @property double $cost_market
 * @property integer $currency_id
 * @property integer $is_insurance
 * @property integer $floor_num
 * @property integer $floor_total
 * @property integer $is_furnitured_rooms
 * @property integer $is_furnitures_kitchen
 * @property integer $is_tv
 * @property integer $is_refrigerator
 * @property integer $is_washer
 * @property integer $is_phone
 * @property integer $is_balcony
 * @property integer $is_animal
 * @property integer $is_child
 * @property integer $is_on_main
 * @property integer $is_liquidity
 * @property string $description
 *
 * @property FlatMetro[] $flatMetros
 * @property Metro[] $metros
 * @property Users $user
 */
class Flats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'comment', 'user_agent', 'description'], 'required'],
            [['user_id', 'type_id', 'rooms_total', 'rooms_offer', 'rooms_type', 'is_called', 'far_minutes', 'far_type', 'type', 'currency_id', 'is_insurance', 'floor_num', 'floor_total', 'is_furnitured_rooms', 'is_furnitures_kitchen', 'is_tv', 'is_refrigerator', 'is_washer', 'is_phone', 'is_balcony', 'is_animal', 'is_child', 'is_on_main', 'is_liquidity'], 'integer'],
            [['comment', 'description'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
            [['area_total', 'area_live', 'area_kitchen', 'cost', 'cost_market'], 'number'],
            [['user_agent'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'type_id' => 'Type ID',
            'comment' => 'Comment',
            'user_agent' => 'User Agent',
            'ip' => 'Ip',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'rooms_total' => 'Rooms Total',
            'rooms_offer' => 'Rooms Offer',
            'rooms_type' => 'Rooms Type',
            'is_called' => 'Is Called',
            'far_minutes' => 'Far Minutes',
            'far_type' => 'Far Type',
            'type' => 'Type',
            'area_total' => 'Area Total',
            'area_live' => 'Area Live',
            'area_kitchen' => 'Area Kitchen',
            'cost' => 'Cost',
            'cost_market' => 'Cost Market',
            'currency_id' => 'Currency ID',
            'is_insurance' => 'Is Insurance',
            'floor_num' => 'Floor Num',
            'floor_total' => 'Floor Total',
            'is_furnitured_rooms' => 'Is Furnitured Rooms',
            'is_furnitures_kitchen' => 'Is Furnitures Kitchen',
            'is_tv' => 'Is Tv',
            'is_refrigerator' => 'Is Refrigerator',
            'is_washer' => 'Is Washer',
            'is_phone' => 'Is Phone',
            'is_balcony' => 'Is Balcony',
            'is_animal' => 'Is Animal',
            'is_child' => 'Is Child',
            'is_on_main' => 'Is On Main',
            'is_liquidity' => 'Is Liquidity',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlatMetros()
    {
        return $this->hasMany(FlatMetro::className(), ['flat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetros()
    {
        return $this->hasMany(Metro::className(), ['id' => 'metro_id'])->viaTable('flat_metro', ['flat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
