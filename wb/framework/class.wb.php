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

wb class

This class is the basis for admin and frontend classes.

*/

class wb
{	
	// General initialization function 
	// performed when frontend or backend is loaded.
	function wb() {
		// set global database variable
		global $database;
		// Create database class
		require_once(WB_PATH.'/framework/class.database.php');
		$database = new database();
		$this->database = $database;

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

		// make language variables globally accessible
		global $language_code, $language_name, $language_author, $language_version, $language_designed_for;
		global $MENU, $OVERVIEW, $TEXT, $HEADING, $MESSAGE;
		// Load Language file
		if(!defined('LANGUAGE_LOADED')) {
			if(!file_exists(WB_PATH.'/languages/'.LANGUAGE.'.php')) {
				exit('Error loading language file '.LANGUAGE.', please check configuration');
			} else {
				require_once(WB_PATH.'/languages/'.LANGUAGE.'.php');
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
		
		set_magic_quotes_runtime(0);
	}

	// Check whether we should show a page or not (for front-end)
	function show_page($page) {
		// First check if the page is set to private
		if($page['visibility'] == 'private' OR $page['visibility'] == 'registered') {
			// Check if the user is logged in
			if($this->is_authenticated() == true) {
				// Now check if the user has perms to view it
				$viewing_groups = explode(',', $page['viewing_groups']);
				$viewing_users = explode(',', $page['viewing_users']);
				if(is_numeric(array_search($this->get_group_id(), $viewing_groups)) OR is_numeric(array_search($this->get_user_id(), $viewing_users))) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} elseif($page['visibility'] == 'public') {
			return true;
		} else {
			return false;
		}
	}

	// Check if the user is already authenticated or not
	function is_authenticated() {
		if(isset($_SESSION['USER_ID']) AND $_SESSION['USER_ID'] != "" AND is_numeric($_SESSION['USER_ID'])) {
			return true;
		} else {
			return false;
		}
	}

	// Modified addslashes function which takes into account magic_quotes
	function add_slashes($input) {
		if ( get_magic_quotes_gpc() || ( !is_string($input) ) ) {
			return $input;
		}
		$output = addslashes($input);
		return $output;
	}

	// Ditto for stripslashes
	function strip_slashes($input) {
		if ( !get_magic_quotes_gpc() || ( !is_string($input) ) ) {
			return $input;
		}
		$output = stripslashes($input);
		return $output;
	}

	function strip_slashes_dummy($input) {
		return $input;
	}

	// Escape backslashes for use with mySQL LIKE strings
	function escape_backslashes($input) {
		return str_replace("\\","\\\\",$input);
	}

	// Get POST data
	function get_post($field) {
		if(isset($_POST[$field])) {
			return $_POST[$field];
		} else {
			return null;
		}
	}

	// Get GET data
	function get_get($field) {
		if(isset($_GET[$field])) {
			return $_GET[$field];
		} else {
			return null;
		}
	}

	// Get SESSION data
	function get_session($field) {
		if(isset($_SESSION[$field])) {
			return $_SESSION[$field];
		} else {
			return null;
		}
	}

	// Get SERVER data
	function get_server($field) {
		if(isset($_SERVER[$field])) {
			return $_SERVER[$field];
		} else {
			return null;
		}
	}

	// Get the current users id
	function get_user_id() {
		return $_SESSION['USER_ID'];
	}

	// Get the current users group id
	function get_group_id() {
		return $_SESSION['GROUP_ID'];
	}

	// Get the current users group name
	function get_group_name() {
		return $_SESSION['GROUP_NAME'];
	}

	// Get the current users username
	function get_username() {
		return $_SESSION['USERNAME'];
	}

	// Get the current users display name
	function get_display_name() {
		return $this->strip_slashes_dummy($_SESSION['DISPLAY_NAME']);
	}

	// Get the current users email address
	function get_email() {
		return $_SESSION['EMAIL'];
	}

	// Get the current users home folder
	function get_home_folder() {
		return $_SESSION['HOME_FOLDER'];
	}

	// Get the current users timezone
	function get_timezone() {
		if(!isset($_SESSION['USE_DEFAULT_TIMEZONE'])) {
			return $_SESSION['TIMEZONE'];
		} else {
			return '-72000';
		}
	}

	// Validate supplied email address
	function validate_email($email) {
		if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
			return true;
		} else {
			return false;
		}
	}

	
}
?>
