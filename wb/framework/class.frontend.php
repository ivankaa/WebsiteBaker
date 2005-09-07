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

Frontend class

*/

if(!defined('WB_PATH')) {
	header('Location: ../index.php');
}


require_once(WB_PATH.'/framework/class.wb.php');

class frontend extends wb {
	// defaults
	var	$default_link,$default_page_id;

	// page details
	// page database row
	var $page;
	var $page_id,$page_title,$menu_title,$parent,$root_parent,$level,$visibility;
	var $page_description,$page_keywords,$page_link_original,$page_link;
	var $page_trail=array();
	
	var $page_access_denied;
	
	// website settings
	var $website_title,$website_description,$website_keywords,$website_header,$website_footer;

	// ugly database stuff
	var $extra_where_sql;

	function frontend() {
		$this->wb();
	}
	
	function page_select() {
		global $page_id,$no_intro;
		global $database;
		// We have no page id and are supposed to show the intro page
		if((INTRO_PAGE AND !isset($no_intro)) AND (!isset($page_id) OR !is_numeric($page_id))) {
			// Since we have no page id check if we should go to intro page or default page
			// Get intro page content
			$filename = WB_PATH.PAGES_DIRECTORY.'/intro.php';
			if(file_exists($filename)) {
				$handle = fopen($filename, "r");
				$content = fread($handle, filesize($filename));
				fclose($handle);
				$this->preprocess($content);
				echo $this->strip_slashes_dummy($content);
				return false;
			}
		}
		// Check if we should add page language sql code
		if(PAGE_LANGUAGES) {
			$this->sql_where_language = " AND language = '".LANGUAGE."'";
		}
		// Get default page
		// Check for a page id
		$query_default = "SELECT page_id,link FROM ".TABLE_PREFIX."pages WHERE parent = '0' AND visibility = 'public'$this->sql_where_language ORDER BY position ASC LIMIT 1";
		$get_default = $database->query($query_default);
		$default_num_rows = $get_default->numRows();
		if(!isset($page_id) OR !is_numeric($page_id)){
			// Go to or show default page
			if($default_num_rows > 0) {
				$fetch_default = $get_default->fetchRow();
				$this->default_link = $fetch_default['link'];
				$default_page_id = $fetch_default['page_id'];
				// Check if we should redirect or include page inline
				if(HOMEPAGE_REDIRECTION) {
					// Redirect to page
					header("Location: ".page_link($this->default_link));
					exit();
				} else {
					// Include page inline
					$this->page_id = $default_page_id;
				}
			} else {
		   		// No pages have been added, so print under construction page
				$this->print_under_construction();
				exit();
			}
		} else {
			$this->page_id=$page_id;
		}
		// Get default page link
		if(!isset($fetch_default)) {
		  	$fetch_default = $get_default->fetchRow();
	 		$this->default_link = $fetch_default['link'];
		}
		return true;
	}

