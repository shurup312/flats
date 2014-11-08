<?php

use yii\db\Schema;
use yii\db\Migration;

class m141108_182219_create_flats_images_table extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%flats_images}}', [
			'flat_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'image_id' => Schema::TYPE_INTEGER . ' NOT NULL',
		], $tableOptions);
		$this->addPrimaryKey('PK_flats_images', '{{%flats_images}}', ['flat_id', 'image_id']);
		$this->addForeignKey('FK_flats_images_flats', '{{%flats_images}}', 'flat_id', '{{%flats}}', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('FK_flats_images_images', '{{%flats_images}}', 'image_id', '{{%images}}', 'id', 'CASCADE', 'CASCADE');
	}
	public function down()
	{
		$this->dropForeignKey('FK_flats_images_flats', '{{%flats_images}}');
		$this->dropForeignKey('FK_flats_images_images', '{{%flats_images}}');
		$this->dropTable('{{%flats_images}}');
	}
}
