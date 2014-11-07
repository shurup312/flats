<?php

use yii\db\Schema;
use yii\db\Migration;

class m141107_061144_create_users_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%users}}', [
			'id' => Schema::TYPE_PK,
			'username' => Schema::TYPE_STRING . ' NOT NULL',
			'email' => Schema::TYPE_STRING . ' NOT NULL',
			'role' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
			'first_name' => Schema::TYPE_STRING . '(64) NOT NULL DEFAULT "0" COMMENT "Имя"',
			'middle_name' => Schema::TYPE_STRING . '(64) NOT NULL DEFAULT "0" COMMENT "Отчество"',
			'last_name' => Schema::TYPE_STRING . '(64) NOT NULL DEFAULT "0" COMMENT "Фамилия"',
			'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
			'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
			'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
			'password_reset_token' => Schema::TYPE_STRING,
			'date_created' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'date_updated' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
		], $tableOptions);

		$this->_createUser();
	}

	private function _createUser()
	{
		$this->insert('users', [
			'username' => 'admin',
			'email' => 'admin@flats.com',
			'role' => '0',
			'first_name' => 'Admin',
			'middle_name' => 'Admin',
			'last_name' => 'Admin',
			'status' => '0',
			'auth_key' => Yii::$app->security->generateRandomString(),
			'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
		]);
	}

	public function down()
	{
		$this->dropTable('{{%users}}');
	}
}
