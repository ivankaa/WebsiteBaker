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

Website Baker functions file
This file contains general functions used in Website Baker

*/

// Stop this file from being accessed directly
if(!defined('WB_URL')) {
	header('Location: ../index.php');
	exit(0);
}

// Define that this file has been loaded
define('FUNCTIONS_FILE_LOADED', true);

// Function to remove a non-empty directory
function rm_full_dir($directory)
{
    // If suplied dirname is a file then unlink it
    if (is_file($directory)) {
        return unlink($directory);
    }

    // Empty the folder
    $dir = dir($directory);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep delete directories      
        if (is_dir("$directory/$entry")) {
            rm_full_dir("$directory/$entry");
        } else {
            unlink("$directory/$entry");
        }
    }

    // Now delete the folder
    $dir->close();
    return rmdir($directory);
}

// Function to open a directory and add to a dir list
function directory_list($directory) {
	
	$list = array();

	// Open the directory then loop through its contents
	$dir = dir($directory);
	while (false !== $entry = $dir->read()) {
		// Skip pointers
		if(substr($entry, 0, 1) == '.' || $entry == '.svn') {
			continue;
		}
		// Add dir and contents to list
		if (is_dir("$directory/$entry")) {
			$list = array_merge($list, directory_list("$directory/$entry"));
			$list[] = "$directory/$entry";
		}
	}

	// Now return the list
	return $list;
}

// Function to open a directory and add to a dir list
function chmod_directory_contents($directory, $file_mode) {
	
	// Set the umask to 0
	$umask = umask(0);
	
	// Open the directory then loop through its contents
	$dir = dir($directory);
	while (false !== $entry = $dir->read()) {
		// Skip pointers
		if(substr($entry, 0, 1) == '.' || $entry == '.svn') {
			continue;
		}
		// Chmod the sub-dirs contents
		if(is_dir("$directory/$entry")) {
			chmod_directory_contents("$directory/$entry", $file_mode);
		}
		change_mode($directory.'/'.$entry, 'file');
	}
	
	// Restore the umask
	umask($umask);

}

// Function to open a directory and add to a file list
function file_list($directory, $skip = array()) {
	
	$list = array();
	$skip_file = false;
	
	// Open the directory then loop through its contents
	$dir = dir($directory);
	while (false !== $entry = $dir->read()) {
		// Skip pointers
		if($entry == '.' || $entry == '..') {
			$skip_file = true;
		}
		// Check if we to skip anything else
		if($skip != array()) {
			foreach($skip AS $skip_name) {
				if($entry == $skip_name) {
					$skip_file = true;
				}
			}
		}
		// Add dir and contents to list
		if($skip_file != true AND is_file("$directory/$entry")) {
			$list[] = "$directory/$entry";
		}
		
		// Reset the skip file var
		$skip_file = false;
	}

	// Now delete the folder
	return $list;
}

// Function to get a list of home folders not to show
function get_home_folders() {
	global $database, $admin;
	$home_folders = array();
	// Only return home folders is this feature is enabled
	// and user is not admin
	if(HOME_FOLDERS AND ($_SESSION['GROUP_ID']!='1')) {
		$query_home_folders = $database->query("SELECT home_folder FROM ".TABLE_PREFIX."users WHERE home_folder != '".$admin->get_home_folder()."'");
		if($query_home_folders->numRows() > 0) {
			while($folder = $query_home_folders->fetchRow()) {
				$home_folders[$folder['home_folder']] = $folder['home_folder'];
			}
		}
		function remove_home_subs($directory = '/', $home_folders) {
			if($handle = opendir(WB_PATH.MEDIA_DIRECTORY.$directory)) {
				// Loop through the dirs to check the home folders sub-dirs are not shown
			   while(false !== ($file = readdir($handle))) {
					if(substr($file, 0, 1) != '.' AND $file != '.svn' AND $file != 'index.php') {
						if(is_dir(WB_PATH.MEDIA_DIRECTORY.$directory.'/'.$file)) {
							if($directory != '/') { $file = $directory.'/'.$file; } else { $file = '/'.$file; }
							foreach($home_folders AS $hf) {
								$hf_length = strlen($hf);
								if($hf_length > 0) {
									if(substr($file, 0, $hf_length+1) == $hf) {
										$home_folders[$file] = $file;
									}
								}
							}
							$home_folders = remove_home_subs($file, $home_folders);
						}
					}
				}
			}
			return $home_folders;
		}
		$home_folders = remove_home_subs('/', $home_folders);
	}
	return $home_folders;
}

// Function to create directories
function make_dir($dir_name, $dir_mode = OCTAL_DIR_MODE) {
	if(!file_exists($dir_name)) {
		$umask = umask(0);
		mkdir($dir_name, $dir_mode);
		umask($umask);
		return true;
	} else {
		return false;	
	}
}

// Function to chmod files and directories
function change_mode($name) {
	if(OPERATING_SYSTEM != 'windows') {
		// Only chmod if os is not windows
		if(is_dir($name)) {
			$mode = OCTAL_DIR_MODE;
		} else {
			$mode = OCTAL_FILE_MODE;
		}
		if(file_exists($name)) {
			$umask = umask(0);
			chmod($name, $mode);
			umask($umask);
			return true;
		} else {
			return false;	
		}
	} else {
		return true;
	}
}

// Function to figure out if a parent exists
function is_parent($page_id) {
	global $database;
	// Get parent
	$query = $database->query("SELECT parent FROM ".TABLE_PREFIX."pages WHERE page_id = '$page_id'");
	$fetch = $query->fetchRow();
	// If parent isnt 0 return its ID
	if($fetch['parent'] == '0') {
		return false;
	} else {
		return $fetch['parent'];
	}
}

// Function to work out level
function level_count($page_id) {
	global $database;
	// Get page parent
	$query_page = $database->query("SELECT parent FROM ".TABLE_PREFIX."pages WHERE page_id = '$page_id' LIMIT 1");
	$fetch_page = $query_page->fetchRow();
	$parent = $fetch_page['parent'];
	if($parent > 0) {
		// Get the level of the parent
		$query_parent = $database->query("SELECT level FROM ".TABLE_PREFIX."pages WHERE page_id = '$parent' LIMIT 1");
		$fetch_parent = $query_parent->fetchRow();
		$level = $fetch_parent['level'];
		return $level+1;
	} else {
		return 0;
	}
}

// Function to work out root parent
function root_parent($page_id) {
	global $database;
	// Get page details
	$query_page = $database->query("SELECT parent,level FROM ".TABLE_PREFIX."pages WHERE page_id = '$page_id' LIMIT 1");
	$fetch_page = $query_page->fetchRow();
	$parent = $fetch_page['parent'];
	$level = $fetch_page['level'];	
	if($level == 1) {
		return $parent;
	} elseif($parent == 0) {
		return $page_id;
	} else {
		// Figure out what the root parents id is
		$parent_ids = array_reverse(get_parent_ids($page_id));
		return $parent_ids[0];
	}
}

// Function to get page title
function get_page_title($id) {
	global $database;
	// Get title
	$query = $database->query("SELECT page_title FROM ".TABLE_PREFIX."pages WHERE page_id = '$id'");
	$fetch = $query->fetchRow();
	// Return title
	return $fetch['page_title'];
}

// Function to get a pages menu title
function get_menu_title($id) {
	// Connect to the database
	$database = new database();
	// Get title
	$query = $database->query("SELECT menu_title FROM ".TABLE_PREFIX."pages WHERE page_id = '$id'");
	$fetch = $query->fetchRow();
	// Return title
	return $fetch['menu_title'];
}

// Function to get all parent page titles
function get_parent_titles($parent_id) {
	$titles[] = get_menu_title($parent_id);
	if(is_parent($parent_id) != false) {
		$parent_titles = get_parent_titles(is_parent($parent_id));
		$titles = array_merge($titles, $parent_titles);
	}
	return $titles;
}

// Function to get all parent page id's
function get_parent_ids($parent_id) {
	$ids[] = $parent_id;
	if(is_parent($parent_id) != false) {
		$parent_ids = get_parent_ids(is_parent($parent_id));
		$ids = array_merge($ids, $parent_ids);
	}
	return $ids;
}

// Function to genereate page trail
function get_page_trail($page_id) {
	return implode(',', array_reverse(get_parent_ids($page_id)));
}

