<?php

// $Id: upload.php,v 1.11 2005/04/25 11:53:12 rdjurovich Exp $

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

// Target location
if(!isset($_POST['target']) OR $_POST['target'] == '') {
	header("Location: index.php");
} else {
	$target = $_POST['target'];
}

// Print admin header
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Media', 'media_upload');

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Check to see if target contains ../
if(strstr($target, '../')) {
	$admin->print_error($MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH']);
}

// Create relative path of the target location for the file
$relative = WB_PATH.$target.'/';

// Find out whether we should replace files or give an error
if($admin->get_post('overwrite') != '') {
	$overwrite = true;
} else {
	$overwrite = false;
}

// Loop through the files
$good_uploads = 0;
for($count = 1; $count <= 10; $count++) {
	// If file was upload to tmp
	if(isset($_FILES["file$count"]['name'])) {
		// Remove bad characters
		$filename = media_filename($_FILES["file$count"]['name']);
		// Check if there is still a filename left
		if($filename != '') {
			// Move to relative path (in media folder)
			if(file_exists($relative.$filename) AND $overwrite == true) {			
				if(move_uploaded_file($_FILES["file$count"]['tmp_name'], $relative.$filename)) {
					$good_uploads++;
					// Chmod the uploaded file
					change_mode($relative.$filename, 'file');
				}
			} elseif(!file_exists($relative.$filename)) {
				if(move_uploaded_file($_FILES["file$count"]['tmp_name'], $relative.$filename)) {
					$good_uploads++;
					// Chmod the uploaded file
					change_mode($relative.$filename);
				}
			}
		}
	}
}

if($good_uploads == 1) {
	$admin->print_success($good_uploads.$MESSAGE['MEDIA']['SINGLE_UPLOADED']);
} else {
	$admin->print_success($good_uploads.$MESSAGE['MEDIA']['UPLOADED']);
}

// Print admin 
$admin->print_footer();

?>
