<?php
/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Hire me! coder@cusp.de
 *
 * LastModified: 2017.02.10 at 04:07 MEZ
 */

use computerundsound\culibrary\CuRequester;

require_once __DIR__ . '/../inc/_close/includes/_application_top.php';

header('Content-Type: text/plain;CharSet: utf-8');

$snippetId = CuRequester::getGetPost('snippet_id');

if (empty($snippetId)) {
    die('no data');
}

/* ******************* START **************************/

/** @var \snippet\SnippetReader $snippetReader */
$snippetReader = new \snippet\SnippetReader($dbiObj);

$snippet = $snippetReader->readFromDB($snippetId);

$snippetArray = $snippet->asArray();

echo json_encode($snippetArray);