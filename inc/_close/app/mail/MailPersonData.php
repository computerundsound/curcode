<?php
/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 14.08.14
 * Time: 13:23
 *
 * Created by IntelliJ IDEA
 *
 * Filename: MailData.php
 */

/**
 * Class MailData
 * @package mail
 */

namespace mail;
use InvalidArgumentException;

/**
 * Class MailData
 * @package mail
 */
class MailPersonData
{
	public $name_to;
	public $email_to;
	public $name_from;
	public $email_from;
	public $bcc;


	/**
	 * @return bool
	 */
	public function has_all_necessary_datas(){
		$error = false;

		if(empty($this->name_to)) {
			$error = true;
		}
		if(filter_var($this->email_to, FILTER_VALIDATE_EMAIL) === false) {
			$error = true;
		}

		if(empty($this->name_from)) {
			$error = true;
		}

		if(filter_var($this->email_from, FILTER_VALIDATE_EMAIL) === false) {
			$error = true;
		}


		if($error) {
			$ret = false;
		} else {
			$ret = true;
		}

		return $ret;
	}
	
	/**
	 * @return mixed
	 */
	public function get_bcc()
	{
		return $this->bcc;
	}


	/**
	 * @param mixed $bcc
	 */
	public function set_bcc($bcc)
	{
		$bcc_new_array = array();

		$bcc_array = $bcc_array = explode(',', $bcc);

		if(is_array($bcc_array)){
			foreach($bcc_array as $bcc_address)
			{
				$bcc_new_array[]=trim($bcc_address);
			}
		}

		$this->bcc = implode(',', $bcc_new_array);
	}


	/**
	 * @return mixed
	 */
	public function get_email_from()
	{
		return $this->email_from;
	}


	/**
	 * @param mixed $p_email_from
	 */
	public function set_email_from($p_email_from)
	{

		if(filter_var($p_email_from, FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException('Email From wurde nicht richtig angegeben.');
		}
		$this->email_from = $p_email_from;
	}


	/**
	 * @return mixed
	 */
	public function get_email_to()
	{
		return $this->email_to;
	}


	/**
	 * @param mixed $email_to
	 */
	public function set_email_to($email_to)
	{
		if(filter_var($email_to, FILTER_VALIDATE_EMAIL) === false){
			throw new InvalidArgumentException('Email wurde nicht richtig angegeben.');
		}
		$this->email_to = $email_to;
	}


	/**
	 * @return mixed
	 */
	public function get_name_from()
	{
		return $this->name_from;
	}


	/**
	 * @param mixed $name_from
	 */
	public function set_name_from($name_from)
	{
		$this->name_from = $name_from;
	}


	/**
	 * @return mixed
	 */
	public function get_name_to()
	{
		return $this->name_to;
	}


	/**
	 * @param mixed $name_to
	 */
	public function set_name_to($name_to)
	{
		$this->name_to = $name_to;
	}

}