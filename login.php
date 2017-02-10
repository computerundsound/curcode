<?php

use computerundsound\culibrary\CuRequester;

require_once __DIR__ . '/inc/_close/includes/_application_viewer.php';

$action      = CuRequester::getGetPost('action');
$actionValue = CuRequester::getGetPost('actionValue');

$error_main_message = null;
$info_main_message  = null;

/* Start */

$login = new \Login([APP_PASSWORD]);
$login->logOut();

if ($action === 'tryLogin' && $actionValue) {
    $login->tryLogin($actionValue);
}

if ($login->isLoggedIn()) {
    header('Location: codesnippet_edit.php');
    exit;
}

/* Output */
$smarty_standard->assign('site_title', 'Codemanagement by cu');

$smarty_standard->assign('error_main_message', $error_main_message);
$smarty_standard->assign('info_main_message', $info_main_message);

$smarty_standard->assign('headline', 'curCode');

$js_files['js_entry_point'] = 'login';

$smarty_standard->assign('js_files', $js_files);

$smarty_standard->display('login.tpl');
