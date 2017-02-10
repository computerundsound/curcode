<?php
/**
 * Jörg Wrase www.computer-und-sound.de
 * Date: 2014-11-20
 * Time: 21:43
 *
 * Created by IntelliJ IDEA
 *
 */

namespace viewer;

/**
 * Class MakeView
 *
 * @package viewer
 */
use computerundsound\culibrary\CuString;

/** @noinspection LongInheritanceChainInspection */
class MakeView extends \Smarty
{

    /**
     * @var
     */
    private $smarty_dir;
    /**
     * @var array
     */
    private static $smarty_dirs_not_provided = [
        'templates',
        'templates_c',
        'configs',
        'cache',
    ];


    /**
     * @param $smartyDir
     */
    public function __construct($smartyDir) {

        $this->smarty_dir = $smartyDir;

        $this->test_and_create_smarty_dirs();

        parent::__construct();

        $this->setTemplateDir($smartyDir . 'templates/');
        $this->setCompileDir($smartyDir . 'templates_c/');
        $this->setConfigDir($smartyDir . 'configs/');
        $this->setCacheDir($smartyDir . 'cache/');

        if (CU_DEBUGMODUS) {
            $this->caching = false;
            $this->clearAllCache(true);
        }
    }


    /**
     *
     */
    private function test_and_create_smarty_dirs() {

        $error = false;

        foreach (self::$smarty_dirs_not_provided as $dir) {
            if (is_dir($this->smarty_dir . $dir) === false) {
                $result = $this->mkDir($this->smarty_dir . $dir);
                if ($result === false) {
                    $error = true;
                }
            }
        }

        if ($error === true) {

            $errormsg = '';

            foreach (self::$smarty_dirs_not_provided as $dir) {
                if ($dir === 'templates') {
                    continue;
                }
                $errormsg .= ' ' . $dir . ',';
            }
            $errormsg = CuString::killLastSign($errormsg);

            $errormsg =
                'Please create the following directories in ' .
                $this->smarty_dir .
                ': <br>' .
                $errormsg .
                '<br>' .
                'Make sure that the directories are writable (0777)';
            die($errormsg);
        }
    }


    /**
     * @param $path
     *
     * @return bool
     */
    private function mkDir($path) {

        $result = true;

        /** @noinspection PhpUsageOfSilenceOperatorInspection */
        if (!@mkdir($path) && !is_dir($path)) {

            echo 'Error creating this directory: ' . $path . '<br>';
            $result = false;
        }

        return $result;
    }
}