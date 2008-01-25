<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2008, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
 
if (file_exists(WB_PATH.'/framework/class.database.php')) {
	
	require_once(WB_PATH.'/framework/class.database.php');
		
	// Create database class
	$database = new database();
	
	set_magic_quotes_runtime(0);
	
	// Get website settings (title, keywords, description, header, and footer)
	$query_settings = "SELECT name,value FROM ".TABLE_PREFIX."settings";
	$get_settings = $database->query($query_settings);
	if($database->is_error()) { die($database->get_error()); }
	if($get_settings->numRows() == 0) { die("Settings not found"); }
	while($setting = $get_settings->fetchRow()) {
		$setting_name=strtoupper($setting['name']);
		$setting_value=$setting['value'];
		if ($setting_value=='false')
			$setting_value=false;
		if ($setting_value=='true')
			$setting_value=true;
		define($setting_name,$setting_value);
	}
	$string_file_mode = STRING_FILE_MODE;
	define('OCTAL_FILE_MODE',(int) octdec($string_file_mode));
	$string_dir_mode = STRING_DIR_MODE;
	define('OCTAL_DIR_MODE',(int) octdec($string_dir_mode));
	
	// get CAPTCHA and ASP settings
	$table = TABLE_PREFIX.'mod_captcha_control';
	if($get_settings = $database->query("SELECT * FROM $table LIMIT 1")) {
		if($get_settings->numRows() == 0) { die("CAPTCHA-Settings not found"); }
		$setting = $get_settings->fetchRow();
		if($setting['enabled_captcha'] == '1') define('ENABLED_CAPTCHA', true);
		else define('ENABLED_CAPTCHA', false);
		if($setting['enabled_asp'] == '1') define('ENABLED_ASP', true);
		else define('ENABLED_ASP', false);
		define('CAPTCHA_TYPE', $setting['captcha_type']);
		define('ASP_SESSION_MIN_AGE', (int)$setting['asp_session_min_age']);
		define('ASP_VIEW_MIN_AGE', (int)$setting['asp_view_min_age']);
		define('ASP_INPUT_MIN_AGE', (int)$setting['asp_input_min_age']);
	}

	// set error-reporting
	if(is_numeric(ER_LEVEL)) {
		error_reporting(ER_LEVEL);
	}

	// Start a session
	if(!defined('SESSION_STARTED')) {
		session_name(APP_NAME.'_session_id');
		session_start();
		define('SESSION_STARTED', true);
	}
	if(ENABLED_ASP && !isset($_SESSION['session_started']))
		$_SESSION['session_started'] = time();


	// Get users language
	if(isset($_GET['lang']) AND $_GET['lang'] != '' AND !is_numeric($_GET['lang']) AND strlen($_GET['lang']) == 2) {
	  	define('LANGUAGE', strtoupper($_GET['lang']));
		$_SESSION['LANGUAGE']=LANGUAGE;
	} else {
		if(isset($_SESSION['LANGUAGE']) AND $_SESSION['LANGUAGE'] != '') {
			define('LANGUAGE', $_SESSION['LANGUAGE']);
		} else {
			define('LANGUAGE', DEFAULT_LANGUAGE);
		}
	}
	
	// Load Language file
	if(!defined('LANGUAGE_LOADED')) {
		if(!file_exists(WB_PATH.'/languages/'.LANGUAGE.'.php')) {
			exit('Error loading language file '.LANGUAGE.', please check configuration');
		} else {
			require_once(WB_PATH.'/languages/'.LANGUAGE.'.php');
		}
	}
	
	// Get users timezone
	if(isset($_SESSION['TIMEZONE'])) {
		define('TIMEZONE', $_SESSION['TIMEZONE']);
	} else {
		define('TIMEZONE', DEFAULT_TIMEZONE);
	}
	// Get users date format
	if(isset($_SESSION['DATE_FORMAT'])) {
		define('DATE_FORMAT', $_SESSION['DATE_FORMAT']);
	} else {
		define('DATE_FORMAT', DEFAULT_DATE_FORMAT);
	}
	// Get users time format
	if(isset($_SESSION['TIME_FORMAT'])) {
		define('TIME_FORMAT', $_SESSION['TIME_FORMAT']);
	} else {
		define('TIME_FORMAT', DEFAULT_TIME_FORMAT);
	}
		
}

?>
