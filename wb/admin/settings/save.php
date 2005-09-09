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

// Find out if the user was view advanced options or not
if($_POST['advanced'] == 'yes' ? $advanced = '?advanced=yes' : $advanced = '');

// Print admin header
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
if($advanced == '') {
	$admin = new admin('Settings', 'settings_basic');
	$_POST['database_password'] = DB_PASSWORD;
} else {
	$admin = new admin('Settings', 'settings_advanced');
}

// Create new database object
$database = new database();

// Query current settings in the db, then loop through them and update the db with the new value
$query = "SELECT name FROM ".TABLE_PREFIX."settings";
$results = $database->query($query);
while($setting = $results->fetchRow()) {
	$setting_name = $setting['name'];
	$value = $admin->get_post($setting_name);
	$value = $admin->add_slashes($value);
	$database->query("UPDATE ".TABLE_PREFIX."settings SET value = '$value' WHERE name = '$setting_name'");
}

// Query current search settings in the db, then loop through them and update the db with the new value
$query = "SELECT name FROM ".TABLE_PREFIX."search WHERE extra = ''";
$results = $database->query($query);
while($search_setting = $results->fetchRow()) {
	$setting_name = $search_setting['name'];
	$post_name = 'search_'.$search_setting['name'];
	$value = $admin->get_post($post_name);
	$value = $admin->add_slashes($value);
	$database->query("UPDATE ".TABLE_PREFIX."search SET value = '$value' WHERE name = '$setting_name'");
}

