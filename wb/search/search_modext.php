<?php

// $Id: $

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

// make the url-string for highlighting
function make_url_searchstring($search_match, $search_url_array) {
	$link = "";
	if ($search_match != 'exact') {
		$str = implode(" ", $search_url_array);
		$link = "?searchresult=1&amp;sstring=".urlencode($str);
	} else {
		$str = strtr($search_url_array[0], " ", "_");
		$link = "?searchresult=2&amp;sstring=".urlencode($str);
	}
	return $link;
}

// make date and time for "last modified by... on ..."-string
function get_page_modified($page_modified_when) {
	global $TEXT;
	if($page_modified_when > 0) {
		$date = gmdate(DATE_FORMAT, $page_modified_when+TIMEZONE);
		$time = gmdate(TIME_FORMAT, $page_modified_when+TIMEZONE);
	} else {
		$date = $TEXT['UNKNOWN'].' '.$TEXT['DATE'];
		$time = $TEXT['UNKNOWN'].' '.$TEXT['TIME'];
	}
	return array($date, $time);
}

// make username and displayname for "last modified by... on ..."-string
function get_page_modified_by($page_modified_by, $users) {
	global $TEXT;
	if($page_modified_by > 0) {
			$username = $users[$page_modified_by]['username'];
			$displayname = $users[$page_modified_by]['display_name'];
		} else {
			$username = "";
			$displayname = $TEXT['UNKNOWN'];
		}
	return array($username, $displayname);
}

// checks if _all_ searchwords matches
function is_all_matched($text, $search_words) {
	$all_matched = true;
	foreach ($search_words AS $word) {
		if(!preg_match('/'.$word.'/iu', $text)) {
			$all_matched = false;
			break;
		}
	}
	return $all_matched;
}

// checks if _any_ of the searchwords matches
function is_any_matched($text, $search_words) {
	$any_matched = false;
	$word = "(".implode("|", $search_words).")";
	if(preg_match('/'.$word.'/iu', $text)) {
		$any_matched = true;
	}
	return $any_matched;
}

// work-out if user is in $viewing_groups or $viewing_users
function is_access_denied($visibility, $viewing_groups_str, $viewing_users_str) {
	global $wb;
	$access_denied = false;
	if($visibility == 'private' || $visibility == 'registered') {
		$access_denied = true;
		if($wb->is_authenticated() == true) {
			$viewing_groups = explode(',', $viewing_groups_str);
			$viewing_users = explode(',', $viewing_users_str);
			if(in_array($wb->get_group_id(), $viewing_groups) || (in_array($wb->get_user_id(), $viewing_users))) {
				$access_denied = false;
			}
		}
	}
	return $access_denied;
}

// collects the matches from text in excerpt_array
function get_excerpts($text, $search_words, $max_excerpt_num) {
	$match_array = array();
	$excerpt_array = array();
	$word = "(".implode("|", $search_words).")";
	
	$text = strtr($text, array('&lt;'=>'<', '&gt;'=>'>', '&amp;'=>'&', '&quot;'=>'"', '&#39;'=>'\'', '&nbsp;'=>"\xC2\xA0"));
	$word = strtr($word, array('&lt;'=>'<', '&gt;'=>'>', '&amp;'=>'&', '&quot;'=>'"', '&#39;'=>'\'', '&nbsp;'=>"\xC2\xA0"));
	// Build the regex-string
	//...INVERTED EXCLAMATION MARK - INVERTED QUESTION MARK - DOUBLE EXCLAMATION MARK - INTERROBANG - EXCLAMATION QUESTION MARK - QUESTION EXCLAMATION MARK - DOUBLE QUESTION MARK - HALFWIDTH IDEOGRAPHIC FULL STOP - IDEOGRAPHIC FULL STOP - IDEOGRAPHIC COMMA
	$str1=".!?;"."\xC2\xA1"."\xC2\xBF"."\xE2\x80\xBC"."\xE2\x80\xBD"."\xE2\x81\x89"."\xE2\x81\x88"."\xE2\x81\x87"."\xEF\xBD\xA1"."\xE3\x80\x82"."\xE3\x80\x81";
	// ...DOUBLE EXCLAMATION MARK - INTERROBANG - EXCLAMATION QUESTION MARK - QUESTION EXCLAMATION MARK - DOUBLE QUESTION MARK - HALFWIDTH IDEOGRAPHIC FULL STOP - IDEOGRAPHIC FULL STOP - IDEOGRAPHIC COMMA
	$str2=".!?;"."\xE2\x80\xBC"."\xE2\x80\xBD"."\xE2\x81\x89"."\xE2\x81\x88"."\xE2\x81\x87"."\xEF\xBD\xA1"."\xE3\x80\x82"."\xE3\x80\x81";
	// "{0,200}?'.$word.'" : the '?' (ungreedy) is for performance-tuning; try a step-by-step-trace to see what i mean. 
	if(preg_match_all('/(?:^|\b|['.$str1.'])([^'.$str1.']{0,200}?'.$word.'[^'.$str2.']{0,200}(?:['.$str2.']|\b|$))/isu', $text, $match_array)) {
		foreach($match_array[1] AS $string) {
			$excerpt_array[] = trim($string);
		}
	}
	return $excerpt_array;
}

