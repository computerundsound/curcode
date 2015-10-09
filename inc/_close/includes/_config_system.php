<?php
/**
 * Gambio.de
 * Date: 14.08.14
 * Time: 12:32
 *
 * Created by IntelliJ IDEA
 *
 */

define('SHOP_FIELDS', serialize(array(
									'shop_code' => array('error_msg' => 'Das ist leider kein gültiger Shop-Code'),
									'user_last_name' => array('error_msg' => 'Bitte geben Sie einen gültigen Namen an (mindestens ein User last name)'),
									'user_email' => array('error_msg' => 'Bitte geben Sie eine gültie Emailadresse an'),
									'status' => array('error_msg' => 'Bitte geben Sie einen gültigen Status an'),
									'date_next_action' => array('error_msg' => 'Bitte geben Sie ein Datum für die nächste Action an. Wenn Sie ein Datum aus der Vergangenheit angeben, so wird dieses nicht ausgeführt'),
									'next_action' => array('error_msg' => 'Bitte geben Sie eine gülitige nächste Aktion an')
								)));

date_default_timezone_set(date_default_timezone_get());

/* Die entsprechenden Funktionen müssen vorhanden sein. die Zeit zur nächsten Aktion kann hier eingestellt werden. Bei False gibt es keine nächste Aktion. ÄNDERN DER SHLUSSEL KANN ZU UNVORHERGESEHENEN EREIGNISSEN FÜHREN!!! */
define('CU_POSSIBLE_ACTIONS', serialize(array(
											'Shop wurde erstellt' => array(
												'text' => 'Mail: Shop erstellt - inkl. Zugangsdaten',
												'time_to_next_action_in_days' => CU_TIME_FOR_NEXT_ACTION_AFTER_SHOP_CREATED_IN_DAYS
											),
											'1. Reminder' => array(
												'text' => 'Mail: 1. Erinnerrung',
												'time_to_next_action_in_days' => CU_TIME_FOR_NEXT_ACTION_AFTER_1_REMINDER_IN_DAYS
											),
											'2. Reminder' => array(
												'text' => 'Mail: 2. Erinnerrung',
												'time_to_next_action_in_days' => CU_TIME_FOR_NEXT_ACTION_AFTER_2_REMINDER_IN_DAYS
											),
											'Shop deaktivieren' => array(
												'text' => 'Shop deaktivieren & Mail',
												'time_to_next_action_in_days' => CU_TIME_FOR_NEXT_ACTION_AFTER_SHOP_DEACTIVATED_IN_DAYS
											),
											'Shop löschen' => array(
												'text' => 'Shop wurde gelöscht - keine Aktion mehr möglich',
												'time_to_next_action_in_days' => false
											)
										)));

define('CU_POSSIBLE_STATI', serialize(array(
										  'shop_created',
										  'shop_deactivated',
										  'last_info'
									  )));
