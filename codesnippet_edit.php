<?php

use computerundsound\culibrary;
use computerundsound\culibrary\CuFactoryUtil;
use computerundsound\culibrary\CuNet;
use snippet\SnippetReader;
use snippet\SnippetWriter;

require_once 'inc/_close/includes/_application_viewer.php';

$cu_reload_preventer_coo = new culibrary\CuReloadPreventer(true);
$cu_reload_preventer['token'] = $cu_reload_preventer_coo->get_token_new();
$cu_reload_preventer['variname'] = $cu_reload_preventer_coo->get_vari_name();

$action = CuNet::get_post('action');
$actionValue = CuNet::get_post('actionValue');

$error_main_message = null;
$info_main_message = null;

/* Output */
$smarty_standard->assign('site_title', 'Codemanagement by cu');
$smarty_standard->assign('cu_reload_preventer', $cu_reload_preventer);

$smarty_standard->assign('error_main_message', $error_main_message);
$smarty_standard->assign('info_main_message', $info_main_message);

$smarty_standard->assign('headline', 'curCode');

$js_files['js_entry_point'] = 'mainsite';

$smarty_standard->assign('js_files', $js_files);

/* Languages */

/** @var \languages\LanguageReader $languageReader */
$languageReader = CuFactoryUtil::create('languages\LanguageReader');
/** @var array $languageArray */
$languageArray = $languageReader->getAllLanguages('name ASC');
$languageArrayKeyAsID = $languageReader->getAllLanguagesKeyAsID();

$languageOptionsArray = [0 => 'Sprache auswählen'];

foreach ($languageArray as $language) {
    $languageOptionsArray[$language['language_id']] = $language['name'];
}

$smarty_standard->assign('allLanguagesOptionsArray', $languageOptionsArray);

/* Start */
/** @var SnippetReader $clientReaderObj */
$clientReaderObj = CuFactoryUtil::create('snippet\SnippetReader');
/** @var SnippetWriter $clientWriterObj */
$clientWriterObj = CuFactoryUtil::create('snippet\SnippetWriter');

$snippetDataArray = [];

if (isset($_POST['snippetdata']['update']) && $_POST['snippetdata']['update'] === 'true') {
    $clientWriterObj->update($_POST['snippetdata']);
}

if (isset($_POST['snippetdata']['insert']) && $_POST['snippetdata']['insert'] === 'true') {
    $dbResult = $clientWriterObj->insert($_POST['snippetdata']);
}

/** @noinspection IsEmptyFunctionUsageInspection */
if ($action === 'deleteSnippet' && !empty($actionValue)) {
    $dbResult = $clientWriterObj->delete($actionValue);
}
/* Read Content */

$snippetLanguage = CuNet::get_post_session_standard_value('snippet_language', 0);
$smarty_standard->assign('snippetLanguage', $snippetLanguage);
$snippetSearchString = CuNet::get_post_session_standard_value('snippetSearchString', '');
$smarty_standard->assign('snippetSearchString', $snippetSearchString);

$content = '';

$snippetListArray = $clientReaderObj->getSnippetList($snippetLanguage, $snippetSearchString)->getSnippetListArray();


$smarty_standard->assign('languageArrayKeyAsId', $languageArrayKeyAsID);
$smarty_standard->assign('snippetListArray', $snippetListArray);

$content .= $smarty_standard->fetch('snippet_edit.tpl');
$content .= $smarty_standard->fetch('snippet_list.tpl');

$smarty_standard->assign('content', $content);

$smarty_standard->display('standard_wrap.tpl');
