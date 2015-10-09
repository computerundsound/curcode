<?php
/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 07.12.2014
 * Time: 13:09
 *
 * Created by IntelliJ IDEA
 *
 * Filename: Snippet.php
 */

namespace languages;

use computerundsound\culibrary\db\CuDB;
use computerundsound\culibrary\db\mysqli\CuDBi;

/**
 * Class Language
 *
 * @package languages
 */
class Language {

	protected static $tableNameLanguages = 'languages';
	protected static $fields             = [
		'language_id',
		'name',
		'information',
		'datetime_created',
		'datetime_insert',
	];

	protected $name               = '';
	protected $languageId         = '';
	protected $information        = '';
	protected $dateTimeLastChange = '';
	protected $dateTimeInsert     = '';

	/**
	 * @var CuDB
	 */
	protected $dbiObj;


	/**
	 * @param CuDBi $dbiObj
	 */
	public function __construct(CuDBi $dbiObj) {

		$this->dbiObj = $dbiObj;
	}


	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}


	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}


	/**
	 * @return int
	 */
	public function getLanguageId() {
		return $this->languageId;
	}


	/**
	 * @param int $languageId
	 */
	public function setLanguageId($languageId) {
		$this->languageId = $languageId;
	}


	/**
	 * @return string
	 */
	public function getInformation() {
		return $this->information;
	}


	/**
	 * @param string $information
	 */
	public function setInformation($information) {
		$this->information = $information;
	}


	/**
	 * @return string
	 */
	public function getDateTimeLastChange() {
		return $this->dateTimeLastChange;
	}


	/**
	 * @param string $dateTimeLastChange
	 */
	public function setDateTimeLastChange($dateTimeLastChange) {
		$this->dateTimeLastChange = $dateTimeLastChange;
	}


	/**
	 * @return string
	 */
	public function getDateTimeInsert() {
		return $this->dateTimeInsert;
	}


	/**
	 * @param string $dateTimeInsert
	 */
	public function setDateTimeInsert($dateTimeInsert) {
		$this->dateTimeInsert = $dateTimeInsert;
	}


	/**
	 * @param $snippetDataArray
	 *
	 * @return array
	 */
	public function getFieldsArray($snippetDataArray) {
		$fields_to_update = [];

		foreach(self::$fields as $key) {
			if(isset($snippetDataArray[$key])) {
				$fields_to_update[$key] = $snippetDataArray[$key];
			}
		}

		return $fields_to_update;
	}
}