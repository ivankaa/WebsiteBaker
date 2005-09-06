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

// Create new admin object
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Pages', 'pages_intro');

// Get page content
$filename = WB_PATH.'/pages/intro.php';
if(file_exists($filename)) {
	$handle = fopen($filename, "r");
	$content = fread($handle, filesize($filename));
	fclose($handle);
} else {
	$content = '';
}

// Create new template object, insert vars, then parse template oject
$template = new Template(ADMIN_PATH.'/pages');
$template->set_file('page', 'intro.html');
$template->set_block('page', 'main_block', 'main');
$template->set_var(array(
								'CONTENT' => $admin->stripslashes($content),
								'WB_URL' => WB_URL,
								'ADMIN_URL' => ADMIN_URL,
								'TEXT_SAVE' => $TEXT['SAVE'],
								'TEXT_CANCEL' => $TEXT['CANCEL']
								)
						);
if(!isset($_GET['wysiwyg']) OR $_GET['wysiwyg'] != 'no') {
	$template->set_var('WYSIWYG_FIELD', 'content');
}
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// Print admin footer
$admin->print_footer();

?>