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
 * Class ShelReturn
 * @package system
 */

namespace system;

class ShellReturn
{

	private $return_data_array  = '';
	private $return_error_value = 0;
	private $add_msg;


	/**
	 * @return mixed
	 */
	public function get_return_data_array()
	{
		return $this->return_data_array;
	}


	/**
	 * @param $return_data_array
	 */
	public function set_return_data_array($return_data_array)
	{
		$this->return_data_array = $return_data_array;
	}


	/**
	 * @return mixed
	 */
	public function get_return_error_value()
	{
		return $this->return_error_value;
	}


	/**
	 * @param mixed $error
	 */
	public function set_return_error_value($error)
	{
		$this->return_error_value = $error;
	}


	/**
	 * @return mixed
	 */
	public function get_add_msg()
	{
		return $this->add_msg;
	}


	/**
	 * @param mixed $add_msg
	 */
	public function set_add_msg($add_msg)
	{
		$this->add_msg = $add_msg;
	}


	/**
	 * @return array
	 */
	public function get_return_data_first_line()
	{
		$return_array = $this->get_return_data_array();
		if(isset($return_array[0]))
		{
			$ret = trim($return_array[0]);
		}
		else
		{
			$ret = array();
		}

		return $ret;
	}


	/**
	 * @param string $separator
	 *
	 * @return string
	 */
	public function get_return_date_all_lines($separator = PHP_EOL)
	{
		$data_arrray = $this->get_return_data_array();

		$ret = 'No Errormsg - But there IS an Error!!!';

		if(is_array($data_arrray)) {
			$ret = implode($separator, $data_arrray);
			$ret = trim($ret);

			if(empty($ret)) {
				$ret = 'No Errormsg - But there IS an Error!!!';
			}
		}

		return $ret;
	}

} 