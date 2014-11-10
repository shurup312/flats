<?php

namespace frontend\models;

use common\models\ActiveRecord;
use common\models\User;
use Yii;

/**
 * This is the model class for table "flats".
 *
 * @property integer             $id
 * @property integer             $user_id
 * @property integer             $owner_id
 * @property integer             $metro_id
 * @property integer             $street_id
 * @property string              $num_house
 * @property integer             $num_flat
 * @property integer             $type_offer
 * @property string              $comment
 * @property string              $date_created
 * @property string              $date_updated
 * @property integer             $rooms_total
 * @property integer             $rooms_offer
 * @property integer             $rooms_type
 * @property integer             $is_called
 * @property integer             $far_minutes
 * @property integer             $far_type
 * @property integer             $type_property
 * @property double              $area_total
 * @property double              $area_live
 * @property double              $area_kitchen
 * @property double              $cost
 * @property double              $cost_market
 * @property integer             $currency_id
 * @property integer             $is_insurance
 * @property integer             $floor_num
 * @property integer             $floor_total
 * @property integer             $is_furnitured_rooms
 * @property integer             $is_furnitures_kitchen
 * @property integer             $is_tv
 * @property integer             $is_refrigerator
 * @property integer             $is_washer
 * @property integer             $is_phone
 * @property integer             $is_balcony
 * @property integer             $is_animal
 * @property integer             $is_child
 * @property integer             $is_on_main
 * @property integer             $is_liquidity
 * @property string              $description
 *
 * @property Street              $street
 * @property Metro               $metro
 * @property Owner               $owner
 * @property \common\models\User $user
 * @property FlatImage[]         $flatsImages
 * @property Image[]             $images
 * @property FlatPhone[]         $flatsPhones
 * @property Phone[]             $phones
 */
class Flat extends ActiveRecord {

	const TYPE_OFFER_RENT     = 0;
	const TYPE_OFFER_SALE     = 1;
	const ROOM_TYPE_ADJOINING = 0;
	const ROOM_TYPE_SEPARATE  = 1;
	const FAR_TYPE_WALK       = 1;
	const FAR_TYPE_ON_CAR     = 2;
	const TYPE_PROPERTY_FLAT  = 0;
	const TYPE_PROPERTY_HOUSE = 1;
	const CURRENCY_RUR        = 0;
	const CURRENCY_USD        = 1;
	const CURRENCY_EUR        = 2;

	public static $typeOffer = [
		self::TYPE_OFFER_RENT => 'Аренда',
		self::TYPE_OFFER_SALE => 'Продажа',
	];
	public static $roomType = [
		self::ROOM_TYPE_ADJOINING => 'Смежные',
		self::ROOM_TYPE_SEPARATE => 'Раздельные',
	];
	public static $farType = [
		self::FAR_TYPE_ON_CAR => 'Пешком',
		self::FAR_TYPE_WALK => 'На транспорте',
	];
	public static $typeProperty = [
		self::TYPE_PROPERTY_FLAT => 'Квартира',
		self::TYPE_PROPERTY_HOUSE => 'Дом',
	];
	public static $currency = [
		self::CURRENCY_EUR => 'евро',
		self::CURRENCY_RUR => 'руб',
		self::CURRENCY_USD => '$',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName () {
		return 'flats';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
    {
        return [
            [['street_id', 'num_house', 'num_flat'], 'required'],
            [['user_id', 'owner_id', 'metro_id', 'street_id', 'num_flat', 'type_offer', 'rooms_total', 'rooms_offer', 'rooms_type', 'is_called', 'far_minutes', 'far_type', 'currency_id', 'is_insurance', 'floor_num', 'floor_total', 'is_furnitured_rooms', 'is_furnitures_kitchen', 'is_tv', 'is_refrigerator', 'is_washer', 'is_phone', 'is_balcony', 'is_animal', 'is_child', 'is_on_main', 'is_liquidity'], 'integer'],
            [['comment', 'description'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
            [['area_total', 'area_live', 'area_kitchen', 'cost', 'cost_market'], 'number'],
            [['num_house'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
		return [
			'id'                    => 'ID',
			'user_id'               => 'ID пользователя',
			'owner_id'              => 'ID родителя',
			'metro_id'              => 'ID метро',
			'street_id'             => 'ID улицы',
			'num_house'             => 'Номер дома',
			'num_flat'              => 'Номер квартиры',
			'type_offer'            => 'Тип предолжения',
			'comment'               => 'Комментарий',
			'date_created'          => 'Дата создания',
			'date_updated'          => 'Дата обновления',
			'rooms_total'           => 'Всего комнат',
			'rooms_offer'           => 'Предлагается комнат',
			'rooms_type'            => 'Тип комнат',
			'is_called'             => 'Дозвонились',
			'far_minutes'           => 'Удаленность от метро в минутах',
			'far_type'              => 'Тип удаленности',
			'type_property'         => 'Тип недвижимости',
			'area_total'            => 'Площадь всего',
			'area_live'             => 'Жилая площадь',
			'area_kitchen'          => 'Площадь кухни',
			'cost'                  => 'Стоимость',
			'cost_market'           => 'Рыночная стоимость',
			'currency_id'           => 'Валюта',
			'is_insurance'          => 'Страховой взнос',
			'floor_num'             => 'Этаж',
			'floor_total'           => 'Этажей всего',
			'is_furnitured_rooms'   => 'Мебелированные комнаты',
			'is_furnitures_kitchen' => 'Мебелированная кухня',
			'is_tv'                 => 'ТВ',
			'is_refrigerator'       => 'Холодильник',
			'is_washer'             => 'Стиральная машина',
			'is_phone'              => 'Телефон',
			'is_balcony'            => 'Балкон',
			'is_animal'             => 'С животными',
			'is_child'              => 'С детьми',
			'is_on_main'            => 'Показывать на главной',
			'is_liquidity'          => 'Ликвидная',
			'description'           => 'Описание',
		];
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStreet () {
		return $this->hasOne(Street::className(), ['id' => 'street_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getMetro () {
		return $this->hasOne(Metro::className(), ['id' => 'metro_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOwner () {
		return $this->hasOne(Owner::className(), ['id' => 'owner_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUser () {
		return $this->hasOne(User::className(), ['id' => 'user_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFlatsImages () {
		return $this->hasMany(FlatImage::className(), ['flat_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getImages () {
		return $this->hasMany(Image::className(), ['id' => 'image_id'])->viaTable('flats_images', ['flat_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFlatsPhones () {
		return $this->hasMany(FlatPhone::className(), ['flat_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPhones () {
		return $this->hasMany(Phone::className(), ['id' => 'phone_id'])->viaTable('flats_phones', ['flat_id' => 'id']);
	}

	public function beforeSave($insert)
	{
		$this->user_id = Yii::$app->user->id;
		if (parent::beforeSave($insert)) {
			if ($this->owner === null || !$this->owner->save(false)) {
				return false;
			}
			$this->owner_id = $this->owner->id;
			return true;
		} else {
			return false;
		}
	}

	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);

		if ($this->images !== null) {
			foreach ($this->images as $image) {
				if ($image->save(false)) {
					$this->link('images', $image);
				}
			}
		}
	}
}
