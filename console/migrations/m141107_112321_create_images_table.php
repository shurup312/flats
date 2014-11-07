<?php

use yii\db\Schema;
use yii\db\Migration;

class m141107_112321_create_images_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%images}}', [
			'id' => Schema::TYPE_PK,
			'parent_id' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT "0"',
			'type_id' => Schema::TYPE_SMALLINT . '  NOT NULL DEFAULT "0" COMMENT "1 - квартиры, 2 - пользователи, 3 - собственники"',
			'path' => Schema::TYPE_STRING . '(128) NOT NULL',
		], $tableOptions);
	}

	public function down()
	{
		$this->dropTable('{{%images}}');
	}
}
