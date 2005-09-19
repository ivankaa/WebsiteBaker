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

require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');

require_once(WB_PATH.'/framework/functions.php');


if(!isset($_GET['tool'])) {
	header("Location: index.php");
}

// check if tool is installed
$query_result=$database->query("SELECT * FROM ".TABLE_PREFIX."addons WHERE type = 'module' AND function = 'tool' AND name = '{$_GET['tool']}'");
if ($query_result->numRows()==0) {
	header("Location: index.php");
}
$tool=$query_result->fetchRow();

$admin = new admin("Tool: {$tool['name']}",'settings_advanced');

require(WB_PATH.'/modules/'.$tool['directory'].'/include.php');

$admin->print_footer();
?>
