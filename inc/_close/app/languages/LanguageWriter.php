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

namespace languages;

use computerundsound\culibrary\db\mysqli\CuDBi;
use computerundsound\culibrary\db\mysqli\CuDBiResult;

/**
 * Class LanguageWriter
 *
 * @package languages
 */
class LanguageWriter extends Language {

	/**
	 * @param \computerundsound\culibrary\db\mysqli\CuDBi $cuDBi
	 */
	public function __construct(CuDBi $cuDBi) {
		parent::__construct($cuDBi);
	}


	/**
	 * @param array $snippetDatasArray
	 */
	public function update(array $snippetDatasArray) {

		$fildsToInsertArray = $this->getFieldsArray($snippetDatasArray);

		$fildsToInsertArray['last_change'] = date('Y-m-d H:i:s');

		print_r($fildsToInsertArray);
	}


	/**
	 * @param array $snippetDataArray
	 *
	 * @return CuDBiResult
	 */
	public function insert(array $snippetDataArray) {

		$fieldstoupdate = $this->getFieldsArray($snippetDataArray);

		$fieldstoupdate['last_change'] = date('Y-m-d H:i:s');

		$dbresult = $this->dbiObj->insert(self::$clienttabname, $fieldstoupdate);

		return $dbresult;
	}
}