// makes excerpt_array a string ready to print out
function prepare_excerpts($excerpt_array, $search_words, $max_excerpt_num) {
	// excerpts: text before and after a single excerpt, html-tag for markup
	$EXCERPT_BEFORE =       '...&nbsp;';
	$EXCERPT_AFTER =        '&nbsp;...<br />';
	$EXCERPT_MARKUP_START = '<b>';
	$EXCERPT_MARKUP_END =   '</b>';
	// remove duplicate matches from $excerpt_array, if any.
	$excerpt_array = array_unique($excerpt_array);
	// use the first $max_excerpt_num excerpts only
	if(count($excerpt_array) > $max_excerpt_num) {
		$excerpt_array = array_slice($excerpt_array, 0, $max_excerpt_num);
	}
	// prepare search-string
	$string = "(".implode("|", $search_words).")";
	$string = strtr($string, array('&lt;'=>'<', '&gt;'=>'>', '&amp;'=>'&', '&quot;'=>'"', '&#39;'=>'\'', '&nbsp;'=>"\xC2\xA0"));
	// we want markup on search-results page,
	// but we need some 'magic' to prevent <br />, <b>... from being highlighted
	$excerpt = '';
	foreach($excerpt_array as $str) {
		$excerpt .= '#,,#'.preg_replace("/($string)/iu","#,,,,#$1#,,,,,#",$str).'#,,,#';
	}
	$excerpt = strtr($excerpt, array('<'=>'&lt;', '>'=>'&gt;', '&'=>'&amp;', '"'=>'&quot;', '\''=>'&#39;'));
	$excerpt = strtr($excerpt, array('#,,,,#'=>$EXCERPT_MARKUP_START, '#,,,,,#'=>$EXCERPT_MARKUP_END));
	$excerpt = strtr($excerpt, array('#,,#'=>$EXCERPT_BEFORE, '#,,,#'=>$EXCERPT_AFTER));
	// prepare to write out
	if(DEFAULT_CHARSET != 'utf-8') {
		$excerpt = umlauts_to_entities($excerpt, 'UTF-8');
	}
	return $excerpt;
}

// work out what the link-target should be
function make_url_target($page_link_target, $text, $search_words) {
	// 1. e.g. $page_link_target=="&monthno=5&year=2007" - module-dependent target. Do nothing.
	// 2. $page_link_target=="#!wb_section_..." - the user wants the section-target, so do nothing.
	// 3. $page_link_target=="#wb_section_..." - try to find a better target, use the section-target as fallback.
	// 4. $page_link_target=="" - do nothing
	if(version_compare(PHP_VERSION, '4.3.0', ">=") && substr($page_link_target,0,12)=='#wb_section_') {
		$word = '('.implode('|', $search_words).')';
		preg_match('/'.$word.'/iu', $text, $match, PREG_OFFSET_CAPTURE);
		if($match && is_array($match[0])) {
			$x=$match[0][1];
			// is there an anchor nearby?
			if (preg_match_all('/<(?:[^>]+id|\s*a[^>]+name)\s*=\s*"(.*)"/iuU', $text, $match, PREG_OFFSET_CAPTURE)) {
				$anchor='';
				foreach($match[1] AS $array) {
					if($array[1] > $x) {
						break;
					}
					$anchor = $array[0];
				}
				if($anchor != '') {
					$page_link_target = '#'.$anchor;
				}
			}
		}
	}
	elseif(substr($page_link_target,0,13)=='#!wb_section_') {
		$page_link_target = '#'.substr($page_link_target, 2);
	}
	return $page_link_target;
}

