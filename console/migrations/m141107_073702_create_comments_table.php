<?php

use yii\db\Schema;
use yii\db\Migration;

class m141107_073702_create_comments_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%comments}}', [
			'id' => Schema::TYPE_PK,
			'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'type_id' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT "0" COMMENT "0 - к квартире"',
			'comment' => Schema::TYPE_TEXT . ' NOT NULL',
			'user_agent' => Schema::TYPE_STRING . ' NOT NULL',
			'ip' => Schema::TYPE_STRING . '(16) DEFAULT NULL',
			'date_created' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'date_updated' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
		], $tableOptions);

		$this->addForeignKey('FK_comments_users', '{{%comments}}', 'user_id', '{{%users}}', 'id');
	}

	public function down()
	{
		$this->dropTable('{{%comments}}');
	}
}