	function get_page_details() {
		global $database;
	    if($this->page_id != 0) {
			// Query page details
			$query_page = "SELECT * FROM ".TABLE_PREFIX."pages WHERE page_id = '{$this->page_id}'";
			$get_page = $database->query($query_page);
			// Make sure page was found in database
			if($get_page->numRows() == 0) {
				// Print page not found message
				exit("Page not found");
			}
			// Fetch page details
			$this->page = $get_page->fetchRow();
			// Check if the page language is also the selected language. If not, send headers again.
			if ($this->page['language']!=LANGUAGE) {
				require_once(WB_PATH.'/framework/functions.php');
				header('Location: '.page_link($this->page['link']).'?lang='.$this->page['language']);
				exit();
			}
			// Begin code to set details as either variables of constants
			// Page ID
			define('PAGE_ID', $this->page['page_id']);
			$this->page_id=$this->page['page_id'];
			// Page Title
			define('PAGE_TITLE', $this->strip_slashes_dummy($this->page['page_title']));
			$this->page_title=PAGE_TITLE;
			// Menu Title
			$menu_title = $this->strip_slashes_dummy($this->page['menu_title']);
			if($menu_title != '') {
				define('MENU_TITLE', $menu_title);
			} else {
				define('MENU_TITLE', PAGE_TITLE);
			}
			$this->menu_title=MENU_TITLE;
			// Page parent
			define('PARENT', $this->page['parent']);
			$this->parent=$this->page['parent'];
			// Page root parent
			define('ROOT_PARENT', $this->page['root_parent']);
			$this->root_parent=$this->page['root_parent'];
			// Page level
			define('LEVEL', $this->page['level']);
			$this->level=$this->page['level'];
			// Page visibility
			define('VISIBILITY', $this->page['visibility']);
			$this->visibility=$this->page['visibility'];
			// Page trail
			foreach(explode(',', $this->page['page_trail']) AS $pid) {
				$this->page_trail[$pid]=$pid;
			}
			// Page description
			$this->page_description=$this->page['description'];
			// Page keywords
			$this->page_keywords=$this->page['keywords'];
			// Page link
			$this->link=$this->page_link($this->page['link']);

		// End code to set details as either variables of constants
		}

		// Work-out if any possible in-line search boxes should be shown
		if(SEARCH == 'public') {
			define('SHOW_SEARCH', true);
		} elseif(SEARCH == 'private' AND VISIBILITY == 'private') {
			define('SHOW_SEARCH', true);
		} elseif(SEARCH == 'private' AND $wb->is_authenticated() == true) {
			define('SHOW_SEARCH', true);
		} else {
			define('SHOW_SEARCH', false);
		}
		// Work-out if menu should be shown
		if(!defined('SHOW_MENU')) {
			define('SHOW_MENU', true);
		}
		// Work-out if login menu constants should be set
		if(FRONTEND_LOGIN) {
			// Set login menu constants
			define('LOGIN_URL', WB_URL.'/account/login'.PAGE_EXTENSION);
			define('LOGOUT_URL', WB_URL.'/account/logout'.PAGE_EXTENSION);
			define('FORGOT_URL', WB_URL.'/account/forgot'.PAGE_EXTENSION);
			define('PREFERENCES_URL', WB_URL.'/account/preferences'.PAGE_EXTENSION);
			define('SIGNUP_URL', WB_URL.'/account/signup'.PAGE_EXTENSION);
		}

		// Figure out what template to use
		if(!defined('TEMPLATE')) {
			if(isset($this->page['template']) AND $this->page['template'] != '') {
				if(file_exists(WB_PATH.'/templates/'.$this->page['template'].'/index.php')) {
					define('TEMPLATE', $this->page['template']);
				} else {
					define('TEMPLATE', DEFAULT_TEMPLATE);
				}
			} else {
				define('TEMPLATE', DEFAULT_TEMPLATE);
			}
		}
		// Set the template dir
		define('TEMPLATE_DIR', WB_URL.'/templates/'.TEMPLATE);

		// Check if user is allow to view this page
		if(VISIBILITY == 'private' OR VISIBILITY == 'registered') {
			// Check if the user is authenticated
			if($this->is_authenticated() == false) {
				// User needs to login first
				header("Location: ".WB_URL."/account/login".PAGE_EXTENSION.'?redirect='.$this->link);
			}
			// Check if we should show this page
			if($this->show_page($this->page) == false) {
				$this->page_access_denied=true;
			}
		} elseif(VISIBILITY == 'deleted' OR VISIBILITY == 'none') {
			// User isnt allowed on this page so tell them
			$this->page_access_denied=true;
		}
		// never show no-vis, hidden or deleted pages
		$this->extra_where_sql = "visibility != 'none' AND visibility != 'hidden' AND visibility != 'deleted'";
		// Set extra private sql code
		if($this->is_authenticated()==false) {
			// if user is not authenticated, don't show private pages either
			$this->extra_where_sql .= " AND visibility != 'private'";
			// and 'registered' without frontend login doesn't make much sense!
			if (FRONTEND_LOGIN==false) {
				$this->extra_where_sql .= " AND visibility != 'registered'";
			}
		}
		$this->extra_where_sql .= $this->sql_where_language;
	}