// Function to get all sub pages id's
function get_subs($parent, $subs) {
	// Connect to the database
	$database = new database();
	// Get id's
	$query = $database->query("SELECT page_id FROM ".TABLE_PREFIX."pages WHERE parent = '$parent'");
	if($query->numRows() > 0) {
		while($fetch = $query->fetchRow()) {
			$subs[] = $fetch['page_id'];
			// Get subs of this sub
			$subs = get_subs($fetch['page_id'], $subs);
		}
	}
	// Return subs array
	return $subs;
}

// Function as replacement for php's htmlspecialchars()
function my_htmlspecialchars($string) {
	$string = preg_replace("/&(?=[#a-z0-9]+;)/i", "_x_", $string);
	$string = strtr($string, array("<"=>"&lt;", ">"=>"&gt;", "&"=>"&amp;", "\""=>"&quot;", "\'"=>"&#39;"));
	$string = preg_replace("/_x_(?=[#a-z0-9]+;)/i", "&", $string);
	return($string);
}

// Function to convert a string from $from- to $to-encoding, using mysql
function my_mysql_iconv($string, $from, $to) {
	// keep current character set values
	global $database;
	$query = $database->query("SELECT @@character_set_client");
	if($query->numRows() > 0) {
		$res = $query->fetchRow();
		$character_set_database = $res['@@character_set_client'];
	}	else { echo mysql_error()."\n<br />"; }
	$query = $database->query("SELECT @@character_set_results");
	if($query->numRows() > 0) {
		$res = $query->fetchRow();
		$character_set_results = $res['@@character_set_results'];
	}	else { echo mysql_error()."\n<br />"; }
	$query = $database->query("SELECT @@collation_connection");
	if($query->numRows() > 0) {
		$res = $query->fetchRow();
		$collation_results = $res['@@collation_connection'];
	}	else { echo mysql_error()."\n<br />"; }
	// set new character set values
	$query = $database->query("SET character_set_client=$from");
	$query = $database->query("SET character_set_results=$to");
	$query = $database->query("SET collation_connection=utf8_unicode_ci");
	$string_escaped = mysql_real_escape_string($string);
	// convert the string
	$query = $database->query("SELECT '$string_escaped'");
	if($query->numRows() > 0) {
		$res = $query->fetchRow();
		$converted_string = $res[0];
	}	else { echo mysql_error()."\n<br />"; }
	// restore previous character set values
	$query = $database->query("SET character_set_client=$character_set_database");
	$query = $database->query("SET character_set_results=$character_set_results");
	$query = $database->query("SET collation_connection=$collation_results");
	return $converted_string;
}

// Function as wrapper for mb_convert_encoding
// converts $charset_in to $charset_out or 
// UTF-8 to HTML-ENTITIES or HTML-ENTITIES to UTF-8
function mb_convert_encoding_wrapper($string, $charset_out, $charset_in) {
	if ($charset_out == $charset_in) {
		return $string;
	}
	$use_iconv = true;
	$use_mbstring = true;
	/*
	if(version_compare(PHP_VERSION, "5.1.0", "<")) {
		$use_mbstring = false; // don't rely on mb_convert_encoding if php<5.1.0
		$use_iconv = false; // don't rely on iconv neither
	}
	*/
	
	// try mb_convert_encoding(). This can handle to or from HTML-ENTITIES, too
	if ($use_mbstring && function_exists('mb_convert_encoding')) {
		// there's no GB2312 or ISO-8859-11 encoding in php's mb_* functions
		if ($charset_in=='ISO-8859-11' || $charset_in=='GB2312') {
			if ($use_iconv && function_exists('iconv')) {
				$string = iconv($charset_in, 'UTF-8', $string);
			}
			else {
				if ($charset_in == 'GB2312') {
					$string=my_mysql_iconv($string, 'gb2312', 'utf8');
				} else {
					$string=my_mysql_iconv($string, 'tis620', 'utf8');
				}
			}
			$charset_in='UTF-8';
			if ($charset_out == 'UTF-8') {
				return $string;
			}
		}
		if ($charset_out=='ISO-8859-11' || $charset_out=='GB2312') {
			$string=mb_convert_encoding($string, 'UTF-8', $charset_in);
			if ($use_iconv && function_exists('iconv')) {
				$string = iconv('UTF-8', $charset_out, $string);
			}
			else {
				if ($charset_out == 'GB2312') {
					$string=my_mysql_iconv($string, 'utf8', 'gb2312');
				} else {
					$string=my_mysql_iconv($string, 'utf8', 'tis620');
				}
			}
		} else {
			$string = strtr($string, array("&lt;"=>"&_lt;", "&gt;"=>"&_gt;", "&amp;"=>"&_amp;", "&quot;"=>"&_quot;", "&#39;"=>"&_#39;"));
			$string=mb_convert_encoding($string, $charset_out, $charset_in);
			$string = strtr($string, array("&_lt;"=>"&lt;", "&_gt;"=>"&gt;", "&_amp;"=>"&amp;", "&_quot;"=>"&quot;", "&_#39;"=>"&#39;"));
		}
		return $string;
	}

	// try iconv(). This can't handle to or from HTML-ENTITIES.
	if ($use_iconv && function_exists('iconv') && $charset_out!='HTML-ENTITIES' && $charset_in!='HTML-ENTITIES' ) {
		$string = iconv($charset_in, $charset_out, $string);
		return $string;
	}

	// do the UTF-8->HTML-ENTITIES or HTML-ENTITIES->UTF-8 translation if mb_convert_encoding isn't available
	if (($charset_in=='HTML-ENTITIES' && $charset_out=='UTF-8') || ($charset_in=='UTF-8' && $charset_out=='HTML-ENTITIES')) {
		$string = string_decode_encode_entities($string, $charset_out, $charset_in);
		return $string;
	}

	// mb_convert_encoding() and iconv() aren't available, so use my_mysql_iconv()
	if ($charset_in == 'ISO-8859-1') { $mysqlcharset_from = 'latin1'; }
	elseif ($charset_in == 'ISO-8859-2') { $mysqlcharset_from = 'latin2'; }
	elseif ($charset_in == 'ISO-8859-3') { $mysqlcharset_from = 'latin1'; }
	elseif ($charset_in == 'ISO-8859-4') { $mysqlcharset_from = 'latin7'; }
	elseif ($charset_in == 'ISO-8859-5') { $string = convert_cyr_string ($string, "iso8859-5", "windows-1251" ); $mysqlcharset_from = 'cp1251'; }
	elseif ($charset_in == 'ISO-8859-6') { $mysqlcharset_from = ''; } //?
	elseif ($charset_in == 'ISO-8859-7') { $mysqlcharset_from = 'greek'; }
	elseif ($charset_in == 'ISO-8859-8') { $mysqlcharset_from = 'hebrew'; }
	elseif ($charset_in == 'ISO-8859-9') { $mysqlcharset_from = 'latin5'; }
	elseif ($charset_in == 'ISO-8859-10') { $mysqlcharset_from = 'latin1'; }
	elseif ($charset_in == 'BIG5') { $mysqlcharset_from = 'big5'; }
	elseif ($charset_in == 'ISO-2022-JP') { $mysqlcharset_from = ''; } //?
	elseif ($charset_in == 'ISO-2022-KR') { $mysqlcharset_from = ''; } //?
	elseif ($charset_in == 'GB2312') { $mysqlcharset_from = 'gb2312'; }
	elseif ($charset_in == 'ISO-8859-11') { $mysqlcharset_from = 'tis620'; }
	elseif ($charset_in == 'UTF-8') { $mysqlcharset_from = 'utf8'; }
	else { $mysqlcharset_from = 'latin1'; }

	if ($charset_out == 'ISO-8859-1') { $mysqlcharset_to = 'latin1'; }
	elseif ($charset_out == 'ISO-8859-2') { $mysqlcharset_to = 'latin2'; }
	elseif ($charset_out == 'ISO-8859-3') { $mysqlcharset_to = 'latin1'; }
	elseif ($charset_out == 'ISO-8859-4') { $mysqlcharset_to = 'latin7'; }
	elseif ($charset_out == 'ISO-8859-5') { $mysqlcharset_to = 'cp1251'; } // use convert_cyr_string afterwards
	elseif ($charset_out == 'ISO-8859-6') { $mysqlcharset_to = ''; } //?
	elseif ($charset_out == 'ISO-8859-7') { $mysqlcharset_to = 'greek'; }
	elseif ($charset_out == 'ISO-8859-8') { $mysqlcharset_to = 'hebrew'; }
	elseif ($charset_out == 'ISO-8859-9') { $mysqlcharset_to = 'latin5'; }
	elseif ($charset_out == 'ISO-8859-10') { $mysqlcharset_to = 'latin1'; }
	elseif ($charset_out == 'BIG5') { $mysqlcharset_to = 'big5'; }
	elseif ($charset_out == 'ISO-2022-JP') { $mysqlcharset_to = ''; } //?
	elseif ($charset_out == 'ISO-2022-KR') { $mysqlcharset_to = ''; } //?
	elseif ($charset_out == 'GB2312') { $mysqlcharset_to = 'gb2312'; }
	elseif ($charset_out == 'ISO-8859-11') { $mysqlcharset_to = 'tis620'; }
	elseif ($charset_out == 'UTF-8') { $mysqlcharset_to = 'utf8'; }
	else { $mysqlcharset_to = 'latin1'; }

	if ($mysqlcharset_from!="" && $mysqlcharset_to!="" && $mysqlcharset_from!=$mysqlcharset_to) {
		$string=my_mysql_iconv($string, $mysqlcharset_from, $mysqlcharset_to);
		if ($mysqlcharset_to == 'cp1251') { 
			$string = convert_cyr_string ($string, "windows-1251", "iso-8859-5" );
		}
		return($string);
	}

	// $string is unchanged. This will happen if we have to deal with ISO-8859-6 or ISO-2022-JP or -KR
	// and mbstring _and_ iconv aren't available.
	return $string;
}

