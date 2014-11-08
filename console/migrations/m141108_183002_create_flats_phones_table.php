<?php

use yii\db\Schema;
use yii\db\Migration;

class m141108_183002_create_flats_phones_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%flats_phones}}', [
			'flat_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'phone_id' => Schema::TYPE_INTEGER . ' NOT NULL',
		], $tableOptions);
		$this->addPrimaryKey('PK_flats_phones', '{{%flats_phones}}', ['flat_id', 'phone_id']);
		$this->addForeignKey('FK_flats_phones_flats', '{{%flats_phones}}', 'flat_id', '{{%flats}}', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('FK_flats_phones_phones', '{{%flats_phones}}', 'phone_id', '{{%phones}}', 'id', 'CASCADE', 'CASCADE');
	}
	public function down()
	{
		$this->dropForeignKey('FK_flats_phones_flats', '{{%flats_phones}}');
		$this->dropForeignKey('FK_flats_phones_phones', '{{%flats_phones}}');
		$this->dropTable('{{%flats_phones}}');
	}
}
