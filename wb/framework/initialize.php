<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2005, Ryan Djurovich

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

/*
	Initializations common to frontend and backend
*/
if(!defined('WB_URL')) {
	header('Location: ../index.php');
}

// Setup database object
require_once(WB_PATH.'/framework/class.database.php');
if (!defined('DATABASE_CLASS_LOADED')) {
  	define('DATABASE_CLASS_LOADED',true);
}
if(!isset($database)) {
	$database = new database();
}

// Start a session
if(!defined('SESSION_STARTED')) {
	session_name(APP_NAME.'_session_id');
	session_start();
	define('SESSION_STARTED', true);
}

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

// Get users timezone
if(!defined('TIMEZONE')) {
	if(isset($_SESSION['TIMEZONE'])) {
		define('TIMEZONE', $_SESSION['TIMEZONE']);
	} else {
		define('TIMEZONE', DEFAULT_TIMEZONE);
	}
}
// Get users date format
if(!defined('DATE_FORMAT')) {
	if(isset($_SESSION['DATE_FORMAT'])) {
		define('DATE_FORMAT', $_SESSION['DATE_FORMAT']);
	} else {
		define('DATE_FORMAT', DEFAULT_DATE_FORMAT);
	}
}
// Get users time format
if(!defined('TIME_FORMAT')) {
	if(isset($_SESSION['TIME_FORMAT'])) {
		define('TIME_FORMAT', $_SESSION['TIME_FORMAT']);
	} else {
		define('TIME_FORMAT', DEFAULT_TIME_FORMAT);
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

?>
