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

/*
	This file is purely for ensuring compatibility with 3rd party
	contributions made for WB version 2.5.2 or below
*/
if(!defined('WB_URL')) {
	header('Location: ../index.php');
	exit(0);
}

// references to objects and variables that changed their names

$admin = &$wb;

$default_link=&$wb->default_link;

$page_trail=&$wb->page_trail;
$page_description=&$wb->page_description;
$page_keywords=&$wb->page_keywords;
$page_link=&$wb->link;

// extra_sql is not used anymore - this is basically a register_globals exploit prevention...
$extra_sql=&$wb->extra_sql;
$extra_where_sql=&$wb->extra_where_sql;

$query="SELECT directory FROM ".TABLE_PREFIX."addons WHERE type = 'module' AND function = 'snippet'";
$query_result=$database->query($query);
if ($query_result->numRows()>0) {
	while ($row = $query_result->fetchRow()) {
		$module_dir = $row['directory'];
		if (file_exists(WB_PATH.'/modules/'.$module_dir.'/include.php')) {
			include(WB_PATH.'/modules/'.$module_dir.'/include.php');
		}
	}
}

// Frontend functions
if (!function_exists('page_link')) {
	function page_link($link) {
		global $wb;
		return $wb->page_link($link);
	}
}

//function to highlight search results
if (!function_exists('search_highlight')) {
function search_highlight($foo='', $arr_string=array()) {
	require_once(WB_PATH.'/framework/functions.php');
	require_once(WB_PATH.'/search/search_convert.php');

	$foo = entities_to_umlauts($foo, 'UTF-8');
	array_walk($arr_string, create_function('&$v,$k','$v = preg_quote($v, \'/\');'));
	$search_string = implode("|", $arr_string);
	$string = entities_to_umlauts($search_string, 'UTF-8');
	$string = strtr($string, $string_ul_umlauts);
	// special-feature: '|' means word-boundary (\b). Searching for 'the|' will find 'the', but not 'thema'.
	$string = strtr($string, array('\\|'=>'\b'));
	
	// the highlighting
	// match $string, but not inside <style>...</style>, <script>...</script>, <!--...--> or HTML-Tags
	// split $string into pieces - "cut away" styles, scripts, comments, and HTML-tags
	$matches = preg_split("/(<style.*<\/style>|<script.*<\/script>|<!--.*-->|<.*>)/iUs",$foo,-1,(PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY));
	if(is_array($matches) && $matches != array()) {
		$foo = "";
		$string = strtr($string, array('&lt;'=>'<', '&gt;'=>'>', '&amp;'=>'&', '&quot;'=>'"', '&#39;'=>'\'', '&nbsp;'=>"\xC2\xA0"));
		foreach($matches as $match) {
			if($match{0}!="<") {
				$match = strtr($match, array('&lt;'=>'<', '&gt;'=>'>', '&amp;'=>'&', '&quot;'=>'"', '&#39;'=>'\'', '&nbsp;'=>"\xC2\xA0"));
				$match = preg_replace('/('.$string.')/iS', '_span class=_highlight__$1_/span_',$match);
				$match = strtr($match, array('<'=>'&lt;', '>'=>'&gt;', '&'=>'&amp;', '"'=>'&quot;', '\''=>'&#39;', "\xC2\xA0"=>'&nbsp;'));
				$match = str_replace(array('_span class=_highlight__', '_/span_'), array('<span class="highlight">', '</span>'), $match);
			}
			$foo .= $match;
		}
	}
	
	if(DEFAULT_CHARSET != 'utf-8') {
		$foo = umlauts_to_entities($foo, 'UTF-8');
	}
	return $foo;
}
}

// Old menu call invokes new menu function
if (!function_exists('page_menu')) {
	function page_menu($parent = 0, $menu_number = 1, $item_template = '<li[class]>[a] [menu_title] [/a]</li>', $menu_header = '<ul>', $menu_footer = '</ul>', $default_class = ' class="menu_default"', $current_class = ' class="menu_current"', $recurse = LEVEL) {
		global $wb;
		$wb->menu_number=$menu_number;
		$wb->menu_item_template=$item_template;
		$wb->menu_item_footer='';
		$wb->menu_parent = $parent;
		$wb->menu_header = $menu_header; 
		$wb->menu_footer = $menu_footer;
		$wb->menu_default_class = $default_class;
		$wb->menu_current_class = $current_class;
		$wb->menu_recurse = $recurse+2; 	
		$wb->menu();
		unset($wb->menu_parent);
		unset($wb->menu_number);
		unset($wb->menu_item_template);
		unset($wb->menu_item_footer);
		unset($wb->menu_header);
		unset($wb->menu_footer);
		unset($wb->menu_default_class);
		unset($wb->menu_current_class);
		unset($wb->menu_start_level);
		unset($wb->menu_collapse);
		unset($wb->menu_recurse);
	}
}

