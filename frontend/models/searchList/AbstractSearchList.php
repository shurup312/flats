<?php
/**
 * User: Oleg Prihodko
 * Mail: shuru@e-mind.ru
 * Date: 09.11.14
 * Time: 21:31
 */

namespace frontend\models\searchList;

abstract class AbstractSearchList {
	protected $results;
	protected $params;
	protected $totalCount;

	public function __construct () {

	}

	/**
	 * Процесс поиска и заполнение его результатами аттрибута results
	 */
	abstract protected function loadResults();

	/**
	 * Процесс выяснения общего количества результатов поиска без учета лимитов и запись числа в аттрибут total_count
	 */
	abstract protected function loadTotalCount();

	/**
	 * Установка параметров поиска
	 * @param array $params
	 * @param bool  $overwrite
	 * @return $this
	 */
	public function setParams(array $params, $overwrite = true) {
		if ($overwrite) {
			$this->params = $params;
		} else {
			foreach ($params as $key => $value) {
				$this->params[$key] = $value; //todo сделать рекурсивно на случайно вложенных массивов
			}
		}
		return $this;
	}

	/**
	 * @return array
	 */
	public function getResults() {
		if ($this->results === null) {
			$this->loadResults();
		}
		return $this->results;
	}

	/**
	 * Получение общего количества результатов поиска без учета лимитов
	 * @return int
	 */
	public function getTotalCount() {
		if ($this->totalCount === null) {
			$this->loadTotalCount();
		}
		return $this->totalCount;
	}
}
