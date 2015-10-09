<?php
/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 14.08.14
 * Time: 15:37
 * 
 * Created by IntelliJ IDEA
 *
 * Filename: logger_chronjob.php
 */

/**
 * Class logger_chronjob
 * @package logger
 */

namespace logger;
 
use JsonSchema\Constraints\String;
use mail\MailPersonData;

class LoggerChronJobItem
{


	/**
	 * @var MailPersonData
	 */
	private $mailPersonData_coo;
	private $is_ok;
	private $message;


	/**
	 * @param MailPersonData $p_mailPersonData_coo
	 */
	public function __construct(MailPersonData $p_mailPersonData_coo) {
		$this->mailPersonData_coo = $p_mailPersonData_coo;
	}


	/**
	 * @param bool $p_is_ok
	 */
	public function set_is_ok($p_is_ok) {
		$this->is_ok = $p_is_ok;
	}


	/**
	 * @return mixed
	 */
	public function get_message()
	{
		return $this->message;
	}


	/**
	 * @return MailPersonData
	 */
	public function get_mailPersonData_coo()
	{
		return $this->mailPersonData_coo;
	}


	/**
	 * @return mixed
	 */
	public function get_is_ok()
	{
		return $this->is_ok;
	}
}