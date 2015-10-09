<?php
/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 14.08.14
 * Time: 15:49
 *
 * Created by IntelliJ IDEA
 *
 * Filename: LoggerChronJob.php
 */

/**
 * Class LoggerChronJob
 * @package logger
 */

namespace logger;

/**
 * Class LoggerChronJob
 * @package logger
 */
class LoggerChronJob
{

	/**
	 * @var array
	 */
	private $logger_chron_job_array;


	/**
	 *
	 */
	public function __construct()
	{

	}


	/**
	 * @param LoggerChronJobItem $logger_chron_job_item
	 */
	public function add_loggitem(LoggerChronJobItem $logger_chron_job_item)
	{
		$this->logger_chron_job_array[] = $logger_chron_job_item;
	}


	/**
	 * @return string json
	 */
	public function get_error_full_list()
	{
		$error_array = array();

		/** @var LoggerChronJobItem $logger_chron_job_item */
		foreach($this->logger_chron_job_array as $logger_chron_job_item) {

			$error_item_array['PersonalData'] = $logger_chron_job_item->get_mailPersonData_coo();
			$error_item_array['is_ok'] = $logger_chron_job_item->get_is_ok();
			$error_array[] = $error_item_array;
		}

		return json_encode($error_array);
	}

}