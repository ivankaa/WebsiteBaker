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

// include configuration file and admin wrapper script
require('../../config.php');
require(WB_PATH.'/modules/admin.php');

/**
	DEFINE LANGUAGE DEPENDING OUTPUTS FOR THE EDIT CSS PART
*/
$lang_dir = WB_PATH .'/modules/' .$_POST['mod_dir'] .'/languages/';
if(file_exists($lang_dir .LANGUAGE .'.php')) {
	// try to include custom language file if exists
	require_once($lang_dir .LANGUAGE .'.php');
} elseif(file_exists($lang_dir .'EN.php')) {
	// try to include default module language file
	require_once($lang_dir .'EN.php');
}

// set defaults if output varibles are not set in the languages files
if(!isset($HEADING_CSS_FILE))	$HEADING_CSS_FILE = 'Actual module file: ';
if(!isset($TXT_EDIT_CSS_FILE)) $TXT_EDIT_CSS_FILE = 'Edit the CSS definitions in the textarea below.';

// include functions to edit the optional module CSS files (frontend.css, backend.css)
require_once('css.functions.php');

// check if the module directory is valid
$mod_dir = check_module_dir($_POST['mod_dir']);
if($mod_dir == '') die(header('Location: index.php'));

// check if action is: save or edit
if($_POST['action'] == 'save' && mod_file_exists($mod_dir, $_POST['edit_file'])) {
	/** 
		SAVE THE UPDATED CONTENTS TO THE CSS FILE
	*/
	$css_content = '';
	if(isset($_POST['css_codepress']) && strlen($_POST['css_codepress']) > 0) {
		// Javascript is enabled so take contents from hidden field: css_codepress
		$css_content = stripslashes($_POST['css_codepress']);
	} elseif(isset($_POST['css_data']) && strlen($_POST['css_data']) > 0) {
		// Javascript disabled, take contens from textarea: css_data
		$css_content = stripslashes($_POST['css_data']);
	}

	$bytes = 0;
	if ($css_content != '') {
		// open the module CSS file for writting
		$mod_file = @fopen(dirname(__FILE__) .'/' .$_POST['edit_file'], "wb");
		// write new content to the module CSS file
		$bytes = @fwrite($mod_file, $css_content);
		// close the file
		@fclose($mod_file);
	}

	// write out status message
	if($bytes == 0 ) {
		$admin->print_error($TEXT['ERROR'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
	} else {
		$admin->print_success($TEXT['SUCCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
	}

} else {
	/** 
		MODIFY CONTENTS OF THE CSS FILE VIA TEXT AREA 
	*/
	// check if module backend.css file needs to be included into the <body>
	if((!method_exists($admin, 'register_backend_modfiles') || !isset($_GET['page_id']))
			&& file_exists(WB_PATH .'/modules/'.$mod_dir.'/backend.css')) {
		echo '<style type="text/css">';
		include(WB_PATH .'/modules/' .$mod_dir .'/backend.css');
		echo "\n</style>\n";
	}

	// check which module file to edit (frontend.css, backend.css or '')
	$css_file = (in_array($_POST['edit_file'], array('frontend.css', 'backend.css'))) ? $_POST['edit_file'] : '';

	// display output
	if($css_file == '') {
		// no valid module file to edit; display error message and backlink to modify.php
		echo "<h2>Nothing to edit</h2>";
		echo "<p>No valid module file exists for this module.</p>";
		$output  = "<a href=\"#\" onclick=\"javascript: window.location = '";
		$output .= ADMIN_URL ."/pages/modify.php?page_id=" .$page_id ."'\">back</a>";
		echo $output;
	} else {
		// store content of the module file in variable
		$css_content = @file_get_contents(dirname(__FILE__) .'/' .$css_file);

		// make sure that codepress stuff is only used if the framework is available
		$CODEPRESS['CLASS'] = '';
		$CODEPRESS['JS'] = '';
		if(file_exists(WB_PATH .'/include/codepress/codepress.js')) {
			$CODEPRESS['CLASS'] = 'class="codepress css" ';
			$CODEPRESS['JS'] = 'onclick="javascript: css_codepress.value = area_codepress.getCode();"';
		}

		// write out heading
		echo '<h2>' .$HEADING_CSS_FILE .'"' .$css_file .'"</h2>';
		// include button to switch between frontend.css and backend.css (only shown if both files exists)
		toggle_css_file($mod_dir, $css_file); 
	  echo '<p>' .$TXT_EDIT_CSS_FILE .'</p>';

		// output content of module file to textareas
	?>
		<form name="edit_module_file" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="margin: 0;">
			<input type="hidden" name="css_codepress" value="" />
	  	<input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
	  	<input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
	  	<input type="hidden" name="mod_dir" value="<?php echo $mod_dir; ?>">
			<input type="hidden" name="edit_file" value="<?php echo $css_file; ?>" />
	  	<input type="hidden" name="action" value="save">

			<textarea id="area_codepress" name="css_data" <?php echo $CODEPRESS['CLASS'];?>cols="115" rows="25" wrap="VIRTUAL" 
				style="margin:2px;"><?php echo $css_content; ?></textarea>

  			<table cellpadding="0" cellspacing="0" border="0" width="100%">
  			<tr>
    			<td align="left">
 				<input name="save" type="submit" value="<?php echo $TEXT['SAVE'];?>"
				  <?php echo $CODEPRESS['JS'];?> style="width: 100px; margin-top: 5px;" />
    			</td>
  				<td align="right">
      			<input type="button" value="<?php echo $TEXT['CANCEL']; ?>"
						onclick="javascript: window.location = '<?php echo ADMIN_URL;?>/pages/modify.php?page_id=<?php echo $page_id; ?>';"
						style="width: 100px; margin-top: 5px;" />
  				</td>
  			</tr>
  			</table>
		</form>
		<?php 
	}
}

// Print admin footer
$admin->print_footer();

?>