// wrapper for compatibility with old print_excerpt()
function print_excerpt($page_link, $page_link_target, $page_title, $page_description, $page_modified_when, $page_modified_by, $text, $max_excerpt_num, $func_vars, $pic_link="") {
	$mod_vars = array(
		'page_link' => $page_link,
		'page_link_target' => $page_link_target,
		'page_title' => $page_title,
		'page_description' => $page_description,
		'page_modified_when' => $page_modified_when,
		'page_modified_by' => $page_modified_by,
		'text' => $text,
		'max_excerpt_num' => $max_excerpt_num,
		'pic_link' => $pic_link
	);
	print_excerpt2($mod_vars, $func_vars);
}

/* These functions can be used in module-supplied search_funcs
 * -----------------------------------------------------------
 * print_excerpt2() - the main-function to use in all search_funcs
 * print_excerpt() - wrapper for compatibility-reason. Use print_excerpt2() instead.
 * list_files_dirs() - lists all files and dirs below a given directory
 * clear_filelist() - keeps only wanted or removes unwanted entries in file-list.
 */
 
// prints the excerpts for one section
function print_excerpt2($mod_vars, $func_vars) {
	extract($func_vars, EXTR_PREFIX_ALL, 'func');
	extract($mod_vars, EXTR_PREFIX_ALL, 'mod');
	global $TEXT;
	// check $mod_...vars
	if(!isset($mod_page_link))          $mod_page_link = $func_page_link;
	if(!isset($mod_page_link_target))   $mod_page_link_target = "";
	if(!isset($mod_page_title))         $mod_page_title = $func_page_title;
	if(!isset($mod_page_description))   $mod_page_description = $func_page_description;
	if(!isset($mod_page_modified_when)) $mod_page_modified_when = $func_page_modified_when;
	if(!isset($mod_page_modified_by))   $mod_page_modified_by = $func_page_modified_by;
	if(!isset($mod_text))               $mod_text = "";
	if(!isset($mod_max_excerpt_num))    $mod_max_excerpt_num = $func_default_max_excerpt;
	if(!isset($mod_pic_link))           $mod_pic_link = "";
	if(!isset($mod_no_highlight))       $mod_no_highlight = false;
	if($mod_text == "") // nothing to do
		{ return false; }
	if($mod_no_highlight) // no highlighting
		{ $mod_page_link_target = "&nohighlight".$mod_page_link_target; }

	// prepare the text (part 1): remove lf and cr, convert \" to ", remove comments, style, scripting and unnecessary whitespace, convert to utf8
	$mod_text = strtr($mod_text, array("\x0D\x0A" => ' ', "\x0D" => ' ', "\x0A" => ' ', '\"' => '"'));
	$mod_text = preg_replace('/(<!--.*?-->|<style.*?<\/style>|<script.*?<\/script>|\s+)/i', ' ', $mod_text);
	$mod_text = entities_to_umlauts($mod_text, 'UTF-8');

	// make the link from $mod_page_link, add target
	$link = "";
	$link = page_link($mod_page_link);
	$link .= make_url_searchstring($func_search_match, $func_search_url_array);
	$link .= make_url_target($mod_page_link_target, $mod_text, $func_search_words);

	// prepare the text (part 2): convert some special tags to '.', strip tags
	$mod_text = preg_replace('/<(br( \/)?|dt|\/dd|\/?(h[1-6]|tr|table|p|li|ul|pre|code|div|hr))[^>]*>/i', '.', $mod_text);
	$mod_text = strip_tags($mod_text);

// unhtmlspecialchars
//	$mod_text = strtr($mod_text, array('&lt;'=>'<', '&gt;'=>'>', '&amp;'=>'&', '&quot;'=>'"', '&#39;'=>'\'', '&nbsp;'=>"\xC2\xA0"));
//	$tmp_words = array();
//	foreach($func_search_words as $w) {
//		$tmp_words[] = strtr($w, array('&lt;'=>'<', '&gt;'=>'>', '&amp;'=>'&', '&quot;'=>'"', '&#39;'=>'\'', '&nbsp;'=>"\xC2\xA0"));
//	}
//	$func_search_words = $tmp_words;

	// Do a fast scan over $mod_text first. This will speedup things a lot.
	if($func_search_match == 'all') {
		if(!is_all_matched($mod_text, $func_search_words)) {
			return false;
		}
	}
	elseif(!is_any_matched($mod_text, $func_search_words)) {
		return false;
	}

	// now get the excerpt
	$excerpt = "";
	$excerpt_array = array();
	if($mod_max_excerpt_num > 0) {
		if(!$excerpt_array = get_excerpts($mod_text, $func_search_words, $mod_max_excerpt_num)) {
			return false;
		}
		$excerpt = prepare_excerpts($excerpt_array, $func_search_words, $mod_max_excerpt_num);
	}

	// handle image
	if($mod_pic_link != "") {
		$excerpt = '<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td width="110" valign="top"><a href="'.$link.'"><img src="'.WB_URL.'/'.MEDIA_DIRECTORY.$mod_pic_link.'" alt="" /></a></td><td>'.$excerpt.'</td></tr></tbody></table>';
	}

	// print-out the excerpt
	$vars = array();
	$values = array();
	list($date, $time) = get_page_modified($mod_page_modified_when);
	list($username, $displayname) = get_page_modified_by($mod_page_modified_by, $func_users);
	$vars = array('[LINK]', '[TITLE]', '[DESCRIPTION]', '[USERNAME]','[DISPLAY_NAME]','[DATE]','[TIME]','[TEXT_LAST_UPDATED_BY]','[TEXT_ON]','[EXCERPT]');
	$values = array(
		$link,
		$mod_page_title,
		$mod_page_description,
		$username,
		$displayname,
		$date,
		$time,
		$TEXT['LAST_UPDATED_BY'],
		$TEXT['ON'],
		$excerpt
	);
	echo str_replace($vars, $values, $func_results_loop_string);
	return true;
}

