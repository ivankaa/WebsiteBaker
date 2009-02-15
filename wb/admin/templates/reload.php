<?php
/**
 * $Id:$
 * Website Baker Add-On reload
 *
 * This file contains the function to update the template information from the
 * database with the ones stored in the template info.php files.
 *
 * LICENSE: GNU Lesser General Public License 3.0
 * 
 * @author		Christian Sommer
 * @copyright	(c) 2009
 * @license		http://www.gnu.org/copyleft/lesser.html
 * @version		0.1.0
 * @platform	Website Baker 2.7
 *
 * Website Baker Project <http://www.websitebaker.org/>
 * Copyright (C) 2004-2009, Ryan Djurovich
 *
 * Website Baker is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Website Baker is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Website Baker; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// include WB configuration file and WB admin class
require_once('../../config.php');
require_once('../../framework/class.admin.php');

// check user permissions for admintools (redirect users with wrong permissions)
$admin = new admin('Admintools', 'admintools', false, false);
if ($admin->get_permission('admintools') == false) die(header('Location: ../../index.php'));

// check if the referer URL if available
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 
	(isset($HTTP_SERVER_VARS['HTTP_REFERER']) ? $HTTP_SERVER_VARS['HTTP_REFERER'] : '');

// if referer is set, check if script was invoked from "admin/modules/index.php"
$required_url = '/admin/templates/index.php';
if ($referer != '' && (!(strpos($referer, $required_url) !== false || strpos($referer, $required_url) !== false))) 
	die(header('Location: ../../index.php'));

// include WB functions file
require_once(WB_PATH . '/framework/functions.php');

// load WB language file
require_once(WB_PATH . '/languages/' . LANGUAGE .'.php');

// create Admin object with admin header
$admin = new admin('Addons', '', true, false);
$js_back = ADMIN_URL . '/templates/index.php';

// reload template information from template "info.php" files
if ($handle = opendir(WB_PATH . '/templates/')) {
	// remove all templates from database
	$table = TABLE_PREFIX . 'addons';
	$sql = "DELETE FROM $table WHERE `type` = 'template'";
	$database->query($sql);

	// loop over all templates
	while(false !== ($file = readdir($handle))) {
		if($file != '' AND substr($file, 0, 1) != '.' AND $file != 'index.php') {
			load_template(WB_PATH . '/templates/' . $file);
		}
	}
	closedir($handle);
	// output success message
	$admin->print_success($MESSAGE['ADDON']['TEMPLATES_RELOADED'], $js_back);

} else {
	// output error message
	$admin->print_error($MESSAGE['ADDON']['ERROR_RELOAD'], $js_back);
}

?>