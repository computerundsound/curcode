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

namespace snippet;

/**
 * Class SnippetReader
 *
 * @package snippet
 */
class SnippetReader {

	use SnippetTrait;


	/**
	 * @param int    $snippetLanguageID
	 * @param string $snippetSearchString
	 * @param string $order
	 *
	 * @return \snippet\SnippetList
	 */
	public function getSnippetList($snippetLanguageID, $snippetSearchString, $order = 'name ASC') {

		$where = $this->buildWhereString($snippetLanguageID, $snippetSearchString);

		$snippetArray = $this->cuDBi->selectAsArray(self::$clientTableName, $where, $order);

		$this->snippetList->reset();

		foreach($snippetArray as $snippetData) {
			$snippet = $this->fillSnippet($snippetData);
			$this->snippetList->addSnippet($snippet);
		}

		return $this->snippetList;
	}


	/**
	 * @param $snippetId
	 *
	 * @return \snippet\Snippet
	 */
	public function readFromDB($snippetId) {

		$snippetArray = $this->cuDBi->selectOneDataSet(self::$clientTableName, 'snippet_id', $snippetId);

		$snippet = $this->fillSnippet($snippetArray);

		return $snippet;
	}


	/**
	 * @param int    $snippetLanguageID
	 * @param string $snippetSearchString
	 *
	 * @return string
	 */
	protected function buildWhereString($snippetLanguageID, $snippetSearchString) {
		$where = '';

		if($snippetLanguageID > 0) {
			$where .= " language_id = $snippetLanguageID ";
		}

		if($snippetSearchString !== '') {

			if($where !== '') {
				$where .= ' AND ';
			}

			$where .= "
			(name LIKE '%$snippetSearchString%' OR
			tags LIKE '%$snippetSearchString%' OR
			information LIKE '%$snippetSearchString%' OR
			code LIKE '%$snippetSearchString%')
		";
		}

		return $where;
	}


	/**
	 * @param array $snippetData
	 *
	 * @return \snippet\Snippet
	 */
	protected function fillSnippet(array $snippetData) {
		$snippet = clone $this->snippetTemplate;

		$snippet->setSnippetId($snippetData['snippet_id']);
		$snippet->setLanguageId($snippetData['language_id']);
		$snippet->setName($snippetData['name']);
		$snippet->setTags($snippetData['tags']);
		$snippet->setInformation($snippetData['information']);
		$snippet->setCode($snippetData['code']);

		$dateCreated = clone $this->dateTimeCuTemplate;
		$dateCreated->init($snippetData['date_created']);
		$snippet->setDateCreated($dateCreated);

		$dateLastChange = clone $this->dateTimeCuTemplate;
		$dateLastChange->init($snippetData['last_change']);
		$snippet->setLastChange($dateLastChange);

		return $snippet;
	}
}