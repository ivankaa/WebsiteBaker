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

// DEFINE LANGUAGE DEPENDING OUTPUTS FOR THE EDIT CSS PART
$lang_dir = WB_PATH .'/modules/' .basename(dirname(__FILE__)) .'/languages/';
if(file_exists($lang_dir .LANGUAGE .'.php')) {
	// try to include custom language file if exists
	require_once($lang_dir .LANGUAGE .'.php');
} elseif(file_exists($lang_dir .'EN.php')) {
	// try to include default module language file
	require_once($lang_dir .'EN.php');
}

// set defaults if output varibles are not set in the languages files
if(!isset($CAP_EDIT_CSS)) $CAP_EDIT_CSS	= 'Edit CSS';
if(!isset($CAP_TOGGLE_CSS)) $CAP_TOGGLE_CSS	= 'Switch to ';
if(!isset($HEADING_CSS_FILE))	$HEADING_CSS_FILE = 'Actual module file: ';
if(!isset($TXT_EDIT_CSS_FILE)) $TXT_EDIT_CSS_FILE = 'Edit the CSS definitions in the textarea below.';

// this function checks if the specified optional module file exists
if (!function_exists('mod_file_exists')) {
	function mod_file_exists($mod_file='frontend.css') {
		// extract the module directory
		$mod_dir = basename(dirname(__FILE__)) .'/' .$mod_file;
		return file_exists(WB_PATH .'/modules/' .$mod_dir);
	}
}

// this function displays a "Edit CSS" button in modify.php 
// if the optional module files (module.css, module.js) if exists
if (!function_exists('css_edit')) {
	function css_edit() {
		global $page_id, $section_id, $CAP_EDIT_CSS;
		// extract the module directory
		$mod_dir = basename(dirname(__FILE__));
		$frontend_css = mod_file_exists('frontend.css');
		$backend_css = mod_file_exists('backend.css');
		if($frontend_css || $backend_css) {
			// display link to edit the optional CSS module files
			$file = $frontend_css ? 'frontend.css' : 'backend.css';
			$output  = '<div class="mod_' .$mod_dir .'_edit_css"><a href="' .WB_URL .'/modules/' .$mod_dir .'/edit_css.php';
			$output .= '?page_id=' .$page_id .'&section_id=' .$section_id .'&edit_file=' .$file .'">';
			$output .= $CAP_EDIT_CSS .'</a></div>';
			echo $output;
		}
	}
}

// this function returns a secure module file from $_GET['edit_file']
if (!function_exists('edit_mod_file')) {
	function edit_mod_file() {
		$allowed_files = array('frontend.css', 'backend.css');
		if(isset($_GET['edit_file']) && in_array($_GET['edit_file'], $allowed_files)) {
			return $_GET['edit_file'];
		} elseif(mod_file_exists('frontend.css')) {
			return 'frontend.css';
		} elseif(mod_file_exists('backend_css')) {
			return 'backend.css';
		} else {
			return '';
		}
	}
}	

// this function displays a button to toggle between the optional module CSS files
// function is invoked from edit_css.php file
if (!function_exists('toggle_css_file')) {
	function toggle_css_file($base_css_file = 'frontend.css') {
		$allowed_mod_files = array('frontend.css', 'backend.css');
		if(!in_array($base_css_file, $allowed_mod_files)) return;
		global $page_id, $section_id, $CAP_TOGGLE_CSS;
		// extract the module directory
		$mod_dir = basename(dirname(__FILE__));
		$toggle_file = ($base_css_file == 'frontend.css') ? 'backend.css' : 'frontend.css';
		if(mod_file_exists($toggle_file)) {
			// display button to toggle between the two CSS files: frontend.css, backend.css
			$output  = '<div class="mod_' .$mod_dir .'_edit_css"><a href="' .WB_URL .'/modules/' .$mod_dir .'/edit_css.php';
			$output .= '?page_id=' .$page_id .'&section_id=' .$section_id .'&edit_file=' .$toggle_file .'">';
			$output .= $CAP_TOGGLE_CSS .$toggle_file .'</a></div>';
			echo $output;
		}
	}
}

?>