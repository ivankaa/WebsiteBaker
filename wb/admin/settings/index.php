<?php

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

require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
if(isset($_GET['advanced']) AND $_GET['advanced'] == 'yes') {
	$admin = new admin('Settings', 'settings_advanced');
} else {
	$admin = new admin('Settings', 'settings_basic');
}

// Create new database object
$database = new database();

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Create new template object
$template = new Template(ADMIN_PATH.'/settings');
$template->set_file('page', 'template.html');
$template->set_block('page', 'main_block', 'main');

// Query current settings in the db, then loop through them and print them
$query = "SELECT * FROM ".TABLE_PREFIX."settings";
$results = $database->query($query);
while($setting = $results->fetchRow()) {
	$setting_name = $setting['name'];
	$setting_value = htmlspecialchars($admin->stripslashes($setting['value']));
	switch($setting_name) {
		// Website title
		case 'title':
			$template->set_var('TITLE', $setting_value);
		break;
		// Website description
		case 'description':
			$template->set_var('DESCRIPTION', $setting_value);
		break;
		// Website keywords
		case 'keywords':
			$template->set_var('KEYWORDS', $setting_value);
		break;
		// Website header
		case 'header':
			$template->set_var('HEADER', $setting_value);
		break;
		// Website header
		case 'header':
			$template->set_var('HEADER', $setting_value);
		break;
		// Website footer
		case 'footer':
			$template->set_var('FOOTER', $setting_value);
		break;
	}
}

// Query current settings in the db, then loop through them and print them
$query = "SELECT * FROM ".TABLE_PREFIX."search WHERE extra = ''";
$results = $database->query($query);
while($setting = $results->fetchRow()) {
	$setting_name = $setting['name'];
	$setting_value = htmlspecialchars($admin->stripslashes($setting['value']));
	switch($setting_name) {
		// Search header
		case 'header':
			$template->set_var('SEARCH_HEADER', $setting_value);
		break;
		// Search results header
		case 'results_header':
			$template->set_var('SEARCH_RESULTS_HEADER', $setting_value);
		break;
		// Search results loop
		case 'results_loop':
			$template->set_var('SEARCH_RESULTS_LOOP', $setting_value);
		break;
		// Search results footer
		case 'results_footer':
			$template->set_var('SEARCH_RESULTS_FOOTER', $setting_value);
		break;
		// Search no results
		case 'no_results':
			$template->set_var('SEARCH_NO_RESULTS', $setting_value);
		break;
		// Search footer
		case 'footer':
			$template->set_var('SEARCH_FOOTER', $setting_value);
		break;
		// Search template
		case 'template':
			$search_template = $setting_value;
		break;
	}
}

// Do the same for settings stored in config file as with ones in db
$database_type = '';

// Tell the browser whether or not to show advanced options
if(isset($_GET['advanced']) AND $_GET['advanced'] == 'yes') {
	$template->set_var('DISPLAY_ADVANCED', '');
	$template->set_var('ADVANCED', 'yes');
	$template->set_var('ADVANCED_BUTTON', '<< '.$TEXT['HIDE_ADVANCED']);
	$template->set_var('ADVANCED_LINK', 'index.php?advanced=no');
	$template->set_var('BASIC_FILE_PERMS_ID', 'hide');
	$template->set_var('ADVANCED_FILE_PERMS_ID', 'file_perms_box');
} else {
	$template->set_var('DISPLAY_ADVANCED', 'none');
	$template->set_var('ADVANCED', 'no');
	$template->set_var('ADVANCED_BUTTON', $TEXT['SHOW_ADVANCED'].' >>');
	$template->set_var('ADVANCED_LINK', 'index.php?advanced=yes');
	$template->set_var('BASIC_FILE_PERMS_ID', 'file_perms_box');
	$template->set_var('ADVANCED_FILE_PERMS_ID', 'hide');
}

$template->set_var(array(	
									'PAGE_EXTENSION' => PAGE_EXTENSION,
									'PAGE_SPACER' => PAGE_SPACER,
									'WB_PATH' => WB_PATH,
									'WB_URL' => WB_URL,
									'ADMIN_PATH' => ADMIN_PATH,
									'ADMIN_URL' => ADMIN_URL,
									'DATABASE_TYPE' => DB_TYPE,
									'DATABASE_HOST' => DB_HOST,
									'DATABASE_USERNAME' => DB_USERNAME,
									'DATABASE_NAME' => DB_NAME,
									'TABLE_PREFIX' => TABLE_PREFIX
								 )
						 );

