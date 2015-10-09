<?php
/**
* Jörg Wrase www.computer-und-sound.de
* Date: 2014-11-20
* Time: 21:43
*
* Created by IntelliJ IDEA
*
*/

/**
 * Class Confighandler
 * @package system
 */

namespace system;
 
class Confighandler {

	private $pathToConfigFile;


	/**
	 * @param $pathToConfigFile
	 */
	public function __construct($pathToConfigFile) {

		$this->pathToConfigFile = $pathToConfigFile;
	}

	/**
	 * @return mixed
	 */
	public function getPathToConfigFile() {
		return $this->pathToConfigFile;
	}


} 