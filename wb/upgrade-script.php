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

/** 
	PHP ROUTINES FOR THE UPGRADE SCRIPT
**/
// this function checks the basic configurations of an existing WB intallation
function status_msg($message, $class='check', $element='span') {
	// returns a status message
	echo '<'.$element .' class="' .$class .'">' .$message .'</' .$element.'>';
}

function check_baseline_configuration() {
	// check if config.php file exists and contains values
	status_msg('config.php: ');
	@include_once('config.php');
	if(defined('WB_PATH')) {
		status_msg('OK', 'ok');
	} else {
		// output error message and return error status
		status_msg('FAILED', 'error');
		status_msg('<strong>Error:</strong><br />No valid config.php found in: "<em>'
			.dirname(__FILE__).'</em>"<br />Please check if this script is placed in the WB root directory '
			.'and check/correct the config.php file before proceeding.<br /><br />You can not proceed before this error is fixed!!!'
			, 'warning', 'div');
		return -1;
	}

	// check if the WB 2.7 installation files were already uploaded via FTP
	status_msg(', WB 2.7 core files uploaded: ');
	@include_once(WB_PATH .'/framework/functions.php');
	@include_once(WB_PATH .'/admin/interface/version.php');
	if(defined('VERSION') && VERSION == '2.7'
		&& function_exists('get_variable_content') 
		&& file_exists(WB_PATH .'/modules/menu_link/languages/DE.php') 
		&& file_exists(WB_PATH .'/modules/output_filter/filter-routines.php') 
		&& file_exists(WB_PATH .'/modules/captcha_control/languages/DE.php')
		&& file_exists(WB_PATH .'/modules/jsadmin/jsadmin_backend_include.php')
		&& file_exists(WB_PATH .'/admin/admintools/tool.php')
		&& file_exists(WB_PATH .'/admin/interface/er_levels.php')) {
		status_msg('OK','ok');
	} else {
		// output a warning and return error status
		status_msg('FAILED','error');
		status_msg('<strong>Error:</strong><br />Some of the Website Baker 2.7 core files were not found.'
			.'<br />Please upload all core files (except config.php and folder /install) contained in the WB 2.7 installation package first.'
			.'<br /><br />You can not proceed before this error is fixed!!!'
			, 'warning', 'div');
		return -1;
	}

	// check database connection (try to extract a single value which should always exist)
	$matches = '';
	status_msg(', Database connection: ');
	if(class_exists('database')) {
		$table = TABLE_PREFIX .'groups';
		//$result = $database->query("SELECT group_id FROM $table WHERE group_id = '1' LIMIT 1");
		$result = $database->query("SELECT name FROM $table WHERE group_id = '1' LIMIT 1");
		$matches = ($result->numRows() > 0) ? $result->numRows() : '';
	}
	if($matches == '1') {
		status_msg('OK', 'ok');
	} else {
		// output error message and return error status
		status_msg('FAILED', 'error');
		status_msg('<strong>Error:</strong><br />Unable to connect to your existing Website Baker database.'
			.'<br />Make sure that the database class is available and the connection data in the config.php file is correct '
			.'and your database is not corrupt.<br />To check if your database is corrupt, you can use a tool like '
			.'<a href="http://www.phpmyadmin.net/" target="_blank">phpMyAdmin</a>.'
			.'<br /><br />You can not proceed before this error is fixed!!!'
			, 'warning', 'div');
		return -1;
	}
	return 0;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Upgrade script from Website Baker v2.6.7 to Website Baker v2.7</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
	margin:0;
	padding:0;
	border:0;
	background: #EBF7FC;
	color:#000;
  font-family: 'Trebuchet MS', Verdana, Arial, Helvetica, Sans-Serif;
	font-size: small;
	height:101%;
}

#container {
	width:85%;
	background: #9ACBF1 url(admin/interface/background.png) repeat-x;
	border:1px solid #000;
	color:#000;
	margin:2em auto;
	padding:0 15px;
	min-height: 500px;
	text-align:left;
}

p { line-height:1.5em; }

h1,h2,h3,h4,h5,h6 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #369;
	margin-top: 1.0em;
	margin-bottom: 0.1em;
}

