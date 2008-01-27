// $Id$


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




One can improve CAPTCHA-type "CAPTCHA with varying fonts and backgrounds"
- by adding backgrounds (PNG-images, 140x40 pixels) to backgrounds/
- and by adding TrueType-fonts to fonts/


How to use:
use 
	require_once(WB_PATH.'/include/captcha/captcha.php'); // will output a table with 3 columns: |CAPTCHA|Input|Text|
and put 
	<?php call_captcha(); ?>
into your form.


The CAPTCHA-code is allways stored in $_SESSION['captcha']
The user-input is in $_POST['captcha'] (or $_GET['captcha']).


call_captcha() will output code like this
<table class="captcha_table"><tr>
  <td><img src="<?php echo WB_URL.'/include/captcha/captchas/'.CAPTCHA_TYPE.".php?t=$t"; ?>" alt="Captcha" /></td>
  <td><input type="text" name="captcha" maxlength="5" style="width:50px" /></td>
  <td class="captcha_expl"><?php echo $MOD_CAPTCHA['VERIFICATION_INFO_TEXT']; ?></td>
</tr></table>
