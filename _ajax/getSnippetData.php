<?php
/*
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 06.06.2015
 * Time: 13:41
 * 
 * Created by IntelliJ IDEA
 *
 */

use computerundsound\culibrary\CuNet;
use computerundsound\culibrary\CuFactoryUtil;

require_once '../inc/_close/includes/_application_top.php';

header('Content-Type: text/plain;CharSet: utf-8');

$snippetId = CuNet::get_post('snippet_id');

if(empty($snippetId)) {
	die('no data');
}

/* ******************* START **************************/

/** @var \snippet\SnippetReader $snippetReader */
$snippetReader = CuFactoryUtil::create('snippet\SnippetReader');

$snippet = $snippetReader->readFromDB($snippetId);

$snippetArray = $snippet->asArray();

echo json_encode($snippetArray);