// Check if there was an error updating the db
if($database->is_error()) {
	$admin->print_error($database->get_error, ADMIN_URL.'/settings/index.php'.$advanced);
} else {
	// Get timezone offset
	$timezone_offset = $_POST['timezone']*60*60;
	// Work out what code to put in for error reporting
	if($_POST['er_level'] == '') {
		$er_level = '';
		$er_level_code = '';
	} else {
		$er_level = $_POST['er_level'];
		$er_level_code = "error_reporting('".$_POST['er_level']."');\n";
	}
	// Work-out database type, and whether or not to use PEAR
	$database_type = $admin->get_post('database_type');
	
	// Work-out file mode
	if($advanced == '') {
		// Check if should be set to 777 or left alone
		if(isset($_POST['world_writeable']) AND $_POST['world_writeable'] == 'true') {
			$file_mode = '0777';
			$dir_mode = '0777';
		} else {
			$file_mode = STRING_FILE_MODE;
			$dir_mode = STRING_DIR_MODE;
		}
	} else {
		// Work-out the octal value for file mode
		$u = 0;
		if(isset($_POST['file_u_r']) AND $_POST['file_u_r'] == 'true') {
			$u = $u+4;
		}
		if(isset($_POST['file_u_w']) AND $_POST['file_u_w'] == 'true') {
			$u = $u+2;
		}
		if(isset($_POST['file_u_e']) AND $_POST['file_u_e'] == 'true') {
			$u = $u+1;
		}
		$g = 0;
		if(isset($_POST['file_g_r']) AND $_POST['file_g_r'] == 'true') {
			$g = $g+4;
		}
		if(isset($_POST['file_g_w']) AND $_POST['file_g_w'] == 'true') {
			$g = $g+2;
		}
		if(isset($_POST['file_g_e']) AND $_POST['file_g_e'] == 'true') {
			$g = $g+1;
		}
		$o = 0;
		if(isset($_POST['file_o_r']) AND $_POST['file_o_r'] == 'true') {
			$o = $o+4;
		}
		if(isset($_POST['file_o_w']) AND $_POST['file_o_w'] == 'true') {
			$o = $o+2;
		}
		if(isset($_POST['file_o_e']) AND $_POST['file_o_e'] == 'true') {
			$o = $o+1;
		}
		$file_mode = "0".$u.$g.$o;
		// Work-out the octal value for dir mode
		$u = 0;
		if(isset($_POST['dir_u_r']) AND $_POST['dir_u_r'] == 'true') {
			$u = $u+4;
		}
		if(isset($_POST['dir_u_w']) AND $_POST['dir_u_w'] == 'true') {
			$u = $u+2;
		}
		if(isset($_POST['dir_u_e']) AND $_POST['dir_u_e'] == 'true') {
			$u = $u+1;
		}
		$g = 0;
		if(isset($_POST['dir_g_r']) AND $_POST['dir_g_r'] == 'true') {
			$g = $g+4;
		}
		if(isset($_POST['dir_g_w']) AND $_POST['dir_g_w'] == 'true') {
			$g = $g+2;
		}
		if(isset($_POST['dir_g_e']) AND $_POST['dir_g_e'] == 'true') {
			$g = $g+1;
		}
		$o = 0;
		if(isset($_POST['dir_o_r']) AND $_POST['dir_o_r'] == 'true') {
			$o = $o+4;
		}
		if(isset($_POST['dir_o_w']) AND $_POST['dir_o_w'] == 'true') {
			$o = $o+2;
		}
		if(isset($_POST['dir_o_e']) AND $_POST['dir_o_e'] == 'true') {
			$o = $o+1;
		}
		$dir_mode = "0".$u.$g.$o;
	}
	
	// Rewrite WB_PATH and ADMIN_PATH if on Windows
	if($_POST['operating_system']=='windows') {
		$WB_PATH = str_replace('/','\\', WB_PATH);
		$WB_PATH = str_replace('\\','\\\\', $WB_PATH);
		$ADMIN_PATH = str_replace('/','\\', ADMIN_PATH);
		$ADMIN_PATH = str_replace('\\','\\\\', $ADMIN_PATH);
	} else {
		$WB_PATH = WB_PATH;
		$ADMIN_PATH = ADMIN_PATH;
	}
	// Write the remaining settings to the config file
	$config_filename = $WB_PATH.'/config.php';
	$config_content = "" .
	"<?php \n".
	"\n".
	"define('ER_LEVEL', '$er_level');\n".
	$er_level_code.
	"\n".
	"define('DEFAULT_LANGUAGE', '".str_replace(';', '', $_POST['language'])."');\n".
	"\n".
	"define('APP_NAME', 'wb');\n".
	"\n".
	"define('DB_TYPE', '".DB_TYPE."');\n".
	"define('DB_HOST', '".DB_HOST."');\n".
	"define('DB_USERNAME', '".DB_USERNAME."');\n".
	"define('DB_PASSWORD', '".DB_PASSWORD."');\n".
	"define('DB_NAME', '".DB_NAME."');\n".
	"\n".
	"define('TABLE_PREFIX', '".TABLE_PREFIX."');\n".
	"\n".
	"define('DEFAULT_TIMEZONE', '".$timezone_offset."');\n".
	"define('DEFAULT_DATE_FORMAT', '".str_replace(';', '', $_POST['date_format'])."');\n".
	"define('DEFAULT_TIME_FORMAT', '".str_replace(';', '', $_POST['time_format'])."');\n".
	"\n".
	"define('HOME_FOLDERS', ".$_POST['home_folders'].");\n".
	"\n".
	"define('DEFAULT_TEMPLATE', '".$_POST['template']."');\n".
	"define('MULTIPLE_MENUS', ".str_replace(';', '', $_POST['multiple_menus']).");\n".
	"\n".
	"define('INTRO_PAGE', ".str_replace(';', '', $_POST['intro_page']).");\n".
	"define('PAGE_TRASH', '".str_replace(';', '', $_POST['page_trash'])."');\n".
	"define('PAGE_LEVEL_LIMIT', '".str_replace(';', '', $_POST['page_level_limit'])."');\n".
	"define('HOMEPAGE_REDIRECTION', ".str_replace(';', '', $_POST['homepage_redirection']).");\n".
	"define('PAGE_LANGUAGES', ".str_replace(';', '', $_POST['page_languages']).");\n".
	"\n".
	"define('WYSIWYG_EDITOR', '".addslashes($_POST['wysiwyg_editor'])."');\n".
	"\n".
	"define('MANAGE_SECTIONS', ".str_replace(';', '', $_POST['manage_sections']).");\n".
	"define('SECTION_BLOCKS', ".str_replace(';', '', $_POST['section_blocks']).");\n".
	"\n".
	"define('SMART_LOGIN', ".str_replace(';', '', $_POST['smart_login']).");\n".
	"define('FRONTEND_LOGIN', ".str_replace(';', '', $_POST['frontend_login']).");\n".
	"define('FRONTEND_SIGNUP', ".str_replace(';', '', $_POST['frontend_signup']).");\n".
	"\n".
	"define('SERVER_EMAIL', '".$_POST['server_email']."');\n".
	"\n".
	"define('SEARCH', '".$admin->get_post('search')."');\n".
	"\n".
	"define('PAGE_EXTENSION', '".str_replace(';', '', $_POST['page_extension'])."');\n".
	"define('PAGE_SPACER', '".str_replace(';', '', $_POST['page_spacer'])."');\n".
	"\n".
	"define('PAGES_DIRECTORY', '".PAGES_DIRECTORY."');\n".
	"define('MEDIA_DIRECTORY', '".MEDIA_DIRECTORY."');\n".
	"\n".
	"define('OPERATING_SYSTEM', '".str_replace(';', '', $_POST['operating_system'])."');\n".
	"define('OCTAL_FILE_MODE', ".$file_mode.");\n".
	"define('STRING_FILE_MODE', '".$file_mode."');\n".
	"define('OCTAL_DIR_MODE', ".$dir_mode.");\n".
	"define('STRING_DIR_MODE', '".$dir_mode."');\n".
	"\n".
	"define('WB_PATH', '".$WB_PATH."');\n".
	"define('WB_URL', '".WB_URL."');\n".
	"\n".
	"define('ADMIN_PATH', '".$ADMIN_PATH."');\n".
	"define('ADMIN_URL', '".ADMIN_URL."');\n".
	"\n".
	"?>";
	
	// Check if file is writable first
	if(!is_writable($config_filename)) {
		$admin->print_error($MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'], ADMIN_URL.'/settings/index.php'.$advanced);
	} else {
		// Try and open the config file
		if (!$handle = fopen($config_filename, 'w')) {
			$admin->print_error($MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'], ADMIN_URL.'/settings/index.php'.$advanced);	
		} else {
			// Try and write to the config file
			if (fwrite($handle, $config_content) === FALSE) {
				$admin->print_error($MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'], ADMIN_URL.'/settings/index.php'.$advanced);
			} else {
				$admin->print_success($MESSAGE['SETTINGS']['SAVED'], ADMIN_URL.'/settings/index.php'.$advanced);
			}
		}
	}
	
}

$admin->print_footer();

?>
