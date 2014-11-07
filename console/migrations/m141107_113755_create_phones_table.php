<?php

use yii\db\Schema;
use yii\db\Migration;

class m141107_113755_create_phones_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%phones}}', [
			'id' => Schema::TYPE_PK,
			'parent_id' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT "0"',
			'type_id' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT "0" COMMENT "1 - квартиры, 2 - пользователи, 3 - собственники"',
			'phone' => Schema::TYPE_STRING . '(32) NOT NULL DEFAULT "0"',
		], $tableOptions);
	}

	public function down()
	{
		$this->dropTable('{{%phones}}');
	}
}
