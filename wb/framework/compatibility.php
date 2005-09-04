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

/*
	This file is purely for ensuring compatibility with 3rd party
	contributions made for WB version 2.5.2 or below
*/

function page_link($link) {
	global $wb;
	$wb->page_link($link);
}


function page_content($block=1) {
	global $wb;
	$wb->page_content($block);
}

// Old menu call invokes new menu function
function page_menu($parent = 0, $menu_number = 1, $item_template = '<li><span[class]>[a][menu_title][/a]</span>', $menu_header = '<ul>', $menu_footer = '</ul>', $default_class = ' class="menu_default"', $current_class = ' class="menu_current"', $recurse = LEVEL) {
	global $wb;
	$wb->menu($menu_number, 0, -1, true, $item_template, '</li>', $menu_header, $menu_footer, $default_class, $current_class, $parent);
//	$wb->page_menu($parent, $menu_number, $item_template.'</li>', $menu_header, $menu_footer, $default_class, $current_class, $recurse);
}

// Function for page title
function page_title($spacer = ' - ', $template = '[WEBSITE_TITLE][SPACER][PAGE_TITLE]') {
	global $wb;
	$wb->page_title($spacer,$template);
}

// Function for page description
function page_description() {
	global $wb;
	$wb->page_description();
}
// Function for page keywords
function page_keywords() {
	global $wb;
	$wb->page_keywords();
}
// Function for page header
function page_header($date_format = 'Y') {
	global $wb;
	$wb->page_header($date_format);
}
// Function for page footer
function page_footer($date_format = 'Y') {
	global $wb;
	$wb->page_footer($date_format);
}

// references to objects and variables that changed their names

$admin = &$wb;

$default_link=&$wb->default_link;

$page_trail=&$wb->page_trail;
$page_description=&$wb->page_description;
$page_keywords=&$wb->page_keywords;
$page_link=&$wb->link;

$extra_sql=&$wb->extra_sql;
$extra_where_sql=&$wb->extra_where_sql;


// Begin WB < 2.4.x template compatibility code
	// Make extra_sql accessable through private_sql
	$private_sql = $extra_sql;
	$private_where_sql = $extra_where_sql;
	// Query pages for menu
	$menu1 = $database->query("SELECT page_id,menu_title,page_title,link,target,visibility$extra_sql FROM ".TABLE_PREFIX."pages WHERE parent = '0' AND $extra_where_sql ORDER BY position ASC");
	// Check if current pages is a parent page and if we need its submenu
	if(PARENT == 0) {
		// Get the pages submenu
		$menu2 = $database->query("SELECT page_id,menu_title,page_title,link,target,visibility$extra_sql FROM ".TABLE_PREFIX."pages WHERE parent = '".PAGE_ID."' AND $extra_where_sql ORDER BY position ASC");
	} else {
		// Get the pages submenu
		$menu2 = $database->query("SELECT page_id,menu_title,page_title,link,target,visibility$extra_sql FROM ".TABLE_PREFIX."pages WHERE parent = '".PARENT."' AND $extra_where_sql ORDER BY position ASC");
	}
// End WB < 2.4.x template compatibility code
// Include template file


?>
