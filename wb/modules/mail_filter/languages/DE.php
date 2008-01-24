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

 -----------------------------------------------------------------------------------------
  DEUTSCHE SPRACHDATEI FUER DAS MODUL: MAIL_FILTER
 -----------------------------------------------------------------------------------------
*/

// Deutsche Modulbeschreibung
$module_description 	= 'Dieses Modul erlaubt Emailfilterung vor der Ausgabe (z.B. <em>name@email.de</em> --> <em>name(at)email(dot).de</em>).';

// Überschriften und Textausgaben
$MOD_MAIL_FILTER['HEADING']				= 'Email Ausgabe Filterung';
$MOD_MAIL_FILTER['HOWTO']					= 'Mit nachfolgenden Optionen kann die Emailfilterung ein- und ausgeschaltet werden. Um die Javascript mailto: Verschl&uuml;sselung zu aktivieren, muss die PHP Funktion <em>register_frontend_modfiles(\'js\')</em> in der index.php des Templates eingebunden werden.';

// Text and captions of form elements
$MOD_MAIL_FILTER['BASIC_CONF']			= 'Grundeinstellungen';
$MOD_MAIL_FILTER['EMAIL_FILTER']			= 'Textmail Filterung';
$MOD_MAIL_FILTER['MAILTO_FILTER']		= 'Mailto Filterung (Javascript)';
$MOD_MAIL_FILTER['ENABLED']				= 'Aktiviert';
$MOD_MAIL_FILTER['DISABLED']				= 'Ausgeschaltet';

$MOD_MAIL_FILTER['REPLACEMENT_CONF']	= 'Email Ersetzungen';
$MOD_MAIL_FILTER['AT_REPLACEMENT']		= 'Ersetzte "@" durch';
$MOD_MAIL_FILTER['DOT_REPLACEMENT']		= 'Ersetze "." durch';

?>