// Decodes or encodes html-entities. Works for utf-8 only!
function string_decode_encode_entities($string, $out='HTML-ENTITIES', $in='UTF-8') {
	if(!(($in=='UTF-8' || $in=='HTML-ENTITIES') && ($out=='UTF-8' || $out=='HTML-ENTITIES'))) {
		return $string;
	}
	$named_to_numbered_entities=array(
		'&Aacute;'=>'&#193;','&aacute;'=>'&#225;',
		'&Acirc;'=>'&#194;','&acirc;'=>'&#226;','&acute;'=>'&#180;','&AElig;'=>'&#198;','&aelig;'=>'&#230;',
		'&Agrave;'=>'&#192;','&agrave;'=>'&#224;','&alefsym;'=>'&#8501;','&Alpha;'=>'&#913;','&alpha;'=>'&#945;',
		'&and;'=>'&#8743;','&ang;'=>'&#8736;','&apos;'=>'&#39;','&Aring;'=>'&#197;','&aring;'=>'&#229;',
		'&asymp;'=>'&#8776;','&Atilde;'=>'&#195;','&atilde;'=>'&#227;','&Auml;'=>'&#196;','&auml;'=>'&#228;',
		'&bdquo;'=>'&#8222;','&Beta;'=>'&#914;','&beta;'=>'&#946;','&brvbar;'=>'&#166;','&bull;'=>'&#8226;',
		'&cap;'=>'&#8745;','&Ccedil;'=>'&#199;','&ccedil;'=>'&#231;','&cedil;'=>'&#184;','&cent;'=>'&#162;',
		'&Chi;'=>'&#935;','&chi;'=>'&#967;','&circ;'=>'&#710;','&clubs;'=>'&#9827;','&cong;'=>'&#8773;',
		'&copy;'=>'&#169;','&crarr;'=>'&#8629;','&cup;'=>'&#8746;','&curren;'=>'&#164;','&Dagger;'=>'&#8225;',
		'&dagger;'=>'&#8224;','&dArr;'=>'&#8659;','&darr;'=>'&#8595;','&deg;'=>'&#176;','&Delta;'=>'&#916;',
		'&delta;'=>'&#948;','&diams;'=>'&v#9830;','&divide;'=>'&#247;','&Eacute;'=>'&#201;','&eacute;'=>'&#233;',
		'&Ecirc;'=>'&#202;','&ecirc;'=>'&#234;','&Egrave;'=>'&#200;','&egrave;'=>'&#232;','&empty;'=>'&#8709;',
		'&emsp;'=>'&#8195;','&ensp;'=>'&#8194;','&Epsilon;'=>'&#917;','&epsilon;'=>'&#949;','&equiv;'=>'&#8801;',
		'&Eta;'=>'&#919;','&eta;'=>'&#951;','&ETH;'=>'&#208;','&eth;'=>'&#240;','&Euml;'=>'&#203;','&euml;'=>'&#235;',
		'&euro;'=>'&#8364;','&exist;'=>'&#8707;','&fnof;'=>'&#402;','&forall;'=>'&#8704;','&frac12;'=>'&#189;',
		'&frac14;'=>'&#188;','&frac34;'=>'&#190;','&frasl;'=>'&#8260;','&Gamma;'=>'&#915;','&gamma;'=>'&#947;',
		'&ge;'=>'&#8805;','&hArr;'=>'&#8660;','&harr;'=>'&#8596;','&hearts;'=>'&#9829;',
		'&hellip;'=>'&#8230;','&Iacute;'=>'&#205;','&iacute;'=>'&#237;','&Icirc;'=>'&#206;','&icirc;'=>'&#238;',
		'&iexcl;'=>'&#161;','&Igrave;'=>'&#204;','&igrave;'=>'&#236;','&image;'=>'&#8465;','&infin;'=>'&#8734;',
		'&int;'=>'&#8747;','&Iota;'=>'&#921;','&iota;'=>'&#953;','&iquest;'=>'&#191;','&isin;'=>'&#8712;',
		'&Iuml;'=>'&#207;','&iuml;'=>'&#239;','&Kappa;'=>'&#922;','&kappa;'=>'&#954;','&Lambda;'=>'&#923;',
		'&lambda;'=>'&#955;','&lang;'=>'&#9001;','&laquo;'=>'&#171;','&lArr;'=>'&#8656;','&larr;'=>'&#8592;',
		'&lceil;'=>'&#8968;','&ldquo;'=>'&#8220;','&le;'=>'&#8804;','&lfloor;'=>'&#8970;','&lowast;'=>'&#8727;',
		'&loz;'=>'&#9674;','&lrm;'=>'&#8206;','&lsaquo;'=>'&#8249;','&lsquo;'=>'&#8216;',
		'&macr;'=>'&#175;','&mdash;'=>'&#8212;','&micro;'=>'&#181;','&middot;'=>'&#183;','&minus;'=>'&#8722;',
		'&Mu;'=>'&#924;','&mu;'=>'&#956;','&nabla;'=>'&#8711;','&nbsp;'=>'&#160;','&ndash;'=>'&#8211;',
		'&ne;'=>'&#8800;','&ni;'=>'&#8715;','&not;'=>'&#172;','&notin;'=>'&#8713;','&nsub;'=>'&#8836;',
		'&Ntilde;'=>'&#209;','&ntilde;'=>'&#241;','&Nu;'=>'&#925;','&nu;'=>'&#957;','&Oacute;'=>'&#211;',
		'&oacute;'=>'&#243;','&Ocirc;'=>'&#212;','&ocirc;'=>'&#244;','&OElig;'=>'&#338;','&oelig;'=>'&#339;',
		'&Ograve;'=>'&#210;','&ograve;'=>'&#242;','&oline;'=>'&#8254;','&Omega;'=>'&#937;','&omega;'=>'&#969;',
		'&Omicron;'=>'&#927;','&omicron;'=>'&#959;','&oplus;'=>'&#8853;','&or;'=>'&#8744;','&ordf;'=>'&#170;',
		'&ordm;'=>'&#186;','&Oslash;'=>'&#216;','&oslash;'=>'&#248;','&Otilde;'=>'&#213;','&otilde;'=>'&#245;',
		'&otimes;'=>'&#8855;','&Ouml;'=>'&#214;','&ouml;'=>'&#246;','&para;'=>'&#182;','&part;'=>'&#8706;',
		'&permil;'=>'&#8240;','&perp;'=>'&#8869;','&Phi;'=>'&#934;','&phi;'=>'&#966;','&Pi;'=>'&#928;',
		'&pi;'=>'&#960;','&piv;'=>'&#982;','&plusmn;'=>'&#177;','&pound;'=>'&#163;','&Prime;'=>'&#8243;',
		'&prime;'=>'&#8242;','&prod;'=>'&#8719;','&prop;'=>'&#8733;','&Psi;'=>'&#936;','&psi;'=>'&#968;',
		'&quot;'=>'&#34;','&radic;'=>'&#8730;','&rang;'=>'&#9002;','&raquo;'=>'&#187;','&rArr;'=>'&#8658;',
		'&rarr;'=>'&#8594;','&rceil;'=>'&#8969;','&rdquo;'=>'&#8221;','&real;'=>'&#8476;','&reg;'=>'&#174;',
		'&rfloor;'=>'&#8971;','&Rho;'=>'&#929;','&rho;'=>'&#961;','&rlm;'=>'&#8207;','&rsaquo;'=>'&#8250;',
		'&rsquo;'=>'&#8217;','&sbquo;'=>'&#8218;','&Scaron;'=>'&#352;','&scaron;'=>'&#353;','&sdot;'=>'&#8901;',
		'&sect;'=>'&#167;','&shy;'=>'&#173;','&Sigma;'=>'&#931;','&sigma;'=>'&#963;','&sigmaf;'=>'&#962;',
		'&sim;'=>'&#8764;','&spades;'=>'&#9824;','&sub;'=>'&#8834;','&sube;'=>'&#8838;','&sum;'=>'&#8721;',
		'&sup;'=>'&#8835;','&sup1;'=>'&#185;','&sup2;'=>'&#178;','&sup3;'=>'&#179;','&supe;'=>'&#8839;',
		'&szlig;'=>'&#223;','&Tau;'=>'&#932;','&tau;'=>'&#964;','&there4;'=>'&#8756;','&Theta;'=>'&#920;',
		'&theta;'=>'&#952;','&thetasym;'=>'&#977;','&thinsp;'=>'&#8201;','&THORN;'=>'&#222;','&thorn;'=>'&#254;',
		'&tilde;'=>'&#732;','&times;'=>'&#215;','&trade;'=>'&#8482;','&Uacute;'=>'&#218;','&uacute;'=>'&#250;',
		'&uArr;'=>'&#8657;','&uarr;'=>'&#8593;','&Ucirc;'=>'&#219;','&ucirc;'=>'&#251;','&Ugrave;'=>'&#217;',
		'&ugrave;'=>'&#249;','&uml;'=>'&#168;','&upsih;'=>'&#978;','&Upsilon;'=>'&#933;','&upsilon;'=>'&#965;',
		'&Uuml;'=>'&#220;','&uuml;'=>'&#252;','&weierp;'=>'&#8472;','&Xi;'=>'&#926;','&xi;'=>'&#958;',
		'&Yacute;'=>'&#221;','&yacute;'=>'&#253;','&yen;'=>'&#165;','&Yuml;'=>'&#376;','&yuml;'=>'&#255;',
		'&Zeta;'=>'&#918;','&zeta;'=>'&#950;','&zwj;'=>'&#8205;','&zwnj;'=>'&#8204;'
	);
	$numbered_to_named_entities=array(
		'&#193;'=>'&Aacute;','&#225;'=>'&aacute;','&#194;'=>'&Acirc;','&#226;'=>'&acirc;','&#180;'=>'&acute;',
		'&#198;'=>'&AElig;','&#230;'=>'&aelig;','&#192;'=>'&Agrave;','&#224;'=>'&agrave;','&#8501;'=>'&alefsym;',
		'&#913;'=>'&Alpha;','&#945;'=>'&alpha;','&#8743;'=>'&and;','&#8736;'=>'&ang;',
		'&#39;'=>'&apos;','&#197;'=>'&Aring;','&#229;'=>'&aring;','&#8776;'=>'&asymp;','&#195;'=>'&Atilde;',
		'&#227;'=>'&atilde;','&#196;'=>'&Auml;','&#228;'=>'&auml;','&#8222;'=>'&bdquo;','&#914;'=>'&Beta;',
		'&#946;'=>'&beta;','&#166;'=>'&brvbar;','&#8226;'=>'&bull;','&#8745;'=>'&cap;','&#199;'=>'&Ccedil;',
		'&#231;'=>'&ccedil;','&#184;'=>'&cedil;','&#162;'=>'&cent;','&#935;'=>'&Chi;','&#967;'=>'&chi;',
		'&#710;'=>'&circ;','&#9827;'=>'&clubs;','&#8773;'=>'&cong;','&#169;'=>'&copy;','&#8629;'=>'&crarr;',
		'&#8746;'=>'&cup;','&#164;'=>'&curren;','&#8225;'=>'&Dagger;','&#8224;'=>'&dagger;','&#8659;'=>'&dArr;',
		'&#8595;'=>'&darr;','&#176;'=>'&deg;','&#916;'=>'&Delta;','&#948;'=>'&delta;','&v#9830;'=>'&diams;',
		'&#247;'=>'&divide;','&#201;'=>'&Eacute;','&#233;'=>'&eacute;','&#202;'=>'&Ecirc;','&#234;'=>'&ecirc;',
		'&#200;'=>'&Egrave;','&#232;'=>'&egrave;','&#8709;'=>'&empty;','&#8195;'=>'&emsp;','&#8194;'=>'&ensp;',
		'&#917;'=>'&Epsilon;','&#949;'=>'&epsilon;','&#8801;'=>'&equiv;','&#919;'=>'&Eta;','&#951;'=>'&eta;',
		'&#208;'=>'&ETH;','&#240;'=>'&eth;','&#203;'=>'&Euml;','&#235;'=>'&euml;','&#8364;'=>'&euro;',
		'&#8707;'=>'&exist;','&#402;'=>'&fnof;','&#8704;'=>'&forall;','&#189;'=>'&frac12;','&#188;'=>'&frac14;',
		'&#190;'=>'&frac34;','&#8260;'=>'&frasl;','&#915;'=>'&Gamma;','&#947;'=>'&gamma;','&#8805;'=>'&ge;',
		'&#8660;'=>'&hArr;','&#8596;'=>'&harr;','&#9829;'=>'&hearts;','&#8230;'=>'&hellip;',
		'&#205;'=>'&Iacute;','&#237;'=>'&iacute;','&#206;'=>'&Icirc;','&#238;'=>'&icirc;','&#161;'=>'&iexcl;',
		'&#204;'=>'&Igrave;','&#236;'=>'&igrave;','&#8465;'=>'&image;','&#8734;'=>'&infin;','&#8747;'=>'&int;',
		'&#921;'=>'&Iota;','&#953;'=>'&iota;','&#191;'=>'&iquest;','&#8712;'=>'&isin;','&#207;'=>'&Iuml;',
		'&#239;'=>'&iuml;','&#922;'=>'&Kappa;','&#954;'=>'&kappa;','&#923;'=>'&Lambda;','&#955;'=>'&lambda;',
		'&#9001;'=>'&lang;','&#171;'=>'&laquo;','&#8656;'=>'&lArr;','&#8592;'=>'&larr;','&#8968;'=>'&lceil;',
		'&#8220;'=>'&ldquo;','&#8804;'=>'&le;','&#8970;'=>'&lfloor;','&#8727;'=>'&lowast;','&#9674;'=>'&loz;',
		'&#8206;'=>'&lrm;','&#8249;'=>'&lsaquo;','&#8216;'=>'&lsquo;','&#175;'=>'&macr;',
		'&#8212;'=>'&mdash;','&#181;'=>'&micro;','&#183;'=>'&middot;','&#8722;'=>'&minus;','&#924;'=>'&Mu;',
		'&#956;'=>'&mu;','&#8711;'=>'&nabla;','&#160;'=>'&nbsp;','&#8211;'=>'&ndash;','&#8800;'=>'&ne;',
		'&#8715;'=>'&ni;','&#172;'=>'&not;','&#8713;'=>'&notin;','&#8836;'=>'&nsub;','&#209;'=>'&Ntilde;',
		'&#241;'=>'&ntilde;','&#925;'=>'&Nu;','&#957;'=>'&nu;','&#211;'=>'&Oacute;','&#243;'=>'&oacute;',
		'&#212;'=>'&Ocirc;','&#244;'=>'&ocirc;','&#338;'=>'&OElig;','&#339;'=>'&oelig;','&#210;'=>'&Ograve;',
		'&#242;'=>'&ograve;','&#8254;'=>'&oline;','&#937;'=>'&Omega;','&#969;'=>'&omega;','&#927;'=>'&Omicron;',
		'&#959;'=>'&omicron;','&#8853;'=>'&oplus;','&#8744;'=>'&or;','&#170;'=>'&ordf;','&#186;'=>'&ordm;',
		'&#216;'=>'&Oslash;','&#248;'=>'&oslash;','&#213;'=>'&Otilde;','&#245;'=>'&otilde;','&#8855;'=>'&otimes;',
		'&#214;'=>'&Ouml;','&#246;'=>'&ouml;','&#182;'=>'&para;','&#8706;'=>'&part;','&#8240;'=>'&permil;',
		'&#8869;'=>'&perp;','&#934;'=>'&Phi;','&#966;'=>'&phi;','&#928;'=>'&Pi;','&#960;'=>'&pi;','&#982;'=>'&piv;',
		'&#177;'=>'&plusmn;','&#163;'=>'&pound;','&#8243;'=>'&Prime;','&#8242;'=>'&prime;','&#8719;'=>'&prod;',
		'&#8733;'=>'&prop;','&#936;'=>'&Psi;','&#968;'=>'&psi;','&#34;'=>'&quot;','&#8730;'=>'&radic;',
		'&#9002;'=>'&rang;','&#187;'=>'&raquo;','&#8658;'=>'&rArr;','&#8594;'=>'&rarr;','&#8969;'=>'&rceil;',
		'&#8221;'=>'&rdquo;','&#8476;'=>'&real;','&#174;'=>'&reg;','&#8971;'=>'&rfloor;','&#929;'=>'&Rho;',
		'&#961;'=>'&rho;','&#8207;'=>'&rlm;','&#8250;'=>'&rsaquo;','&#8217;'=>'&rsquo;','&#8218;'=>'&sbquo;',
		'&#352;'=>'&Scaron;','&#353;'=>'&scaron;','&#8901;'=>'&sdot;','&#167;'=>'&sect;','&#173;'=>'&shy;',
		'&#931;'=>'&Sigma;','&#963;'=>'&sigma;','&#962;'=>'&sigmaf;','&#8764;'=>'&sim;','&#9824;'=>'&spades;',
		'&#8834;'=>'&sub;','&#8838;'=>'&sube;','&#8721;'=>'&sum;','&#8835;'=>'&sup;','&#185;'=>'&sup1;',
		'&#178;'=>'&sup2;','&#179;'=>'&sup3;','&#8839;'=>'&supe;','&#223;'=>'&szlig;','&#932;'=>'&Tau;',
		'&#964;'=>'&tau;','&#8756;'=>'&there4;','&#920;'=>'&Theta;','&#952;'=>'&theta;','&#977;'=>'&thetasym;',
		'&#8201;'=>'&thinsp;','&#222;'=>'&THORN;','&#254;'=>'&thorn;','&#732;'=>'&tilde;','&#215;'=>'&times;',
		'&#8482;'=>'&trade;','&#218;'=>'&Uacute;','&#250;'=>'&uacute;','&#8657;'=>'&uArr;','&#8593;'=>'&uarr;',
		'&#219;'=>'&Ucirc;','&#251;'=>'&ucirc;','&#217;'=>'&Ugrave;','&#249;'=>'&ugrave;','&#168;'=>'&uml;',
		'&#978;'=>'&upsih;','&#933;'=>'&Upsilon;','&#965;'=>'&upsilon;','&#220;'=>'&Uuml;','&#252;'=>'&uuml;',
		'&#8472;'=>'&weierp;','&#926;'=>'&Xi;','&#958;'=>'&xi;','&#221;'=>'&Yacute;','&#253;'=>'&yacute;',
		'&#165;'=>'&yen;','&#376;'=>'&Yuml;','&#255;'=>'&yuml;','&#918;'=>'&Zeta;','&#950;'=>'&zeta;','&#8205;'=>'&zwj;',
		'&#8204;'=>'&zwnj;'
	);
		
	if ($in == 'HTML-ENTITIES') {
		$string = strtr($string, $named_to_numbered_entities);
		$string = preg_replace("/&#([0-9]+);/e", "code_to_utf8($1)", $string);
	}
	elseif ($out == 'HTML-ENTITIES') {
		$char = "";
		$i=0;
		$len=strlen($string);
		if($len==0) return $string;
		do {
			if(ord($string{$i}) <= 127) $ud = $string{$i++};
			elseif(ord($string{$i}) <= 223) $ud = (ord($string{$i++})-192)*64 + (ord($string{$i++})-128);
			elseif(ord($string{$i}) <= 239) $ud = (ord($string{$i++})-224)*4096 + (ord($string{$i++})-128)*64 + (ord($string{$i++})-128);
			elseif(ord($string{$i}) <= 247) $ud = (ord($string{$i++})-240)*262144 + (ord($string{$i++})-128)*4096 + (ord($string{$i++})-128)*64 + (ord($string{$i++})-128);
			elseif(ord($string{$i}) <= 251) $ud = ord($string{$i++}); // error!
			if($ud > 127) {
				$char .= "&#$ud;";
			} else {
				$char .= $ud;
			}
		} while($i < $len);
		$string = $char;
		$string = strtr($string, $numbered_to_named_entities);
		// do ' and "
		$string = strtr($string, array('\''=>'&#39;', '\"'=>'&quot;'));
	}
	return $string;
}

