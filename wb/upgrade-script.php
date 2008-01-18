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




echo "<br /><br />Done<br />";

?>

</body>
</html>
