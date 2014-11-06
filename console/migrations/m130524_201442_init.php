<?php
use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration {

	public function up () {
		$this->execute('
		CREATE TABLE IF NOT EXISTS `city` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `comments` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `user_id` int(11) NOT NULL,
		  `type_id` int(11) NOT NULL DEFAULT "0" COMMENT "0 - к квартире",
		  `comment` text,
		  `user_agent` varchar(256) DEFAULT NULL,
		  `ip` varchar(16) DEFAULT NULL,
		  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `flats` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `date_created` timestamp NULL DEFAULT NULL,
		  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  `rooms_total` int(11) NOT NULL DEFAULT "0" COMMENT "0 - комната, 1 и далее - количество комнат в квартире",
		  `rooms_offer` int(11) NOT NULL DEFAULT "0",
		  `rooms_type` int(11) NOT NULL DEFAULT "0" COMMENT "0 - смежные, 1 - раздельные",
		  `is_called` tinyint(1) NOT NULL DEFAULT "0",
		  `far_minutes` tinyint(1) NOT NULL DEFAULT "0",
		  `far_type` tinyint(1) NOT NULL DEFAULT "1" COMMENT "1 - пешком, 2 - на транспорте",
		  `type` tinyint(1) NOT NULL DEFAULT "1" COMMENT "1 - квартира, 2 - дом",
		  `area_total` float(5,2) NOT NULL DEFAULT "0.00",
		  `area_live` float(5,2) NOT NULL DEFAULT "0.00",
		  `area_kitchen` float(5,2) NOT NULL DEFAULT "0.00",
		  `cost` float(5,2) NOT NULL DEFAULT "0.00",
		  `cost_market` float(5,2) NOT NULL DEFAULT "0.00",
		  `currency_id` int(11) NOT NULL DEFAULT "1",
		  `is_insurance` tinyint(4) NOT NULL DEFAULT "0" COMMENT "Вносит ли человек страховой депозит",
		  `floor_num` tinyint(4) DEFAULT NULL,
		  `floor_total` tinyint(4) DEFAULT NULL,
		  `is_furnitured_rooms` tinyint(4) DEFAULT NULL,
		  `is_furnitures_kitchen` tinyint(4) DEFAULT NULL,
		  `is_tv` tinyint(4) DEFAULT NULL,
		  `is_refrigerator` tinyint(4) DEFAULT NULL,
		  `is_washer` tinyint(4) DEFAULT NULL,
		  `is_phone` tinyint(4) DEFAULT NULL,
		  `is_balcony` tinyint(4) DEFAULT NULL,
		  `is_animal` tinyint(4) DEFAULT NULL,
		  `is_child` tinyint(4) DEFAULT NULL,
		  `is_on_main` tinyint(4) DEFAULT NULL,
		  `is_liquidity` tinyint(4) DEFAULT NULL,
		  `description` text,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `flat_metro` (
		  `flat_id` int(11) NOT NULL DEFAULT "0",
		  `metro_id` int(11) NOT NULL DEFAULT "0",
		  PRIMARY KEY (`flat_id`,`metro_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `images` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `parent_id` int(11) NOT NULL DEFAULT "0",
		  `type_id` int(11) NOT NULL DEFAULT "0" COMMENT "1 - квартиры, 2 - пользователи, 3 - собственники",
		  `path` varchar(128) NOT NULL DEFAULT "0",
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `metro` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` int(11) NOT NULL DEFAULT "0",
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `owners` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `first_name` int(11) NOT NULL DEFAULT "0",
		  `last_name` int(11) NOT NULL DEFAULT "0",
		  `middle_name` int(11) NOT NULL DEFAULT "0",
		  `age` int(11) NOT NULL DEFAULT "0",
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `phones` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `parent_id` int(11) NOT NULL DEFAULT "0",
		  `type_id` int(11) NOT NULL DEFAULT "0" COMMENT "1 - квартиры, 2 - пользователи, 3 - собственники",
		  `phone` varchar(32) NOT NULL DEFAULT "0",
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `streets` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `city_id` int(11) DEFAULT NULL,
		  `name` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `users` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `first_name` varchar(64) NOT NULL DEFAULT "0" COMMENT "Имя",
		  `last_name` varchar(64) NOT NULL DEFAULT "0" COMMENT "Фамилия",
		  `middle_name` varchar(64) NOT NULL DEFAULT "0" COMMENT "Отчество",
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;');
	}

	public function down () {

	}
}