// support-function for string_decode_encode_entities()
function code_to_utf8($num) {
	if ($num <= 0x7F) {
		return chr($num);
	} elseif ($num <= 0x7FF) {
		return chr(($num >> 6) + 192) . chr(($num & 63) + 128);
	} elseif ($num <= 0xFFFF) {
		 return chr(($num >> 12) + 224) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
	} elseif ($num <= 0x1FFFFF) {
		return chr(($num >> 18) + 240) . chr((($num >> 12) & 63) + 128) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
	}
	return " ";
}

// Function to convert a string from mixed html-entities/umlauts to pure utf-8-umlauts
function string_to_utf8($string, $charset=DEFAULT_CHARSET) {
	$charset = strtoupper($charset);
	if ($charset == '') { $charset = 'ISO-8859-1'; }

	if (!is_UTF8($string)) {
		$string=mb_convert_encoding_wrapper($string, 'UTF-8', $charset);
	}
	// check if we really get UTF-8. We don't get UTF-8 if charset is ISO-8859-6 or ISO-2022-JP/KR
	// and mb_string AND iconv aren't available.
	if (is_UTF8($string)) {
		$string=mb_convert_encoding_wrapper($string, 'HTML-ENTITIES', 'UTF-8');
		$string=mb_convert_encoding_wrapper($string, 'UTF-8', 'HTML-ENTITIES');
	} else {
		// nothing we can do here :-(
	}
	return($string);
}

