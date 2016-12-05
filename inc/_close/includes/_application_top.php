<?php
/**
 * Jörg Wrase www.computer-und-sound.de
 * Date: 2014-11-20
 * Time: 21:43
 *
 * Created by IntelliJ IDEA
 *
 */

use authmanager\LDAPManager;
use computerundsound\culibrary\CuConstantsContainer;
use computerundsound\culibrary\db\mysqli\CuDBi;
use computerundsound\culibrary\db\mysqli\CuDBiResult;

require_once __DIR__ . '/../_config.php';

if(CU_DEBUGMODUS === true){
	ini_set('display_errors', 'on');
	error_reporting(E_ALL^E_NOTICE);
}

require_once __DIR__ . '/../_composer/vendor/autoload.php';

$constant_container_coo = new CuConstantsContainer();

define('CU_SMARTY_DIR', $constant_container_coo->getAppRootServer() . 'inc' . DIRECTORY_SEPARATOR . '_close'
                        . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

$dbiResult = new CuDBiResult();
$dbiObj    = CuDBi::getInstance($dbiResult, DBSERVER, DBUSER, DBPW, DBNAME);

if(isset($start_no_session) === false) {
	session_start();
}

$classConfiguration = [
	'snippet\SnippetReader'    => [$dbiObj],
	'snippet\SnippetWriter'    => [$dbiObj],
	'languages\LanguageReader' => [$dbiObj],
	'viewer\MakeView'          => [CU_SMARTY_DIR],

];

\computerundsound\culibrary\CuFactoryUtil::setClassConfiguration($classConfiguration);


