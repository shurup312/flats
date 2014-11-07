<?php

use yii\db\Schema;
use yii\db\Migration;

class m141107_093712_create_flat_metro_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%flat_metro}}', [
			'flat_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'metro_id' => Schema::TYPE_INTEGER . ' NOT NULL',
		], $tableOptions);

		$this->addPrimaryKey('PK_flat_metro', '{{%flat_metro}}', ['flat_id', 'metro_id']);
		$this->addForeignKey('FK_flat_metro_flats', '{{%flat_metro}}', 'flat_id', '{{%flats}}', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('FK_flat_metro_metro', '{{%flat_metro}}', 'metro_id', '{{%metro}}', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		$this->dropTable('{{%flat_metro}}');
	}
}