// Insert groups into signup list
$template->set_block('main_block', 'group_list_block', 'group_list');
$results = $database->query("SELECT group_id, name FROM ".TABLE_PREFIX."groups WHERE group_id != '1'");
if($results->numRows() > 0) {
	while($group = $results->fetchRow()) {
		$template->set_var('ID', $group['group_id']);
		$template->set_var('NAME', $group['name']);
		if(FRONTEND_SIGNUP == $group['group_id']) {
			$template->set_var('SELECTED', 'selected');
		} else {
			$template->set_var('SELECTED', '');
		}
		$template->parse('group_list', 'group_list_block', true);
	}
} else {
	$template->set_var('ID', 'disabled');
	$template->set_var('NAME', $MESSAGE['GROUPS']['NO_GROUPS_FOUND']);
	$template->parse('group_list', 'group_list_block', true);
}

// Insert language values
$template->set_block('main_block', 'language_list_block', 'language_list');
if($handle = opendir(WB_PATH.'/languages/')) {
   while (false !== ($file = readdir($handle))) {
		if($file != '.' AND $file != '..' AND !is_dir($file) AND $file != 'index.php') {
			// Get language name
			require(WB_PATH.'/languages/'.$file);
			// Insert code and name
			$template->set_var(array(
											'CODE' => $language_code,
											'NAME' => $language_name
											)
									);
			// Check if it is selected
			if(DEFAULT_LANGUAGE == $language_code) {
				$template->set_var('SELECTED', ' selected');
			} else {
				$template->set_var('SELECTED', '');
			}
			$template->parse('language_list', 'language_list_block', true);
		}
	}
	// Restore language to original file
	require(WB_PATH.'/languages/'.LANGUAGE.'.php');
}

// Insert default timezone values
require(ADMIN_PATH.'/interface/timezones.php');
$template->set_block('main_block', 'timezone_list_block', 'timezone_list');
foreach($TIMEZONES AS $hour_offset => $title) {
	// Make sure we dont list "System Default" as we are setting this value!
	if($hour_offset != '-20') {
		$template->set_var('VALUE', $hour_offset);
		$template->set_var('NAME', $title);
		if(DEFAULT_TIMEZONE == $hour_offset*60*60) {
			$template->set_var('SELECTED', 'selected');
		} else {
			$template->set_var('SELECTED', '');
		}
		$template->parse('timezone_list', 'timezone_list_block', true);
	}
}

// Insert date format list
require(ADMIN_PATH.'/interface/date_formats.php');
$template->set_block('main_block', 'date_format_list_block', 'date_format_list');
foreach($DATE_FORMATS AS $format => $title) {
	$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
	if($format != 'system_default') {
		$template->set_var('VALUE', $format);
	} else {
		$template->set_var('VALUE', '');
	}
	$template->set_var('NAME', $title);
	if(DEFAULT_DATE_FORMAT == $format) {
		$template->set_var('SELECTED', 'selected');
	} else {
		$template->set_var('SELECTED', '');
	}
	$template->parse('date_format_list', 'date_format_list_block', true);
}

// Insert time format list
require(ADMIN_PATH.'/interface/time_formats.php');
$template->set_block('main_block', 'time_format_list_block', 'time_format_list');
foreach($TIME_FORMATS AS $format => $title) {
	$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
	if($format != 'system_default') {
		$template->set_var('VALUE', $format);
	} else {
		$template->set_var('VALUE', '');
	}
	$template->set_var('NAME', $title);
	if(DEFAULT_TIME_FORMAT == $format) {
		$template->set_var('SELECTED', 'selected');
	} else {
		$template->set_var('SELECTED', '');
	}
	$template->parse('time_format_list', 'time_format_list_block', true);
}

