<?php

// Include the config file
require('../../../../../../config.php');

// Create new admin object
require(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages_modify', false);

// Setup the template
$template = new Template(WB_PATH.'/modules/fckeditor/fckeditor/editor/plugins/WBModules');
$template->set_file('page', 'wbmodules.html');
$template->set_block('page', 'main_block', 'main');

// Function to generate page list
function gen_page_list($parent) {
	global $template, $database;
	$get_pages = $database->query("SELECT page_id,menu_title,link,level FROM ".TABLE_PREFIX."pages WHERE parent = '$parent'");
	while($page = $get_pages->fetchRow()) {
		$title = stripslashes($page['menu_title']);
		// Add leading -'s so we can tell what level a page is at
		$leading_dashes = '';
		for($i = 0; $i < $page['level']; $i++) {
			$leading_dashes .= '- ';
		}
		$template->set_var('TITLE', $leading_dashes.' '.$title);
		$template->set_var('LINK', '[wblink'.$page['page_id'].']');
		/**
			Note: FCK uses the header defined in /fckeditor/fckeditor/editor/fckdialog.html
			Therefore the WB charset defined in the template: wbmodules.html will be overwritten
			Routine kept for now, maybe it is possible to define custom plugin charsets in a future FCK releases (doc)
		*/
		// work out the specified WB charset 
		if(defined('DEFAULT_CHARSET')) { 
			$template->set_var('CHARSET', DEFAULT_CHARSET);
		} else { 
			$template->set_var('CHARSET', 'utf-8');
		}
		$template->parse('page_list', 'page_list_block', true);
		gen_page_list($page['page_id']);
	}
}

// Get pages and put them into the pages list
$template->set_block('main_block', 'page_list_block', 'page_list');
$database = new database();
$get_pages = $database->query("SELECT page_id,menu_title,link FROM ".TABLE_PREFIX."pages WHERE parent = '0'");
if($get_pages > 0) {
	// Loop through pages
	while($page = $get_pages->fetchRow()) {
		$title = stripslashes($page['menu_title']);
		$template->set_var('TITLE', $title);
		$template->set_var('LINK', '[wblink'.$page['page_id'].']');
		$template->parse('page_list', 'page_list_block', true);
		gen_page_list($page['page_id']);
	}
} else {
	$template->set_var('TITLE', 'None found');
	$template->set_var('LINK', 'None found');
	$template->parse('page_list', 'page_list_block', false);
}

// Parse the template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

?>