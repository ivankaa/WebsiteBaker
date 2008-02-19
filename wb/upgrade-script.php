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

//
// upgrade-script for Website Baker from version 2.6.7 to 2.7
//

require('config.php');
require(WB_PATH.'/framework/functions.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Upgrade-Script</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
.red { background-color:#FF0000 }
.green { background-color:#00FF00 }

#warning {
width: 90%; 
padding: 10px; 
margin-left: 5%; 
margin-bottom: 5px; 
border: 1px solid #FF0000; 
background-color: #FFDBDB;
}

p { line-height:1.5em; }

</style>
</head>
<body>
<?php
/**
	AT THIS POINT IN TIME THE UPGRADE SCRIPT IS NOT MATURE ENOUGH
	SO PROVIDE A WARNING TO BACKUP THE DATABASE AND THE PAGES DIRECTORY
	BEFORE EXECUTING THIS SCRIPT (doc)
*/
if(!isset($_GET['action']) || $_GET['action'] != 'upgrade') {
?>
<div id="warning">
<strong>WARNING:</strong>
<p>The actual WB 2.7 version is still a developer version. <strong>It is not recommended to use this release in a
productive environment</strong>.<p>The upgrade-script is not sufficiently tested yet, so please <strong>backup your database and /pages directory before executing the upgrade script</strong>.<br />You may loose all your data if something goes wrong!!</p><p>If you want to start the upgrade-script, please click on: <a href="upgrade-script.php?action=upgrade" target="_self">execute upgrade-script</a></p>
</div>
<?php
die;
} ?>
	
<h2>Upgrade-script</h2>
<p>
will upgrade Website Baker 2.6.5 / 2.6.7 to version 2.7
</p>
<?php

$OK   = '<span class="green">OK</span>';
$FAIL = '<span class="red">failed</span>';


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
$database->query("INSERT INTO ".$table." (id,name,value) VALUES ('1','mod_jsadmin_persist_order','0')");
$database->query("INSERT INTO ".$table." (id,name,value) VALUES ('2','mod_jsadmin_ajax_order_pages','0')");
$database->query("INSERT INTO ".$table." (id,name,value) VALUES ('3','mod_jsadmin_ajax_order_sections','0')");


/**********************************************************
 *  - Output Filter
 */
echo "<br /><u>Adding table mod_outputfilter</u><br />";
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
$database->query("INSERT INTO ".TABLE_PREFIX
	."mod_output_filter (email_filter, mailto_filter, at_replacement, dot_replacement) VALUES ('0', '0', '(at)', '(dot)')");
	

/**********************************************************
 *  - Form Modul
 */
db_add_field('success_email_subject', 'mod_form_settings', "VARCHAR(255) NOT NULL AFTER `email_subject`");
db_add_field('success_email_text', 'mod_form_settings', "TEXT NOT NULL AFTER `email_subject`");
db_add_field('success_email_from', 'mod_form_settings', "VARCHAR(255) NOT NULL AFTER `email_subject`");
db_add_field('success_email_to', 'mod_form_settings', "TEXT NOT NULL AFTER `email_subject`");
db_add_field('success_page', 'mod_form_settings', "TEXT NOT NULL AFTER `email_subject`");
db_add_field('email_fromname', 'mod_form_settings', "VARCHAR( 255 ) NOT NULL AFTER email_from");
db_add_field('success_email_fromname', 'mod_form_settings', "VARCHAR( 255 ) NOT NULL AFTER success_email_from");

echo "<BR><B>Deleting field success_message from table mod_form_settings</B><BR>";

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
 *  - Add Admintools to Administrator group
 */
echo "<br /><u>Add Admintools to Adminsitrator group</u><br />";
$full_system_permissions = 'pages,pages_view,pages_add,pages_add_l0,pages_settings,pages_modify,pages_intro,pages_delete,media,media_view,media_upload,media_rename,media_delete,media_create,addons,modules,modules_view,modules_install,modules_uninstall,templates,templates_view,templates_install,templates_uninstall,languages,languages_view,languages_install,languages_uninstall,settings,settings_basic,settings_advanced,access,users,users_view,users_add,users_modify,users_delete,groups,groups_view,groups_add,groups_modify,groups_delete,admintools';
$database->query("UPDATE `".TABLE_PREFIX."groups` SET `system_permissions` = '$full_system_permissions' WHERE `name` = 'Administrators'");


/**********************************************************
 *  - Add Mailer Settings to settings table
 */
echo "<br /><u>Add Mailer Settings to settings table</u><br />";
//delete rows to prevent double entries
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_routine'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'server_email'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_default_sendername'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_smtp_host'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_smtp_auth'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_smtp_username'");
$database->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name = 'wbmailer_smtp_password'");
//add new rows with default values
$settings_rows=	"INSERT INTO `".TABLE_PREFIX."settings` "
." (name, value) VALUES "
." ('wbmailer_routine', 'phpmail'),"
." ('server_email', 'admin@yourdomain.com'),"		// avoid that mail provider (e.g. mail.com) reject mails like yourname@mail.com
." ('wbmailer_default_sendername', 'WB Mailer'),"
." ('wbmailer_smtp_host', ''),"
." ('wbmailer_smtp_auth', ''),"
." ('wbmailer_smtp_username', ''),"
." ('wbmailer_smtp_password', '')";
$database->query($settings_rows);


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
 *  - Set Version to WB 2.7
 */
echo "<br /><u>Set Version number to 2.7</u><br />";
$version = '2.7';
$database->query("UPDATE `".TABLE_PREFIX."settings` SET `value` = '$version' WHERE `name` = 'wb_version'");


/**********************************************************
 *  - End of upgrade script
 */
echo "<br /><br />Done<br />";

?>

</body>
</html>