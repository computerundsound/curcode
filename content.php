<?php

use client\ClientWriter;

require_once 'inc/_close/includes/_application_viewer.php';

$cu_reload_preventer_coo = new CuReloadPreventer(true);
$cu_reload_preventer['token'] = $cu_reload_preventer_coo->get_token_new();
$cu_reload_preventer['variname'] = $cu_reload_preventer_coo->get_vari_name();

$action = CuNet::get_post('action');
$action_id = CuNet::get_post('action_id');

$error_main_message = null;
$info_main_message = null;

/* Output */
$smarty_standard->assign('site_title', 'Titel');
$smarty_standard->assign('cu_reload_preventer', $cu_reload_preventer);

$smarty_standard->assign('error_main_message', $error_main_message);
$smarty_standard->assign('info_main_message', $info_main_message);

$smarty_standard->assign('headline', 'Headline');

/* Start */
$client_writer_obj = new ClientWriter($dbi_obj);

if(isset($_POST['clientdata']['update']) && $_POST['clientdata']['update'] === 'true' ) {
	$client_writer_obj->update($_POST['clientdata']);
}

if(isset($_POST['clientdata']['insert']) && $_POST['clientdata']['insert'] === 'true' ) {
	$client_writer_obj->insert($_POST['clientdata']);
}

$content = '';

$content .= $smarty_standard->fetch('kundeeingabemaske.tpl');
$content .= $smarty_standard->fetch('kundeausgabe.tpl');

$smarty_standard->assign('content', $content);

$smarty_standard->display('standard_wrap.tpl');