// function to check if a string is UTF-8
function is_UTF8 ($str) {
	if (strlen($str) < 4000) {
		// see http://bugs.php.net/bug.php?id=24460 and http://bugs.php.net/bug.php?id=27070 and http://ilia.ws/archives/5-Top-10-ways-to-crash-PHP.html for this.
		// 4000 works for me ...
		return preg_match('/^(?:[\x09\x0A\x0D\x20-\x7E]|[\xC2-\xDF][\x80-\xBF]|\xE0[\xA0-\xBF][\x80-\xBF]|[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}|\xED[\x80-\x9F][\x80-\xBF]|\xF0[\x90-\xBF][\x80-\xBF]{2}|[\xF1-\xF3][\x80-\xBF]{3}|\xF4[\x80-\x8F][\x80-\xBF]{2})*$/s', $str);
	}	else {
		$isUTF8 = true;
		while($str{0}) {
			if (preg_match("/^[\x09\x0A\x0D\x20-\x7E]/", $str)) { $str = substr($str, 1); continue; }
			if (preg_match("/^[\xC2-\xDF][\x80-\xBF]/", $str)) { $str = substr($str, 2); continue; }
			if (preg_match("/^\xE0[\xA0-\xBF][\x80-\xBF]/", $str)) { $str = substr($str, 3); continue; }
			if (preg_match("/^[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}/", $str)) { $str = substr($str, 3); continue; }
			if (preg_match("/^\xED[\x80-\x9F][\x80-\xBF]/", $str)) { $str = substr($str, 3); continue; }
			if (preg_match("/^\xF0[\x90-\xBF][\x80-\xBF]{2}/", $str)) { $str = substr($str, 4); continue; }
			if (preg_match("/^[\xF1-\xF3][\x80-\xBF]{3}/", $str)) { $str = substr($str, 4); continue; }
			if (preg_match("/^\xF4[\x80-\x8F][\x80-\xBF]{2}/", $str)) { $str = substr($str, 4); continue; }
			if (preg_match("/^$/", $str)) { break; }
			$isUTF8 = false;
			break;
		}
		return ($isUTF8);
	}
}

