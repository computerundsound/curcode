<?php
/**
 * Jörg Wrase www.computer-und-sound.de
 * Date: 2014-11-20
 * Time: 21:43
 *
 * Created by IntelliJ IDEA
 *
 */

use viewer\MakeView;

require_once __DIR__ . '/_application_top.php';

/** @var MakeView $smarty_standard */
$smarty_standard = new MakeView(CU_SMARTY_DIR);

$standards_view_elements_array = [
    'application_root_HTTP' => $constant_container_coo->getAppRootHTTP(),
    'path_self'             => $constant_container_coo->getFilePath_HTTP(),
    'project_name'          => 'curCode',
];

$content = <<<HTML
	<p>{$standards_view_elements_array['application_root_HTTP']}</p>
HTML;

$smarty_standard->assign('standards', $standards_view_elements_array);
$smarty_standard->assign('content', $content);