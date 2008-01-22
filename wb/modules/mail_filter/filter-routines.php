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

// direct access prevention
defined('WB_PATH') OR die(header('Location: ../index.php'));


// function to read the current filter settings
if (!function_exists('get_mail_filter_settings')) {
	function get_mail_filter_settings() {
		global $database, $admin;
		// connect to database and read out filter settings
		$result = $database->query("SELECT * FROM " .TABLE_PREFIX ."mod_mail_filter");
		if($result->numRows() > 0) {
			// get all data
			$data = $result->fetchRow();
			$filter_settings['email_filter'] = $admin->strip_slashes($data['email_filter']);
			$filter_settings['mailto_filter'] = $admin->strip_slashes($data['mailto_filter']);
			$filter_settings['at_replacement'] = $admin->strip_slashes($data['at_replacement']);
			$filter_settings['dot_replacement'] = $admin->strip_slashes($data['dot_replacement']);
		} else {
			// something went wrong, use dummy value
			$filter_settings['email_filter'] = '0';
			$filter_settings['mailto_filter'] = '0';
			$filter_settings['at_replacement'] = '(at)';
			$filter_settings['dot_replacement'] = '(dot)';
		}
		
		// return array with filter settings
		return $filter_settings;
	}
}


// function to rewrite email before beeing displayed the frontend
if (!function_exists('filter_email_links')) {
	function filter_email_links($content) {
		// get the mailer settings from the global variable defined in /wb/index.php
		global $mail_filter_settings;

		// check if there is anything to do
		global $mail_filter_settings;
		if(!isset($mail_filter_settings['email_filter']) || $mail_filter_settings['email_filter'] !=='1' ||
			!isset($mail_filter_settings['mailto_filter']) || !isset($mail_filter_settings['at_replacement']) || 
			!isset($mail_filter_settings['dot_replacement'])) {
			return $content;
		}

		// search pattern to find all mail addresses embedded in the frontend content (both text and mailto emails)
		$pattern = '#(<a href="mailto:)?(\w[\w|\.|\-]+@\w[\w|\.|\-]+\.[a-zA-Z]{2,})([^">]*">)?([^<]*</a>)?#i';
		/*
			exp 1:  (<a href=mailto:)?	-> Optional: search for <a href=mailto:
			exp 2a: (\w[\w|\.|\-]+@ 	 	-> 1st char word element, one ore more (+) word elements, or (|) . or (|) - followed by @
			exp 2b: \w[\w|\.|\-]+ 		-> see exp 2 for explanation
			exp 2c: \.[a-zA-Z]{2,})  	-> dot followed by at least 2 characters (TLD filter: .de, .com, .info) 
			exp 3: ([^">]*">)?  			-> Optional: all characters except > followed by ">; could contain ?subject=...&body=...
			exp 4: ([^<]*</a>)?  			-> Optional: all characters except <; email link message
			? 1 or 0 matches, # encapsulate regex, () subpattern as additional array element, i.. inherent (not case sensitive)
		*/

		// find all email addresses embedded in the content and encrypt them via callback function encrypt_emails
		$content = preg_replace_callback($pattern, 'encrypt_emails', $content);
		return $content;
	}
}


// function to encrypt mailto links before beeing displayed at the frontend
if (!function_exists('encrypt_emails')) {
	function encrypt_emails($match) { 
		// get the mailer settings from the global variable defined in /wb/index.php
		global $mail_filter_settings;

		// check if there is anything to do
		if(!isset($mail_filter_settings['email_filter']) || $mail_filter_settings['email_filter'] !=='1' ||
			!isset($mail_filter_settings['mailto_filter']) || !isset($mail_filter_settings['at_replacement']) || 
			!isset($mail_filter_settings['dot_replacement'])) {
			return $match[0];
		}
		
		// work out replacements
		$at_replace = strip_tags($mail_filter_settings['at_replacement']);
		$dot_replace = strip_tags($mail_filter_settings['dot_replacement']);

		// check if extracted email address is mailto or text ($match[0] contains entire regexp pattern)
		if (strpos($match[0], "mailto:") > 0) {
			// mailto email

			// do we need to consider mailto links
			if($mail_filter_settings['mailto_filter'] !='1') {
				// do not touch mailto links
				return $match[0];
			}
			
			// email sub parts: [<a href="mailto:] [name@domain.com] [?subject=blubb&Body=text">] [Mail description</a>]
			$email_href			= $match[1];	// a href part
			$email_address		= $match[2];	// email address
			$email_options 	= $match[3];	// optional: subject or body text for mail clients
			$email_link_text 	= $match[4];	// optional: mail description

			// do some cleaning
			$email_options 	= str_replace("\">", "", $email_options);					// strip off '">'
			$email_link_text 	= str_replace("</a>", "", trim($email_link_text));		// strip off closing </a>

			// make sure that all emails have a description
			if(strlen($email_link_text) == 0 ) {
				$email_link_text = $email_address;
			}

			// replace "@" and "." within top level domain (TLD) if link text is a valid email address
			if(preg_match('#\w[\w|\.|\-]+@\w[\w|\.|\-]+\.[a-zA-Z]{2,}#i', $email_link_text, $email)) {
				$email_link_text = str_replace("@", $at_replace, $email_address);		// replace @
				// remove "." from top level domain (TLD) part
				if (preg_match('#\.[a-zA-Z]{2,}$#im', $email_link_text, $tld) !==0) {
					$tld_replace =  str_replace(".", $dot_replace, $tld[0]);
					$email_link_text = str_replace($tld[0], $tld_replace, $email_link_text);				// replace . in email TLD part
				}
			}
		
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// encrypt the email address
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// create random encryption key
			mt_srand((double)microtime()*1000000);			// initialize the randomizer (PHP < 4.2.0)
			$char_shift = mt_rand(1, 5);						// shift:=1; a->b, shift:=5; a-->f
			$decryption_key = chr($char_shift+97);			// ASCII a:=97
		
			// prepare mailto string for encryption (mail protocol, decryption key, mail address)
			$email_address = "mailto:" .$decryption_key .$email_address;
		
			// encrypt email address by shifting characters
		  	$encrypted_email = "";
			for($i=0; $i<strlen($email_address); $i++) {
				$encrypted_email .= chr(ord($email_address[$i]) + $char_shift);
			}
			$encrypted_email[7] = $decryption_key;			// replace first character after mailto: with decryption key 
			$encrypted_email = rawurlencode($encrypted_email);

			// return encrypted javascript mailto link
			$mailto_link  = "<a href=\"javascript:mdcr('";		// a href part with javascript function to decrypt the email address
			$mailto_link .= "$encrypted_email')\">";				// add encrypted email address as paramter to JS function mdcr
			$mailto_link .= $email_link_text ."</a>";				// add email link text and closing </a> tag
			return $mailto_link;
		
		} else {
			// text email (e.g. name@domain.com)
			$match[0] = str_replace("@", $at_replace, $match[0]);		// replace @
			// remove "." from top level domain (TLD) part
			if (preg_match('#\.[a-zA-Z]{2,}$#im', $match[0], $tld) !==0) {
				$tld_replace =  str_replace(".", $dot_replace, $tld[0]);
				return str_replace($tld[0], $tld_replace, $match[0]);							// replace . in email TLD part
			}
		}
	}
}

?>
