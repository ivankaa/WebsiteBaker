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

$starttime = array_sum(explode(" ",microtime()));

// Include config file
require_once(dirname(__FILE__).'/config.php');

// Check if the config file has been set-up
if(!defined('WB_PATH')) {
	header("Location: install/index.php");
	exit(0);
}

require_once(WB_PATH.'/framework/class.frontend.php');
// Create new frontend object
$wb = new frontend();

// Figure out which page to display
// Stop processing if intro page was shown
$wb->page_select() or die();

// Collect info about the currently viewed page
// and check permissions
$wb->get_page_details();

// Collect general website settings
$wb->get_website_settings();

// Load functions available to templates, modules and code sections
// also, set some aliases for backward compatibility
require(WB_PATH.'/framework/frontend.functions.php');

// redirect menu-link
$this_page_id = PAGE_ID;
$query_this_module = $database->query("SELECT module, block FROM ".TABLE_PREFIX."sections WHERE page_id = '$this_page_id' AND module = 'menu_link'");
if($query_this_module->numRows() == 1) { // This is a menu_link. Get link of target-page and redirect
	// get target_page_id
	$table = TABLE_PREFIX.'mod_menu_link';
	$query_tpid = $database->query("SELECT target_page_id FROM $table WHERE page_id = '$this_page_id'");
	if($query_tpid->numRows() == 1) {
		$res=$query_tpid->fetchRow();
		$target_page_id = $res['target_page_id'];
		// get link of target-page
		$table = TABLE_PREFIX.'pages';
		$query_link = $database->query("SELECT link FROM $table WHERE page_id = '$target_page_id'");
		if($query_link->numRows() == 1) {
			$res=$query_link->fetchRow();
			$target_page_link = $res['link'];
			// redirect
			header('Location: '.WB_URL.PAGES_DIRECTORY.$target_page_link.PAGE_EXTENSION);
			exit;
		}
	}
}

// Display the template
require(WB_PATH.'/templates/'.TEMPLATE.'/index.php');

?>