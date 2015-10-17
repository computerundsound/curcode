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

/**
 * Class Snippet
 *
 * @package snippet
 */

namespace snippet;

use computerundsound\culibrary\DateTimeCu;

/**
 * Class Snippet
 *
 * @package snippet
 */
class Snippet {

	/** @var array */
	protected static $fieldsPostDatabase = [
		'snippet_id'          => 'snippet_id',
		'snippet_language'    => 'language_id',
		'snippet_description' => 'description',
		'snippet_tags'        => 'tags',
		'snippet_code'        => 'code',
		'snippet_information' => 'information',
		'snippet_name'        => 'name',
	];

	protected $name        = '';
	protected $languageId  = '';
	protected $description = '';
	protected $tags        = '';
	protected $code        = '';
	protected $information = '';
	/** @var  DateTimeCu */
	protected $lastChange;
	/** @var  DateTimeCu */
	protected $dateCreated;
	protected $snippetId = 0;

	/**
	 * @var \computerundsound\culibrary\DateTimeCu
	 */
	private $dateTimeCu;


	/**
	 * @param \computerundsound\culibrary\DateTimeCu $dateTimeCu
	 */
	public function __construct(DateTimeCu $dateTimeCu) {

		$this->dateTimeCu = clone $dateTimeCu;
		$this->lastChange = clone $dateTimeCu;
	}


	public function __clone() {
		$this->dateTimeCu = clone $this->dateTimeCu;
		$this->lastChange = clone $this->lastChange;
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
	 * @return string
	 */
	public function getLanguageId() {
		return $this->languageId;
	}


	/**
	 * @param string $languageId
	 */
	public function setLanguageId($languageId) {
		$this->languageId = $languageId;
	}


	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}


	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}


	/**
	 * @return string
	 */
	public function getTags() {
		return $this->tags;
	}


	/**
	 * @param string $tags
	 */
	public function setTags($tags) {
		$this->tags = $tags;
	}


	/**
	 * @return string
	 */
	public function getCode() {
		return $this->code;
	}


	/**
	 * @param string $code
	 */
	public function setCode($code) {
		$this->code = $code;
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
	 * @return DateTimeCu
	 */
	public function getLastChange() {
		return $this->lastChange;
	}


	/**
	 * @param DateTimeCu $lastChange
	 */
	public function setLastChange(DateTimeCu $lastChange) {
		$this->lastChange = $lastChange;
	}


	/**
	 * @param $snippetDataArray
	 *
	 * @return array
	 */
	public function getFieldsArray($snippetDataArray) {
		$fields_to_update = [];

		foreach(self::$fieldsPostDatabase as $key => $val) {
			if(isset($snippetDataArray[$key])) {
				$fields_to_update[$val] = $snippetDataArray[$key];
			}
		}

		return $fields_to_update;
	}


	/**
	 * @return int
	 */
	public function getSnippetId() {
		return $this->snippetId;
	}


	/**
	 * @param int $snippetId
	 */
	public function setSnippetId($snippetId) {
		$this->snippetId = $snippetId;
	}


	/**
	 * @return DateTimeCu
	 */
	public function getDateCreated() {
		return $this->dateCreated;
	}


	/**
	 * @param DateTimeCu $dateCreated
	 */
	public function setDateCreated(DateTimeCu $dateCreated) {
		$this->dateCreated = $dateCreated;
	}


	/**
	 * @return array
     */
	public function asArray() {

		$snippetArray = [];

		$snippetArray['snippet_id']   = $this->snippetId;
		$snippetArray['name']         = $this->name;
		$snippetArray['language_id']  = $this->languageId;
		$snippetArray['tags']         = $this->tags;
		$snippetArray['information']  = $this->information;
		$snippetArray['code']         = str_replace(['\n', '\r'], ["\n", ''], $this->code);
		$snippetArray['date_created'] = $this->dateCreated->format('Y-m-d H:i:s');
		$snippetArray['last_change']  = $this->lastChange->format('Y-m-d H:i:s');

		return $snippetArray;
	}
}