<?php
/**
 * Jörg Wrase www.computer-und-sound.de
 * Date: 2014-11-20
 * Time: 21:43
 *
 * Created by IntelliJ IDEA
 *
 */

use computerundsound\culibrary\CuFactoryUtil;
use viewer\MakeView;

require_once '_application_top.php';

/** @var MakeView $smarty_standard */
$smarty_standard = CuFactoryUtil::create('viewer\MakeView');

$standards_view_elements_array = [
	'application_root_HTTP' => $constant_container_coo->getAppRootHTTP(),
	'path_self' => $constant_container_coo->get_file_path_HTTP(),
	'project_name' => 'Projektname'
];

$content = <<<HTML
	<p>{$standards_view_elements_array['application_root_HTTP']}</p>
HTML;

$smarty_standard->assign('standards', $standards_view_elements_array);
$smarty_standard->assign('content', $content);