// Function to convert a string from mixed html-entities/umlauts to pure $charset_out-umlauts
function entities_to_umlauts($string, $charset_out=DEFAULT_CHARSET) {
	$charset_out = strtoupper($charset_out);
	if ($charset_out == '') { $charset_out = 'ISO-8859-1'; }
	$charset_in = strtoupper(DEFAULT_CHARSET);
	require_once(WB_PATH.'/framework/charsets_table.php');
	global $iso_8859_2_to_utf8, $iso_8859_3_to_utf8, $iso_8859_4_to_utf8, $iso_8859_5_to_utf8, $iso_8859_6_to_utf8, $iso_8859_7_to_utf8, $iso_8859_8_to_utf8, $iso_8859_9_to_utf8, $iso_8859_10_to_utf8, $iso_8859_11_to_utf8;
	global $utf8_to_iso_8859_2, $utf8_to_iso_8859_3, $utf8_to_iso_8859_4, $utf8_to_iso_8859_5, $utf8_to_iso_8859_6, $utf8_to_iso_8859_7, $utf8_to_iso_8859_8, $utf8_to_iso_8859_9, $utf8_to_iso_8859_10, $utf8_to_iso_8859_11;

	// string to utf-8, entities_to_utf8
	if (substr($charset_in,0,8) == 'ISO-8859' || $charset_in == 'UTF-8') {
		if ($charset_in == 'ISO-8859-1') {
			$string=utf8_encode($string);
		} elseif ($charset_in == 'ISO-8859-2') {
			$string = strtr($string, $iso_8859_2_to_utf8);
		} elseif ($charset_in == 'ISO-8859-3') {
			$string = strtr($string, $iso_8859_3_to_utf8);
		} elseif ($charset_in == 'ISO-8859-4') {
			$string = strtr($string, $iso_8859_4_to_utf8);
		} elseif ($charset_in == 'ISO-8859-5') {
			$string = strtr($string, $iso_8859_5_to_utf8);
		} elseif ($charset_in == 'ISO-8859-6') {
			$string = strtr($string, $iso_8859_6_to_utf8);
		} elseif ($charset_in == 'ISO-8859-7') {
			$string = strtr($string, $iso_8859_7_to_utf8);
		} elseif ($charset_in == 'ISO-8859-8') {
			$string = strtr($string, $iso_8859_8_to_utf8);
		} elseif ($charset_in == 'ISO-8859-9') {
			$string = strtr($string, $iso_8859_9_to_utf8);
		} elseif ($charset_in == 'ISO-8859-10') {
			$string = strtr($string, $iso_8859_10_to_utf8);
		} elseif ($charset_in == 'ISO-8859-11') {
			$string = strtr($string, $iso_8859_11_to_utf8);
		}
		// decode html-entities
		if(preg_match("/&[#a-zA-Z0-9]+;/", $string)) {
			$string=string_decode_encode_entities($string, 'UTF-8', 'HTML-ENTITIES');
			//$string=mb_convert_encoding_wrapper($string, 'HTML-ENTITIES', 'UTF-8'); // alternative to string_decode_encode_entities()
			//$string=mb_convert_encoding_wrapper($string, 'UTF-8', 'HTML-ENTITIES');
		}
	}
	else {
		$string = string_to_utf8($string); // will decode html-entities, too.
	}
	// string to $charset_out
	if($charset_out == 'ISO-8859-1') {
			$string=utf8_decode($string);
	} elseif($charset_out == 'ISO-8859-2') {
		$string = strtr($string, $utf8_to_iso_8859_2);
	} elseif($charset_out == 'ISO-8859-3') {
		$string = strtr($string, $utf8_to_iso_8859_3);
	} elseif($charset_out == 'ISO-8859-4') {
		$string = strtr($string, $utf8_to_iso_8859_4);
	} elseif($charset_out == 'ISO-8859-5') {
		$string = strtr($string, $utf8_to_iso_8859_5);
	} elseif($charset_out == 'ISO-8859-6') {
		$string = strtr($string, $utf8_to_iso_8859_6);
	} elseif($charset_out == 'ISO-8859-7') {
		$string = strtr($string, $utf8_to_iso_8859_7);
	} elseif($charset_out == 'ISO-8859-8') {
		$string = strtr($string, $utf8_to_iso_8859_8);
	} elseif($charset_out == 'ISO-8859-9') {
		$string = strtr($string, $utf8_to_iso_8859_9);
	} elseif($charset_out == 'ISO-8859-10') {
		$string = strtr($string, $utf8_to_iso_8859_10);
	} elseif($charset_out == 'ISO-8859-11') {
		$string = strtr($string, $utf8_to_iso_8859_11);
	} elseif($charset_out != 'UTF-8') {
		if(is_UTF8($string)) {
			$string=mb_convert_encoding_wrapper($string, $charset_out, 'UTF-8');
		}
	}
	return $string;
}	

// Function to convert a string from mixed html-entitites/$charset_in-umlauts to pure html-entities
function umlauts_to_entities($string, $charset_in=DEFAULT_CHARSET) {
	$charset_in = strtoupper($charset_in);
	if ($charset_in == "") { $charset_in = 'ISO-8859-1'; }
	require_once(WB_PATH.'/framework/charsets_table.php');
	global $iso_8859_2_to_utf8, $iso_8859_3_to_utf8, $iso_8859_4_to_utf8, $iso_8859_5_to_utf8, $iso_8859_6_to_utf8, $iso_8859_7_to_utf8, $iso_8859_8_to_utf8, $iso_8859_9_to_utf8, $iso_8859_10_to_utf8, $iso_8859_11_to_utf8;

	// string to utf-8, umlauts_to_entities
	if ($charset_in == 'UTF-8' || substr($charset_in,0,8) == 'ISO-8859') {
		if ($charset_in == 'ISO-8859-1') {
			$string=utf8_encode($string);
		} elseif ($charset_in == 'ISO-8859-2') {
			$string = strtr($string, $iso_8859_2_to_utf8);
		} elseif ($charset_in == 'ISO-8859-3') {
			$string = strtr($string, $iso_8859_3_to_utf8);
		} elseif ($charset_in == 'ISO-8859-4') {
			$string = strtr($string, $iso_8859_4_to_utf8);
		} elseif ($charset_in == 'ISO-8859-5') {
			$string = strtr($string, $iso_8859_5_to_utf8);
		} elseif ($charset_in == 'ISO-8859-6') {
			$string = strtr($string, $iso_8859_6_to_utf8);
		} elseif ($charset_in == 'ISO-8859-7') {
			$string = strtr($string, $iso_8859_7_to_utf8);
		} elseif ($charset_in == 'ISO-8859-8') {
			$string = strtr($string, $iso_8859_8_to_utf8);
		} elseif ($charset_in == 'ISO-8859-9') {
			$string = strtr($string, $iso_8859_9_to_utf8);
		} elseif ($charset_in == 'ISO-8859-10') {
			$string = strtr($string, $iso_8859_10_to_utf8);
		} elseif ($charset_in == 'ISO-8859-11') {
			$string = strtr($string, $iso_8859_11_to_utf8);
		}
		// encode html-entities
		$string=string_decode_encode_entities($string, 'HTML-ENTITIES', 'UTF-8');
		//$string=mb_convert_encoding_wrapper($string, 'HTML-ENTITIES', 'UTF-8');
	}
	else {
		$string = string_to_utf8($string, $charset_in);
		// encode html-entities
		if (is_UTF8($string)) {
			$string=string_decode_encode_entities($string, 'HTML-ENTITIES', 'UTF-8');
			//$string=mb_convert_encoding_wrapper($string, 'HTML-ENTITIES', 'UTF-8');
		}
	}
	return $string;
}

