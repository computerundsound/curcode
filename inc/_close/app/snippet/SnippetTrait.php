<?php
/*
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 08.06.2015
 * Time: 22:28
 * 
 * Created by IntelliJ IDEA
 *
 */

namespace snippet;

use computerundsound\culibrary\DateTimeCu;
use computerundsound\culibrary\db\mysqli\CuDBi;

/**
 * Class SnippetTrait
 *
 * @package \snippet
 */
trait SnippetTrait {

	protected static $fieldsInDBToUpdate = ['language_id', 'name', 'tags', 'information', 'code', 'last_change'];

	/** @var string */
	protected static $clientTableName = 'codesnippets';
	/**
	 * @var \computerundsound\culibrary\db\mysqli\CuDBi
	 */
	protected $cuDBi;
	/**
	 * @var Snippet
	 */
	protected $snippetTemplate;
	/**
	 * @var SnippetList
	 */
	protected $snippetList;
	/**
	 * @var \computerundsound\culibrary\DateTimeCu
	 */
	protected $dateTimeCuTemplate;


	/**
	 * @param \computerundsound\culibrary\db\mysqli\CuDBi $cuDBi
	 * @param Snippet                                     $snippetTemplate
	 * @param SnippetList                                 $snippetList
	 * @param \computerundsound\culibrary\DateTimeCu      $dateTimeCuTemplate
	 */
	public function __construct(CuDBi $cuDBi,
	                            Snippet $snippetTemplate,
	                            SnippetList $snippetList,
	                            DateTimeCu $dateTimeCuTemplate) {

		$this->cuDBi              = $cuDBi;
		$this->snippetTemplate    = clone $snippetTemplate;
		$this->snippetList        = $snippetList;
		$this->dateTimeCuTemplate = clone $dateTimeCuTemplate;
	}


	public function getFieldsArray() {
	}
}