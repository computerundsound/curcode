<?php

use computerundsound\culibrary\CuRequester;
use languages\LanguageReader;
use snippet\SnippetReader;
use snippet\SnippetWriter;

require_once __DIR__ . '/inc/_close/includes/_application_viewer.php';

$action      = CuRequester::getGetPost('action');
$actionValue = CuRequester::getGetPost('actionValue');

$error_main_message = null;
$info_main_message  = null;

$login = new \Login([APP_PASSWORD]);

if ($login->isLoggedIn() !== true) {
    header('Location: login.php');
    exit;
}

/* Output */
$smarty_standard->assign('site_title', 'Code-Management by cu - www.cusp.de');

$smarty_standard->assign('error_main_message', $error_main_message);
$smarty_standard->assign('info_main_message', $info_main_message);

$smarty_standard->assign('headline', 'curCode');

$js_files['js_entry_point'] = 'mainsite';

$smarty_standard->assign('js_files', $js_files);

/* Languages */

$languageReader = new LanguageReader($dbiObj);

/** @var array $languageArray */
$languageArray        = $languageReader->getAllLanguages('name ASC');
$languageArrayKeyAsID = $languageReader->getAllLanguagesKeyAsID();

$languageOptionsArray = [0 => 'Sprache auswählen'];

foreach ($languageArray as $language) {
    $languageOptionsArray[$language['language_id']] = $language['name'];
}

$smarty_standard->assign('allLanguagesOptionsArray', $languageOptionsArray);

/* Start */
/** @var SnippetReader $clientReaderObj */
$clientReaderObj = new SnippetReader($dbiObj);
/** @var SnippetWriter $clientWriterObj */
$clientWriterObj = new SnippetWriter($dbiObj);

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

$snippetLanguage = CuRequester::getGetOrPostSessionStandardValue('snippet_language', 0);
$smarty_standard->assign('snippetLanguage', $snippetLanguage);
$snippetSearchString = CuRequester::getGetOrPostSessionStandardValue('snippetSearchString', '');
$smarty_standard->assign('snippetSearchString', $snippetSearchString);

$snippetListArray = $clientReaderObj->getSnippetList($snippetLanguage, $snippetSearchString)->getSnippetListArray();

$smarty_standard->assign('languageArrayKeyAsId', $languageArrayKeyAsID);
$smarty_standard->assign('snippetListArray', $snippetListArray);

$smarty_standard->display('snipped.tpl');
