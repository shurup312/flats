<?php

use yii\db\Schema;
use yii\db\Migration;

class m141107_093310_create_metro_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%metro}}', [
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING . '(64) NOT NULL',
		], $tableOptions);

		$this->addForeignKey('FK_flats_metro', '{{%flats}}', 'metro_id', '{{%metro}}', 'id');
	}

	public function down()
	{
		$this->dropTable('{{%metro}}');
	}
}
