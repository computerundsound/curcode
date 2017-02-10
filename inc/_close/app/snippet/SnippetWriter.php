<?php
/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Hire me! coder@cusp.de
 *
 * LastModified: 2017.02.10 at 03:40 MEZ
 */

namespace snippet;

use computerundsound\culibrary\db\CuDBResult;
use computerundsound\culibrary\db\mysqli\CuDBiResult;

/**
 * Class SnippetWriter
 *
 * @package snippet
 */
class SnippetWriter {
	use SnippetTrait;


	/**
	 * @param array $snippetDataArray
	 */
	public function update(array $snippetDataArray) {

		$lastChange = new \DateTime();

		$snippetId = $snippetDataArray['snippet_id'];

		foreach(self::$fieldsInDBToUpdate as $dbField) {

			$updateArray[$dbField] = '';
			if(array_key_exists('snippet_' . $dbField, $snippetDataArray)) {
				$updateArray[$dbField] = $snippetDataArray['snippet_' . $dbField];
			}
		}

		$updateArray['last_change'] = $lastChange->format('Y-m-d H:i:s');

		$where = "snippet_id=$snippetId";
		$this->cuDBi->cuUpdate(self::$clientTableName, $updateArray, $where);
	}


	/**
	 * @param array $snippetDataArray
	 *
	 * @return CuDBiResult
	 */
	public function insert(array $snippetDataArray) {

		$insertArray = [];

		foreach(self::$fieldsInDBToUpdate as $dbField) {

			$insertArray[$dbField] = '';
			if(array_key_exists('snippet_' . $dbField, $snippetDataArray)) {
				$insertArray[$dbField] = $snippetDataArray['snippet_' . $dbField];
			}
		}

		$this->cuDBi->cuInsert(self::$clientTableName, $insertArray);
	}


	/**
	 * @param $snippetId
	 *
	 * @return CuDBResult
	 */
	public function delete($snippetId) {

		$cuDbiResult = $this->cuDBi->cuDelete(self::$clientTableName, "snippet_id=$snippetId");

		return $cuDbiResult;
	}
}