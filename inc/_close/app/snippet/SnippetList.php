<?php
/*
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 08.06.2015
 * Time: 17:11
 * 
 * Created by IntelliJ IDEA
 *
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
	private $snippetTemplate;


	/**
	 * @param \snippet\Snippet $snippetTemplate
	 */
	public function __construct(Snippet $snippetTemplate) {

		$this->snippetTemplate = clone $snippetTemplate;
	}


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