function umlauts_to_defcharset($string, $charset) {
		$charset_out = strtoupper(DEFAULT_CHARSET);
		if ($charset_out == "") { $charset_out = 'ISO-8859-1'; }
		require_once(WB_PATH.'/framework/charsets_table.php');
		global $utf8_to_iso_8859_2, $utf8_to_iso_8859_3, $utf8_to_iso_8859_4, $utf8_to_iso_8859_5, $utf8_to_iso_8859_6, $utf8_to_iso_8859_7, $utf8_to_iso_8859_8, $utf8_to_iso_8859_9, $utf8_to_iso_8859_10, $utf8_to_iso_8859_11;
		
		if($charset_out == $charset) {
			return $string;
		}

		if($charset == 'UTF-8') {
			if($charset_out == 'ISO-8859-1') {
				$string = utf8_decode($string);
			} elseif ($charset_out == 'ISO-8859-2') {
				$string = strtr($string, $utf8_to_iso_8859_2);
			} elseif ($charset_out == 'ISO-8859-3') {
				$string = strtr($string, $utf8_to_iso_8859_3);
			} elseif ($charset_out == 'ISO-8859-4') {
				$string = strtr($string, $utf8_to_iso_8859_4);
			} elseif ($charset_out == 'ISO-8859-5') {
				$string = strtr($string, $utf8_to_iso_8859_5);
			} elseif ($charset_out == 'ISO-8859-6') {
				$string = strtr($string, $utf8_to_iso_8859_6);
			} elseif ($charset_out == 'ISO-8859-7') {
				$string = strtr($string, $utf8_to_iso_8859_7);
			} elseif ($charset_out == 'ISO-8859-8') {
				$string = strtr($string, $utf8_to_iso_8859_8);
			} elseif ($charset_out == 'ISO-8859-9') {
				$string = strtr($string, $utf8_to_iso_8859_9);
			} elseif ($charset_out == 'ISO-8859-10') {
				$string = strtr($string, $utf8_to_iso_8859_10);
			} elseif ($charset_out == 'ISO-8859-11') {
				$string = strtr($string, $utf8_to_iso_8859_11);
			}
			else {
				$string=mb_convert_encoding_wrapper($string, $charset_out, $charset);
			}
		}
		else {
			$string=mb_convert_encoding_wrapper($string, $charset_out, $charset);
		}
		
	return $string;
}
	
// translate any latin/greek/cyrillic html-entities to their plain 7bit equivalents
// and numbered-entities into hex
function entities_to_7bit($string) {
	require(WB_PATH.'/framework/convert.php');
	$string = strtr($string, $conversion_array);
	$string = preg_replace('/&#([0-9]+);/e', "dechex('$1')",  $string);
	return($string);
}

// Function to convert a page title to a page filename
function page_filename($string) {
	$string = entities_to_7bit(umlauts_to_entities($string));
	// Now replace spaces with page spcacer
	$string = trim($string);
	$string = preg_replace('/(\s)+/', PAGE_SPACER, $string);
	// Now remove all bad characters
	$bad = array(
	'\'', /* /  */ '"', /* " */	'<', /* < */	'>', /* > */
	'{', /* { */	'}', /* } */	'[', /* [ */	']', /* ] */	'`', /* ` */
	'!', /* ! */	'@', /* @ */	'#', /* # */	'$', /* $ */	'%', /* % */
	'^', /* ^ */	'&', /* & */	'*', /* * */	'(', /* ( */	')', /* ) */
	'=', /* = */	'+', /* + */	'|', /* | */	'/', /* / */	'\\', /* \ */
	';', /* ; */	':', /* : */	',', /* , */	'?' /* ? */
	);
	$string = str_replace($bad, '', $string);
	// Now convert to lower-case
	$string = strtolower($string);
	// If there are any weird language characters, this will protect us against possible problems they could cause
	$string = str_replace(array('%2F', '%'), array('/', ''), urlencode($string));
	// Finally, return the cleaned string
	return $string;
}

// Function to convert a desired media filename to a clean filename
function media_filename($string) {
	$string = entities_to_7bit(umlauts_to_entities($string));
	// Now remove all bad characters
	$bad = array(
	'\'', // '
	'"', // "
	'`', // `
	'!', // !
	'@', // @
	'#', // #
	'$', // $
	'%', // %
	'^', // ^
	'&', // &
	'*', // *
	'=', // =
	'+', // +
	'|', // |
	'/', // /
	'\\', // \
	';', // ;
	':', // :
	',', // ,
	'?' // ?
	);
	$string = str_replace($bad, '', $string);
	// Clean any page spacers at the end of string
	$string = trim($string);
	// Finally, return the cleaned string
	return $string;
}

// Function to work out a page link
if(!function_exists('page_link')) {
	function page_link($link) {
		global $admin;
		return $admin->page_link($link);
	}
}

// Create a new file in the pages directory
function create_access_file($filename,$page_id,$level) {
	global $admin, $MESSAGE;
	if(!is_writable(WB_PATH.PAGES_DIRECTORY.'/')) {
		$admin->print_error($MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE']);
	} else {
		// First make sure parent folder exists
		$parent_folders = explode('/',str_replace(WB_PATH.PAGES_DIRECTORY, '', dirname($filename)));
		$parents = '';
		foreach($parent_folders AS $parent_folder) {
			if($parent_folder != '/' AND $parent_folder != '') {
				$parents .= '/'.$parent_folder;
				if(!file_exists(WB_PATH.PAGES_DIRECTORY.$parents)) {
					make_dir(WB_PATH.PAGES_DIRECTORY.$parents);
				}
			}	
		}
		// The depth of the page directory in the directory hierarchy
		// '/pages' is at depth 1
		$pages_dir_depth=count(explode('/',PAGES_DIRECTORY))-1;
		// Work-out how many ../'s we need to get to the index page
		$index_location = '';
		for($i = 0; $i < $level + $pages_dir_depth; $i++) {
			$index_location .= '../';
		}
		$content = ''.
'<?php
$page_id = '.$page_id.';
require("'.$index_location.'config.php");
require(WB_PATH."/index.php");
?>';
		$handle = fopen($filename, 'w');
		fwrite($handle, $content);
		fclose($handle);
		// Chmod the file
		change_mode($filename, 'file');
	}
}

// Function for working out a file mime type (if the in-built PHP one is not enabled)
if(!function_exists('mime_content_type')) {
   function mime_content_type($file) {
       $file = escapeshellarg($file);
       return trim(`file -bi $file`);
   }
}

// Generate a thumbnail from an image
function make_thumb($source, $destination, $size) {
	// Check if GD is installed
	if(extension_loaded('gd') AND function_exists('imageCreateFromJpeg')) {
		// First figure out the size of the thumbnail
		list($original_x, $original_y) = getimagesize($source);
		if ($original_x > $original_y) {
			$thumb_w = $size;
			$thumb_h = $original_y*($size/$original_x);
		}
		if ($original_x < $original_y) {
			$thumb_w = $original_x*($size/$original_y);
			$thumb_h = $size;
		}
		if ($original_x == $original_y) {
			$thumb_w = $size;
			$thumb_h = $size;	
		}
		// Now make the thumbnail
		$source = imageCreateFromJpeg($source);
		$dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);
		imagecopyresampled($dst_img,$source,0,0,0,0,$thumb_w,$thumb_h,$original_x,$original_y);
		imagejpeg($dst_img, $destination);
		// Clear memory
		imagedestroy($dst_img);
	   imagedestroy($source);
	   // Return true
	   return true;
   } else {
   	return false;
   }
}

