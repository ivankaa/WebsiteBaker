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

// Include config file
require('../../config.php');

// Include admin class
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Start', 'start', false, false);

// Include WB functions file
if(!defined('FUNCTIONS_CLASS_LOADED')) {
	require(WB_PATH.'/framework/functions.php');
}

// Check if we should show the form or add a comment
if(is_numeric($_GET['page_id']) AND is_numeric($_GET['section_id']) AND isset($_GET['post_id']) AND is_numeric($_GET['post_id']) AND isset($_POST['comment']) AND $_POST['comment'] != '') {
	
	// Insert the comment into db
	$page_id = $_GET['page_id'];
	$section_id = $_GET['section_id'];
	$post_id = $_GET['post_id'];
	$title = $admin->add_slashes(strip_tags($_POST['title']));
	$comment = $admin->add_slashes(strip_tags($_POST['comment']));
	$commented_when = mktime();
	if(isset($admin) AND $admin->is_authenticated() == true) {
		$commented_by = $admin->get_user_id();
	} else {
		$commented_by = '';
	}
	$query = $database->query("INSERT INTO ".TABLE_PREFIX."mod_news_comments (section_id,page_id,post_id,title,comment,commented_when,commented_by) VALUES ('$section_id','$page_id','$post_id','$title','$comment','$commented_when','$commented_by')");
	// Get page link
	$query_page = $database->query("SELECT link FROM ".TABLE_PREFIX."mod_news_posts WHERE post_id = '$post_id'");
	$page = $query_page->fetchRow();
	header('Location: '.page_link($page['link']).'?id='.$post_id);
	
} else {
	header('Location: '.WB_URL.'/pages/');
}

?>