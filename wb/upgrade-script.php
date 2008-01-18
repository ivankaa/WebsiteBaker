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
</head>
<body>
<style type="text/css">
<!--
*.red { background-color:#FF0000 }
*.green { background-color:#00FF00 }
-->
</style>

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
	$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = '$key' LIMIT 1");
	if($query->numRows() > 0) {
		echo "$key: allready there. $OK.<br />";
		return true;
	} else {
		$database->query("INSERT INTO D".TABLE_PREFIX."search (name,value,extra) VALUES ('$key', '$value', '')");
		echo mysql_error()?'<br />':'';
		$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = '$key' LIMIT 1");
		if($query->numRows() > 0) {
			echo "$key: $OK.<br />";
			return true;
		} else {
			echo "$key: $FAIL!<br />";
			return false;
		}
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
		echo mysql_error().'<br />';
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
		echo mysql_error().'<br />';
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


/**********************************************************
 *  - publish-by-date
 */
echo "<br /><u>Adding fields 'publ_start' and 'publ_end' to table 'sections'</u><br />";
// Add fields "publ_start" and "publ_end" to table "sections"
// check if fields are present
$table = TABLE_PREFIX."sections";
$query = $database->query("DESCRIBE $table 'publ_start'");
if($query->numRows() == 0) { // add field
	$query = $database->query("ALTER TABLE $table ADD publ_start INT NOT NULL DEFAULT '0'");
	$query = $database->query("DESCRIBE $table 'publ_start'");
	if($query->numRows() > 0) {
		echo "'publ_start' added. $OK.<br />";
	} else {
		echo "adding 'publ_start' $FAIL!<br />";
	}
} else {
	echo "'publ_start' allready there. $OK.<br />";
}
$query = $database->query("DESCRIBE $table 'publ_end'");
if($query->numRows() == 0) { // add field
	$query = $database->query("ALTER TABLE $table ADD publ_end INT NOT NULL DEFAULT '0'");
	$query = $database->query("DESCRIBE $table 'publ_end'");
	if($query->numRows() > 0) {
		echo "'publ_end' added. $OK.<br />";
	} else {
		echo "adding 'publ_end' $FAIL!<br />";
	}
} else {
	echo "'publ_end' allready there. $OK<br />";
}


$database = new database(DB_URL);

//******************************************************************************
//Start of upgrade script for the form modul
//******************************************************************************

echo "<BR><B>Adding new field to database table mod_form_settings</B><BR>";

if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_form_settings` ADD `success_email_subject` VARCHAR(255) NOT NULL AFTER `success_message`")) {
	echo 'Database Field success_email_subject added successfully<br />';
}
echo mysql_error().'<br />';

if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_form_settings` ADD `success_email_text` TEXT NOT NULL AFTER `success_message`")) {
	echo 'Database Field success_email_text added successfully<br />';
}
echo mysql_error().'<br />';

if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_form_settings` ADD `success_email_from` VARCHAR(255) NOT NULL AFTER `success_message`")) {
	echo 'Database Field success_email_from added successfully<br />';
}
echo mysql_error().'<br />';

if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_form_settings` ADD `success_email_to` TEXT NOT NULL AFTER `success_message`")) {
	echo 'Database Field success_email_to added successfully<br />';
}
echo mysql_error().'<br />';

if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_form_settings` ADD `success_page` TEXT NOT NULL AFTER `success_message`")) {
	echo 'Database Field success_page added successfully<br />';
}
echo mysql_error().'<br />';

echo "<BR><B>Deleting field success_message from table mod_form_settings</B><BR>";

if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_form_settings` DROP `success_message`")) {
	echo 'Database field success_message droped successfully<br>';
}
echo mysql_error().'<br />';


// UPDATING DATA INTO FIELDS
echo "<BR>";

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

//******************************************************************************
//End of upgrade script for the form modul
//******************************************************************************

//******************************************************************************
//Start of upgrade script for the news modul
//******************************************************************************

echo "<BR><B>Adding new field to database table mod_news_posts</B><BR>";
if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_news_posts` ADD `published_when` INT NOT NULL AFTER `commenting`")) {
	echo 'Database Field published_when added successfully<br />';
}
echo mysql_error().'<br />';

// UPDATING DATA INTO FIELDS
echo "<BR>";

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
echo "<B>Copying field posted_when value to published_when</B><BR>";
$query_dates = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_news_posts where section_id != 0 and page_id != 0");

while($result = $query_dates->fetchRow()) {
	$pid = $result['post_id'];
	$NEW_DATE = $result['posted_when'];
	if($database->query("UPDATE `".TABLE_PREFIX."mod_news_posts` SET `published_when` = '$NEW_DATE' WHERE `post_id` = $pid")) {
		echo 'Copying posted_when value to published_when successfully<br>';
	}
	echo mysql_error().'<br />';
}

//******************************************************************************
//End of upgrade script for the news modul
//******************************************************************************

echo "<br /><br />Done<br />";

?>

</body>
</html>