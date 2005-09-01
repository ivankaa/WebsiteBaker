<?php

// $Id: class.admin.php,v 1.13 2005/06/23 01:10:46 rdjurovich Exp $

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

Admin class

This class will be used for every program that will be included
in the administration section of Website Baker.

*/

// Stop this file from being accessed directly
if(!defined('WB_PATH')) { exit('Direct access to this file is not allowed'); }

// Say that this file has been loaded
define('ADMIN_CLASS_LOADED', true);
	
// Load the other required class files if they are not already loaded
require_once(WB_PATH.'/framework/class.database.php');
if(!isset($database)) {
	$database = new database();
}

// Include PHPLIB template class
require_once(WB_PATH."/include/phplib/template.inc");

// Start a session
if(!defined('SESSION_STARTED')) {
	session_name(APP_NAME.'_session_id');
	session_start();
	define('SESSION_STARTED', true);
}

// Get WB version
require_once(ADMIN_PATH.'/interface/version.php');

/*
Begin user changeable settings
*/
if(!defined('FRONTEND_LOADED')) {
	// Get users language
	if(!defined('LANGUAGE')) {
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
	// Load the language file
	if(!defined('LANGUAGE_LOADED')) {
		if(!file_exists(WB_PATH.'/languages/'.LANGUAGE.'.php')) {
			exit('Error loading language file '.LANGUAGE.', please check configuration');
		} else {
			require(WB_PATH.'/languages/'.LANGUAGE.'.php');
		}
	}
}
/*
End user changeable settings
*/

class admin {
	// Authenticate user then auto print the header
	function admin($section_name, $section_permission = 'start', $auto_header = true, $auto_auth = true) {
		global $MESSAGE;
		// Specify the current applications name
		$this->section_name = $section_name;
		$this->section_permission = $section_permission;
		// Authenticate the user for this application
		if($auto_auth == true) {
			// First check if the user is logged-in
			if($this->is_authenticated() == false) {
				header('Location: '.ADMIN_URL.'/login/index.php');
			}
			// Now check if they are allowed in this section
			if($this->get_permission($section_permission) == false) {
				die($MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES']);
			}
		}
		// Auto header code
		if($auto_header == true) {
			$this->print_header();
		}
	}
	
	// Print the admin header
	function print_header($body_tags = '') {
		// Get vars from the language file
		global $MENU;
		global $MESSAGE;
		global $TEXT;
		// Connect to database and get website title
		$database = new database();
		$get_title = $database->query("SELECT value FROM ".TABLE_PREFIX."settings WHERE name = 'title'");
		$title = $get_title->fetchRow();
		$header_template = new Template(ADMIN_PATH."/interface");
		$header_template->set_file('page', 'header.html');
		$header_template->set_block('page', 'header_block', 'header');
		$header_template->set_var(	array(
													'SECTION_NAME' => $MENU[strtoupper($this->section_name)],
													'INTERFACE_DIR' => ADMIN_URL.'/interface',
													'BODY_TAGS' => $body_tags,
													'WEBSITE_TITLE' => stripslashes($title['value']),
													'TEXT_ADMINISTRATION' => $TEXT['ADMINISTRATION'],
													'VERSION' => VERSION
													)
											);
		// Create the menu
		$menu = array(
					array(ADMIN_URL.'/start/index.php', '', $MENU['START'], 'start', 0),
					array(ADMIN_URL.'/pages/index.php', '', $MENU['PAGES'], 'pages', 1),
					array(ADMIN_URL.'/media/index.php', '', $MENU['MEDIA'], 'media', 1),
					array(ADMIN_URL.'/addons/index.php', '', $MENU['ADDONS'], 'addons', 1),
					array(ADMIN_URL.'/preferences/index.php', '', $MENU['PREFERENCES'], 'preferences', 0),
					array(ADMIN_URL.'/settings/index.php', '', $MENU['SETTINGS'], 'settings', 1),
					array(ADMIN_URL.'/access/index.php', '', $MENU['ACCESS'], 'access', 1),
					array('http://www.websitebaker.org/docs/', '_blank', $MENU['HELP'], 'help', 0),
					array(WB_URL.'/', '_blank', $MENU['VIEW'], 'view', 0),
					array(ADMIN_URL.'/logout/index.php', '', $MENU['LOGOUT'], 'logout', 0)
					);
		$header_template->set_block('header_block', 'linkBlock', 'link');
		foreach($menu AS $menu_item) {
			$link = $menu_item[0];
			$target = $menu_item[1];
			$title = $menu_item[2];
			$permission_title = $menu_item[3];
			$required = $menu_item[4];
			$replace_old = array(ADMIN_URL, WB_URL, '/', 'index.php');
			if($required == false OR $this->get_link_permission($permission_title)) {
				$header_template->set_var('LINK', $link);
				$header_template->set_var('TARGET', $target);
				// If link is the current section apply a class name
				if($permission_title == strtolower($this->section_name)) {
					$header_template->set_var('CLASS', 'current');
				} else {
					$header_template->set_var('CLASS', '');
				}
				$header_template->set_var('TITLE', $title);
				// Print link
				$header_template->parse('link', 'linkBlock', true);
			}
		}
		$header_template->parse('header', 'header_block', false);
		$header_template->pparse('output', 'page');
	}
	
	// Print the admin footer
	function print_footer() {
		$footer_template = new Template(ADMIN_PATH."/interface");
		$footer_template->set_file('page', 'footer.html');
		$footer_template->set_block('page', 'footer_block', 'header');
		$footer_template->parse('header', 'footer_block', false);
		$footer_template->pparse('output', 'page');
	}
	
	// Print a success message which then automatically redirects the user to another page
	function print_success($message, $redirect = 'index.php') {
		global $TEXT;
		$success_template = new Template(ADMIN_PATH.'/interface');
		$success_template->set_file('page', 'success.html');
		$success_template->set_block('page', 'main_block', 'main');
		$success_template->set_var('MESSAGE', $message);
		$success_template->set_var('REDIRECT', $redirect);
		$success_template->set_var('NEXT', $TEXT['NEXT']);
		$success_template->parse('main', 'main_block', false);
		$success_template->pparse('output', 'page');
	}
	
	// Print a error message
	function print_error($message, $link = 'index.php', $auto_footer = true) {
		global $TEXT;
		$success_template = new Template(ADMIN_PATH.'/interface');
		$success_template->set_file('page', 'error.html');
		$success_template->set_block('page', 'main_block', 'main');
		$success_template->set_var('MESSAGE', $message);
		$success_template->set_var('LINK', $link);
		$success_template->set_var('BACK', $TEXT['BACK']);
		$success_template->parse('main', 'main_block', false);
		$success_template->pparse('output', 'page');
		if($auto_footer == true) {
			$this->print_footer();
		}
		exit();
	}
	
	// Return a system permission
	function get_permission($name, $type = 'system') {
		// Append to permission type
		$type .= '_permissions';
		// Check if we have a section to check for
		if($name == 'start') {
			return true;
		} else {
			// Set system permissions var
			$system_permissions = $this->get_session('SYSTEM_PERMISSIONS');
			// Set module permissions var
			$module_permissions = $this->get_session('MODULE_PERMISSIONS');
			// Set template permissions var
			$template_permissions = $this->get_session('TEMPLATE_PERMISSIONS');
			// Return true if system perm = 1
			if(is_numeric(array_search($name, $$type))) {
				if($type == 'system_permissions') {
					return true;
				} else {
					return false;
				}
			} else {
				if($type == 'system_permissions') {
					return false;
				} else {
					return true;
				}
			}
		}
	}
	
	// Returns a system permission for a menu link
	function get_link_permission($title) {
		$title = str_replace('_blank', '', $title);
		$title = strtolower($title);
		// Set system permissions var
		$system_permissions = $this->get_session('SYSTEM_PERMISSIONS');
		// Set module permissions var
		$module_permissions = $this->get_session('MODULE_PERMISSIONS');
		if($title == 'start') {
			return true;
		} else {
			// Return true if system perm = 1
			if(is_numeric(array_search($title, $system_permissions))) {
				return true;
			} else {
				return false;
			}
		}
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
		return stripslashes($_SESSION['DISPLAY_NAME']);
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