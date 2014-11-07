<?php

use yii\db\Schema;
use yii\db\Migration;

class m141107_113225_create_owners_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%owners}}', [
			'id' => Schema::TYPE_PK,
			'first_name' => Schema::TYPE_STRING . '(64) NOT NULL DEFAULT "0" COMMENT "Имя"',
			'middle_name' => Schema::TYPE_STRING . '(64) NOT NULL DEFAULT "0" COMMENT "Отчество"',
			'last_name' => Schema::TYPE_STRING . '(64) NOT NULL DEFAULT "0" COMMENT "Фамилия"',
			'age' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT "0"',
		], $tableOptions);
	}

	public function down()
	{
		$this->dropTable('{{%owners}}');
	}
}
