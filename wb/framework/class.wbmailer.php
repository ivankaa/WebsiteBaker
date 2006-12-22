<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2006, Ryan Djurovich

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

wbmailer class

This class is a subclass of the PHPMailer class and replaces the mail() function of PHP

*/

// Include PHPMailer class
require_once(WB_PATH."/include/phpmailer/class.phpmailer.php");

class wbmailer extends PHPMailer 
{
	// new websitebaker mailer class (subset of PHPMailer class)
	// setting default values 

	function wbmailer() {
		// set method to send out emails
		if(defined('WBMAILER_SMTP_HOST')) {
			// sets Mailer to send messages using SMTP
			$this->IsSMTP();                                            
			$this->Host = WBMAILER_SMTP_HOST;                        // use STMP host defined in config.php
		} else {
			// set Mailer to send message using PHP mail() function
			$this->IsMail();
		}

		// set language file for PHPMailer error messages
		if(defined("LANGUAGE")) {
			$this->SetLanguage(strtolower(LANGUAGE),"language");     // english default (also used if file is missing)
		}

		// set default charset
		if(defined('DEFAULT_CHARSET')) { 
			$this->CharSet = DEFAULT_CHARSET; 
		} else {
			$this->CharSet='utf-8';
		}

		// set default sender name
		if (isset($_SESSION['DISPLAY_NAME'])) {
			$this->FromName = $_SESSION['DISPLAY_NAME'];             // FROM NAME: display name of user logged in
		} else {
			$this->FromName = "WB Mailer";                           // FROM NAME: set default name
		}

		// set default sender mail address
		if (isset($_SESSION['EMAIL'])) {
			$this->From = $_SESSION['EMAIL'];                        // FROM MAIL: (of user logged in)
		} else {
			$this->From = SERVER_EMAIL;                              // FROM MAIL: (server mail)
		}

		// set default mail formats
		$this->IsHTML(true);                                        
		$this->WordWrap = 80;                                       
		$this->Timeout = 30;
	}
}

?>