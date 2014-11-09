<?php
use yii\db\Schema;
use yii\db\Migration;

class m141109_153833_AlterTable_Flats extends Migration {

	public function safeUp () {
		$this->renameColumn('{{%flats}}', 'type_id', 'type_offer');
		$this->renameColumn('{{%flats}}', 'type', 'type_property');
		$this->dropColumn('{{%flats}}', 'user_agent');
		$this->dropColumn('{{%flats}}', 'ip');
	}

	public function safeDown () {
		$this->renameColumn('{{%flats}}', 'type_property', 'type');
		$this->renameColumn('{{%flats}}', 'type_offer', 'type_id');
		$this->addColumn('{{%flats}}', 'ip', Schema::TYPE_STRING);
		$this->addColumn('{{%flats}}', 'user_agent', Schema::TYPE_STRING);
	}
}
