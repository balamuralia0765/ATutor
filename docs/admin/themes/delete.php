<?php
/************************************************************************/
/* ATutor																*/
/************************************************************************/
/* Copyright (c) 2002-2005 by Greg Gay, Joel Kronenberg & Heidi Hazelton*/
/* Adaptive Technology Resource Centre / University of Toronto			*/
/* http://atutor.ca														*/
/*																		*/
/* This program is free software. You can redistribute it and/or		*/
/* modify it under the terms of the GNU General Public License			*/
/* as published by the Free Software Foundation.						*/
/************************************************************************/

$page = 'themes';
$_user_location = 'admin';

define('AT_INCLUDE_PATH', '../../include/');
require(AT_INCLUDE_PATH.'vitals.inc.php');

if (isset($_POST['submit_no'])) {
	$msg->addFeedback('CANCELLED');
	header('Location: index.php');
	exit;
}

else if (isset($_POST['submit_yes'])) {
	require_once(AT_INCLUDE_PATH.'lib/themes.inc.php');
	
	delete_theme ($_POST['tc']);

	$msg->addFeedback('THEME_DELETED');
	header('Location: index.php');
	exit;
}

require(AT_INCLUDE_PATH.'header.inc.php'); 

$msg->printAll();


$theme_code['tc'] = $_GET['theme_code'];

$msg->addConfirm(array('DELETE_THEME', $_GET['theme_code']), $theme_code);
$msg->printConfirm();

require(AT_INCLUDE_PATH.'footer.inc.php');
?>