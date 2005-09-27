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

// Direct access prevention
defined('WB_PATH') OR die(header('Location: ../index.php'));

// Check if user selected what add-ons to reload
if(isset($_POST['submit']) AND $_POST['submit'] != '') {
	// Include functions file
	require_once(WB_PATH.'/framework/functions.php');
	// Perform empty/reload
	if(isset($_POST['reload_modules'])) {
		// Remove all modules
		$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'module'");
		// Load all modules
		if($handle = opendir(WB_PATH.'/modules/')) {
			while(false !== ($file = readdir($handle))) {
				if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'admin.php' AND $file != 'index.php') {
					load_module(WB_PATH.'/modules/'.$file, true);
				}
			}
		closedir($handle);
		}
		echo $TEXT['MODULES_RELOADED'];
	}
	if(isset($_POST['reload_templates'])) {
		
		echo $TEXT['TEMPLATES_RELOADED'];
	}
	if(isset($_POST['reload_languages'])) {
		
		echo $TEXT['LANGAUGES_RELOADED'];
	}
} else {
	// Display confirmation
}

?>