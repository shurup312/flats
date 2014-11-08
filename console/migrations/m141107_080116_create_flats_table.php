<?php

use yii\db\Schema;
use yii\db\Migration;

class m141107_080116_create_flats_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%flats}}', [
			'id' => Schema::TYPE_PK,
			'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'owner_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'metro_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'street_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'type_id' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT "0" COMMENT "0 - к квартире"',
			'comment' => Schema::TYPE_TEXT . ' NOT NULL',
			'user_agent' => Schema::TYPE_STRING . ' NOT NULL',
			'ip' => Schema::TYPE_STRING . '(16) DEFAULT NULL',
			'date_created' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'date_updated' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
			'rooms_total' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT "0" COMMENT "0 - комната, 1 и далее - количество комнат в квартире"',
			'rooms_offer' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT "0"',
			'rooms_type' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT "0" COMMENT "0 - смежные, 1 - раздельные"',
			'is_called' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT "0"',
			'far_minutes' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT "0"',
			'far_type' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT "1" COMMENT "1 - пешком, 2 - на транспорте"',
			'type' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT "1" COMMENT "1 - квартира, 2 - дом"',
			'area_total' => Schema::TYPE_FLOAT . '(5,2) NOT NULL DEFAULT "0.00"',
			'area_live' => Schema::TYPE_FLOAT . '(5,2) NOT NULL DEFAULT "0.00"',
			'area_kitchen' => Schema::TYPE_FLOAT . '(5,2) NOT NULL DEFAULT "0.00"',
			'cost' => Schema::TYPE_FLOAT . '(5,2) NOT NULL DEFAULT "0.00"',
			'cost_market' => Schema::TYPE_FLOAT . '(5,2) NOT NULL DEFAULT "0.00"',
			'currency_id'  => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT "1"',
			'is_insurance' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT "0" COMMENT "Вносит ли человек страховой депозит"',
			'floor_num' => Schema::TYPE_SMALLINT . ' DEFAULT NULL',
			'floor_total' => Schema::TYPE_SMALLINT . ' DEFAULT NULL',
			'is_furnitured_rooms' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'is_furnitures_kitchen' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'is_tv' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'is_refrigerator' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'is_washer' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'is_phone' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'is_balcony' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'is_animal' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'is_child' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'is_on_main' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'is_liquidity' => Schema::TYPE_BOOLEAN . ' DEFAULT NULL',
			'description' => Schema::TYPE_TEXT . ' NOT NULL',
		], $tableOptions);

		$this->addForeignKey('FK_flats_users', '{{%flats}}', 'user_id', '{{%users}}', 'id');
	}

	public function down()
	{
		$this->dropTable('{{%flats}}');
	}
}
