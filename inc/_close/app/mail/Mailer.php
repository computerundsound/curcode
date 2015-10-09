<?php
/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 14.08.14
 * Time: 12:18
 *
 * Created by IntelliJ IDEA
 *
 * Filename: Mailer.php
 */

/**
 * Class Mailer
 * @package mail
 */

namespace mail;


use InvalidArgumentException;
use shop\Shop;
use viewer\MakeView;

/**
 * Class Mailer
 * @package mail
 */
class Mailer
{

	private $mailtemplate_name;

	/**
	 * @var MakeView
	 */
	private $smarty_mailer_coo;

	/**
	 * @var \PHPMailer
	 */
	private $phpmailer_coo;

	/**
	 * @var MailPersonData
	 */
	private $mailer_person_data;


	/**
	 * @param $p_mailtemplate_name
	 * @param MakeView $p_smarty_mailer_coo
	 * @param \PHPMailer $p_phpmailer_coo
	 */
	public function __construct($p_mailtemplate_name, MakeView $p_smarty_mailer_coo, \PHPMailer $p_phpmailer_coo)
	{
		$this->mailtemplate_name = $p_mailtemplate_name;
		$this->smarty_mailer_coo = $p_smarty_mailer_coo;
		$this->phpmailer_coo = $p_phpmailer_coo;
	}


	/**
	 * @param $subject
	 * @param $content
	 */
	public function send_mail($subject, $content)
	{

		$view_coo = $this->smarty_mailer_coo;
		$template_name = $this->mailtemplate_name;

		$php_mailer_coo = $this->phpmailer_coo;

		$view_coo->assign('content', $content);

		$mailtemplate = $view_coo->fetch($template_name);

		$php_mailer_coo->addAddress($this->mailer_person_data->email_to);
		if(trim(CU_MAIL_TESTMAIL_ADDRESS) === '')
		{
			$php_mailer_coo->From = $this->mailer_person_data->email_from;
		}
		else
		{
			$php_mailer_coo->From = CU_MAIL_TESTMAIL_ADDRESS;
		}

		$php_mailer_coo->Subject = $subject;
		$php_mailer_coo->isHTML(true);
		$php_mailer_coo->Body = $mailtemplate;

		$php_mailer_coo->AltBody  =  strip_tags($mailtemplate);
		$bcc = $this->mailer_person_data->get_bcc();

		if(empty($bcc) === false) {
			$php_mailer_coo->addBCC($this->mailer_person_data->get_bcc());
		}

		$php_mailer_coo->send();

	}


	/**
	 * @param MailPersonData $p_mailer_person_data
	 */
	public function set_datas(MailPersonData $p_mailer_person_data)
	{
		$this->mailer_person_data = $p_mailer_person_data;
	}


	/**
	 * @param Shop $p_shop_coo
	 * @param MailPersonData $p_mail_person_data_coo
	 * @return \mail\MailPersonData
	 */
	public static function get_MailPersonData(Shop $p_shop_coo, MailPersonData $p_mail_person_data_coo)
	{

		$user_first_name = $p_shop_coo->get_user_first_name();
		$user_last_name = $p_shop_coo->get_user_last_name();
		$user_email = $p_shop_coo->get_user_email();

		if(filter_var($user_email, FILTER_VALIDATE_EMAIL) === false)
		{
			throw new InvalidArgumentException('Email vom Kunden wurde nicht richtig angegeben.');
		}

		$p_mail_person_data_coo->email_to = $user_email;
		$p_mail_person_data_coo->name_to = trim($user_first_name . ' ' . $user_last_name);

		$p_mail_person_data_coo->email_from = CU_MAILER_FROM_EMAIL;
		$p_mail_person_data_coo->name_from = CU_MAILER_FROM_NAME;

		return $p_mail_person_data_coo;
	}
}