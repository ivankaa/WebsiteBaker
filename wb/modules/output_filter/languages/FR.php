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
  FICHIER DE LANGUE FRANCAIS POUR L'AJOUT: OUTPUT_FILTER
 -----------------------------------------------------------------------------------------
*/

// Headings and text outputs
$MOD_MAIL_FILTER['HEADING']				= 'Options: Filtre de sortie';
$MOD_MAIL_FILTER['HOWTO']= 'Vous pouvez configurer les filtres de sorties avec les options suivantes.<p style="line-height:1.5em;"><strong>Astuce: </strong>Les liens <i>Mailto</i> peuvent &ecirc;tres encrypt&eacute; par une fonction JavaScript. Pour utilis&eacute; cette option, vous devez ajouter le code suivant dans la section &lt;head&gt; mod&egrave;le (index.php) :  <code style="background:#FFA;color:#900;">&lt;?php '."register_frontend_modfiles('js');".'?&gt;</code>. Sans cette modification, seulement le charact&egrave;re @ dans la balise <i>Mailto</i> sera remplac&eacute;.</p>';

// Text and captions of form elements
$MOD_MAIL_FILTER['BASIC_CONF']			= 'Configuration courriel de base';
$MOD_MAIL_FILTER['EMAIL_FILTER']		= 'Filtr&eacute; les adresses courriels dans les texte';
$MOD_MAIL_FILTER['MAILTO_FILTER']		= 'Filtr&eacute; les adresses courriels dans les liens <i>mailto</i>';
$MOD_MAIL_FILTER['ENABLED']				= 'Activ&eacute;';
$MOD_MAIL_FILTER['DISABLED']			= 'D&eacute;activ&eacute;';

$MOD_MAIL_FILTER['REPLACEMENT_CONF']= 'Remplacement de courriels';
$MOD_MAIL_FILTER['AT_REPLACEMENT']	= 'Remplacer "@" par';
$MOD_MAIL_FILTER['DOT_REPLACEMENT']	= 'Remplacer "." par';

?>