// Insert templates
$template->set_block('main_block', 'template_list_block', 'template_list');
if($handle = opendir(WB_PATH.'/templates/')) {
	while (false !== ($file = readdir($handle))) {
		if($file != "." AND $file != ".." AND $file != ".svn" AND is_dir(WB_PATH."/templates/$file") AND file_exists(WB_PATH."/templates/$file/info.php")) {
			include(WB_PATH."/templates/$file/info.php");
			$template->set_var('FILE', $file);
			$template->set_var('NAME', $template_name);
			if($file == DEFAULT_TEMPLATE ? $selected = ' selected' : $selected = '');
			$template->set_var('SELECTED', $selected);
			$template->parse('template_list', 'template_list_block', true);
		}
	}
}

// Insert templates for search settings
$template->set_block('main_block', 'search_template_list_block', 'search_template_list');
if($search_template == '') { $selected = ' selected'; } else { $selected = ''; }
$template->set_var(array('FILE' => '', 'NAME' => $TEXT['SYSTEM_DEFAULT'], 'SELECTED' => $selected));
$template->parse('search_template_list', 'search_template_list_block', true);
if($handle = opendir(WB_PATH.'/templates/')) {
	while (false !== ($file = readdir($handle))) {
		if($file != "." AND $file != ".." AND $file != ".svn" AND is_dir(WB_PATH."/templates/$file") AND file_exists(WB_PATH."/templates/$file/info.php")) {
			include(WB_PATH."/templates/$file/info.php");
			$template->set_var('FILE', $file);
			$template->set_var('NAME', $template_name);
			if($file == $search_template ? $selected = ' selected' : $selected = '');
			$template->set_var('SELECTED', $selected);
			$template->parse('search_template_list', 'search_template_list_block', true);
		}
	}
}

// Insert default error reporting values
require(ADMIN_PATH.'/interface/er_levels.php');
$template->set_block('main_block', 'error_reporting_list_block', 'error_reporting_list');
foreach($ER_LEVELS AS $value => $title) {
	$template->set_var('VALUE', $value);
	$template->set_var('NAME', $title);
	if(ER_LEVEL == $value) {
		$template->set_var('SELECTED', 'selected');
	} else {
		$template->set_var('SELECTED', '');
	}
	$template->parse('error_reporting_list', 'error_reporting_list_block', true);
}

// Insert permissions values
if($admin->get_permission('settings_advanced') != true) {
	$template->set_var('DISPLAY_ADVANCED_BUTTON', 'hide');
}

// Insert page level limits
$template->set_block('main_block', 'page_level_limit_list_block', 'page_level_limit_list');
for($i = 1; $i <= 10; $i++) {
	$template->set_var('NUMBER', $i);
	if(PAGE_LEVEL_LIMIT == $i) {
		$template->set_var('SELECTED', 'selected');
	} else {
		$template->set_var('SELECTED', '');
	}
	$template->parse('page_level_limit_list', 'page_level_limit_list_block', true);
}

// Work-out if multiple menus feature is enabled
if(defined('MULTIPLE_MENUS') AND MULTIPLE_MENUS == true) {
	$template->set_var('MULTIPLE_MENUS_ENABLED', ' checked');
} else {
	$template->set_var('MULTIPLE_MENUS_DISABLED', ' checked');
}

// Work-out if page languages feature is enabled
if(defined('PAGE_LANGUAGES') AND PAGE_LANGUAGES == true) {
	$template->set_var('PAGE_LANGUAGES_ENABLED', ' checked');
} else {
	$template->set_var('PAGE_LANGUAGES_DISABLED', ' checked');
}

// Work-out if smart login feature is enabled
if(defined('SMART_LOGIN') AND SMART_LOGIN == true) {
	$template->set_var('SMART_LOGIN_ENABLED', ' checked');
} else {
	$template->set_var('SMART_LOGIN_DISABLED', ' checked');
}

// Work-out if section blocks feature is enabled
if(defined('SECTION_BLOCKS') AND SECTION_BLOCKS == true) {
	$template->set_var('SECTION_BLOCKS_ENABLED', ' checked');
} else {
	$template->set_var('SECTION_BLOCKS_DISABLED', ' checked');
}