if (!function_exists('show_menu')) {
	function show_menu($menu_number = NULL, $start_level=NULL, $recurse = NULL, $collapse = NULL, $item_template = NULL, $item_footer = NULL, $menu_header = NULL, $menu_footer = NULL, $default_class = NULL, $current_class = NULL, $parent = NULL) {
		global $wb;
		if (isset($menu_number))
			$wb->menu_number=$menu_number;
		if (isset($start_level))
			$wb->menu_start_level=$start_level;
		if (isset($recurse))
			$wb->menu_recurse=$recurse;
		if (isset($collapse))
			$wb->menu_collapse=$collapse;
		if (isset($item_template))
			$wb->menu_item_template=$item_template;
		if (isset($item_footer))
			$wb->menu_item_footer=$item_footer;
		if (isset($menu_header))
			$wb->menu_header=$menu_header;
		if (isset($menu_footer))
			$wb->menu_footer=$menu_footer;
		if (isset($default_class))
			$wb->menu_default_class=$default_class;
		if (isset($current_class))
			$wb->menu_current_class=$current_class;
		if (isset($parent))
			$wb->menu_parent=$parent;
		$wb->menu();
		unset($wb->menu_recurse);
		unset($wb->menu_parent);
		unset($wb->menu_start_level);
	}
}

if (!function_exists('page_content')) {
	function page_content($block = 1) {
		// Get outside objects
		global $TEXT,$MENU,$HEADING,$MESSAGE;
		global $globals;
		global $database;
		global $wb;
		$admin = & $wb;
		if ($wb->page_access_denied==true) {
	        echo $MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'];
			exit();
		}
		if ($wb->page_no_active_sections==true) {
	        echo $MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'];
			exit();
		}
		if(isset($globals) AND is_array($globals)) { foreach($globals AS $global_name) { global $$global_name; } }
		// Make sure block is numeric
		if(!is_numeric($block)) { $block = 1; }
		// Include page content
		if(!defined('PAGE_CONTENT') OR $block!=1) {
			$page_id=$wb->page_id;
			// First get all sections for this page
			$query_sections = $database->query("SELECT section_id,module,publ_start,publ_end FROM ".TABLE_PREFIX."sections WHERE page_id = '".$page_id."' AND block = '$block' ORDER BY position");
			// If none were found, check if default content is supposed to be shown
			if($query_sections->numRows() == 0) {
				if ($wb->default_block_content=='none') {
					return;
				}
				if (is_numeric($wb->default_block_content)) {
					$page_id=$wb->default_block_content;
				} else {
					$page_id=$wb->default_page_id;
				}				
				$query_sections = $database->query("SELECT section_id,module,publ_start,publ_end FROM ".TABLE_PREFIX."sections WHERE page_id = '".$page_id."' AND block = '$block' ORDER BY position");
				// Still no cotent found? Give it up, there's just nothing to show!
				if($query_sections->numRows() == 0) {
					return;
				}
			}
			// Loop through them and include their module file
			while($section = $query_sections->fetchRow()) {
				// skip this section if it is out of publication-date
				$now = time();
				if( !( $now<$section['publ_end'] && ($now>$section['publ_start'] || $section['publ_start']==0) ||
					$now>$section['publ_start'] && $section['publ_end']==0) ) {
					continue;
				}
				$section_id = $section['section_id'];
				$module = $section['module'];
				// make a anchor for every section. This is for the search_extension
				echo "<a id=\"wb_section_$section_id\" name=\"wb_section_$section_id\"></a>";
				// highlights searchresults
				if (isset($_GET['searchresult']) AND is_numeric($_GET['searchresult']) AND !isset($_GET['nohighlight'])) {
					if (isset($_GET['sstring']) AND !empty($_GET['sstring']) ){
						$arr_string = explode(" ", $_GET['sstring']);
						if($_GET['searchresult'] == 2) {
							// exact match
							$arr_string[0] = strtr($arr_string[0], "_"," ");
						}
						ob_start(); //start output buffer
						require(WB_PATH.'/modules/'.$module.'/view.php');
						$foo = ob_get_contents();    // put outputbuffer in $foo
						ob_end_clean();             // clear outputbuffer
						echo search_highlight($foo, $arr_string);
					}
				} else {
					require(WB_PATH.'/modules/'.$module.'/view.php');
				}
			}
		} else {
			require(PAGE_CONTENT);
		}
	}
}

if (!function_exists('show_content')) {
	function show_content($block=1) {
		page_content($block);
	}
}

