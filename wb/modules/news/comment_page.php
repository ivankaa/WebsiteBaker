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

// Make sure page cannot be accessed directly
if(!defined('WB_URL')) { header('Location: ../index.php'); }
	
// Get comments page template details from db
$query_settings = $database->query("SELECT comments_page FROM ".TABLE_PREFIX."mod_news_settings WHERE section_id = '".SECTION_ID."'");
if($query_settings->numRows() == 0) {
	header('Location: '.WB_URL.'/pages/');
} else {
	$settings = $query_settings->fetchRow();
	// Print comments page
	$vars = array('[POST_TITLE]', '[ACTION_URL]');
	$values = array(POST_TITLE, WB_URL.'/modules/news/submit_comment.php?page_id='.PAGE_ID.'&section_id='.SECTION_ID.'&post_id='.POST_ID);
	echo str_replace($vars, $values, $this->strip_slashes($settings['comments_page']));
}

?>