// Work-out if homepage redirection feature is enabled
if(defined('HOMEPAGE_REDIRECTION') AND HOMEPAGE_REDIRECTION == true) {
	$template->set_var('HOMEPAGE_REDIRECTION_ENABLED', ' checked');
} else {
	$template->set_var('HOMEPAGE_REDIRECTION_DISABLED', ' checked');
}

// Work-out which server os should be checked
if(OPERATING_SYSTEM == 'linux') {
	$template->set_var('LINUX_SELECTED', ' checked');
} elseif(OPERATING_SYSTEM == 'windows') {
	$template->set_var('WINDOWS_SELECTED', ' checked');
}

// Work-out if manage sections feature is enabled
if(MANAGE_SECTIONS) {
	$template->set_var('MANAGE_SECTIONS_ENABLED', ' checked');
} else {
	$template->set_var('MANAGE_SECTIONS_DISABLED', ' checked');
}

// Work-out if intro feature is enabled
if(INTRO_PAGE) {
	$template->set_var('INTRO_PAGE_ENABLED', ' checked');
} else {
	$template->set_var('INTRO_PAGE_DISABLED', ' checked');
}

// Work-out if frontend login feature is enabled
if(FRONTEND_LOGIN) {
	$template->set_var('PRIVATE_ENABLED', ' checked');
} else {
	$template->set_var('PRIVATE_DISABLED', ' checked');
}

// Work-out if page trash feature is disabled, in-line, or separate
if(PAGE_TRASH == 'disabled') {
	$template->set_var('PAGE_TRASH_DISABLED', ' checked');
} elseif(PAGE_TRASH == 'inline') {
	$template->set_var('PAGE_TRASH_INLINE', ' checked');
} elseif(PAGE_TRASH == 'separate') {
	$template->set_var('PAGE_TRASH_SEPARATE', ' checked');
}

// Work-out if media home folde feature is enabled
if(HOME_FOLDERS) {
	$template->set_var('HOME_FOLDERS_ENABLED', ' checked');
} else {
	$template->set_var('HOME_FOLDERS_DISABLED', ' checked');
}

// Insert search select
if(SEARCH == 'private') {
	$template->set_var('PRIVATE_SEARCH', 'selected');
} elseif(SEARCH == 'registered') {
	$template->set_var('REGISTERED_SEARCH', 'selected');
} elseif(SEARCH == 'none') {
	$template->set_var('NONE_SEARCH', 'selected');
}

// Work-out if 777 permissions are set
if(STRING_FILE_MODE == '0777' AND STRING_DIR_MODE == '0777') {
	$template->set_var('WORLD_WRITEABLE_SELECTED', ' checked');
}

// Work-out which file mode boxes are checked
if(extract_permission(STRING_FILE_MODE, 'u', 'r')) {
	$template->set_var('FILE_U_R_CHECKED', 'checked');
}
if(extract_permission(STRING_FILE_MODE, 'u', 'w')) {
	$template->set_var('FILE_U_W_CHECKED', 'checked');
}
if(extract_permission(STRING_FILE_MODE, 'u', 'e')) {
	$template->set_var('FILE_U_E_CHECKED', 'checked');
}
if(extract_permission(STRING_FILE_MODE, 'g', 'r')) {
	$template->set_var('FILE_G_R_CHECKED', 'checked');
}
if(extract_permission(STRING_FILE_MODE, 'g', 'w')) {
	$template->set_var('FILE_G_W_CHECKED', 'checked');
}
if(extract_permission(STRING_FILE_MODE, 'g', 'e')) {
	$template->set_var('FILE_G_E_CHECKED', 'checked');
}
if(extract_permission(STRING_FILE_MODE, 'o', 'r')) {
	$template->set_var('FILE_O_R_CHECKED', 'checked');
}
if(extract_permission(STRING_FILE_MODE, 'o', 'w')) {
	$template->set_var('FILE_O_W_CHECKED', 'checked');
}
if(extract_permission(STRING_FILE_MODE, 'o', 'e')) {
	$template->set_var('FILE_O_E_CHECKED', 'checked');
}
// Work-out which dir mode boxes are checked
if(extract_permission(STRING_DIR_MODE, 'u', 'r')) {
	$template->set_var('DIR_U_R_CHECKED', 'checked');
}
if(extract_permission(STRING_DIR_MODE, 'u', 'w')) {
	$template->set_var('DIR_U_W_CHECKED', 'checked');
}
if(extract_permission(STRING_DIR_MODE, 'u', 'e')) {
	$template->set_var('DIR_U_E_CHECKED', 'checked');
}
if(extract_permission(STRING_DIR_MODE, 'g', 'r')) {
	$template->set_var('DIR_G_R_CHECKED', 'checked');
}
if(extract_permission(STRING_DIR_MODE, 'g', 'w')) {
	$template->set_var('DIR_G_W_CHECKED', 'checked');
}
if(extract_permission(STRING_DIR_MODE, 'g', 'e')) {
	$template->set_var('DIR_G_E_CHECKED', 'checked');
}
if(extract_permission(STRING_DIR_MODE, 'o', 'r')) {
	$template->set_var('DIR_O_R_CHECKED', 'checked');
}
if(extract_permission(STRING_DIR_MODE, 'o', 'w')) {
	$template->set_var('DIR_O_W_CHECKED', 'checked');
}
if(extract_permission(STRING_DIR_MODE, 'o', 'e')) {
	$template->set_var('DIR_O_E_CHECKED', 'checked');
}

