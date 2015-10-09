<?php
/**
 * Jörg Wrase www.computer-und-sound.de
 * Date: 2014-11-20
 * Time: 21:43
 * 
 * Created by IntelliJ IDEA
 *
 */

$new_site = 'codesnippet_edit.php';
header('HTTP/1.1 301 Moved Permanently');
header('location:' . $new_site);
exit;