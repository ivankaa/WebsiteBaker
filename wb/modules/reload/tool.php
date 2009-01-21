<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2009, Ryan Djurovich

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

// Direct access prevention
defined('WB_PATH') OR die(header('Location: ../index.php'));

// check if module language file exists for the language set by the user (e.g. DE, EN)
if(!file_exists(WB_PATH .'/modules/reload/languages/'.LANGUAGE .'.php')) {
	// no module language file exists for the language set by the user, include default module language file EN.php
	require_once(WB_PATH .'/modules/reload/languages/EN.php');
} else {
	// a module language file exists for the language defined by the user, load it
	require_once(WB_PATH .'/modules/reload/languages/'.LANGUAGE .'.php');
}

// Check if user selected what add-ons to reload
if(isset($_POST['submit']) AND $_POST['submit'] != '') {
	// Include functions file
	require_once(WB_PATH.'/framework/functions.php');
	// Perform empty/reload
	if(isset($_POST['reload_modules'])) {
		// Remove all modules
		$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'module'");
		// Load all modules
		if($handle = opendir(WB_PATH.'/modules/')) {
			while(false !== ($file = readdir($handle))) {
				if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'admin.php' AND $file != 'index.php') {
					load_module(WB_PATH.'/modules/'.$file);
				}
			}
		closedir($handle);
		}
		echo '<br />'.$MOD_RELOAD['MODULES_RELOADED'];
	}
	if(isset($_POST['reload_templates'])) {
		// Remove all templates
		$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'template'");
		// Load all templates
		if($handle = opendir(WB_PATH.'/templates/')) {
			while(false !== ($file = readdir($handle))) {
				if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'index.php') {
					load_template(WB_PATH.'/templates/'.$file);
				}
			}
		closedir($handle);
		}
		echo '<br />'.$MOD_RELOAD['TEMPLATES_RELOADED'];
	}
	if(isset($_POST['reload_languages'])) {
		// Remove all languages
		$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE type = 'language'");
		// Load all languages
		if($handle = opendir(WB_PATH.'/languages/')) {
			while(false !== ($file = readdir($handle))) {
				if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'index.php') {
					load_language(WB_PATH.'/languages/'.$file);
				}
			}
		closedir($handle);
		}
		echo '<br />'.$MOD_RELOAD['LANGUAGES_RELOADED'];
	}
	?>
	<br /><br />
	<a href="<?php echo $_SERVER['REQUEST_URI']; ?>"><?php echo $TEXT['BACK']; ?></a>
	<?php
} else {
	// Display form
	?>
	<br />
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table cellpadding="4" cellspacing="0" border="0">
	<tr>
		<td colspan="2"><?php echo $MOD_RELOAD['PLEASE_SELECT']; ?>:</td>
	</tr>
	<tr>
		<td width="20"><input type="checkbox" name="reload_modules" id="reload_modules" value="true" /></td>
		<td><label for="reload_modules"><?php echo $MOD_RELOAD['MODULES']; ?></label></td>
	</tr>
	<tr>
		<td><input type="checkbox" name="reload_templates" id="reload_templates" value="true" /></td>
		<td><label for="reload_templates"><?php echo $MOD_RELOAD['TEMPLATES']; ?></label></td>
	</tr>
	<tr>
		<td><input type="checkbox" name="reload_languages" id="reload_languages" value="true" /></td>
		<td><label for="reload_languages"><?php echo $MOD_RELOAD['LANGUAGES']; ?></label></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" name="submit" value="<?php echo $TEXT['RELOAD']; ?>" onClick="javascript: if(!confirm('<?php echo $TEXT['ARE_YOU_SURE']; ?>')) { return false; }" />
		</td>
	</tr>
	</table>
	</form>
	<?php
}

?>