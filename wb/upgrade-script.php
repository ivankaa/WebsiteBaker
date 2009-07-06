<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2009, Ryan Djurovich

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

@include_once('config.php');

// this function checks the basic configurations of an existing WB intallation
function status_msg($message, $class='check', $element='span') {
	// returns a status message
	echo '<'.$element .' class="' .$class .'">' .$message .'</' .$element.'>';
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Upgrade script</title>
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
	background: #A8BCCB url(templates/wb_theme/images/background.png) repeat-x;
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
<img src="templates/wb_theme/images/logo.png" alt="Website Baker Logo" />

<h1>Website Baker Upgrade</h1>
<p>This script upgrades an existing Website Baker <strong>Version 2.7</strong> installation to the <strong>Version 2.8</strong>. The upgrade script alters the existing WB database to reflect the changes introduced with WB 2.8.</p>

<?php
/**
 * Check if disclaimer was accepted
 */
if (!(isset($_POST['backup_confirmed']) && $_POST['backup_confirmed'] == 'confirmed')) { ?>
<h2>Step 1: Backup your files</h2>
<p>It is highly recommended to <strong>create a manual backup</strong> of the entire <strong>/pages folder</strong> and the <strong>MySQL database</strong> before proceeding.<br /><strong class="error">Note: </strong>The upgrade script alters some settings of your existing database!!! You need to confirm the disclaimer before proceeding.</p>

<form name="send" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<textarea cols="80" rows="5">DISCLAIMER: The Website Baker upgrade script is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. One needs to confirm that a manual backup of the /pages folder (including all files and subfolders contained in it) and backup of the entire Website Baker MySQL database was created before you can proceed.</textarea>
<br /><br /><input name="backup_confirmed" type="checkbox" value="confirmed" />&nbsp;I confirm that a manual backup of the /pages folder and the MySQL database was created.
<br /><br /><input name="send" type="submit" value="Start upgrade script" />
</form>
<br />

<?php
	status_msg('<strong>Notice:</strong><br />You need to confirm that you have created a manual backup of the /pages directory and the MySQL database before you can proceed.', 'warning', 'div');
	echo '<br /><br />';
	exit;
}

echo '<h2>Step 2: Updating database entries</h2>';

require_once('config.php');
require_once(WB_PATH.'/framework/functions.php');

$OK   = '<span class="ok">OK</span>';
$FAIL = '<span class="error">FAILED</span>';

// function to add a var/value-pair into settings-table
function db_add_key_value($key, $value) {
	global $database; global $OK; global $FAIL;
	$table = TABLE_PREFIX.'settings';
	$query = $database->query("SELECT value FROM $table WHERE name = '$key' LIMIT 1");
	if($query->numRows() > 0) {
		echo "$key: already exists. $OK.<br />";
		return true;
	} else {
		$database->query("INSERT INTO $table (name,value) VALUES ('$key', '$value')");
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

// function to add a new field into a table
function db_add_field($field, $table, $desc) {
	global $database; global $OK; global $FAIL;
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
		echo "'$field' already exists. $OK.<br />";
	}
}


/**********************************************************
 *  - Adding field sec_anchor to settings table
 */
echo "<br />Adding sec_anchor to settings table<br />";
$cfg = array(
	'sec_anchor' => 'wb_'
);
foreach($cfg as $key=>$value) {
	db_add_key_value($key, $value);
}


/**********************************************************
 *  - Adding field default_theme to settings table
 */
echo "<br />Adding default_theme to settings table<br />";
$cfg = array(
	'default_theme' => 'wb_theme'
);
foreach($cfg as $key=>$value) {
	db_add_key_value($key, $value);
}


/**********************************************************
 *  - Adding redirect timer to settings table
 */
echo "<br />Adding redirect timer to settings table<br />";
$cfg = array(
	'redirect_timer' => '1500'
);
foreach($cfg as $key=>$value) {
	db_add_key_value($key, $value);
}


/**********************************************************
 *  - Adding mediasettings to settings table
 */
echo "<br />Adding mediasettings to settings table<br />";
$cfg = array(
	'mediasettings' => ''
);
foreach($cfg as $key=>$value) {
	db_add_key_value($key, $value);
}


/**********************************************************
 *  - Add field "redirect_type" to table "mod_menu_link"
 */
echo "<br />Adding field redirect_type to mod_menu_link table<br />";
db_add_field('redirect_type', 'mod_menu_link', "INT NOT NULL DEFAULT '302' AFTER `target_page_id`");


/**********************************************************
 *  - Update search no results database filed to create
 *  valid XHTML if search is empty
 */
echo "<br />Updating database field `no_results` of search table: ";
$search_no_results = addslashes('<tr><td><p>[TEXT_NO_RESULTS]</p></td></tr>');
$sql = "UPDATE `" . TABLE_PREFIX . "search` SET `value` = '$search_no_results' WHERE `name`= 'no_results'";
$database->query($sql);
echo ($database->query($sql)) ? " $OK<br />" : " $FAIL<br />";


/**********************************************************
 *  - Set Version to WB 2.8 BETA
 */
echo "<br />Update database version number to 2.8 BETA : ";
$version = '2.8 BETA';
echo ($database->query("UPDATE `".TABLE_PREFIX."settings` SET `value` = '$version' WHERE `name` = 'wb_version'")) ? " $OK<br />" : " $FAIL<br />";


/**********************************************************
 *  - install droplets
 */
echo "<br />Install droplets<br />";

$result = mysql_list_tables( DB_NAME );
$all_tables = array();
for($i=0; $i < mysql_num_rows($result); $i++) $all_tables[] = mysql_table_name($result, $i);

 $file_name = (!in_array ( TABLE_PREFIX."mod_droplets", $all_tables)) ? "install.php" : "upgrade.php";
 require_once (WB_PATH."/modules/droplets/".$file_name);

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
echo '<p style="font-size:120%;"><strong>Congratulations: The upgrade script is finished ...</strong></p>';
status_msg('<strong>Warning:</strong><br />Please delete the file <strong>upgrade-script.php</strong> via FTP before proceeding.', 'warning', 'div');
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

?>
	
</div>
</body>
</html>