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

// most of this is still the same code as in 2.6.7, but rearranged heavily

if(!defined('WB_URL')) { 
	header('Location: index.php');
	exit(0);
}

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Check if search is enabled
if(SHOW_SEARCH != true) {
	echo $TEXT['SEARCH'].' '.$TEXT['DISABLED'];
	return;
}

// this is for timing-tests only
//$overall_start_time = microtime(true);

// search-module-extension: get helper-functions
require_once(WB_PATH.'/search/search_modext.php');
// search-module-extension: Get "search.php" for each module, if present
// looks in modules/module/ and modules/module_searchext/
$search_funcs = array();
$query = $database->query("SELECT DISTINCT directory FROM ".TABLE_PREFIX."addons WHERE type = 'module' AND directory NOT LIKE '%_searchext'");
if($query->numRows() > 0) {
	while($module = $query->fetchRow()) {
		$func_name = $module['directory']."_search";
		$file = WB_PATH.'/modules/'.$module['directory'].'/search.php';
		if(!file_exists($file)) {
			$file = WB_PATH.'/modules/'.$module['directory'].'_searchext/search.php';
			if(!file_exists($file)) {
				$file='';
			}
		}
		if($file!='') {
			include_once($file);
			if(function_exists($module['directory']."_search")) {
				$search_funcs[$module['directory']] = $func_name;
			}
		}
	}
}

// Get the search type
$match = 'all';
if(isset($_REQUEST['match'])) {
	$match = $wb->add_slashes(strip_tags($_REQUEST['match']));
}

// Get the path to search into. Normally left blank
/* possible values:
 * - a single path: "/en/" - search only pages whose link contains 'path' ("/en/machinery/bender-x09")
 * - a bunch of alternative pathes: "/en/,/machinery/,docs/" - alternatives paths, seperated by comma
 * - a bunch of paths to exclude: "-/about,/info,/jp/,/light" - search all, exclude these.
 * These different styles can't be mixed.
 */
$search_path_SQL = "";
$search_path = "";
if(isset($_REQUEST['search_path'])) {
	$search_path = $wb->add_slashes(strip_tags($_REQUEST['search_path']));
	if($search_path != '') {
		$search_path_SQL = "AND ( ";
		$not = "";
		$op = "OR";
		if($search_path[0] == '-') {
			$not = "NOT";
			$op = "AND";
			$paths = explode(',', substr($search_path, 1) );
		} else {
			$paths = explode(',',$search_path);
		}
		$i=0;
		foreach($paths as $p) {
			if($i++ > 0) {
				$search_path_SQL .= " $op";
			}
			$search_path_SQL .= " link $not LIKE '%$p%'";			
		}
		$search_path_SQL .= " )";
	}
}

// TODO: with the new method, there is no need for search_entities_string anymore.
//   When the old method disappears, it can be removed, too.
//   BTW: in this case, there is no need for 
//   $text = umlauts_to_entities(strip_tags($content), strtoupper(DEFAULT_CHARSET), 0);
//   in wb/modules/wysiwyg/save.php anymore, too. Change that back to $text=strip_tags($content);

// Get search string
$search_normal_string = 'unset';
$search_entities_string = 'unset';
$search_display_string = '';
$string = '';
if(isset($_REQUEST['string'])) {
	if ($match!='exact') {
		$string=str_replace(',', '', $_REQUEST['string']);
	} else {
		$string=$_REQUEST['string']; // $string will be cleaned below
	}
	// redo possible magic quotes
	$string = $wb->strip_slashes($string);
	$string = htmlspecialchars($string);
	$search_display_string = $string;
	$string = addslashes($string);
	// remove some bad chars
	$string = preg_replace("/(^|\s+)([.])+(?=\s+|$)/", "", $string);
	// mySQL needs four backslashes to match one in LIKE comparisons)
	$string = str_replace('\\\\', '\\\\\\\\', $string);
	$string = trim($string);
	// convert a copy of $string to HTML-ENTITIES
	$string_entities = umlauts_to_entities($string);
	$search_normal_string = $string;
	$search_entities_string = $string_entities;
}

// Get list of usernames and display names
$query = $database->query("SELECT user_id,username,display_name FROM ".TABLE_PREFIX."users");
$users = array('0' => array('display_name' => $TEXT['UNKNOWN'], 'username' => strtolower($TEXT['UNKNOWN'])));
if($query->numRows() > 0) {
	while($user = $query->fetchRow()) {
		$users[$user['user_id']] = array('display_name' => $user['display_name'], 'username' => $user['username']);
	}
}

