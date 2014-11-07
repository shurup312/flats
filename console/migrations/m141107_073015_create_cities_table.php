<?php

use yii\db\Schema;
use yii\db\Migration;

class m141107_073015_create_cities_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%cities}}', [
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING . '(64) NOT NULL',
		], $tableOptions);
	}

	public function down()
	{
		$this->dropTable('{{%cities}}');
	}
}