	function get_website_settings() {
		global $database;
		// Get website settings (title, keywords, description, header, and footer)
		$query_settings = "SELECT name,value FROM ".TABLE_PREFIX."settings";
		$get_settings = $database->query($query_settings);
		while($setting = $get_settings->fetchRow()) {
			switch($setting['name']) {
				case 'title':
					define('WEBSITE_TITLE', $this->strip_slashes_dummy($setting['value']));
					$this->website_title=WEBSITE_TITLE;
				break;
				case 'description':
					if($page_description != '') {
						define('WEBSITE_DESCRIPTION', $page_description);
					} else {
						define('WEBSITE_DESCRIPTION', $this->strip_slashes_dummy($setting['value']));
					}
					$this->website_description=WEBSITE_DESCRIPTION;
				break;
				case 'keywords':
					if($page_keywords != '') {
						define('WEBSITE_KEYWORDS', $this->strip_slashes_dummy($setting['value']).' '.$page_keywords);
					} else {
						define('WEBSITE_KEYWORDS', $this->strip_slashes_dummy($setting['value']));
					}
					$this->website_keywords=WEBSITE_KEYWORDS;
				break;
				case 'header':
					define('WEBSITE_HEADER', $this->strip_slashes_dummy($setting['value']));
					$this->website_header=WEBSITE_HEADER;
				break;
				case 'footer':
					define('WEBSITE_FOOTER', $this->strip_slashes_dummy($setting['value']));
					$this->website_footer=WEBSITE_FOOTER;
				break;
			}
		}
	}
	
	function page_link($link){
		// Check for :// in the link (used in URL's)
		if(strstr($link, '://') == '') {
			return WB_URL.PAGES_DIRECTORY.$link.PAGE_EXTENSION;
		} else {
			return $link;
		}
	}
	
	function preprocess(&$content) {
		global $database;
		// Replace [wblink--PAGE_ID--] with real link
		$pattern = '/\[wblink(.+?)\]/s';
		preg_match_all($pattern,$content,$ids);
		foreach($ids[1] AS $page_id) {
			$pattern = '/\[wblink'.$page_id.'\]/s';
			// Get page link
			$get_link = $database->query("SELECT link FROM ".TABLE_PREFIX."pages WHERE page_id = '$page_id' LIMIT 1");
			$fetch_link = $get_link->fetchRow();
			$link = page_link($fetch_link['link']);
			$content = preg_replace($pattern,$link,$content);
		}
	}
	
	function menu() {
	   if (!isset($this->menu_number)) {
	   	$this->menu_number = 1;
	   }
	   if (!isset($this->menu_start_level)) {
	   	$this->menu_start_level = 0;
	   }
	   if (!isset($this->menu_recurse)) {
	   	$this->menu_recurse = -1;
	   }
	   if (!isset($this->menu_collapse)) {
	   	$this->menu_collapse = true;
	   }
	   if (!isset($this->menu_item_template)) {
	   	$this->menu_item_template = '<li><span[class]>[a][menu_title][/a]</span>';
	   }
	   if (!isset($this->menu_item_footer)) {
	   	$this->menu_item_footer = '</li>';
	   }
	   if (!isset($this->menu_header)) {
	   	$this->menu_header = '<ul>';
	   }
	   if (!isset($this->menu_footer)) {
	   	$this->menu_footer = '<ul>';
	   }
	   if (!isset($this->menu_default_class)) {
	   	$this->menu_default_class = ' class="menu_default"';
	   }
	   if (!isset($this->menu_current_class)) {
	   	$this->menu_current_class = ' class="menu_current"';
	   }
       if (!isset($this->menu_parent)) {
     	$this->menu_parent = 0;
	   }
	   $this->show_menu();
	   if ($start_level>0) {
	       $key_array=array_keys($this->page_trail);
	       $real_start=$key_array[$start_level-1];
	       if (isset($real_start))
	       {
	       		$this->menu_parent=$real_start;
	          $this->show_menu();
	       }
	       return;
	   }

	}
	