h1 { font-size:150%; }
h2 { font-size: 130%; border-bottom: 1px #CCC solid; }
h3 { font-size: 120%; }

.ok, .error { font-weight:bold; }
.ok { color:green; }
.error { color:red; }
.check { color:#555; }

.warning {
	width: 98%;
	background:#FFDBDB;
	padding:0.2em;
	margin-top:0.5em;
	border: 1px solid black;
}
</style>
</head>
<body>
<div id="container">
<img src="admin/interface/logo.png" alt="Website Baker Logo" />

<h1>Website Baker Upgrade</h1>
<p>This script is for <strong>upgrading an existing v2.6.7</strong> installation to the latest Website Baker <strong>version 2.7</strong>. The upgrade script checks the configuration of your installed Website Baker system and alters the existing WB database to reflect the changes introduced with WB 2.7.</p>

<?php
if(!isset($_POST['backup_confirmed'])) { 
?>
<h2>Step 1: Check existing installation</h2>
<p>Checking the configuration of your existing Website Baker installation:<br />
<?php
// check the basic Website Baker installation before proceeding
if(check_baseline_configuration() != 0) {
echo <<< EOT
<h3>Checklist before upgrading:</h3>
<p>To upgrade from an existing WB 2.6.7 version, please perform the following steps in advance:
<ol>
<li>Backup the entire <strong>/pages</strong> folder (including all subfolder and files) of your existing WB installation</li>
<li>Backup the entire <strong>Database</strong> of your existing WB installation (e.g. by the WB admin tool)</li>
<li>Download the WB 2.7 installation package from the <a href="http://download.websitebaker.org/" target="_blank">official project site</a></li>
<li>Upload all files contained in the WB 2.7 installation package (except config.php and the folder /install) via FTP over your existing installation</li>
<li>start this script by typing the URL into your browser</li>
</ol>
<strong class="error">Note: </strong>If you have an version lower than 2.6.7, you need to upgrade to 2.6.7 first!! Instructions can be found on the <a href="http://help.websitebaker.org/pages/en/basic-docu/installation/upgrade.php" target="_blank">Website Baker Help portal</a>.</p><p>&nbsp;</p>
EOT;
die;
}
// pre-checks passed, proceed
status_msg('<p>Congratulations: You have passed all the required pre-checks.', 'ok');
?>

<h2>Step 2: Create a backup of your existing data</h2>
<p>It is highly recommended to <strong>create a manual backup</strong> of the entire <strong>/pages folder</strong> and the <strong>MySQL database</strong> before proceeding. The upgrade script is not sufficiently tested at the moment and should therefore only be used for testing purposes!!! Please confirm the disclaimer before starting this script.</p>

<form name="send" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<textarea cols="80" rows="5">DISCLAIMER: The Website Baker upgrade script is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. One needs to confirm that a manual backup of the /pages folder (including all files and subfolders contained in it) and backup of the entire Website Baker MySQL database was created before you can proceed.</textarea>
<br /><br /><input name="backup_confirmed" type="checkbox" value="confirmed" />&nbsp;I confirm that a manual backup of the /pages folder and the MySQL database was created.
<br /><br /><input name="send" type="submit" value="Start upgrade script" />
</form>
<br />

<?php
if(isset($_POST['send'])) {
	status_msg('<strong>Notice:</strong><br />You need to confirm that you have created a manual backup of the /pages directory and the MySQL database before you can proceed.', 'warning', 'div');
} 
?>
<br /><br />
<?php
} else {
/**
	THE WEBSITE BAKER UPGRADE SCRIPT STARTS HERE
**/
require_once('config.php');
require_once(WB_PATH.'/framework/functions.php');
?>
<h2>Step 3: Upgrading the existing Website Baker installation to WB 2.7</h2>
<p>will upgrade Website Baker 2.6.5 / 2.6.7 to version 2.7</p>
<?php

$OK   = '<span class="ok">OK</span>';
$FAIL = '<span class="error">FAILED</span>';


/**********************************************************
 *  - modules-based search
 */
function db_add_search_key_value($key, $value) {
	global $database; global $OK; global $FAIL;
	$table = TABLE_PREFIX.'search';
	$query = $database->query("SELECT value FROM $table WHERE name = '$key' LIMIT 1");
	if($query->numRows() > 0) {
		echo "$key: allready there. $OK.<br />";
		return true;
	} else {
		$database->query("INSERT INTO $table (name,value,extra) VALUES ('$key', '$value', '')");
		echo (mysql_error()?mysql_error().'<br />':'');
		$query = $database->query("SELECT value FROM $table WHERE name = '$key' LIMIT 1");
		if($query->numRows() > 0) {
			echo "$key: $OK.<br />";
			return true;
		} else {
			echo "$key: $FAIL!<br />";
			return false;
		}
	}
}
function db_add_field($field, $table, $desc) {
	global $database; global $OK; global $FAIL;
	echo "<u>Adding field '$field' to table '$table'</u><br />";
	$table = TABLE_PREFIX.$table;
	$query = $database->query("DESCRIBE $table '$field'");
	if($query->numRows() == 0) { // add field
		$query = $database->query("ALTER TABLE $table ADD $field $desc");
		echo (mysql_error()?mysql_error().'<br />':'');
		$query = $database->query("DESCRIBE $table '$field'");
		echo (mysql_error()?mysql_error().'<br />':'');
		if($query->numRows() > 0) {
			echo "'$field' added. $OK.<br />";
		} else {
			echo "adding '$field' $FAIL!<br />";
		}
	} else {
		echo "'$field' allready there. $OK.<br />";
	}
}

echo "<br /><u>Adding module_order and max_excerpt to search-table</u><br />";
// module_order - in which order to show the search-results
// max_excerpt - how many lines of excerpt to print per matching page

$cfg = array(
	'module_order' => 'faqbaker,manual,wysiwyg',
	'max_excerpt' => '15'
);
foreach($cfg as $key=>$value) {
	db_add_search_key_value($key, $value);
}

echo "<br /><u>Adding some internal config-elements to search-table</u><br />";
// These are global config-elements which don't appear in settings-page. Change them in the database if needed.
// cfg_show_description - whether to show page-description on the results page (true/false), def: true
// cfg_search_description - whether to search in page-description (true/false), def: true [only used while searching title/link/description/keywords]
// cfg_search_keywords - whether to search in page-keywords (true/false), def: true [only used while searching title/link/description/keywords]
// cfg_enable_old_search - use old search-method, too (true/false), def: true [use old method as fallback]
$cfg = array(
	'cfg_show_description' => 'true',
	'cfg_search_description' => 'true',
	'cfg_search_keywords' => 'true',
	'cfg_enable_old_search' => 'true'
);
foreach($cfg as $key=>$value) {
	db_add_search_key_value($key, $value);
}

echo "<br /><u>Changing results_loop in search-table</u><br />";
// adding [EXCERPT]

$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'results_loop' LIMIT 1");
if($query->numRows() > 0) {
	$fetch_results_loop = $query->fetchRow();
	$string = $fetch_results_loop['value'];
	if(preg_match("/\[EXCERPT\]/", $string)) {
		echo "[EXCERPT] is allready there. $OK.<br />";
	} else {
		$string = preg_replace("/10px;\">\[DESCRIPTION\]/", "5px;\">[DESCRIPTION]", $string);
		$string .= "<tr><td colspan=\"2\" style=\"text-align: justify; padding-bottom: 10px;\">[EXCERPT]</td></tr>";
		$string = addslashes($string);
		$database->query("UPDATE ".TABLE_PREFIX."search SET name='results_loop',value='".$string."',extra='' WHERE name = 'results_loop' LIMIT 1");
		echo (mysql_error()?mysql_error().'<br />':'');
		$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'results_loop' LIMIT 1");
		if($query->numRows() > 0) {
			$fetch_results_loop = $query->fetchRow();
			$string = $fetch_results_loop['value'];
			if(preg_match("/\[EXCERPT\]/", $string)) {
				echo "[EXCERPT] added. $OK.<br />";
			} else {
				echo "adding [EXCERPT] $FAIL!<br />";
			}
		}
	}
}

echo "<br /><u>Changing \"Header:\" in search-table</u><br />";
// adding [SEARCH_PATH]

$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'header' LIMIT 1");
if($query->numRows() > 0) {
	$fetch_header = $query->fetchRow();
	$string = $fetch_header['value'];
	if(preg_match("/\[SEARCH_PATH\]/", $string)) {
		echo "[SEARCH_PATH] is allready there. $OK.<br />";
	} else {
		$string = preg_replace("/<input type=\"text\" name=\"string\" value=\"\[SEARCH_STRING\]\" style=\"width: 100%;\" \/>/", "<input type=\"hidden\" name=\"search_path\" value=\"[SEARCH_PATH]\" /><input type=\"text\" name=\"string\" value=\"[SEARCH_STRING]\" style=\"width: 100%;\" />", $string);
		$string = addslashes($string);
		$database->query("UPDATE ".TABLE_PREFIX."search SET name='header',value='".$string."',extra='' WHERE name = 'header' LIMIT 1");
		echo (mysql_error()?mysql_error().'<br />':'');
		$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'header' LIMIT 1");
		if($query->numRows() > 0) {
			$fetch_header = $query->fetchRow();
			$string = $fetch_header['value'];
			if(preg_match("/\[SEARCH_PATH\]/", $string)) {
				echo "[SEARCH_PATH] added. $OK.<br />";
			} else {
				echo "adding [SEARCH_PATH] $FAIL!<br />";
			}
		}
	}
}


/**********************************************************
 *  - publish-by-date
 */
// Add fields "publ_start" and "publ_end" to table "sections"
// check if fields are present
db_add_field('publ_start', 'sections', "INT NOT NULL DEFAULT '0'");
db_add_field('publ_end', 'sections', "INT NOT NULL DEFAULT '0'");


/**********************************************************
 *  - core-module menu_link
 */
// create table
$table = TABLE_PREFIX ."mod_menu_link";
$database->query("DROP TABLE IF EXISTS `$table`");
$database->query("
	CREATE TABLE `$table` (
		`section_id` INT(11) NOT NULL DEFAULT '0',
		`page_id` INT(11) NOT NULL DEFAULT '0',
		`target_page_id` INT(11) NOT NULL DEFAULT '0',
		`anchor` VARCHAR(255) NOT NULL DEFAULT '0' ,
		`extern` VARCHAR(255) NOT NULL DEFAULT '' ,
		PRIMARY KEY (`section_id`)
	)
");
// fetch all menu_link-pages in $pages
$pages = array();
$table_p = TABLE_PREFIX.'pages';
$table_s = TABLE_PREFIX.'sections';
$table_mm = TABLE_PREFIX ."mod_menu_link";

$query_page = $database->query("SELECT p.*, s.section_id FROM $table_p AS p, $table_s AS s WHERE p.page_id=s.page_id AND s.module = 'menu_link'");
if($query_page->numRows() > 0) {
	while($page = $query_page->fetchRow()) {
		$pages[$page['page_id']]['page_details'] = $page;
	}
}
if($pages!=array())
	echo "<br /><u>Convert menu_links</u><br />";

// get all related files with content from pages/ in $pages, too
function list_files_dirs($dir, $depth=true, $files=array(), $dirs=array()) {
	$dh=opendir($dir);
	while(($file = readdir($dh)) !== false) {
		if($file == '.' || $file == '..') {
			continue;
		}
		if(is_dir($dir.'/'.$file)) {
			if($depth) {
				$dirs[] = $dir.'/'.$file;
				list($files, $dirs) = list_files_dirs($dir.'/'.$file, $depth, $files, $dirs);
			}
		} else {
			$files[] = $dir.'/'.$file;
		}
	}
	closedir($dh);
	natcasesort($files);
	natcasesort($dirs);
	return(array($files, $dirs));
}
list($files, $dirs) = list_files_dirs(WB_PATH.PAGES_DIRECTORY);
foreach($files as $file) {
	if(($content = implode('', file($file))) !== FALSE) {
		if(preg_match('/\$page_id = (\d+)/', $content, $matches)) {
			if(array_key_exists($matches[1], $pages)) {
				$pages[$matches[1]]['file_content'] = $content;
				$pages[$matches[1]]['filename'] = $file;
			}
		}
	}
}
unset($files); unset($dirs);
// try to convert old menu_links to new ones
foreach($pages as $p) {
	$page = $p['page_details'];
	$file_content = $p['file_content'];
	$filename = $p['filename'];
	$link = $p['page_details']['link'];
	$parent_pid = $p['page_details']['parent'];
	$page_id = $p['page_details']['page_id'];
	$section_id = $p['page_details']['section_id'];
	$menu_title = $p['page_details']['menu_title'];

	// calculate link from wb_pages.parent and menu_title
	$cur_link = '';
	if($parent_pid != '0' && $query_link = $database->query("SELECT link FROM $table_p WHERE page_id = '$parent_pid'")) {
		$res = $query_link->fetchRow();
		$cur_link .= $res['link'];
	}
	$cur_link .= '/'.page_filename($menu_title);
echo "found: $cur_link<br />";
	$database->query("UPDATE $table_p SET link = '$cur_link' WHERE page_id = '$page_id'");
	echo (mysql_error()?'mySQL: '.mysql_error().'<br />':'');
	
	$new_filenames[$page_id]['file'] = WB_PATH.PAGES_DIRECTORY.$cur_link.PAGE_EXTENSION;
	$new_filenames[$page_id]['link'] = $cur_link;
	$new_filenames[$page_id]['menu'] = $menu_title;

	// delete old access files in pages
	if(file_exists($filename)) {
		if(!is_writable(WB_PATH.PAGES_DIRECTORY.'/')) {
			echo "Cannot delete access file in pages/ - permission denied ($FAIL)<br />";
		} else {
			unlink($filename);
		}
	}
	
	// make entry in wb_mod_menu_link
	if($query_pid = $database->query("SELECT page_id FROM $table_p WHERE page_id != '$page_id' AND link = '$link'")) {
		$res = $query_pid->fetchRow();
		$target_page_id = $res['page_id'];
		$extern = '';
		if(strpos($link, '://') !== FALSE || strpos($link, 'mailto:') !== FALSE) {
			$target_page_id=-1;
			$extern=addslashes($link);
		}
		$database->query("INSERT INTO $table_mm (page_id, section_id, target_page_id, anchor, extern) VALUES ('$page_id', '$section_id', '$target_page_id', '0', '$extern')");
		echo (mysql_error()?'mySQL: '.mysql_error().'<br />':'');
	}
}
// create new access files in pages/; make directories as needed
foreach($pages as $p) {
	$page_id = $p['page_details']['page_id'];
	$filename = $new_filenames[$page_id]['file'];
	$menu_title = $new_filenames[$page_id]['menu'];
	$link = $new_filenames[$page_id]['link'];
	$content = $p['file_content'];
	$level = $p['page_details']['level'];
	$depth = '';
	for($i=0; $i<=$level; $i++)
		$depth .= '../';
	$content = preg_replace('#((../)+)config\.php#', "{$depth}config.php", $content);
	while(file_exists($filename)) {
		echo "Cannot create '$filename' - file exist. Renamed to: ";
		$menu_title .= '_';
		$link .= '_';
		$filename = WB_PATH.PAGES_DIRECTORY.$link.PAGE_EXTENSION;
		echo "$filename<br />";
		$database->query("UPDATE $table_p SET link='$link', menu_title='$menu_title' WHERE page_id = '$page_id'");
		echo mysql_error()?'mySQL: '.mysql_error().'<br />':'';
	}
	// check if we need to create a subdir somewhere
	$dirs = array();
	while(dirname($link) != '/') {
		$link = dirname($link);
		$dirs[] = WB_PATH.PAGES_DIRECTORY.$link;
	}
	foreach(array_reverse($dirs) as $dir) {
		if(!file_exists($dir)) {
			mkdir($dir, OCTAL_DIR_MODE);
		}
	}
	// create new file in pages/
	if($handle=fopen($filename, "wb")) {
		if(!fwrite($handle, $content)) {
			echo "Cannot write to $filename - ($FAIL)<br />";
		}
		fclose($handle);
	} else {
		echo "Cannot create $filename - ($FAIL)<br />";
	}
	
}

// some code missing to regenerate page_title from link/filename
// for_all_pages: if filename($page_title) != basename($link) {
//   rename $page_title to basename($link)
// }
// This must be done after menu_link-upgrade
// 
// Should we really do this? - must be checked


/**********************************************************
 *  - asp - Advanced Spam Protection
 */
echo "<br /><u>Adding table mod_captcha_control</u><br />";
$table = TABLE_PREFIX.'mod_captcha_control';
$database->query("DROP TABLE IF EXISTS `$table`");
$database->query("CREATE TABLE `$table` (
	`enabled_captcha` VARCHAR(1) NOT NULL DEFAULT '1',
	`enabled_asp` VARCHAR(1) NOT NULL DEFAULT '1',
	`captcha_type` VARCHAR(255) NOT NULL DEFAULT 'calc_text',
	`asp_session_min_age` INT(11) NOT NULL DEFAULT '20',
	`asp_view_min_age` INT(11) NOT NULL DEFAULT '10',
	`asp_input_min_age` INT(11) NOT NULL DEFAULT '5',
	`ct_text` LONGTEXT NOT NULL DEFAULT ''
	)"
);
$database->query("
	INSERT INTO `$table`
		(`enabled_captcha`, `enabled_asp`, `captcha_type`)
	VALUES
		('1', '1', 'calc_text')
");


/**********************************************************
 *  - multi-group
 */
db_add_field('groups_id', 'users', "VARCHAR( 255 ) NOT NULL DEFAULT '0' AFTER group_id");
$table = TABLE_PREFIX.'users';
if($query_group = $database->query("SELECT user_id,group_id,groups_id FROM $table")) {
	while($group = $query_group->fetchRow()) {
		if($group['groups_id'] == '0') {
			if($database->query("UPDATE $table SET groups_id = group_id WHERE user_id = {$group['user_id']}")) {
				echo 'groups_id updated successfully<br>';
			}
			echo mysql_error().'<br />';
		}
	}
}


/**********************************************************
 *  -Javascript Admin
 */
echo "<br /><u>Adding table mod_jsadmin</u><br />";
$table = TABLE_PREFIX ."mod_jsadmin";
$database->query("DROP TABLE IF EXISTS `$table`");

$database->query("
	CREATE TABLE `$table` (
    `id` INT(11) NOT NULL DEFAULT '0',
		`name` VARCHAR(255) NOT NULL DEFAULT '0',
		`value` INT(11) NOT NULL DEFAULT '0',
   	PRIMARY KEY (`id`)
	)
");

global $database;
echo "Insert default value for mod_jsadmin_persist_order: ";
echo ($database->query("INSERT INTO ".$table." (id,name,value) VALUES ('1','mod_jsadmin_persist_order','0')")) ? " $OK<br />" : " $FAIL<br />"; 
echo "Insert default value for mod_jsadmin_ajax_order_pages: ";
echo ($database->query("INSERT INTO ".$table." (id,name,value) VALUES ('2','mod_jsadmin_ajax_order_pages','0')")) ? " $OK<br />" : " $FAIL<br />"; 
echo "Insert default value for mod_jsadmin_ajax_order_sections: ";
echo ($database->query("INSERT INTO ".$table." (id,name,value) VALUES ('3','mod_jsadmin_ajax_order_sections','0')")) ? " $OK<br />" : " $FAIL<br />"; 

/**********************************************************
 *  - Output Filter
 */
echo "<br /><u>Adding table mod_outputfilter</u><br />Status: ";
$table = TABLE_PREFIX .'mod_output_filter';
$database->query("DROP TABLE IF EXISTS `$table`");

$database->query("CREATE TABLE `$table` (
	`email_filter` VARCHAR(1) NOT NULL DEFAULT '0',
	`mailto_filter` VARCHAR(1) NOT NULL DEFAULT '0',
	`at_replacement` VARCHAR(255) NOT NULL DEFAULT '(at)',
	`dot_replacement` VARCHAR(255) NOT NULL DEFAULT '(dot)'
	)"
);

// add default values to the module table
echo ($database->query("INSERT INTO ".TABLE_PREFIX
	."mod_output_filter (email_filter, mailto_filter, at_replacement, dot_replacement) VALUES ('0', '0', '(at)', '(dot)')")) ? " $OK<br />" : " $FAIL<br />"; 
	

/**********************************************************
 *  - Form Modul
 */
echo '<br />';
db_add_field('success_email_subject', 'mod_form_settings', "VARCHAR(255) NOT NULL AFTER `email_subject`");
echo '<br />';
db_add_field('success_email_text', 'mod_form_settings', "TEXT NOT NULL AFTER `email_subject`");
echo '<br />';
db_add_field('success_email_from', 'mod_form_settings', "VARCHAR(255) NOT NULL AFTER `email_subject`");
echo '<br />';
db_add_field('success_email_to', 'mod_form_settings', "TEXT NOT NULL AFTER `email_subject`");
echo '<br />';
db_add_field('success_page', 'mod_form_settings', "TEXT NOT NULL AFTER `email_subject`");
echo '<br />';
db_add_field('email_fromname', 'mod_form_settings', "VARCHAR( 255 ) NOT NULL AFTER email_from");
echo '<br />';
db_add_field('success_email_fromname', 'mod_form_settings', "VARCHAR( 255 ) NOT NULL AFTER success_email_from");

echo "<br /><b>Deleting field success_message from table mod_form_settings</b><br />";

if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_form_settings` DROP `success_message`")) {
	echo 'Database field success_message droped successfully<br>';
}
echo mysql_error().'<br />';

// These are the default setting
$success_page = 'none';
$success_email_to = '';
$success_email_text = 'Thank you for submitting your form on '.WEBSITE_TITLE;
$success_email_text = addslashes($success_email_text);
$success_email_subject = 'You have submitted a form';

// Insert default settings into database
$query_dates = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_form_settings where section_id != 0 and page_id != 0");
while($result = $query_dates->fetchRow()) {
	
	echo "<B>Add default settings data to database for form section_id= ".$result['section_id']."</b><BR>";
	$section_id = $result['section_id'];

	if($database->query("UPDATE `".TABLE_PREFIX."mod_form_settings` SET `success_page` = '$success_page' WHERE `section_id` = $section_id")) {
		echo 'Database data success_page added successfully<br>';
	}
	echo mysql_error().'<br />';
	
	if($database->query("UPDATE `".TABLE_PREFIX."mod_form_settings` SET `success_email_to` = '$success_email_to' WHERE `section_id` = $section_id")) {
		echo 'Database data success_email_to added successfully<br>';
	}
	echo mysql_error().'<br />';
	
	if($database->query("UPDATE `".TABLE_PREFIX."mod_form_settings` SET `success_email_text` = '$success_email_text' WHERE `section_id` = $section_id")) {
		echo 'Database data success_email_text added successfully<br>';
	}
	echo mysql_error().'<br />';
	
	if($database->query("UPDATE `".TABLE_PREFIX."mod_form_settings` SET `success_email_subject` = '$success_email_subject' WHERE `section_id` = $section_id")) {
		echo 'Database data success_email_subject added successfully<br>';
	}
	echo mysql_error().'<br />';
	
}

// copy field email_to to success_email_from
$query_dates = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_form_settings where section_id != 0 and page_id != 0");
while($result = $query_dates->fetchRow()) {
	
	echo "<B>Copying field email_to to success_email_from for form section_id= ".$result['section_id']."</B><BR>";
	$section_id = $result['section_id'];

	$success_email_from = $result['email_to'];
	if($database->query("UPDATE `".TABLE_PREFIX."mod_form_settings` SET `success_email_from` = '$success_email_from' WHERE `section_id` = $section_id")) {
		echo 'Copyied field email_to to success_email_from successfully<br>';
	}
	echo mysql_error().'<br />';
}


/**********************************************************
 *  - News Modul
 */
db_add_field('published_when', 'mod_news_posts', "INT NOT NULL AFTER `commenting`");
db_add_field('published_until', 'mod_news_posts', "INT NOT NULL AFTER `published_when`");

// These are the default setting
$header = '<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"98%\">';
$post_loop = '<tr class=\"post_top\">
<td class=\"post_title\"><a href=\"[LINK]\">[TITLE]</a></td>
<td class=\"post_date\">[MODI_TIME], [MODI_DATE]</td>
</tr>
<tr>
<td class=\"post_short\" colspan=\"2\">
[SHORT] 
<a href=\"[LINK]\">[TEXT_READ_MORE]</a>
</td>
</tr>';
$post_header = addslashes('<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td height="30"><h1>[TITLE]</h1></td>
<td rowspan="3" style="display: [DISPLAY_IMAGE]"><img src="[GROUP_IMAGE]" alt="[GROUP_TITLE]" /></td>
</tr>
<tr>
<td valign="top"><b>Posted by [DISPLAY_NAME] ([USERNAME]) on [PUBL_DATE]</b></td>
</tr>
<tr style="display: [DISPLAY_GROUP]">
<td valign="top"><a href="[BACK]">[PAGE_TITLE]</a> >> <a href="[BACK]?g=[GROUP_ID]">[GROUP_TITLE]</a></td>
</tr>
</table>
<p style="text-align: justify;">');
$post_footer = '</p><p>Last changed: [MODI_DATE] at [MODI_TIME]</p>
<a href=\"[BACK]\">Back</a>';
$comments_header = addslashes('<br /><br />
<h2>Comments</h2>
<table cellpadding="2" cellspacing="0" border="0" width="98%">');

// Insert default settings into database
$query_dates = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_news_settings where section_id != 0 and page_id != 0");
while($result = $query_dates->fetchRow()) {
	
	echo "<B>Add default settings data to database for news section_id= ".$result['section_id']."</b><BR>";
	$section_id = $result['section_id'];

	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `header` = '$header' WHERE `section_id` = $section_id")) {
		echo 'Database data header added successfully<br>';
	}
	echo mysql_error().'<br />';
	
	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `post_loop` = '$post_loop' WHERE `section_id` = $section_id")) {
		echo 'Database data post_loop added successfully<br>';
	}
	echo mysql_error().'<br />';
	
	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `post_header` = '$post_header' WHERE `section_id` = $section_id")) {
		echo 'Database data post_header added successfully<br>';
	}
	echo mysql_error().'<br />';
	
	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `post_footer` = '$post_footer' WHERE `section_id` = $section_id")) {
		echo 'Database data post_footer added successfully<br>';
	}
	echo mysql_error().'<br />';
	
	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_settings` SET `comments_header` = '$comments_header' WHERE `section_id` = $section_id")) {
		echo 'Database data comments_header added successfully<br>';
	}
	echo mysql_error().'<br />';

}

// MIGRATING FIELD DATES to POSTED_WHEN
$query_dates = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_news_posts where section_id != 0 and page_id != 0");
if($query_dates->numRows() > 0) {
	echo "<B>Copying field posted_when value to published_when</B><BR>";
}
while($result = $query_dates->fetchRow()) {
	$pid = $result['post_id'];
	$NEW_DATE = $result['posted_when'];
	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_posts` SET `published_when` = '$NEW_DATE' WHERE `post_id` = $pid")) {
		echo 'Copying posted_when value to published_when successfully<br>';
	}
	echo mysql_error().'<br />';
}

/**********************************************************
 *  - Alter the WYSIWYG editor content from text to longtext
 */
echo "<br /><u>Alter WYSIWYG editor content field from text to longtext</u><br />Status: ";
echo ($database->query("ALTER TABLE ".TABLE_PREFIX."mod_wysiwyg MODIFY content LONGTEXT NOT NULL")) ?" $OK<br />" : " $FAIL<br />";

/**********************************************************
 *  - Add Admintools to Administrator group
 */
echo "<br /><u>Add Admintools to Adminsitrator group</u><br />Status: ";
$full_system_permissions = 'pages,pages_view,pages_add,pages_add_l0,pages_settings,pages_modify,pages_intro,pages_delete,media,media_view,media_upload,media_rename,media_delete,media_create,addons,modules,modules_view,modules_install,modules_uninstall,templates,templates_view,templates_install,templates_uninstall,languages,languages_view,languages_install,languages_uninstall,settings,settings_basic,settings_advanced,access,users,users_view,users_add,users_modify,users_delete,groups,groups_view,groups_add,groups_modify,groups_delete,admintools';
echo ($database->query("UPDATE `".TABLE_PREFIX."groups` SET `system_permissions` = '$full_system_permissions' WHERE `name` = 'Administrators'")) ? " $OK<br />" : " $FAIL<br />";

/**********************************************************
 *  - Add Mailer Settings to settings table
 */
echo "<br /><u>Add Mailer Settings to settings table</u><br />Status: ";
//delete rows to prevent double entries
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_routine'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'server_email'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_default_sendername'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_smtp_host'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_smtp_auth'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_smtp_username'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_smtp_password'");
//add new rows with default values
$wbmailer_smtp_host = (defined('WBMAILER_SMTP_HOST')) ? WBMAILER_SMTP_HOST : '';
$wbmailer_routine = ($wbmailer_smtp_host == '') ? 'phpmail' : 'smtp';
$settings_rows=	"INSERT INTO `".TABLE_PREFIX."settings` "
." (name, value) VALUES "
." ('wbmailer_routine', '$wbmailer_routine'),"
." ('server_email', 'admin@yourdomain.com'),"		// avoid that mail provider (e.g. mail.com) reject mails like yourname@mail.com
." ('wbmailer_default_sendername', 'WB Mailer'),"
." ('wbmailer_smtp_host', '$wbmailer_smtp_host'),"
." ('wbmailer_smtp_auth', ''),"
." ('wbmailer_smtp_username', ''),"
." ('wbmailer_smtp_password', '')";
echo ($database->query($settings_rows)) ? " $OK<br />" : " $FAIL<br />";

/**********************************************************
 *  - Set Version to WB 2.7
 */
echo "<br /><u>Update database version number to 2.7</u><br />Status: ";
$version = '2.7';
echo ($database->query("UPDATE `".TABLE_PREFIX."settings` SET `value` = '$version' WHERE `name` = 'wb_version'")) ? " $OK<br />" : " $FAIL<br />";

/**********************************************************
 *  - Reload all addons
 */

//delete modules
$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'module'");
// Load all modules
if($handle = opendir(WB_PATH.'/modules/')) {
	while(false !== ($file = readdir($handle))) {
		if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'admin.php' AND $file != 'index.php') {
			load_module(WB_PATH.'/modules/'.$file);
		}
	}
	closedir($handle);
}
echo '<br />Modules reloaded<br />';

//delete templates		
$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'template'");
// Load all templates
if($handle = opendir(WB_PATH.'/templates/')) {
	while(false !== ($file = readdir($handle))) {
		if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'index.php') {
			load_template(WB_PATH.'/templates/'.$file);
		}
	}
	closedir($handle);
}
echo '<br />Templates reloaded<br />';

//delete languages
$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'language'");
// Load all languages
if($handle = opendir(WB_PATH.'/languages/')) {
	while(false !== ($file = readdir($handle))) {
		if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'index.php') {
			load_language(WB_PATH.'/languages/'.$file);
		}
	}
	closedir($handle);
}
echo '<br />Languages reloaded<br />';

/**********************************************************
 *  - End of upgrade script
 */
$config_msg = ($wbmailer_smtp_host != '') ? '<br /><br />Note: Please remove the line: <strong>define(\'WBMAILER_SMTP_HOST\', \''.$wbmailer_smtp_host.'\');</strong> from file <strong>config.php</strong> before proceeding!' : '';
echo '<p style="font-size:120%;"><strong>Congratulations: The upgrade script is finished ...</strong></p>';
status_msg('<strong>Warning:</strong><br />Please delete the file <strong>upgrade-script.php</strong> via FTP before proceeding.<br />If you do not delete this script from your server, others can delete/overwritte database settings by executing this script again.'.$config_msg, 'warning', 'div');
// show buttons to go to the backend or frontend
echo '<br />';
if(defined('WB_URL')) {
	echo '<form action="'.WB_URL.'" target="_self">';
	echo '<input type="submit" value="kick me to the Frontend" style="float:left;" />';
	echo '</form>';
}
if(defined('ADMIN_URL')) {
	echo '<form action="'.ADMIN_URL.'" target="_self">';
	echo '&nbsp;<input type="submit" value="kick me to the Backend" />';
	echo '</form>';
}
echo '<p>&nbsp;</p>';
}
?>
</div>
</body>
</html>