// Get search settings
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'header' LIMIT 1");
$fetch_header = $query->fetchRow();
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'footer' LIMIT 1");
$fetch_footer = $query->fetchRow();
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'results_header' LIMIT 1");
$fetch_results_header = $query->fetchRow();
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'results_footer' LIMIT 1");
$fetch_results_footer = $query->fetchRow();
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'results_loop' LIMIT 1");
$fetch_results_loop = $query->fetchRow();
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'no_results' LIMIT 1");
$fetch_no_results = $query->fetchRow();
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'module_order' LIMIT 1");
if($query->numRows() > 0) { $fetch_module_order = $query->fetchRow();
} else { $fetch_module_order['value'] = ""; }
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'max_excerpt' LIMIT 1");
if($query->numRows() > 0) { $fetch_max_excerpt = $query->fetchRow();
} else { $fetch_max_excerpt['value'] = '15'; }
$search_max_excerpt = (int)$fetch_max_excerpt['value'];
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'cfg_show_description' LIMIT 1");
if($query->numRows() > 0) { $fetch_cfg_show_description = $query->fetchRow();
} else { $fetch_cfg_show_description['value'] = 'true'; }
if($fetch_cfg_show_description['value'] == 'false') { $cfg_show_description = false;
} else { $cfg_show_description = true; }
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'cfg_search_description' LIMIT 1");
if($query->numRows() > 0) { $fetch_cfg_search_description = $query->fetchRow();
} else { $fetch_cfg_search_description['value'] = 'true'; }
if($fetch_cfg_search_description['value'] == 'false') { $cfg_search_description = false;
} else { $cfg_search_description = true; }
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'cfg_search_keywords' LIMIT 1");
if($query->numRows() > 0) { $fetch_cfg_search_keywords = $query->fetchRow();
} else { $fetch_cfg_search_keywords['value'] = 'true'; }
if($fetch_cfg_search_keywords['value'] == 'false') { $cfg_search_keywords = false;
} else { $cfg_search_keywords = true; }
$query = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'cfg_enable_old_search' LIMIT 1");
if($query->numRows() > 0) { $fetch_cfg_enable_old_search = $query->fetchRow();
} else { $fetch_cfg_enable_old_search['value'] = 'true'; }
if($fetch_cfg_enable_old_search['value'] == 'false') { $cfg_enable_old_search = false;
} else { $cfg_enable_old_search = true; }
// Replace vars in search settings with values
$vars = array('[SEARCH_STRING]', '[WB_URL]', '[PAGE_EXTENSION]', '[TEXT_RESULTS_FOR]');
$values = array($search_display_string, WB_URL, PAGE_EXTENSION, $TEXT['RESULTS_FOR']);
$search_footer = str_replace($vars, $values, ($fetch_footer['value']));
$search_results_header = str_replace($vars, $values, ($fetch_results_header['value']));
$search_results_footer = str_replace($vars, $values, ($fetch_results_footer['value']));
$search_module_order = $fetch_module_order['value'];

// check $search_max_excerpt
if(!is_numeric($search_max_excerpt)) {
	$search_max_excerpt = 15;
}

// Work-out what to do (match all words, any words, or do exact match), and do relevant with query settings
$all_checked = '';
$any_checked = '';
$exact_checked = '';
$search_normal_array = array();
$search_entities_array = array();
if($match != 'exact') {
	// Split string into array with explode() function
	$exploded_string = explode(' ', $search_normal_string);
	// Make sure there is no blank values in the array
	foreach($exploded_string AS $each_exploded_string) {
		if($each_exploded_string != '') {
			$search_normal_array[] = $each_exploded_string;
		}
	}
	// Split $string_entities, too
	$exploded_string = explode(' ', $search_entities_string);
	// Make sure there is no blank values in the array
	foreach($exploded_string AS $each_exploded_string) {
		if($each_exploded_string != '') {
			$search_entities_array[] = $each_exploded_string;
		}
	}
	if ($match == 'any') {
		$any_checked = ' checked="checked"';
		$logical_operator = ' OR';
	} else {
		$all_checked = ' checked="checked"';
		$logical_operator = ' AND';
	}
} else {
	$exact_checked = ' checked="checked"';
	$exact_string=$search_normal_string;
	$search_normal_array[]=$exact_string;
	$exact_string=$search_entities_string;
	$search_entities_array[]=$exact_string;
}	
// make an extra copy of $string_entities for use in a regex
require_once(WB_PATH.'/search/search_convert.php');
$search_words = array();
foreach ($search_entities_array AS $str) {
	$str = entities_to_umlauts($str, 'UTF-8');
	$str = preg_quote($str, '/');
	$str = strtr($str, $string_ul_umlauts);
	// special-feature: '|' means word-boundary (\b). Searching for 'the|' will find the, but not thema.
	// this doesn't work correctly for unicode-chars: '|test' will work, but '|über' not.
	$str = strtr($str, array('\\|'=>'\b'));
	$search_words[] = $str;
}