if (!function_exists('show_breadcrumbs')) {
	function show_breadcrumbs($sep=' > ',$tier=1,$links=true,$depth=-1) {
		global $wb;
		$page_id=$wb->page_id;
		if ($page_id!=0)
		{
	 		global $database;
			$bca=$wb->page_trail;
			$counter=0;
			foreach ($bca as $temp)
			{
		        if ($counter>=($tier-1) AND ($depth<0 OR $tier+$depth>$counter))
		        {
					if ($counter>=$tier) echo $sep;
					$query_menu=$database->query("SELECT menu_title,link FROM ".TABLE_PREFIX."pages WHERE page_id=$temp");
					$page=$query_menu->fetchRow();
					if ($links==true AND $temp!=$page_id)
						echo '<a href="'.page_link($page['link']).'">'.$page['menu_title'].'</a>';
					else
					    echo $page['menu_title'];
		        }
	            $counter++;
			}
		}
	}
}

// Function for page title
if (!function_exists('page_title')) {
	function page_title($spacer = ' - ', $template = '[WEBSITE_TITLE][SPACER][PAGE_TITLE]') {
		$vars = array('[WEBSITE_TITLE]', '[PAGE_TITLE]', '[MENU_TITLE]', '[SPACER]');
		$values = array(WEBSITE_TITLE, PAGE_TITLE, MENU_TITLE, $spacer);
		echo str_replace($vars, $values, $template);
	}
}

// Function for page description
if (!function_exists('page_description')) {
	function page_description() {
		global $wb;
		if ($wb->page_description!='') {
			echo $wb->page_description;
		} else {
			echo WEBSITE_DESCRIPTION;
		}
	}
}

// Function for page keywords
if (!function_exists('page_keywords')) {
	function page_keywords() {
		global $wb;
		if ($wb->page_keywords!='') {
			echo $wb->page_keywords;
		} else {
			echo WEBSITE_KEYWORDS;
		}
	}
}

// Function for page header
if (!function_exists('page_header')) {
	function page_header($date_format = 'Y') {
		echo WEBSITE_HEADER;
	}
}

// Function for page footer
if (!function_exists('page_footer')) {
	function page_footer($date_format = 'Y') {
		global $starttime;
		$vars = array('[YEAR]', '[PROCESS_TIME]');
		$processtime=array_sum(explode(" ",microtime()))-$starttime;
		$values = array(date($date_format),$processtime);
		echo str_replace($vars, $values, WEBSITE_FOOTER);
	}
}

// Function to add optional module Javascript or CSS stylesheets into the <head> section of the frontend
if(!function_exists('register_frontend_modfiles')) {
	function register_frontend_modfiles($file_id="css") {
		// sanity check of parameter passed to the function
		$file_id = strtolower($file_id);
		if($file_id !== "css" && $file_id !== "javascript" && $file_id !== "js") { 
			return;
		}

		global $wb, $database;
		// define default baselink and filename for optional module javascript and stylesheet files
		$head_links = "";
		if($file_id == "css") {
      $base_link = '<link href="'.WB_URL.'/modules/{MODULE_DIRECTORY}/frontend.css"'; 
			$base_link.= ' rel="stylesheet" type="text/css" media="screen" />';
			$base_file = "frontend.css";
		} else {
			$base_link = '<script type="text/javascript" src="'.WB_URL.'/modules/{MODULE_DIRECTORY}/frontend.js"></script>';
			$base_file = "frontend.js";
		}

  		// gather information for all models embedded on actual page
		$page_id = $wb->page_id;
    	$query_modules = $database->query("SELECT module FROM " .TABLE_PREFIX ."sections 
			WHERE page_id=$page_id AND module<>'wysiwyg'");

    	while($row = $query_modules->fetchRow()) {
			// check if page module directory contains a frontend.js or frontend.css file
    		if(file_exists(WB_PATH ."/modules/" .$row['module'] ."/$base_file")) {
				// create link with frontend.js or frontend.css source for the current module
				$tmp_link = str_replace("{MODULE_DIRECTORY}", $row['module'], $base_link);

        		// define constant indicating that the register_frontent_files was invoked
				if($file_id == 'css') {
					define('MOD_FRONTEND_CSS_REGISTERED', true);
				} else {
					define('MOD_FRONTEND_JAVASCRIPT_REGISTERED', true);
				}

        		// ensure that frontend.js or frontend.css is only added once per module type
        		if(strpos($head_links, $tmp_link) === false) {
					$head_links .= $tmp_link ."\n";
				}
			}
    	}
  		// include the Javascript email protection function
  		if($file_id != 'css' && file_exists(WB_PATH .'/modules/mail_filter/js/mdcr.js')) {
			$head_links .= '<script type="text/javascript" src="'.WB_URL.'/modules/mail_filter/js/mdcr.js"></script>' ."\n";
		}
  		
		// write out links with all external module javascript/CSS files, remove last line feed
		echo $head_links;
	}
}

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
