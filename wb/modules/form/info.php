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
The Website Baker Project would like to thank Rudolph Lartey <www.carbonect.com>
for his contributions to this module - adding extra field types
*/

/*
revision:
2.6.2.0 21 jan 2007
	minor fixes in the search tabel entries
2.6.1.9 24 dez 2006
	adapted all files to be compatible with 2.6.5
2.6.1.8 03 oct 2006
	fixed double )) in save_field.php line 76
2.6.1.7 24 jan 2006
	added header to modify_fields
	removed a typo (captcha)
2.6.1.6 23 jan 2006
	added exit(0); after each header("Location: ...) call
	added language text for 'none' thanks to Ruebenwurzel
2.6.1.5 23 jan 2006
    added anti caching to captcha
    changed the way thankyou page works, if chosen page is none, mail still could be sent, thank you message is shown!
    
2.6.1.4 22 jan 2006
    added email to mailto/from selected fields  -> Ticket #118 
    removed last separator in radiobutton and checkbox 
2.6.1.3 21 jan 2006
    restored thankyou text
    fixed mail lines, format of maillines -> Ticket #86
    fixed max_submissions -> Ticket #115
    fixed mailto/from selected fields (only textfields) -> Ticket #118 
2.6.1.2 16 jan 2006
    fixed ' in websitetitle
2.6.1.1 14 jan 2006
    changed thank you text to thank you page 
    added thank you mail
    changed behaviour of adding fields
*/
/*
todo:
- display of fieldlengths as variable, 
- back after error with filled in stuff?
- validation link for submissions???
*/ 

$module_directory = 'form';
$module_name = 'Form';
$module_function = 'page';
$module_version = '2.6.2.0';
$module_platform = '2.6.x';
$module_author = 'Ryan Djurovich & Rudolph Lartey - additions John Maats - PCWacht';
$module_license = 'GNU General Public License';
$module_description = 'This module allows you to create customised online forms, such as a feedback form. '.
'Thank-you to Rudolph Lartey who help enhance this module, providing code for extra field types, etc.';

?>