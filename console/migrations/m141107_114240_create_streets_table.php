<?php

use yii\db\Schema;
use yii\db\Migration;

class m141107_114240_create_streets_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%streets}}', [
			'id' => Schema::TYPE_PK,
			'city_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'name' => Schema::TYPE_STRING . ' NOT NULL',
		], $tableOptions);

		$this->addForeignKey('FK_streets_cities', '{{%streets}}', 'city_id', '{{%cities}}', 'id');
		$this->addForeignKey('FK_flats_streets', '{{%flats}}', 'street_id', '{{%streets}}', 'id');
	}

	public function down()
	{
		$this->dropTable('{{%streets}}');
	}
}
