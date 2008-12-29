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

$debug = true;

if (true === $debug) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}

// Check if user selected template
if(!isset($_POST['file']) OR $_POST['file'] == "") {
	header("Location: index.php");
	exit(0);
} else {
	$file = $_POST['file'];
}

// Extra protection
if(trim($file) == '') {
	header("Location: index.php");
	exit(0);
}

// Setup admin object
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Addons', 'templates_uninstall');

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Check if the template exists
if(!is_dir(WB_PATH.'/templates/'.$file)) {
	$admin->print_error($MESSAGE['GENERIC']['NOT_INSTALLED']);
}

if (!function_exists("replace_all")) {
	function replace_all ($aStr = "", &$aArray ) {
		foreach($aArray as $k=>$v) $aStr = str_replace("{{".$k."}}", $v, $aStr);
		return $aStr;
	}
}

/**
*	Check if the template is the standard-template or still in use
*/
if (!array_key_exists('CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE', $MESSAGE['GENERIC'] ) )
	$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'] = "Can't uninstall this template <b>{{name}}</b> because it's the standardtemplate!";

if ($file == DEFAULT_TEMPLATE) {
	$temp = array ('name' => $file );
	$msg = replace_all( $MESSAGE['GENERIC']['CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE'], $temp );
	$admin->print_error( $msg );

} else {
	
	/**
	*	Check if the template is still in use by a page ...
	*
	*	@version	0.2.0
	*	@build		5
	*	@author		aldus
	*	@since		0.1.0
	*	@lastchange 2008-10-23
	*
	*/
	$info = $database->query("SELECT page_id, page_title FROM ".TABLE_PREFIX."pages WHERE template='".$file."' order by page_title");
	
	if ($info->numRows() > 0) {
	
		/**
		*	Template is still in use, so we're collecting the page-titles
		*
		*	@version	0.2.0
		*	@build		5
		*	@since		0.1.1
		*	@lastchange 2008-10-23
		*
		*	0.2.0		Codechanges for Websitebaker to use it without the Black-Hawk-Engine
		*
		*	0.1.1		add this page <if we found only one> / these pages
		*
		*	@notice		All listed pages got linked to "settings.php" so the user can easy change
		*				the template-settings. Modifications could be made in "page_template_str".
		*				For additional informations you will have to modify the query, the page_template_str
		*				and the page_info array.
		*
		*	@todo		1 - Additional informations about the pages (modified, modified_by, visibility, etc)
		*
		*				2 - What happends about pages, the user is not allowed to edit?
		*					Marked "red"?
		*
		*				3 - Multiple language support here ...
		*/
		
		/**
		*	The base-message template-string for the top of the message
		*
		*	0.1.2	this page/ these pages
		*
		*/
		if (!array_key_exists("CANNOT_UNINSTALL_IN_USE_TMPL", $MESSAGE['GENERIC'])) {
			$add = $info->numRows() == 1 ? "this page" : "these pages";
			$msg_template_str  = "<br /><br />{{type}} <b>{{type_name}}</b> could not be uninstalled because it is still in use by {{pages}}";
			$msg_template_str .= ":<br /><i>click for editing.</i><br /><br />";
		} else {
			$msg_template_str = $MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE_TMPL'];
			$temp = explode(";",$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE_TMPL_PAGES']);
			$add = $info->numRows() == 1 ? $temp[0] : $temp[1];
		}
		/**
		*	The template-string for displaying the Page-Titles ... in this case as a link
		*/
		$page_template_str = "- <b><a href='../pages/settings.php?page_id={{id}}'>{{title}}</a></b><br />";
		
		$values = array ('type' => 'Template', 'type_name' => $file, 'pages' => $add);
		$msg = replace_all ( $msg_template_str,  $values );
		
		$page_names = "";
		
		while ($data = $info->fetchRow() ) {
			
			$page_info = array(
				'id'	=> $data['page_id'], 
				'title' => $data['page_title']
			);
			
			$page_names .= replace_all ( $page_template_str, $page_info );
		}
		
		/**
		*	Printing out the error-message and die().
		*/
		$admin->print_error($MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'].$msg.$page_names);
	}
}

// Check if we have permissions on the directory
if(!is_writable(WB_PATH.'/templates/'.$file)) {
	$admin->print_error($MESSAGE['GENERIC']['CANNOT_UNINSTALL'].WB_PATH.'/templates/'.$file);
}

// Try to delete the template dir
if(!rm_full_dir(WB_PATH.'/templates/'.$file)) {
	$admin->print_error($MESSAGE['GENERIC']['CANNOT_UNINSTALL']);
} else {
	// Remove entry from DB
	$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE directory = '".$file."' AND type = 'template'");
}

// Update pages that use this template with default template
$database = new database();
$database->query("UPDATE ".TABLE_PREFIX."pages SET template = '".DEFAULT_TEMPLATE."' WHERE template = '$file'");

// Print success message
$admin->print_success($MESSAGE['GENERIC']['UNINSTALLED']);

// Print admin footer
$admin->print_footer();

?>