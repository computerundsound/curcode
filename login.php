<?php

use computerundsound\culibrary;
use computerundsound\culibrary\CuFactoryUtil;
use computerundsound\culibrary\CuNet;
use snippet\SnippetReader;
use snippet\SnippetWriter;

require_once __DIR__ . '/inc/_close/includes/_application_viewer.php';

$cu_reload_preventer_coo         = new culibrary\CuReloadPreventer(true);
$cu_reload_preventer['token']    = $cu_reload_preventer_coo->get_token_new();
$cu_reload_preventer['variname'] = $cu_reload_preventer_coo->get_vari_name();

$action      = CuNet::get_post('action');
$actionValue = CuNet::get_post('actionValue');

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
$smarty_standard->assign('cu_reload_preventer', $cu_reload_preventer);

$smarty_standard->assign('error_main_message', $error_main_message);
$smarty_standard->assign('info_main_message', $info_main_message);

$smarty_standard->assign('headline', 'curCode');

$js_files['js_entry_point'] = 'login';

$smarty_standard->assign('js_files', $js_files);

$smarty_standard->display('login.tpl');