// Insert WYSIWYG style value into template
$template->set_var('WYSIWYG_STYLE', $admin->stripslashes(WYSIWYG_STYLE));

// Insert Server Email value into template
$template->set_var('SERVER_EMAIL', SERVER_EMAIL);

// Insert language headings
$template->set_var(array(
								'HEADING_GENERAL_SETTINGS' => $HEADING['GENERAL_SETTINGS'],
								'HEADING_DEFAULT_SETTINGS' => $HEADING['DEFAULT_SETTINGS'],
								'HEADING_SEARCH_SETTINGS' => $HEADING['SEARCH_SETTINGS'],
								'HEADING_FILESYSTEM_SETTINGS' => $HEADING['FILESYSTEM_SETTINGS']
								)
						);
// Insert language text and messages
$template->set_var(array(
								'TEXT_WEBSITE_TITLE' => $TEXT['WEBSITE_TITLE'],
								'TEXT_WEBSITE_DESCRIPTION' => $TEXT['WEBSITE_DESCRIPTION'],
								'TEXT_WEBSITE_KEYWORDS' => $TEXT['WEBSITE_KEYWORDS'],
								'TEXT_WEBSITE_HEADER' => $TEXT['WEBSITE_HEADER'],
								'TEXT_WEBSITE_FOOTER' => $TEXT['WEBSITE_FOOTER'],
								'TEXT_HEADER' => $TEXT['HEADER'],
								'TEXT_FOOTER' => $TEXT['FOOTER'],
								'TEXT_VISIBILITY' => $TEXT['VISIBILITY'],
								'TEXT_RESULTS_HEADER' => $TEXT['RESULTS_HEADER'],
								'TEXT_RESULTS_LOOP' => $TEXT['RESULTS_LOOP'],
								'TEXT_RESULTS_FOOTER' => $TEXT['RESULTS_FOOTER'],
								'TEXT_NO_RESULTS' => $TEXT['NO_RESULTS'],
								'TEXT_TEXT' => $TEXT['TEXT'],
								'TEXT_DEFAULT' => $TEXT['DEFAULT'],
								'TEXT_LANGUAGE' => $TEXT['LANGUAGE'],
								'TEXT_TIMEZONE' => $TEXT['TIMEZONE'],
								'TEXT_DATE_FORMAT' => $TEXT['DATE_FORMAT'],
								'TEXT_TIME_FORMAT' => $TEXT['TIME_FORMAT'],
								'TEXT_TEMPLATE' => $TEXT['TEMPLATE'],
								'TEXT_PAGE_LEVEL_LIMIT' => $TEXT['PAGE_LEVEL_LIMIT'],
								'TEXT_INTRO_PAGE' => $TEXT['INTRO_PAGE'],
								'TEXT_FRONTEND' => $TEXT['FRONTEND'],
								'TEXT_LOGIN' => $TEXT['LOGIN'],
								'TEXT_SIGNUP' => $TEXT['SIGNUP'],
								'TEXT_PHP_ERROR_LEVEL' => $TEXT['PHP_ERROR_LEVEL'],
								'TEXT_PAGE_EXTENSION' => $TEXT['PAGE_EXTENSION'],
								'TEXT_PAGE_SPACER' => $TEXT['PAGE_SPACER'],
								'TEXT_SERVER_OPERATING_SYSTEM' => $TEXT['SERVER_OPERATING_SYSTEM'],
								'TEXT_LINUX_UNIX_BASED' => $TEXT['LINUX_UNIX_BASED'],
								'TEXT_WINDOWS' => $TEXT['WINDOWS'],
								'TEXT_ADMIN' => $TEXT['ADMIN'],
								'TEXT_TYPE' => $TEXT['TYPE'],
								'TEXT_DATABASE' => $TEXT['DATABASE'],
								'TEXT_HOST' => $TEXT['HOST'],
								'TEXT_USERNAME' => $TEXT['USERNAME'],
								'TEXT_PASSWORD' => $TEXT['PASSWORD'],
								'TEXT_NAME' => $TEXT['NAME'],
								'TEXT_TABLE_PREFIX' => $TEXT['TABLE_PREFIX'],
								'TEXT_SAVE' => $TEXT['SAVE'],
								'TEXT_RESET' => $TEXT['RESET'],
								'TEXT_CHANGES' => $TEXT['CHANGES'],
								'TEXT_ENABLED' => $TEXT['ENABLED'],
								'TEXT_DISABLED' => $TEXT['DISABLED'],
								'TEXT_MANAGE_SECTIONS' => $HEADING['MANAGE_SECTIONS'],
								'TEXT_MANAGE' => $TEXT['MANAGE'],
								'TEXT_SEARCH' => $TEXT['SEARCH'],
								'TEXT_PUBLIC' => $TEXT['PUBLIC'],
								'TEXT_PRIVATE' => $TEXT['PRIVATE'],
								'TEXT_REGISTERED' => $TEXT['REGISTERED'],
								'TEXT_NONE' => $TEXT['NONE'],
								'TEXT_FILES' => strtoupper(substr($TEXT['FILES'], 0, 1)).substr($TEXT['FILES'], 1),
								'TEXT_DIRECTORIES' => $TEXT['DIRECTORIES'],
								'TEXT_FILESYSTEM_PERMISSIONS' => $TEXT['FILESYSTEM_PERMISSIONS'],
								'TEXT_USER' => $TEXT['USER'],
								'TEXT_GROUP' => $TEXT['GROUP'],
								'TEXT_OTHERS' => $TEXT['OTHERS'],
								'TEXT_READ' => $TEXT['READ'],
								'TEXT_WRITE' => $TEXT['WRITE'],
								'TEXT_EXECUTE' => $TEXT['EXECUTE'],
								'TEXT_SMART_LOGIN' => $TEXT['SMART_LOGIN'],
								'TEXT_MULTIPLE_MENUS' => $TEXT['MULTIPLE_MENUS'],
								'TEXT_HOMEPAGE_REDIRECTION' => $TEXT['HOMEPAGE_REDIRECTION'],
								'TEXT_PAGE_LANGUAGES' => $TEXT['PAGE_LANGUAGES'],
								'TEXT_SECTION_BLOCKS' => $TEXT['SECTION_BLOCKS'],
								'TEXT_PLEASE_SELECT' => $TEXT['PLEASE_SELECT'],
								'TEXT_PAGE_TRASH' => $TEXT['PAGE_TRASH'],
								'TEXT_INLINE' => $TEXT['INLINE'],
								'TEXT_SEPARATE' => $TEXT['SEPARATE'],
								'TEXT_HOME_FOLDERS' => $TEXT['HOME_FOLDERS'],
								'TEXT_WYSIWYG_STYLE' => $TEXT['WYSIWYG_STYLE'],
								'TEXT_SERVER_EMAIL' => $TEXT['SERVER_EMAIL'],
								'TEXT_WORLD_WRITEABLE_FILE_PERMISSIONS' => $TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'],
								'MODE_SWITCH_WARNING' => $MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'],
								'WORLD_WRITEABLE_WARNING' => $MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING']
								)
						);

// Parse template objects output
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

$admin->print_footer();

?>
