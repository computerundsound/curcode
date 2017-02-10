<?php
/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Hire me! coder@cusp.de
 *
 * LastModified: 2017.02.10 at 03:35 MEZ
 */
namespace snippet;

/**
 * Class SnippetList
 *
 * @package inc\_close\app\snippet
 */
class SnippetList {

	protected $snippetListArray = [];
	/**
	 * @var \snippet\Snippet
	 */


	/**
	 * @param \snippet\Snippet $snippet
	 */
	public function addSnippet(Snippet $snippet) {
		$this->snippetListArray[] = $snippet;
	}


	public function reset() {
		$this->snippetListArray = [];
	}


	/**
	 * @return array
	 */
	public function getSnippetListArray() {
		return $this->snippetListArray;
	}
}