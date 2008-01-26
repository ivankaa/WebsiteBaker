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

/* CAPTCHA - How to use:
 * use 
 *	require_once(WB_PATH.'/include/captcha/captcha.php');
 * and put 
 *	<?php call_captcha(); ?>
 * into your form.
 *
 * captcha-code is in $_SESSION['captcha']
 * user input in $_POST['captcha']
 */

// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) { exit("Cannot access this file directly"); }

if(!isset($admin)) {
	require_once(WB_PATH.'/framework/class.wb.php');
	$admin = new wb;
}

// check if module language file exists for the language set by the user (e.g. DE, EN)
global $MOD_CAPTCHA;
if(!file_exists(WB_PATH.'/modules/captcha_control/languages/'.LANGUAGE .'.php')) {
	// no module language file exists for the language set by the user, include default module language file EN.php
	require_once(WB_PATH.'/modules/captcha_control/languages/EN.php');
} else {
	// a module language file exists for the language defined by the user, load it
	require_once(WB_PATH.'/modules/captcha_control/languages/'.LANGUAGE .'.php');
}

// output-handler for image-captchas to determine size of image
if(!function_exists('captcha_header')) {
	function captcha_header() {
		header("Expires: Mon, 1 Jan 1990 05:00:00 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate, proxy-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false); // MS made there own headers :-(
		header("Pragma: no-cache");
		header("Content-type: image/png");
		return;
	}
}

// get list of available CAPTCHAS for the dropdown-listbox in admin-tools
if(extension_loaded('gd') && function_exists('imagepng') && function_exists('imagettftext')) {
	$useable_captchas = array(
		'calc_text'=>$MOD_CAPTCHA_CONTROL['CALC_TEXT'],
		'calc_image'=>$MOD_CAPTCHA_CONTROL['CALC_IMAGE'],
		'ttf_image'=>$MOD_CAPTCHA_CONTROL['TTF_IMAGE'],
		'old_image'=>$MOD_CAPTCHA_CONTROL['OLD_IMAGE']
	);
} elseif(extension_loaded('gd') && function_exists('imagepng')) {
	$useable_captchas = array(
		'calc_text'=>$MOD_CAPTCHA_CONTROL['CALC_TEXT'],
		'calc_image'=>$MOD_CAPTCHA_CONTROL['CALC_IMAGE'],
		'old_image'=>$MOD_CAPTCHA_CONTROL['OLD_IMAGE']
	);
} else {
	$useable_captchas = array(
		'calc_text'=>$MOD_CAPTCHA_CONTROL['CALC_TEXT']
	);
}

if(!function_exists('call_captcha')) {
	function call_captcha() {
		global $MOD_CAPTCHA;
		$t = time();
		$_SESSION['captcha_time'] = $t;
	
		switch(CAPTCHA_TYPE) {
			// two special cases
			case 'calc_text': // calculation as text
				?>
				<?php include(WB_PATH.'/include/captcha/captchas/calc_text.php'); ?> = 
				<input type="text" name="captcha" maxlength="5"  style="width:20px" />&nbsp;&nbsp;<?php echo $MOD_CAPTCHA['VERIFICATION_INFO_RES']; ?></font>
				<?php
				break;
			case 'calc_image': // calculation with image (old captcha)
				?>
				<img src="<?php echo WB_URL."/include/captcha/captchas/calc_image.php?t=$t"; ?>" align="middle" alt="Captcha" /> = 
				<input type="text" name="captcha" maxlength="5" style="width:20px" />&nbsp;&nbsp;<?php echo $MOD_CAPTCHA['VERIFICATION_INFO_RES']; ?></font>
				<?php
				break;
			// normal images
			case 'ttf_image': // captcha with varying background and ttf-font
			case 'old_image': // old captcha
				?>
				<img src="<?php echo WB_URL.'/include/captcha/captchas/'.CAPTCHA_TYPE.".php?t=$t"; ?>" align="middle" alt="Captcha" />
				<input type="text" name="captcha" maxlength="5" style="width:50px" />&nbsp;&nbsp;<?php echo $MOD_CAPTCHA['VERIFICATION_INFO_TEXT']; ?></font>
				<?php
				break;
		}
	}
}
?>