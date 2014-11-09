<?php
/**
 * User: Oleg Prihodko
 * Mail: shuru@e-mind.ru
 * Date: 09.11.14
 * Time: 21:37
 */
namespace frontend\models\searchList\backend\flat;

use frontend\models\Flat;
use frontend\models\Metro;
use frontend\models\Owner;
use frontend\models\searchList\AbstractSearchList;
use frontend\models\Street;

class ListSearchList extends AbstractSearchList {

	private $models;
	/**
	 * TODO: прикрутить чтобы какие-то поля исключались из вывода
	 */
	private $excludeColumns = [
		'id',
		'user_id',
	];
	private $boolFields = [
		'is_insurance',
		'is_furnitured_rooms',
		'is_furnitures_kitchen',
		'is_tv',
		'is_refrigerator',
		'is_washer',
		'is_phone',
		'is_balcony',
		'is_animal',
		'is_child',
		'is_on_main',
		'is_liquidity',
	];

	public function __construct () {
		parent::__construct();
	}

	/**
	 * Процесс поиска и заполнение его результатами аттрибута results
	 */
	protected function loadResults () {
		$this->getLabelsForTable();
		$this->getFlatsForTable();
	}

	/**
	 * Процесс выяснения общего количества результатов поиска без учета лимитов и запись числа в аттрибут total_count
	 */
	protected function loadTotalCount () {
		// TODO: Implement loadTotalCount() method.
	}

	/**
	 * @return Flat
	 */
	public function getFlatModel () {
		if (!$this->models['flat']) {
			$this->models['flat'] = new Flat();
		}
		return $this->models['flat'];
	}

	/**
	 * @return Owner
	 */
	public function getOwnerModel () {
		if (!$this->models['owner']) {
			$this->models['owner'] = new Owner();
		}
		return $this->models['owner'];
	}

	/**
	 * @return Street
	 */
	public function getStreetModel () {
		if (!$this->models['street']) {
			$this->models['street'] = new Street();
		}
		return $this->models['street'];
	}

	/**
	 * @return Metro
	 */
	public function getMetroModel () {
		if (!$this->models['metro']) {
			$this->models['metro'] = new Metro();
		}
		return $this->models['metro'];
	}

	private function getLabelsForTable () {
		$this->getDefaultLabelsForTable();
		$this->modifyLabelfForTable();
	}

	private function getDefaultLabelsForTable () {
		$this->results['fieldsLabel'] = $this->getFlatModel()->labels();
	}

	private function modifyLabelfForTable () {
		foreach($this->results['fieldsLabel'] as $key => $item) {
			switch ($item['name']) {
				case 'owner_id':
					$this->results['fieldsLabel'][$key]['label'] = 'ФИО владельца';
					break;
				case 'street_id':
					$this->results['fieldsLabel'][$key]['label'] = 'Улица';
					break;
				case 'metro_id':
					$this->results['fieldsLabel'][$key]['label'] = 'Метро';
					break;
			}
		}
	}

	private function getFlatsForTable () {
		$this->getFlatsList();
		$this->getFlatsOwnersList();
		$this->getFlatsStreetsList();
		$this->getFlatsMetrosList();
		$this->prepareFlatsList();
	}

	private function getFlatsList () {
		$this->results['allFlatsInformation'] = $this->getFlatModel()->find()->asArray()->all();
	}

	private function getFlatsStreetsList () {
		$this->results['tmp']['streets'] = $this->getStreetModel()->find()->indexBy('id')->asArray()->all();
	}

	private function getFlatsMetrosList () {
		$this->results['tmp']['metros'] = $this->getMetroModel()->find()->indexBy('id')->asArray()->all();
	}

	private function getFlatsOwnersList () {
		$this->results['tmp']['owners'] = $this->getOwnerModel()->find()->indexBy('id')->asArray()->all();
	}

	private function prepareFlatsList () {
		foreach($this->results['allFlatsInformation'] as $key => $item) {
			$tmpOwner                                                    = $this->results['tmp']['owners'][$item['owner_id']];
			$this->results['allFlatsInformation'][$key]['owner_id']      = $tmpOwner['first_name'].' '.$tmpOwner['middle_name'].' '.$tmpOwner['last_name'];
			$this->results['allFlatsInformation'][$key]['metro_id']      = $this->results['tmp']['metros'][$item['metro_id']]['name'];
			$this->results['allFlatsInformation'][$key]['street_id']     = $this->results['tmp']['streets'][$item['street_id']]['name'];
			$this->results['allFlatsInformation'][$key]['type_offer']    = Flat::$typeOffer[$this->results['allFlatsInformation'][$key]['type_offer']];
			$this->results['allFlatsInformation'][$key]['room_type']     = Flat::$roomType[$this->results['allFlatsInformation'][$key]['room_type']];
			$this->results['allFlatsInformation'][$key]['far_type']      = Flat::$farType[$this->results['allFlatsInformation'][$key]['far_type']];
			$this->results['allFlatsInformation'][$key]['type_property'] = Flat::$typeProperty[$this->results['allFlatsInformation'][$key]['type_property']];
			$this->results['allFlatsInformation'][$key]['currency_id']   = Flat::$currency[$this->results['allFlatsInformation'][$key]['currency_id']];
			foreach($this->boolFields as $field) {
				$this->results['allFlatsInformation'][$key][$field] = $item[$field]==0
					?'Нет'
					:'Да';
			}
		}
	}
}