// list all files and dirs in $dir (recursive), omits '.' and '..'
// returns an array of two arrays ($files[] and $dirs[]).
// usage: list($files,$dirs) = list_files_dirs($directory);
//        $depth: get subdirs (true/false)
function list_files_dirs($dir, $depth=true, $files=array(), $dirs=array()) {
	$dh=opendir($dir);
	while(($file = readdir($dh)) !== false) {
		if($file == '.' || $file == '..') {
			continue;
		}
		if(is_dir($dir.'/'.$file)) {
			if($depth) {
				$dirs[] = $dir.'/'.$file;
				list($files, $dirs) = list_files_dirs($dir.'/'.$file, $depth, $files, $dirs);
			}
		} else {
			$files[] = $dir.'/'.$file;
		}
	}
	closedir($dh);
	natcasesort($files);
	natcasesort($dirs);
	return(array($files, $dirs));
}

// keeps only wanted entries in array $files. $str have to be an eregi()-compatible regex
function clear_filelist($files, $str, $keep=true) {
	// $keep = true  : remove all non-matching entries
	// $keep = false : remove all matching entries
	$c_filelist = array();
	if($str == '')
		return $files;
	foreach($files as $file) {
		if($keep) {
			if(eregi($str, $file)) {
				$c_filelist[] = $file;
			}
		} else {
			if(!eregi($str, $file)) {
				$c_filelist[] = $file;
			}
		}
	}
	return($c_filelist);
}

?>
