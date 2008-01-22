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

// check if data was submitted
if(isset($_POST['save_settings'])) {
	// get configuration settings
	$email_filter = ($_POST['email_filter'] == '1') ? '1' : '0';
	$mailto_filter = ($_POST['mailto_filter'] == '1') ? '1' : '0';
	
	// get replacement settings
	$at_replacement = strip_tags($_POST['at_replacement']);
	$at_replacement = (strlen(trim($at_replacement)) > 0) ? $admin->add_slashes($at_replacement) : '(at)';
	$dot_replacement = strip_tags($_POST['dot_replacement']);
	$dot_replacement = (strlen(trim($dot_replacement)) > 0) ? $admin->add_slashes($dot_replacement) : '(dot)';
	
	// update database settings
	$database->query("UPDATE " .TABLE_PREFIX ."mod_mail_filter SET email_filter = '$email_filter', 
		mailto_filter = '$mailto_filter', at_replacement = '$at_replacement', dot_replacement = '$dot_replacement'");

	// check if there is a database error, otherwise say successful
	if($database->is_error()) {
		$admin->print_error($database->get_error(), $js_back);
	} else {
		$admin->print_success($MESSAGE['PAGES']['SAVED'], ADMIN_URL.'/admintools/tool.php?tool=mail_filter');
	}

} else {
	// write out heading
	echo '<h2>Email Output Filter</h2>';

	// include filter functions
	require_once(WB_PATH .'/modules/mail_filter/filter-routines.php');
	
	// read the mail filter settings from the database 
	$data = get_mail_filter_settings();
	
	// output the form with values from the database
?>

<p>You can enable/disable the output filtering of email adresses with the options below. The Javascript mailto: encryption requires to enable the register_frontend_modfiles in your browser.</p>
<form name="store_settings" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table width="98%" cellspacing="0" cellpadding="5px" class="row_a">
	<tr><td colspan="2"><strong>Basic Configuration:</strong></td></tr>
	<tr>
		<td width="35%">Email Output Filter:</td>
		<td>
			<input type="radio" <?php echo ($data['email_filter']=='1') ?'checked="checked"' :'';?> 
				name="email_filter" value="1">Enabled
			<input type="radio" <?php echo ($data['email_filter']=='0') ?'checked="checked"' :'';?> 
				name="email_filter" value="0">Disabled
		</td>
	</tr>
	<tr>
		<td>Javascript Encryption (mailto):</td>
		<td>
			<input type="radio" <?php echo ($data['mailto_filter']=='1') ?'checked="checked"' :'';?>
				name="mailto_filter" value="1">Enabled
			<input type="radio" <?php echo (($data['mailto_filter'])=='0') ?'checked="checked"' :'';?>
				name="mailto_filter" value="0">Disabled
		</td>
	</tr>
	<tr><td colspan="2"><br /><strong>Email Replacements:</strong></td></tr>
	<tr>
		<td>Replacement for "@":</td>
		<td><input type="text" style="width: 160px" value="<?php echo $data['at_replacement'];?>" 
			name="at_replacement"/></td>
	</tr>
	<tr>
		<td>Replacement for ".":</td>
		<td><input type="text" style="width: 160px" value="<?php echo $data['dot_replacement'];?>" 
			name="dot_replacement"/></td>
	</tr>
	</table>
	<input type="submit" name="save_settings" style="margin-top:10px; width:140px;" value="<?php echo $TEXT['SAVE']; ?>" />
</form>
<?php
}

?>
