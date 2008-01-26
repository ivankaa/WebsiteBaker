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

// check if module language file exists for the language set by the user (e.g. DE, EN)
if(!file_exists(WB_PATH .'/modules/captcha_control/languages/'.LANGUAGE .'.php')) {
	// no module language file exists for the language set by the user, include default module language file EN.php
	require_once(WB_PATH .'/modules/captcha_control/languages/EN.php');
} else {
	// a module language file exists for the language defined by the user, load it
	require_once(WB_PATH .'/modules/captcha_control/languages/'.LANGUAGE .'.php');
}

$table = TABLE_PREFIX.'mod_captcha_control';

// check if data was submitted
if(isset($_POST['save_settings'])) {
	// get configuration settings
	$enabled_captcha = ($_POST['enabled_captcha'] == '1') ? '1' : '0';
	$enabled_asp = ($_POST['enabled_asp'] == '1') ? '1' : '0';
	$captcha_type = $admin->add_slashes($_POST['captcha_type']);
	
	// update database settings
	$database->query("UPDATE $table SET
		enabled_captcha = '$enabled_captcha',
		enabled_asp = '$enabled_asp',
		captcha_type = '$captcha_type'
	");

	// check if there is a database error, otherwise say successful
	if($database->is_error()) {
		$admin->print_error($database->get_error(), $js_back);
	} else {
		$admin->print_success($MESSAGE['PAGES']['SAVED'], ADMIN_URL.'/admintools/tool.php?tool=captcha_control');
	}

} else {
	
	// include captcha-file
	require_once(WB_PATH .'/include/captcha/captcha.php');

	// connect to database and read out captcha settings
	if($query = $database->query("SELECT * FROM $table")) {
		$data = $query->fetchRow();
		$enabled_captcha = $data['enabled_captcha'];
		$enabled_asp = $data['enabled_asp'];
		$captcha_type = $admin->strip_slashes($data['captcha_type']);
	} else {
		// something went wrong, use dummy value
		$enabled_captcha = '1';
		$enabled_asp = '1';
		$captcha_type = 'calc_text';
	}
		
	// write out heading
	echo '<h2>' .$MOD_CAPTCHA_CONTROL['HEADING'] .'</h2>';

	// output the form with values from the database
	echo '<p>' .$MOD_CAPTCHA_CONTROL['HOWTO'] .'</p>';
?>
<form name="store_settings" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table width="98%" cellspacing="0" cellpadding="5px" class="row_a">
	<tr><td colspan="2"><strong><?php echo $MOD_CAPTCHA_CONTROL['CAPTCHA_CONF'];?>:</strong></td></tr>
	<tr>
		<td width="35%"><?php echo $MOD_CAPTCHA_CONTROL['CAPTCHA_TYPE'];?>:</td>
		<td>
			<select name="captcha_type" id="captcha_type" style="width: 98%;">
			<?php foreach($useable_captchas AS $key=>$text) {
				echo "<option value=\"$key\" ".($captcha_type==$key?'selected':'').">$text</option>";
			} ?>
		</select>
		</td>
	</tr>
	<tr>
		<td><?php echo $MOD_CAPTCHA_CONTROL['USE_SIGNUP_CAPTCHA'];?>:</td>
		<td>
			<input type="radio" <?php echo ($enabled_captcha=='1') ?'checked="checked"' :'';?>
				name="enabled_captcha" value="1"><?php echo $MOD_CAPTCHA_CONTROL['ENABLED'];?>
			<input type="radio" <?php echo ($enabled_captcha=='0') ?'checked="checked"' :'';?>
				name="enabled_captcha" value="0"><?php echo $MOD_CAPTCHA_CONTROL['DISABLED'];?>
		</td>
	</tr>
	<tr><td colspan="2"><br /><strong><?php echo $MOD_CAPTCHA_CONTROL['ASP_CONF'];?>:</strong></td></tr>
	<tr>
		<td><?php echo $MOD_CAPTCHA_CONTROL['ASP_TEXT'];?>:</td>
		<td>
			<input type="radio" <?php echo ($enabled_asp=='1') ?'checked="checked"' :'';?>
				name="enabled_asp" value="1"><?php echo $MOD_CAPTCHA_CONTROL['ENABLED'];?>
			<input type="radio" <?php echo ($enabled_asp=='0') ?'checked="checked"' :'';?>
				name="enabled_asp" value="0"><?php echo $MOD_CAPTCHA_CONTROL['DISABLED'];?>
		</td>
	</tr>
	</table>
	<input type="submit" name="save_settings" style="margin-top:10px; width:140px;" value="<?php echo $TEXT['SAVE']; ?>" />
</form>
<?php
}

?>