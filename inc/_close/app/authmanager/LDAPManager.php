<?php
/*
 * Jörg Wrase www.computer-und-sound.de
 * Date: 2014-11-20
 * Time: 21:43
 *
 * Created by IntelliJ IDEA
 *
 */

/**
 * Class LDAPManager
 * @package authmanager
 */

namespace authmanager;

use computerundsound\culibrary\CuConstantsContainer;

/**
 * Class LDAPManager
 *
 * @package authmanager
 */
class LDAPManager
{

	private static $sites_not_to_auth_from_app_root = ['/login.php']; //Sitename is from app_root
	private static $login_site_from_app_root        = '/login.php';

	private static $session_vari_name = 'ldapmanager';

	/**
	 * @var CuConstantsContainer
	 */
	private $cuConstantsContainer_coo;


	/**
	 * @param CuConstantsContainer $cuConstantsContainer_coo
	 */
	public function __construct(CuConstantsContainer $cuConstantsContainer_coo)
	{

		$this->cuConstantsContainer_coo = $cuConstantsContainer_coo;
	}


	/**
	 * @return bool
	 */
	public function is_valid_user()
	{

		$ret = true;

		foreach(self::$sites_not_to_auth_from_app_root as $site)
		{
			$this_file_path = $this->cuConstantsContainer_coo->get_file_path_HTTP();
			$site_path = $this->cuConstantsContainer_coo->getAppRootHTTP() . $site;

			if($site_path === $this_file_path)
			{
				$ret = true;
			}
			else
			{
				if(isset($_SESSION[self::$session_vari_name]['is_logged_in']))
				{
					/** @noinspection NestedPositiveIfStatementsInspection */
					if($_SESSION[self::$session_vari_name]['is_logged_in'] === true)
					{
						$ret = true;
					}
				}
			}
		}

		return $ret;
	}


	public function go_to_login_site()
	{
		header('location: ' . $this->cuConstantsContainer_coo->getAppRootHTTP() . self::$login_site_from_app_root);
	}


	public function test_user(){

	}
}