// Do extra vars/values replacement
$vars = array('[SEARCH_STRING]', '[WB_URL]', '[PAGE_EXTENSION]', '[TEXT_SEARCH]', '[TEXT_ALL_WORDS]', '[TEXT_ANY_WORDS]', '[TEXT_EXACT_MATCH]', '[TEXT_MATCH]', '[TEXT_MATCHING]', '[ALL_CHECKED]', '[ANY_CHECKED]', '[EXACT_CHECKED]', '[REFERRER_ID]', '[SEARCH_PATH]');
$values = array($search_display_string, WB_URL, PAGE_EXTENSION, $TEXT['SEARCH'], $TEXT['ALL_WORDS'], $TEXT['ANY_WORDS'], $TEXT['EXACT_MATCH'], $TEXT['MATCH'], $TEXT['MATCHING'], $all_checked, $any_checked, $exact_checked, REFERRER_ID, $search_path);
$search_header = str_replace($vars, $values, ($fetch_header['value']));
$vars = array('[TEXT_NO_RESULTS]');
$values = array($TEXT['NO_RESULTS']);
$search_no_results = str_replace($vars, $values, ($fetch_no_results['value']));

// Show search header
echo $search_header;
// Show search results_header
echo $search_results_header;

// Work-out if the user has already entered their details or not
if($search_normal_string != '') {

	// Get modules
	$table = TABLE_PREFIX."sections";
	$get_modules = $database->query("SELECT DISTINCT module FROM $table WHERE module != '' ");
	$modules = array();
	if($get_modules->numRows() > 0) {
		while($module = $get_modules->fetchRow()) {
			$modules[] = $module['module']; // $modules is an array of strings
		}
	}

	// sort module search-order
	// get the modules from $search_module_order first ...
	$sorted_modules = array();
	$m = count($modules);
	$search_modules = explode(',', $search_module_order);
	foreach($search_modules AS $item) {
		$item = trim($item);
		for($i=0; $i < $m; $i++) {
			if(isset($modules[$i]) && $modules[$i] == $item) {
				$sorted_modules[] = $modules[$i];
				unset($modules[$i]);
				break;
			}
		}
	}
	// ... then add the rest
	foreach($modules AS $item) {
		$sorted_modules[] = $item;
	}

	// First, use an alternative search-method, without sql's 'LIKE'.
	// 'LIKE' won't find upper/lower-variants of umlauts, cyrillic or greek chars without propperly set setlocale();
	// and even if setlocale() is set, it won't work for multi-linguale sites.
	// Use the search-module-extension instead.
	// This is somewhat slower than the orginial method.
	// CHANGES WITH V1.3: before V1.3 we called [module]-search() for a given page only once and searched in all [module]-sections on this page;
	// since V1.3 we call [module]-search() for very single section.
	$seen_pages = array(); // seen pages per module.
	$pages_listed = array(); // seen pages.
	foreach($sorted_modules AS $module_name) {
		$seen_pages[$module_name] = array();
		if(!isset($search_funcs[$module_name])) {
			continue; // there is no search_func for this module
		}
		// get each section for $module_name
		$table_s = TABLE_PREFIX."sections";	
		$table_p = TABLE_PREFIX."pages";
		$sections_query = $database->query("
			SELECT s.section_id, s.page_id, s.module, s.publ_start, s.publ_end,
			       p.page_title, p.menu_title, p.link, p.description, p.keywords, p.modified_when, p.modified_by,
			       p.visibility, p.viewing_groups, p.viewing_users
			FROM $table_s AS s INNER JOIN $table_p AS p ON s.page_id = p.page_id
			WHERE s.module = '$module_name' AND p.visibility NOT IN ('none','deleted') AND p.searching = '1' $search_path_SQL
			ORDER BY s.section_id, s.position ASC
		");
		if($sections_query->numRows() > 0) {
			while($res = $sections_query->fetchRow()) {
				// TODO: add a "section is searchable: yes/no" config-element into "Manage Sections" - ???
				//       and show this section only if section is searchable
				// Only show this section if it is not "out of publication-date"
				$now = time();
				if( !( $now<$res['publ_end'] && ($now>$res['publ_start'] || $res['publ_start']==0) ||
					$now>$res['publ_start'] && $res['publ_end']==0) ) {
					continue;
				}
				$search_func_vars = array(
					'database' => $database,
					'page_id' => $res['page_id'],
					'section_id' => $res['section_id'],
					'page_title' => $res['menu_title'], // had to change this, since the link is build from page_title (changeset #593)
					'page_menu_title' => $res['page_title'],
					'page_description' => ($cfg_show_description?$res['description']:""),
					'page_keywords' => $res['keywords'],
					'page_link' => $res['link'],
					'page_modified_when' => $res['modified_when'],
					'page_modified_by' => $res['modified_by'],
					'users' => $users,
					'search_words' => $search_words, // needed for preg_match_all
					'search_match' => $match,
					'search_url_array' => $search_normal_array, // needed for url-string only
					'results_loop_string' => $fetch_results_loop['value'],
					'default_max_excerpt' => $search_max_excerpt
				);
				// Only show this page if we are allowed to see it
				//if(is_access_denied($res['visibility'], $res['viewing_groups'], $res['viewing_users'])) {
				if($admin->page_is_visible($res) == false) {
					if($res['visibility'] == 'registered') { // don't show excerpt
						$search_func_vars['default_max_excerpt'] = 0;
						$search_func_vars['page_description'] = $TEXT['REGISTERED'];
					} else { // private
						continue;
					}
				}
				$uf_res = call_user_func($search_funcs[$module_name], $search_func_vars);
				if($uf_res) {
					$pages_listed[$res['page_id']] = true;
					$seen_pages[$module_name][$res['page_id']] = true;
				} else {
					$seen_pages[$module_name][$res['page_id']] = true;
				}
			}
		}
	}

	// Search page details only, such as description, keywords, etc, but only of unseen pages.
	$max_excerpt_num = 0; // we don't want excerpt here
	$divider = ".";
	$table = TABLE_PREFIX."pages";
	$query_pages = $database->query("
		SELECT page_id, page_title, menu_title, link, description, keywords, modified_when, modified_by,
		       visibility, viewing_groups, viewing_users
		FROM $table
		WHERE visibility NOT IN ('none','deleted') AND searching = '1' $search_path_SQL"
	);
	if($query_pages->numRows() > 0) {
		while($page = $query_pages->fetchRow()) {
			if (isset($pages_listed[$page['page_id']])) {
				continue;
			}
			$func_vars = array(
				'database' => $database,
				'page_id' => $page['page_id'],
				'page_title' => $page['menu_title'], // had to change this, since the link is build from page_title (changeset #593)
				'page_menu_title' => $page['page_title'],
				'page_description' => ($cfg_show_description?$page['description']:""),
				'page_keywords' => $page['keywords'],
				'page_link' => $page['link'],
				'page_modified_when' => $page['modified_when'],
				'page_modified_by' => $page['modified_by'],
				'users' => $users,
				'search_words' => $search_words, // needed for preg_match_all
				'search_match' => $match,
				'search_url_array' => $search_normal_array, // needed for url-string only
				'results_loop_string' => $fetch_results_loop['value'],
				'default_max_excerpt' => $max_excerpt_num
			);
			// Only show this page if we are allowed to see it
			//if(is_access_denied($page['visibility'], $page['viewing_groups'], $page['viewing_users'])) {
			if($admin->page_is_visible($page) == false) {
				if($page['visibility'] != 'registered') {
					continue;
				} else { // page: registered, user: access denied
					$func_vars['page_description'] = 'registered';
				}
			}
			if($admin->page_is_active($page) == false) {
				continue;
			}
			$text = $func_vars['page_title'].$divider
				.$func_vars['page_menu_title'].$divider
				.($cfg_search_description?$func_vars['page_description']:"").$divider
				.($cfg_search_keywords?$func_vars['page_keywords']:"").$divider;
			$mod_vars = array(
				'page_link' => $func_vars['page_link'],
				'page_link_target' => "",
				'page_title' => $func_vars['page_title'],
				'page_description' => $func_vars['page_description'],
				'page_modified_when' => $func_vars['page_modified_when'],
				'page_modified_by' => $func_vars['page_modified_by'],
				'text' => $text,
				'max_excerpt_num' => $func_vars['default_max_excerpt']
			);
			if(print_excerpt2($mod_vars, $func_vars)) {
				$pages_listed[$page['page_id']] = true;
			}
		}
	}

	// Now use the old method for pages not displayed by the new method above
	// in case someone has old modules without search.php.

	// Get modules
	$table_search = TABLE_PREFIX."search";
	$table_sections = TABLE_PREFIX."sections";
	$get_modules = $database->query("
		SELECT DISTINCT s.value, s.extra
		FROM $table_search AS s INNER JOIN $table_sections AS sec
			ON s.value = sec.module
		WHERE s.name = 'module'
	");
	$modules = array();
	if($get_modules->numRows() > 0) {
		while($module = $get_modules->fetchRow()) {
			$modules[] = $module; // $modules in an array of arrays
		}
	}
	// sort module search-order
	// get the modules from $search_module_order first ...
	$sorted_modules = array();
	$m = count($modules);
	$search_modules = explode(',', $search_module_order);
	foreach($search_modules AS $item) {
		$item = trim($item);
		for($i=0; $i < $m; $i++) {
			if(isset($modules[$i]) && $modules[$i]['value'] == $item) {
				$sorted_modules[] = $modules[$i];
				unset($modules[$i]);
				break;
			}
		}
	}
	// ... then add the rest
	foreach($modules AS $item) {
		$sorted_modules[] = $item;
	}

	if($cfg_enable_old_search) {
		$search_path_SQL = str_replace(' link ', ' '.TABLE_PREFIX.'pages.link ', $search_path_SQL);
		foreach($sorted_modules AS $module) {
			$query_start = '';
			$query_body = '';
			$query_end = '';
			$prepared_query = '';
			// Get module name
			$module_name = $module['value'];
			if(!isset($seen_pages[$module_name])) {
				$seen_pages[$module_name]=array();
			}
			// skip module 'code' - it doesn't make sense to search in a code section
			if($module_name=="code")
				continue;
			// Get fields to use for title, link, etc.
			$fields = unserialize($module['extra']);
			// Get query start
			$get_query_start = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'query_start' AND extra = '$module_name' LIMIT 1");
			if($get_query_start->numRows() > 0) {
				// Fetch query start
				$fetch_query_start = $get_query_start->fetchRow();
				// Prepare query start for execution by replacing {TP} with the TABLE_PREFIX
				$query_start = str_replace('[TP]', TABLE_PREFIX, ($fetch_query_start['value']));
			}
			// Get query end
			$get_query_end = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'query_end' AND extra = '$module_name' LIMIT 1");
			if($get_query_end->numRows() > 0) {
				// Fetch query end
				$fetch_query_end = $get_query_end->fetchRow();
				// Set query end
				$query_end = ($fetch_query_end['value']);
			}
			// Get query body
			$get_query_body = $database->query("SELECT value FROM ".TABLE_PREFIX."search WHERE name = 'query_body' AND extra = '$module_name' LIMIT 1");
			if($get_query_body->numRows() > 0) {
				// Fetch query body
				$fetch_query_body = $get_query_body->fetchRow();
				// Prepare query body for execution by replacing {STRING} with the correct one
				$query_body = str_replace(array('[TP]','[O]','[W]'), array(TABLE_PREFIX,'LIKE','%'), ($fetch_query_body['value']));
				// Loop through query body for each string, then combine with start and end
				$prepared_query = $query_start." ( ( ( ";
				$count = 0;
				foreach($search_normal_array AS $string) {
					if($count != 0) {
						$prepared_query .= " ) ".$logical_operator." ( ";
					}
					$prepared_query .= str_replace('[STRING]', $string, $query_body);
					$count = $count+1;
				}
				$count=0;
				$prepared_query .= ' ) ) OR ( ( ';
				foreach($search_entities_array AS $string) {
					if($count != 0) {
						$prepared_query .= " ) ".$logical_operator." ( ";
					}
					$prepared_query .= str_replace('[STRING]', $string, $query_body);
					$count = $count+1;
				}
				$prepared_query .= " ) ) ) ".$query_end;
	
				// Execute query
				$page_query = $database->query($prepared_query." ".$search_path_SQL);

				// Loop through queried items
				if($page_query->numRows() > 0) {
					while($page = $page_query->fetchRow()) {
						// Only show this page if it hasn't already been listed
						if(isset($seen_pages[$module_name][$page['page_id']]) || isset($pages_listed[$page['page_id']])) {
							continue;
						}
						
						// don't list pages with visibility == none|deleted and check if user is allowed to see the page
						$p_table = TABLE_PREFIX."pages";
						$viewquery = $database->query("
							SELECT visibility, viewing_groups, viewing_users
							FROM $p_table
							WHERE page_id='{$page['page_id']}'
						");
						$visibility = 'none'; $viewing_groups="" ; $viewing_users="";
						if($viewquery->numRows() > 0) {
							if($res = $viewquery->fetchRow()) {
								$visibility = $res['visibility'];
								$viewing_groups = $res['viewing_groups'];
								$viewing_users = $res['viewing_users'];
								if($visibility == 'deleted' || $visibility == 'none') {
									continue;
								}
								if($visibility == 'private') {
									//if(is_access_denied($visibility, $viewing_groups, $viewing_users)) {
									if($admin->page_is_visible(array(
										'page_id'=>$page[$fields['page_id']],
										'visibility' =>$visibility,
										'viewing_groups'=>$viewing_groups,
										'viewing_users'=>$viewing_users
									)) == false) {
										continue;
									}
								}
								if($admin->page_is_active(array('page_id'=>$page[$fields['page_id']]))==false) {
									continue;
								}
							}
						}
	
						// Get page link
						$link = page_link($page['link']);
						// Add search string for highlighting
						if ($match!='exact') {
							$sstring = implode(" ", $search_normal_array);
							$link = $link."?searchresult=1&amp;sstring=".urlencode($sstring);
						} else {
							$sstring = strtr($search_normal_array[0], " ", "_");
							$link = $link."?searchresult=2&amp;sstring=".urlencode($sstring);
						}
						// Set vars to be replaced by values
						if(!isset($page['description'])) { $page['description'] = ""; }
						if(!isset($page['modified_when'])) { $page['modified_when'] = 0; }
						if(!isset($page['modified_by'])) { $page['modified_by'] = 0; }
						$vars = array('[LINK]', '[TITLE]', '[DESCRIPTION]', '[USERNAME]','[DISPLAY_NAME]','[DATE]','[TIME]','[TEXT_LAST_UPDATED_BY]','[TEXT_ON]','[EXCERPT]');
						if($page['modified_when'] > 0) {
							$date = gmdate(DATE_FORMAT, $page['modified_when']+TIMEZONE);
							$time = gmdate(TIME_FORMAT, $page['modified_when']+TIMEZONE);
						} else {
							$date = $TEXT['UNKNOWN'].' '.$TEXT['DATE'];
							$time = $TEXT['UNKNOWN'].' '.$TEXT['TIME'];
						}
						$excerpt="";
						if($cfg_show_description == 0) {
							$page['description'] = "";
						}
						if(isset($page['menu_title'])) $rep_title = $page['menu_title'];
						else $rep_title = $page['page_title'];
						$values = array($link, $rep_title, $page['description'], $users[$page['modified_by']]['username'], $users[$page['modified_by']]['display_name'], $date, $time, $TEXT['LAST_UPDATED_BY'], strtolower($TEXT['ON']), $excerpt);
						// Show loop code with vars replaced by values
						echo str_replace($vars, $values, ($fetch_results_loop['value']));
						// Say that this page has been listed
						$seen_pages[$module_name][$page['page_id']] = true;
						$pages_listed[$page['page_id']] = true;
					}
				}
			}
		}
	}

	// Say no items found if we should
	if(count($pages_listed) == 0) {
		echo $search_no_results;
	}
} else {
	echo $search_no_results;
}

// Show search results_footer
echo $search_results_footer;
// Show search footer
echo $search_footer;

//$overall_end_time = microtime(true); // for testing only
//$time=$overall_end_time-$overall_start_time; print "<br />Timings - Overall: $time<br />";

?>
