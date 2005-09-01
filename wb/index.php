<?php

// $Id: index.php,v 1.20 2005/06/22 05:41:23 rdjurovich Exp $

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

// Include config file
if(!defined('WB_URL')) {
	require('config.php');
}
// Say that this file has been loaded
if(!defined('FRONTEND_LOADED')) {
	define('FRONTEND_LOADED', true);
}
// Check if the config file has been set-up
if(!defined('WB_PATH')) {
	// Work-out where to go to get to the installer
	if(isset($no_intro) AND $no_intro == true) {
		header("Location: ../install/index.php");
	} else {
		header("Location: install/index.php");
	}
}
// Get language (if set)
if(isset($_GET['lang']) AND $_GET['lang'] != '' AND !is_numeric($_GET['lang']) AND strlen($_GET['lang']) == 2) {
	define('LANGUAGE', strtoupper($_GET['lang']));
	define('GET_LANGUAGE', true);
}
// Function to work out a page link
function page_link($link) {
	// Check for :// in the link (used in URL's)
	if(strstr($link, '://') == '') {
		return WB_URL.PAGES_DIRECTORY.$link.PAGE_EXTENSION;
	} else {
		return $link;
	}
}
// Work-out if we should include the database class file or admin class file
if(FRONTEND_LOGIN) {
	// Include admin class file
	require_once(WB_PATH.'/framework/class.admin.php');
	// Create new admin object
	if(!isset($admin)) {
		$admin = new admin('Start', 'start', false, false);
	}
} else {
	// Include database class file
	require_once(WB_PATH.'/framework/class.database.php');
	// Create new database object
	if(!isset($admin)) {
		$database = new database();
	}
}
/*
Begin user-changeable settings
*/
// Get users language
if(!defined('LANGUAGE')) {
	if(isset($_SESSION['LANGUAGE']) AND $_SESSION['LANGUAGE'] != '') {
		define('LANGUAGE', $_SESSION['LANGUAGE']);
		define('USER_LANGUAGE', true);
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
/*
End user-changeable settings
*/
/*
Begin page-select code
*/
// Get default page
$query_default = "SELECT page_id,link FROM ".TABLE_PREFIX."pages WHERE parent = '0' AND visibility = 'public' ORDER BY position ASC LIMIT 1";
$get_default = $database->query($query_default);
$default_num_rows = $get_default->numRows();
// Check for a page id
if(!isset($page_id) OR !is_numeric($page_id)) {
	// Since we have no page id check if we should go to intro page or default page
	if(INTRO_PAGE AND !isset($no_intro)) {
		// Get intro page content
		$filename = WB_PATH.PAGES_DIRECTORY.'/intro.php';
		if(file_exists($filename)) {
			$handle = fopen($filename, "r");
			$content = fread($handle, filesize($filename));
			fclose($handle);
			// Replace [wblink--PAGE_ID--] with real link
			$pattern = '/\[wblink(.+?)\]/s';
			preg_match_all($pattern,$content,$ids);
			foreach($ids[1] AS $page_id) {
				$pattern = '/\[wblink'.$page_id.'\]/s';
				// Get page link
				$get_link = $database->query("SELECT link FROM ".TABLE_PREFIX."pages WHERE page_id = '$page_id' LIMIT 1");
				$fetch_link = $get_link->fetchRow();
				$link = page_link($fetch_link['link']);
				$content = preg_replace($pattern,$link,$content);
			}
			echo stripslashes($content);
			exit();
		} else {
			header("Location: ".WB_URL.PAGES_DIRECTORY."/index".PAGE_EXTENSION);
			exit();
		}
	} else {
		// Go to or show default page
		if($default_num_rows > 0) {
			$fetch_default = $get_default->fetchRow();
			$default_link = $fetch_default['link'];
			$default_page_id = $fetch_default['page_id'];
			// Check if we should redirect or include page inline
			if(HOMEPAGE_REDIRECTION) {
				// Redirect to page
				header("Location: ".page_link($default_link));
				exit();
			} else {
				// Include page inline
				$page_id = $default_page_id;
			}
		} else {
			// No pages have been added, so print under construction page
			require_once(WB_PATH.'/languages/'.DEFAULT_LANGUAGE.'.php');
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<head><title><?php echo $MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION']; ?></title>
			<style type="text/css"><!-- body { font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size: 12px; color: #000000;	background-color: #FFFFFF;	margin: 20px; text-align: center; }
			h1 { margin: 0; padding: 0; }--></style></head><body>
			<h1><?php echo $MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION']; ?></h1><br />
			<?php echo $MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON']; ?></body></html>
			<?php
			exit();
		}
	}
}
// Get default page link
if(!isset($fetch_default)) { $fetch_default = $get_default->fetchRow(); $default_link = $fetch_default['link']; }
/*
End page-select code
*/
/*
Begin page details code
*/
// Get page details
if($page_id != 0) {
	// Query page details
	$query_page = "SELECT * FROM ".TABLE_PREFIX."pages WHERE page_id = '$page_id'";
	$get_page = $database->query($query_page);
	// Make sure page was found in database
	if($get_page->numRows() == 0) {
		// Print page not found message
		exit("Page not found");
	}
	// Fetch page details
	$page = $get_page->fetchRow();
	// Begin code to set details as either variables of constants
		// Page ID
		define('PAGE_ID', $page['page_id']);
		// Page Title
		define('PAGE_TITLE', stripslashes($page['page_title']));
		// Menu Title
		$menu_title = stripslashes($page['menu_title']);
		if($menu_title != '') {
			define('MENU_TITLE', $menu_title);
		} else {
			define('MENU_TITLE', PAGE_TITLE);
		}
		// Page parent
		define('PARENT', $page['parent']);
		// Page root parent
		define('ROOT_PARENT', $page['root_parent']);
		// Page level
		define('LEVEL', $page['level']);
		// Page visibility
		define('VISIBILITY', $page['visibility']);
		// Page trail
		$page_trail = array();
		foreach(explode(',', $page['page_trail']) AS $pid) {
			$page_trail[$pid] = $pid;
		}
		// Page description
		$page_description = $page['description'];
		// Page keywords
		$page_keywords = $page['keywords'];
		// Page link
		$page_link_original = $page['link'];
		$page_link = page_link($page_link_original);
	// End code to set details as either variables of constants
}
// Work-out if any possible in-line search boxes should be shown
if(SEARCH == 'public') {
	define('SHOW_SEARCH', true);
} elseif(SEARCH == 'private' AND VISIBILITY == 'private') {
	define('SHOW_SEARCH', true);
} elseif(SEARCH == 'private' AND isset($admin) AND $admin->is_authenticated() == true) {
	define('SHOW_SEARCH', true);
} else {
	define('SHOW_SEARCH', false);
}
// Work-out if menu should be shown
if(!defined('SHOW_MENU')) {
	define('SHOW_MENU', true);
}
// Work-out if login menu constants should be set
if(FRONTEND_LOGIN) {
	// Set login menu constants
	define('LOGIN_URL', WB_URL.'/account/login'.PAGE_EXTENSION);
	define('LOGOUT_URL', WB_URL.'/account/logout'.PAGE_EXTENSION);
	define('FORGOT_URL', WB_URL.'/account/forgot'.PAGE_EXTENSION);
	define('PREFERENCES_URL', WB_URL.'/account/preferences'.PAGE_EXTENSION);
	define('SIGNUP_URL', WB_URL.'/account/signup'.PAGE_EXTENSION);
}
// Check user is allow to view this page
if(FRONTEND_LOGIN AND VISIBILITY == 'private' OR FRONTEND_LOGIN AND VISIBILITY == 'registered') {
	// Double-check front-end login is enabled
	if(FRONTEND_LOGIN != true) {
		// Users shouldnt be allowed to view private pages
		header("Location: ".WB_URL.PAGES_DIRECTORY."/index".PAGE_EXTENSION);
	}
	// Check if the user is authenticated
	if($admin->is_authenticated() == false) {
		// User needs to login first
		header("Location: ".WB_URL."/account/login".PAGE_EXTENSION);
	}
	// Check if we should show this page
	if($admin->show_page($page, $admin) == false) {
		// User isnt allowed on this page so tell them
		function page_content($block = 1) {
			global $MESSAGE;
			echo $MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'];
		}
	}
	// Set extra private sql code
	$extra_sql = ",viewing_groups,viewing_users";
	$extra_where_sql = "visibility != 'none' AND visibility != 'hidden' AND visibility != 'deleted'";
} elseif(!FRONTEND_LOGIN AND VISIBILITY == 'private' OR !FRONTEND_LOGIN AND VISIBILITY == 'registered') {
	// User isnt allowed on this page so tell them
	function page_content($block = 1) {
		global $MESSAGE;
		echo $MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'];
	}
} elseif(VISIBILITY == 'deleted') {
	// User isnt allowed on this page so tell them
	function page_content($block = 1) {
		global $MESSAGE;
		echo $MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'];
	}
}
if(!isset($extra_sql)) {
	// Set extra private sql code
	if(FRONTEND_LOGIN == 'enabled') {
		if($admin->is_authenticated()) {
			$extra_sql = '';
			$extra_where_sql = "visibility != 'none' AND visibility != 'hidden' AND visibility != 'deleted'";
		} else {
			$extra_sql = '';
			$extra_where_sql = "visibility != 'none' AND visibility != 'hidden' AND visibility != 'deleted' AND visibility != 'private'";
		}
	} else {
		$extra_sql = '';
		$extra_where_sql = "visibility != 'none' AND visibility != 'hidden' AND visibility != 'deleted' AND visibility != 'private' AND visibility != 'registered'";
	}
}
// Check if we should add page language sql code
if(PAGE_LANGUAGES) {
	if(defined('GET_LANGUAGE')) {
		$extra_where_sql .= " AND language = '".LANGUAGE."'";
	} elseif(defined('USER_LANGUAGE')) {
		$extra_where_sql .= " AND language = '".DEFAULT_LANGUAGE."'";
	} else {
		$extra_where_sql .= " AND language = '".DEFAULT_LANGUAGE."'";
	}
}
// Get website settings (title, keywords, description, header, and footer)
$query_settings = "SELECT name,value FROM ".TABLE_PREFIX."settings";
$get_settings = $database->query($query_settings);
while($setting = $get_settings->fetchRow()) {
	switch($setting['name']) {
		case 'title':
			define('WEBSITE_TITLE', stripslashes($setting['value']));
		break;
		case 'description':
			if($page_description != '') {
				define('WEBSITE_DESCRIPTION', $page_description);
			} else {
				define('WEBSITE_DESCRIPTION', stripslashes($setting['value']));
			}
		break;
		case 'keywords':
			if($page_keywords != '') {
				define('WEBSITE_KEYWORDS', stripslashes($setting['value']).' '.$page_keywords);
			} else {
				define('WEBSITE_KEYWORDS', stripslashes($setting['value']));
			}
		break;
		case 'header':
			define('WEBSITE_HEADER', stripslashes($setting['value']));
		break;
		case 'footer':
			define('WEBSITE_FOOTER', stripslashes($setting['value']));
		break;
	}
}
// Figure out what template to use
if(!defined('TEMPLATE')) {
	if(isset($page['template']) AND $page['template'] != '') {
		if(file_exists(WB_PATH.'/templates/'.$page['template'].'/index.php')) {
			define('TEMPLATE', $page['template']);
		} else {
			define('TEMPLATE', DEFAULT_TEMPLATE);
		}
	} else {
		define('TEMPLATE', DEFAULT_TEMPLATE);
	}
}
// Set the template dir
define('TEMPLATE_DIR', WB_URL.'/templates/'.TEMPLATE);
/*
End page details code
*/
/*
Begin Template functions
*/
// Function for page title
function page_title($spacer = ' - ', $template = '[WEBSITE_TITLE][SPACER][PAGE_TITLE]') {
	$vars = array('[WEBSITE_TITLE]', '[PAGE_TITLE]', '[MENU_TITLE]', '[SPACER]');
	$values = array(WEBSITE_TITLE, PAGE_TITLE, MENU_TITLE, $spacer);
	echo str_replace($vars, $values, $template);
}
// Function for page description
function page_description() {
	echo WEBSITE_DESCRIPTION;
}
// Function for page keywords
function page_keywords() {
	echo WEBSITE_KEYWORDS;
}
// Function for page header
function page_header($date_format = 'Y') {
	echo WEBSITE_HEADER;
}
// Function for page footer
function page_footer($date_format = 'Y') {
	echo str_replace('[YEAR]', date($date_format), WEBSITE_FOOTER);
}
// Function to generate menu
function page_menu($parent = 0, $menu_number = 1, $item_template = '<li[class]>[a][menu_title][/a]</li>', $menu_header = '<ul>', $menu_footer = '</ul>', $default_class = ' class="menu_default"', $current_class = ' class="menu_current"', $recurse = LEVEL) {
	global $database, $admin, $page_id, $page_trail, $default_link, $extra_sql, $extra_where_sql;
	// Check if we should add menu number check to query
	if($parent == 0) {
		 $menu_number = "menu = '$menu_number'";
	} else {
		$menu_number = '1';
	}
	// Query pages
	$query_menu = $database->query("SELECT page_id,menu_title,page_title,link,target,level,visibility$extra_sql FROM ".TABLE_PREFIX."pages WHERE parent = '$parent' AND $menu_number AND $extra_where_sql ORDER BY position ASC");
	// Check if there are any pages to show
	if($query_menu->numRows() > 0) {
		// Print menu header
		echo $menu_header;
		// Loop through pages
		while($page = $query_menu->fetchRow()) {
			// Create vars
			$vars = array('[class]', '[a]', '[/a]', '[menu_title]', '[page_title]');
			// Work-out class
			if($page['page_id'] == PAGE_ID) {
				$class = $current_class;
			} else {
				$class = $default_class;
			}
			// Check if link is same as first page link, and if so change to WB URL
			if($page['link'] == $default_link AND !INTRO_PAGE) {
				$link = WB_URL;
			} else {
				$link = page_link($page['link']);
			}
			// Create values
			$values = array($class, '<a href="'.$link.'" target="'.$page['target'].'">', '</a>', stripslashes($page['menu_title']), stripslashes($page['page_title']));
			// Replace vars with value and print
			echo str_replace($vars, $values, $item_template);
			// Generate sub-menu
			if(isset($page_trail[$page['page_id']])) {
				page_menu($page['page_id'], $menu_number, $item_template, $menu_header, $menu_footer, $default_class, $current_class, $recurse-1);
			}
		}
		// Print menu footer
		echo $menu_footer;
	}
}
// Function for page content
$globals[] = 'database';
$globals[] = 'admin';
$globals[] = 'TEXT';
$globals[] = 'MENU';
$globals[] = 'HEADING';
$globals[] = 'MESSAGE';
if(!function_exists('page_content')) {
	function page_content($block = 1) {
		// Get outside objects
		global $globals;
		if(isset($globals) AND is_array($globals)) { foreach($globals AS $global_name) { global $$global_name; } }
		// Make sure block is numeric
		if(!is_numeric($block)) { $block = 1; }
		// Include page content
		if(!defined('PAGE_CONTENT')) {
			// First get all sections for this page
			$query_sections = $database->query("SELECT section_id,module FROM ".TABLE_PREFIX."sections WHERE page_id = '".PAGE_ID."' AND block = '$block' ORDER BY position");
			if($query_sections->numRows() > 0) {
				// Loop through them and include there modules file
				while($section = $query_sections->fetchRow()) {
					$section_id = $section['section_id'];
					$module = $section['module'];
					require(WB_PATH.'/modules/'.$module.'/view.php');
				}
			}
		} else {
			if($block == 1) {
				require(PAGE_CONTENT);
			}
		}
	}
}
/*
End Template functions
*/
// Begin WB < 2.4.x template compatibility code
	// Make extra_sql accessable through private_sql
	$private_sql = $extra_sql;
	$private_where_sql = $extra_where_sql;
	// Query pages for menu
	$menu1 = $database->query("SELECT page_id,menu_title,page_title,link,target,visibility$extra_sql FROM ".TABLE_PREFIX."pages WHERE parent = '0' AND $extra_where_sql ORDER BY position ASC");
	// Check if current pages is a parent page and if we need its submenu
	if(PARENT == 0) {
		// Get the pages submenu
		$menu2 = $database->query("SELECT page_id,menu_title,page_title,link,target,visibility$extra_sql FROM ".TABLE_PREFIX."pages WHERE parent = '".PAGE_ID."' AND $extra_where_sql ORDER BY position ASC");
	} else {
		// Get the pages submenu
		$menu2 = $database->query("SELECT page_id,menu_title,page_title,link,target,visibility$extra_sql FROM ".TABLE_PREFIX."pages WHERE parent = '".PARENT."' AND $extra_where_sql ORDER BY position ASC");
	}
// End WB < 2.4.x template compatibility code
// Include template file
require(WB_PATH.'/templates/'.TEMPLATE.'/index.php');

?>