	function show_menu() {
	   global $database;
	   if ($this->menu_recurse==0)
	       return;
	   // Check if we should add menu number check to query
	   if($menu_parent == 0) {
	       $menu_number = "menu = '$this->menu_number'";
	   } else {
	      $menu_number = '1';
	   }
	   // Query pages
	   $query_menu = $database->query("SELECT page_id,menu_title,page_title,link,target,level,visibility FROM ".
	TABLE_PREFIX."pages WHERE parent = '$this->menu_parent' AND $menu_number AND $this->extra_where_sql ORDER BY position ASC");
	   // Check if there are any pages to show
	   if($query_menu->numRows() > 0) {
	   	  // Print menu header
	   	  echo "\n".$this->menu_header;
	      // Loop through pages
	      while($page = $query_menu->fetchRow()) {
	      	 // Check if this page should be shown
	         // Create vars
	         $vars = array('[class]','[a]', '[/a]', '[menu_title]', '[page_title]');
	         // Work-out class
	         if($page['page_id'] == PAGE_ID) {
	            $class = $this->menu_current_class;
	         } else {
	            $class = $this->menu_default_class;
	         }
	         // Check if link is same as first page link, and if so change to WB URL
	         if($page['link'] == $this->default_link AND !INTRO_PAGE) {
	            $link = WB_URL;
	         } else {
	            $link = $this->page_link($page['link']);
	         }
	         // Create values
	         $values = array($class,'<a href="'.$link.'" target="'.$page['target'].'" '.$class.'>', '</a>', $this->strip_slashes_dummy($page['menu_title']), $this->strip_slashes_dummy($page['page_title']));
	         // Replace vars with value and print
	         echo "\n".str_replace($vars, $values, $this->menu_item_template);
	         // Generate sub-menu
	         if($this->menu_collapse==false OR ($this->menu_collapse==true AND isset($this->page_trail[$page['page_id']]))) {
	            $this->menu_recurse--;
	            $this->menu_parent=$page['page_id'];
	            $this->show_menu();
	         }
	         echo "\n".$this->menu_item_footer;
	      }
	      // Print menu footer
	      echo "\n".$this->menu_footer;
	   }
	}

	function page_content($block = 1) {
		// Get outside objects
		global $database,$admin,$TEXT,$MENU,$HEADING,$MESSAGE;
		global $globals;
		if ($this->page_access_denied==true) {
            echo $MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'];
			exit();
		}
		if(isset($globals) AND is_array($globals)) { foreach($globals AS $global_name) { global $$global_name; } }
		// Make sure block is numeric
		if(!is_numeric($block)) { $block = 1; }
		// Include page content
		if(!defined('PAGE_CONTENT')) {
			// First get all sections for this page
			$query_sections = $database->query("SELECT section_id,module FROM ".TABLE_PREFIX."sections WHERE page_id = '".PAGE_ID."' AND block = '$block' ORDER BY position");
			if($query_sections->numRows() > 0) {
				// Loop through them and include there modules file
				while($section = $query_sections->fetchRow()) {
					$section_id = $section['section_id'];
					$module = $section['module'];
					require(WB_PATH.'/modules/'.$module.'/view.php');
				}
			}
		} else {
			if($block == 1) {
				require(PAGE_CONTENT);
			}
		}
	}

	// Function for page title
	function page_title($spacer = ' - ', $template = '[WEBSITE_TITLE][SPACER][PAGE_TITLE]') {
		$vars = array('[WEBSITE_TITLE]', '[PAGE_TITLE]', '[MENU_TITLE]', '[SPACER]');
		$values = array(WEBSITE_TITLE, PAGE_TITLE, MENU_TITLE, $spacer);
		echo str_replace($vars, $values, $template);
	}

	// Function for page description
	function page_description() {
		echo WEBSITE_DESCRIPTION;
	}
	// Function for page keywords
	function page_keywords() {
		echo WEBSITE_KEYWORDS;
	}
	// Function for page header
	function page_header($date_format = 'Y') {
		echo WEBSITE_HEADER;
	}

	// Function for page footer
	function page_footer($date_format = 'Y') {
		global $starttime;
   		$vars = array('[YEAR]', '[PROCESSTIME]');
   		$processtime=(microtime()>$starttime)?microtime()-$starttime:microtime()-$starttime+1;
		$values = array(date($date_format),$processtime);
		echo str_replace($vars, $values, WEBSITE_FOOTER);
	}

	// Function to show the "Under Construction" page
	function print_under_construction() {
		global $MESSAGE;
		require_once(WB_PATH.'/languages/'.DEFAULT_LANGUAGE.'.php');
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<head><title>'.$MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION'].'</title>
		<style type="text/css"><!-- body { font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px; color: #000000;	background-color: #FFFFFF;	margin: 20px; text-align: center; }
		h1 { margin: 0; padding: 0; }--></style></head><body>
		<h1>'.$MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION'];'.</h1><br />
		'.$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'].'</body></html>';
	}
}

?>
