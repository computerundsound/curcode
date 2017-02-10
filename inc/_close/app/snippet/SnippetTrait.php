<?php
/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Hire me! coder@cusp.de
 *
 * LastModified: 2017.02.10 at 03:37 MEZ
 */

namespace snippet;

use computerundsound\culibrary\DateTimeCu;
use computerundsound\culibrary\db\mysqli\CuDBi;

/**
 * Class SnippetTrait
 *
 * @package \snippet
 */
trait SnippetTrait
{

    protected static $fieldsInDBToUpdate = ['language_id', 'name', 'tags', 'information', 'code', 'last_change'];

    /** @var string */
    protected static $clientTableName = 'codesnippets';
    /**
     * @var \computerundsound\culibrary\db\mysqli\CuDBi
     */
    protected $cuDBi;

    /** @var  SnippetList */
    protected $snippetList;


    /**
     * @param \computerundsound\culibrary\db\mysqli\CuDBi $cuDBi
     */
    public function __construct(
        CuDBi $cuDBi
    ) {

        $this->snippetList = new SnippetList();
        $this->cuDBi       = $cuDBi;
    }


    public function getFieldsArray() {
    }
}