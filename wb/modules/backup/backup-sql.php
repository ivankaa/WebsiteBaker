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

// Check if user clicked on the backup button
if(!isset($_POST['backup'])){ header('Location: ../'); }

// Include config
require_once('../../config.php');

// Create new admin object
require(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Settings', 'settings_advanced', false);

// Begin output var
$output = "\n".
"#".
"# Website Baker ".WB_VERSION." Backup (SQL)\n".
"# Date: ".gmdate(TIME_FORMAT, mktime()+TIMEZONE)."  Time: ".gmdate(TIME_FORMAT, mktime()+TIMEZONE)."\n".
"#".
"\n";

// Get table names
$result = $database->query("SHOW TABLE STATUS");

// Loop through tables
while($row = $result->fetchRow())   {
	$query = $database->query("SHOW CREATE TABLE ".$row['Name']);
	$sql_backup = "\r\n# Create table ".$row['Name']."\r\n\r\n";
	// Start creating sql-backup
	$out = $query->fetchRow();
	$sql_backup .= $out['Create Table'].";\r\n\r\n";
	$sql_backup .= "# Dump data\r\n\r\n";
	$sql = "SELECT * FROM ".$row['Name'];
	// SQL code to select everything
	$out = $database->query($sql);
	$sql_code = '';
	while($code = $out->fetchRow())  {
		// Loop trough all collumns
		$sql_code .= "INSERT INTO ".$row['Name']." SET ";
		$numeral = 0;
		foreach($code as $insert => $value)   {
			if($numeral==1) {
					// Loosing the numerals in array -> mysql_fetch_array($result, MYSQL_ASSOC) WB hasn't?
				$sql_code.= $insert." = '".addslashes($value)."',";
			}
			$numeral = 1 - $numeral;
		}
		$sql_code = substr($sql_code, 0, -1);
		$sql_code.= ";\r\n";
		$output .= $sql_backup.$sql_code;
	}
}

// Output file
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment');
header('Filename: "'.str_replace(WB_PATH.'/temp', '', $temp_file).'"');
echo $output;

?>