// Function to work-out a single part of an octal permission value
function extract_permission($octal_value, $who, $action) {
	// Make sure the octal value is 4 chars long
	if(strlen($octal_value) == 0) {
		$octal_value = '0000';
	} elseif(strlen($octal_value) == 1) {
		$octal_value = '000'.$octal_value;
	} elseif(strlen($octal_value) == 2) {
		$octal_value = '00'.$octal_value;
	} elseif(strlen($octal_value) == 3) {
		$octal_value = '0'.$octal_value;
	} elseif(strlen($octal_value) == 4) {
		$octal_value = ''.$octal_value;
	} else {
		$octal_value = '0000';
	}
	// Work-out what position of the octal value to look at
	switch($who) {
	case 'u':
		$position = '1';
		break;
	case 'user':
		$position = '1';
		break;
	case 'g':
		$position = '2';
		break;
	case 'group':
		$position = '2';
		break;
	case 'o':
		$position = '3';
		break;
	case 'others':
		$position = '3';
		break;
	}
	// Work-out how long the octal value is and ajust acording
	if(strlen($octal_value) == 4) {
		$position = $position+1;
	} elseif(strlen($octal_value) != 3) {
		exit('Error');
	}
	// Now work-out what action the script is trying to look-up
	switch($action) {
	case 'r':
		$action = 'r';
		break;
	case 'read':
		$action = 'r';
		break;
	case 'w':
		$action = 'w';
		break;
	case 'write':
		$action = 'w';
		break;
	case 'e':
		$action = 'e';
		break;
	case 'execute':
		$action = 'e';
		break;
	}
	// Get the value for "who"
	$value = substr($octal_value, $position-1, 1);
	// Now work-out the details of the value
	switch($value) {
	case '0':
		$r = false;
		$w = false;
		$e = false;
		break;
	case '1':
		$r = false;
		$w = false;
		$e = true;
		break;
	case '2':
		$r = false;
		$w = true;
		$e = false;
		break;
	case '3':
		$r = false;
		$w = true;
		$e = true;
		break;
	case '4':
		$r = true;
		$w = false;
		$e = false;
		break;
	case '5':
		$r = true;
		$w = false;
		$e = true;
		break;
	case '6':
		$r = true;
		$w = true;
		$e = false;
		break;
	case '7':
		$r = true;
		$w = true;
		$e = true;
		break;
	default:
		$r = false;
		$w = false;
		$e = false;
	}
	// And finally, return either true or false
	return $$action;
}

// Function to delete a page
function delete_page($page_id) {
	
	global $admin, $database, $MESSAGE;
	
	// Find out more about the page
	$database = new database();
	$query = "SELECT page_id,menu_title,page_title,level,link,parent,modified_by,modified_when FROM ".TABLE_PREFIX."pages WHERE page_id = '$page_id'";
	$results = $database->query($query);
	if($database->is_error()) {
		$admin->print_error($database->get_error());
	}
	if($results->numRows() == 0) {
		$admin->print_error($MESSAGE['PAGES']['NOT_FOUND']);
	}
	$results_array = $results->fetchRow();
	$parent = $results_array['parent'];
	$level = $results_array['level'];
	$link = $results_array['link'];
	$page_title = ($results_array['page_title']);
	$menu_title = ($results_array['menu_title']);
	
	// Get the sections that belong to the page
	$query_sections = $database->query("SELECT section_id,module FROM ".TABLE_PREFIX."sections WHERE page_id = '$page_id'");
	if($query_sections->numRows() > 0) {
		while($section = $query_sections->fetchRow()) {
			// Set section id
			$section_id = $section['section_id'];
			// Include the modules delete file if it exists
			if(file_exists(WB_PATH.'/modules/'.$section['module'].'/delete.php')) {
				require(WB_PATH.'/modules/'.$section['module'].'/delete.php');
			}
		}
	}
	
	// Update the pages table
	$query = "DELETE FROM ".TABLE_PREFIX."pages WHERE page_id = '$page_id'";
	$database->query($query);
	if($database->is_error()) {
		$admin->print_error($database->get_error());
	}
	
	// Update the sections table
	$query = "DELETE FROM ".TABLE_PREFIX."sections WHERE page_id = '$page_id'";
	$database->query($query);
	if($database->is_error()) {
		$admin->print_error($database->get_error());
	}
	
	// Include the ordering class or clean-up ordering
	require_once(WB_PATH.'/framework/class.order.php');
	$order = new order(TABLE_PREFIX.'pages', 'position', 'page_id', 'parent');
	$order->clean($parent);
	
	// Unlink the page access file and directory
	$directory = WB_PATH.PAGES_DIRECTORY.$link;
	$filename = $directory.PAGE_EXTENSION;
	$directory .= '/';
	if(file_exists($filename) && substr($filename,0,1<>'.')) {
		if(!is_writable(WB_PATH.PAGES_DIRECTORY.'/')) {
			$admin->print_error($MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE']);
		} else {
			unlink($filename);
			if(file_exists($directory)) {
				rm_full_dir($directory);
			}
		}
	}
	
}

// Load module into DB
function load_module($directory, $install = false) {
	global $database,$admin,$MESSAGE;
	if(file_exists($directory.'/info.php')) {
		require($directory.'/info.php');
		if(isset($module_name)) {
			if(!isset($module_license)) { $module_license = 'GNU General Public License'; }
			if(!isset($module_platform) AND isset($module_designed_for)) { $module_platform = $module_designed_for; }
			if(!isset($module_function) AND isset($module_type)) { $module_function = $module_type; }
			$module_function = strtolower($module_function);
			// Check that it doesn't already exist
			$result = $database->query("SELECT addon_id FROM ".TABLE_PREFIX."addons WHERE directory = '".$module_directory."' LIMIT 0,1");
			if($result->numRows() == 0) {
				// Load into DB
				$query = "INSERT INTO ".TABLE_PREFIX."addons ".
				"(directory,name,description,type,function,version,platform,author,license) ".
				"VALUES ('$module_directory','$module_name','".addslashes($module_description)."','module',".
				"'$module_function','$module_version','$module_platform','$module_author','$module_license')";
				$database->query($query);
				// Run installation script
				if($install == true) {
					if(file_exists($directory.'/install.php')) {
						require($directory.'/install.php');
					}
				}
			}
		}
	}
}

// Load template into DB
function load_template($directory) {
	global $database;
	if(file_exists($directory.'/info.php')) {
		require($directory.'/info.php');
		if(isset($template_name)) {
			if(!isset($template_license)) { $template_license = 'GNU General Public License'; }
			if(!isset($template_platform) AND isset($template_designed_for)) { $template_platform = $template_designed_for; }
			// Check that it doesn't already exist
			$result = $database->query("SELECT addon_id FROM ".TABLE_PREFIX."addons WHERE directory = '".$template_directory."' LIMIT 0,1");
			if($result->numRows() == 0) {
				// Load into DB
				$query = "INSERT INTO ".TABLE_PREFIX."addons ".
				"(directory,name,description,type,version,platform,author,license) ".
				"VALUES ('$template_directory','$template_name','".addslashes($template_description)."','template',".
				"'$template_version','$template_platform','$template_author','$template_license')";
				$database->query($query);
			}
		}
	}
}

// Load language into DB
function load_language($file) {
	global $database;
	if(file_exists($file)) {
		require($file);
		if(isset($language_name)) {
			if(!isset($language_license)) { $language_license = 'GNU General Public License'; }
			if(!isset($language_platform) AND isset($language_designed_for)) { $language_platform = $language_designed_for; }
			// Check that it doesn't already exist
			$result = $database->query("SELECT addon_id FROM ".TABLE_PREFIX."addons WHERE directory = '".$language_code."' LIMIT 0,1");
			if($result->numRows() == 0) {
				// Load into DB
				$query = "INSERT INTO ".TABLE_PREFIX."addons ".
				"(directory,name,type,version,platform,author,license) ".
				"VALUES ('$language_code','$language_name','language',".
				"'$language_version','$language_platform','$language_author','$language_license')";
	 		$database->query($query);
			}
		}
	}
}

// Upgrade module info in DB, optionally start upgrade script
function upgrade_module($directory, $upgrade = false) {
	global $database, $admin, $MESSAGE;
	$directory = WB_PATH . "/modules/$directory";
	if(file_exists($directory.'/info.php')) {
		require($directory.'/info.php');
		if(isset($module_name)) {
			if(!isset($module_license)) { $module_license = 'GNU General Public License'; }
			if(!isset($module_platform) AND isset($module_designed_for)) { $module_platform = $module_designed_for; }
			if(!isset($module_function) AND isset($module_type)) { $module_function = $module_type; }
			$module_function = strtolower($module_function);
			// Check that it does already exist
			$result = $database->query("SELECT addon_id FROM ".TABLE_PREFIX."addons WHERE directory = '".$module_directory."' LIMIT 0,1");
			if($result->numRows() > 0) {
				// Update in DB
				$query = "UPDATE " . TABLE_PREFIX . "addons SET " .
					"version = '$module_version', " .
					"description = '" . addslashes($module_description) . "', " .
					"platform = '$module_platform', " .
					"author = '$module_author', " .
					"license = '$module_license'" .
					"WHERE directory = '$module_directory'";
				$database->query($query);
				// Run upgrade script
				if($upgrade == true) {
					if(file_exists($directory.'/upgrade.php')) {
						require($directory.'/upgrade.php');
					}
				}
			}
		}
	}
}

?>