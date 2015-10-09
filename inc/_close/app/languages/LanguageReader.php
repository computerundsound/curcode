<?php
/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 25.11.2014
 * Time: 23:41
 *
 * Created by IntelliJ IDEA
 *
 * Filename: SnippetWriter.php
 */

/**
 * Class LanguageReader
 *
 * @package languages
 */

namespace languages;

use computerundsound\culibrary\db\mysqli\CuDBi;

/**
 * Class LanguageReader
 *
 * @package snippet
 */
class LanguageReader extends Language {


	/**
	 * @param \computerundsound\culibrary\db\mysqli\CuDBi $cuDBi
	 */
	public function __construct(CuDBi $cuDBi) {
		parent::__construct($cuDBi);
	}


	/**
	 * @param $languageId
	 */
	public function readFromDB($languageId) {
		$languageResult = $this->dbiObj->selectOneDataSet(self::$tableNameLanguages, 'language_id', $languageId);
	}


	/**
	 * @param $order
	 *
	 * @return array
	 */
	public function getAllLanguages($order = '') {
		$languagesArray = $this->dbiObj->selectAsArray(self::$tableNameLanguages, '', $order);

		return $languagesArray;
	}
}