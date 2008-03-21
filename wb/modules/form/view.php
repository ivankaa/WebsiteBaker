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

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }

// check if frontend.css file needs to be included into the <body></body> of view.php
if((!function_exists('register_frontend_modfiles') || !defined('MOD_FRONTEND_CSS_REGISTERED')) &&  
	file_exists(WB_PATH .'/modules/form/frontend.css')) {
	echo '<style type="text/css">';
	include(WB_PATH .'/modules/form/frontend.css');
	echo "\n</style>\n";
} 

require_once(WB_PATH.'/include/captcha/captcha.php');
require_once(WB_PATH.'/include/captcha/asp.php');

// Function for generating an optionsfor a select field
if (!function_exists('make_option')) {
function make_option(&$n, $k, $values) {
	// start option group if it exists
	if (substr($n,0,2) == '[=') {
	 	$n = '<optgroup label="'.substr($n,2,strlen($n)).'">';
	} elseif ($n == ']') {
		$n = '</optgroup>';
	} else {
		if(in_array($n, $values))
			$n = '<option selected="selected" value="'.$n.'">'.$n.'</option>';
		else
			$n = '<option value="'.$n.'">'.$n.'</option>';
	}
}
}
// Function for generating a checkbox
if (!function_exists('make_checkbox')) {
function make_checkbox(&$n, $idx, $params) {
	$field_id = $params[0][0];
	$seperator = $params[0][1];
	//$n = '<input class="field_checkbox" type="checkbox" id="'.$n.'" name="field'.$field_id.'" value="'.$n.'">'.'<font class="checkbox_label" onclick="javascript: document.getElementById(\''.$n.'\').checked = !document.getElementById(\''.$n.'\').checked;">'.$n.'</font>'.$seperator;
	if(in_array($n, $params[1]))
		$n = '<input class="field_checkbox" type="checkbox" id="'.$n.'" name="field'.$field_id.'['.$idx.']" value="'.$n.'" checked="checked">'.'<font class="checkbox_label" onclick="javascript: document.getElementById(\''.$n.'\').checked = !document.getElementById(\''.$n.'\').checked;">'.$n.'</font>'.$seperator;
	else
		$n = '<input class="field_checkbox" type="checkbox" id="'.$n.'" name="field'.$field_id.'['.$idx.']" value="'.$n.'">'.'<font class="checkbox_label" onclick="javascript: document.getElementById(\''.$n.'\').checked = !document.getElementById(\''.$n.'\').checked;">'.$n.'</font>'.$seperator;
}
}
// Function for generating a radio button
if (!function_exists('make_radio')) {
function make_radio(&$n, $idx, $params) {
	$field_id = $params[0];
	$group = $params[1];
	$seperator = $params[2];
	if($n == $params[3])
		$n = '<input class="field_radio" type="radio" id="'.$n.'" name="field'.$field_id.'" value="'.$n.'" checked="checked">'.'<font class="radio_label" onclick="javascript: document.getElementById(\''.$n.'\').checked = true;">'.$n.'</font>'.$seperator;
	else
		$n = '<input class="field_radio" type="radio" id="'.$n.'" name="field'.$field_id.'" value="'.$n.'">'.'<font class="radio_label" onclick="javascript: document.getElementById(\''.$n.'\').checked = true;">'.$n.'</font>'.$seperator;
}
}
// Generate temp submission id
function new_submission_id() {
	$submission_id = '';
	$salt = "abchefghjkmnpqrstuvwxyz0123456789";
	srand((double)microtime()*1000000);
	$i = 0;
	while ($i <= 7) {
		$num = rand() % 33;
		$tmp = substr($salt, $num, 1);
		$submission_id = $submission_id . $tmp;
		$i++;
	}
	return $submission_id;
}

// Work-out if the form has been submitted or not
if($_POST == array()) {

// Set new submission ID in session
$_SESSION['form_submission_id'] = new_submission_id();

// Get settings
$query_settings = $database->query("SELECT header,field_loop,footer,use_captcha FROM ".TABLE_PREFIX."mod_form_settings WHERE section_id = '$section_id'");
if($query_settings->numRows() > 0) {
	$fetch_settings = $query_settings->fetchRow();
	$header = str_replace('{WB_URL}',WB_URL,$fetch_settings['header']);
	$field_loop = $fetch_settings['field_loop'];
	$footer = str_replace('{WB_URL}',WB_URL,$fetch_settings['footer']);
	$use_captcha = $fetch_settings['use_captcha'];
} else {
	$header = '';
	$field_loop = '';
	$footer = '';
}

$java_fields = '';
$java_titles = '';
$java_tween = ''; // I know kinda stupid, anyone better idea?
$java_mailcheck = '';

// Add form starter code
?>
<form name="form" onsubmit="return formCheck(this);" action="<?php echo htmlspecialchars(strip_tags($_SERVER['PHP_SELF'])); ?>" method="post">
<input type="hidden" name="submission_id" value="<?php echo $_SESSION['form_submission_id']; ?>" />
<?php

// Print header
echo $header;

if(ENABLED_ASP) { // first add some honeypot-fields
?>
<input type="hidden" name="submitted_when" value="<?php $t=time(); echo $t; $_SESSION['submitted_when']=$t; ?>" />
<p class="nixhier">
email address:
<label for="email">Your e-mail address is not relevant Leave this field blank:</label>
<input id="email" name="email" size="56" value="" /><br />
Homepage:
<label for="homepage">Do not enter a homepage-url www.whatever.com here:</label>
<input id="homepage" name="homepage" size="55" value="" /><br />
URL:
<label for="url">Don't write anything in this field:</label>
<input id="url" name="url" size="61" value="" /><br />
Comment:
<label for="comment">Enter not your comment here:</label>
<textarea name="comment" cols="50" rows="10"></textarea><br />
</p>
<?php }

// Get list of fields
$query_fields = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_form_fields WHERE section_id = '$section_id' ORDER BY position ASC");
if($query_fields->numRows() > 0) {
	while($field = $query_fields->fetchRow()) {
		// Set field values
		$field_id = $field['field_id'];
		$value = $field['value'];
		// Print field_loop after replacing vars with values
		$vars = array('{TITLE}', '{REQUIRED}');
		$values = array($field['title']);
		if($field['required'] == 1) {
			$values[] = '<font class="required">*</font>';
			$java_fields .= $java_tween.'"field'.$field_id.'"';
			$java_titles .= $java_tween.'"'.$field['title'].'"';
			$java_tween = ', ';
		} else {
			$values[] = '';
		}
		if($field['type'] == 'textfield') {
			$vars[] = '{FIELD}';
			$values[] = '<input type="text" name="field'.$field_id.'" id="field'.$field_id.'" maxlength="'.$field['extra'].'" value="'.(isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:$value).'" class="textfield" />';
		} elseif($field['type'] == 'textarea') {
			$vars[] = '{FIELD}';
			$values[] = '<textarea name="field'.$field_id.'" id="field'.$field_id.'" class="textarea">'.(isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:$value).'</textarea>';
		} elseif($field['type'] == 'select') {
			$vars[] = '{FIELD}';
			$options = explode(',', $value);
			array_walk($options, 'make_option', (isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:array()));
			$field['extra'] = explode(',',$field['extra']); 
			$values[] = '<select name="field'.$field_id.'[]" id="field'.$field_id.'" size="'.$field['extra'][0].'" '.$field['extra'][1].' class="select">'.implode($options).'</select>';
		} elseif($field['type'] == 'heading') {
			$vars[] = '{FIELD}';
			$values[] = '<input type="hidden" name="field'.$field_id.'" id="field'.$field_id.'" value="===['.$field['title'].']===" />';
			$tmp_field_loop = $field_loop;		// temporarily modify the field loop template
			$field_loop = $field['extra'];
		} elseif($field['type'] == 'checkbox') {
			$vars[] = '{FIELD}';
			$options = explode(',', $value);
			array_walk($options, 'make_checkbox', array(array($field_id,$field['extra']),(isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:array())));
			$options[count($options)-1]=substr($options[count($options)-1],0,strlen($options[count($options)-1])-strlen($field['extra']));
			$values[] = implode($options);
		} elseif($field['type'] == 'radio') {
			$vars[] = '{FIELD}';
			$options = explode(',', $value);
			array_walk($options, 'make_radio', array($field_id,$field['title'],$field['extra'], (isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:'')));
			$options[count($options)-1]=substr($options[count($options)-1],0,strlen($options[count($options)-1])-strlen($field['extra']));
			$values[] = implode($options);
		} elseif($field['type'] == 'email') {
			$vars[] = '{FIELD}';
			$values[] = '<input type="text" name="field'.$field_id.'" onChange="return checkmail(this.form.field'.$field_id.')"  id="field'.$field_id.'" value="'.(isset($_SESSION['field'.$field_id])?$_SESSION['field'.$field_id]:'').'" maxlength="'.$field['extra'].'" class="email" />';
			$java_mailcheck .= 'onChange="return checkmail(this.form'.$field_id.'" ';
		}
		if(isset($_SESSION['field'.$field_id])) unset($_SESSION['field'.$field_id]);
		if($field['type'] != '') {
			echo str_replace($vars, $values, $field_loop);
		}
		if (isset($tmp_field_loop)) $field_loop = $tmp_field_loop;
	}
}

// Captcha
if($use_captcha) { ?>
	<tr>
	<td class="field_title"><?php echo $TEXT['VERIFICATION']; ?>:</td>
	<td><?php call_captcha(); ?></td>
	</tr>
	<?php
}
echo '
<script language="JavaScript">
<!--

/***********************************************
* Required field(s) validation v1.10- By NavSurf
* Visit Nav Surf at http://navsurf.com
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

function formCheck(formobj){
	// Enter name of mandatory fields
	var fieldRequired = Array('.$java_fields.');
	// Enter field description to appear in the dialog box
	var fieldDescription = Array('.$java_titles.');
	// dialog message
	var alertMsg = "'.$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'].':\n";
	
	var l_Msg = alertMsg.length;
	
	for (var i = 0; i < fieldRequired.length; i++){
		var obj = formobj.elements[fieldRequired[i]];
		if (obj){
			switch(obj.type){
			case "select-one":
				if (obj.selectedIndex == -1 || obj.options[obj.selectedIndex].text == ""){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "select-multiple":
				if (obj.selectedIndex == -1){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "text":
			case "textarea":
				if (obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			default:
			}
			if (obj.type == undefined){
				var blnchecked = false;
				for (var j = 0; j < obj.length; j++){
					if (obj[j].checked){
						blnchecked = true;
					}
				}
				if (!blnchecked){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
			}
		}
	}

	if (alertMsg.length == l_Msg){
		return true;
	}else{
		alert(alertMsg);
		return false;
	}
}
/***********************************************
* Email Validation script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i

function checkmail(e){
var returnval=emailfilter.test(e.value);
if (returnval==false){
alert("Please enter a valid email address.");
e.select();
}
return returnval;
}
-->

</script>';


// Print footer
echo $footer;

// Add form end code
?>
</form>
<?php

} else {
	
	// Check that submission ID matches
	if(isset($_SESSION['form_submission_id']) AND isset($_POST['submission_id']) AND $_SESSION['form_submission_id'] == $_POST['submission_id']) {
		
		// Set new submission ID in session
		$_SESSION['form_submission_id'] = new_submission_id();
		
		if(ENABLED_ASP && ( // form faked? Check the honeypot-fields.
			(!isset($_POST['submitted_when']) OR !isset($_SESSION['submitted_when'])) OR 
			($_POST['submitted_when'] != $_SESSION['submitted_when']) OR
			(!isset($_POST['email']) OR $_POST['email']) OR
			(!isset($_POST['homepage']) OR $_POST['homepage']) OR
			(!isset($_POST['comment']) OR $_POST['comment']) OR
			(!isset($_POST['url']) OR $_POST['url'])
		)) {
			exit(header("Location: ".WB_URL.PAGES_DIRECTORY.""));
		}

		// Submit form data
		// First start message settings
		$query_settings = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_form_settings WHERE section_id = '$section_id'");
		if($query_settings->numRows() > 0) {
			$fetch_settings = $query_settings->fetchRow();
			$email_to = $fetch_settings['email_to'];
			$email_from = $fetch_settings['email_from'];
			if(substr($email_from, 0, 5) == 'field') {
				// Set the email from field to what the user entered in the specified field
				$email_from = htmlspecialchars($wb->add_slashes($_POST[$email_from]));
			}
			$email_fromname = $fetch_settings['email_fromname'];
			$email_subject = $fetch_settings['email_subject'];
			$success_page = $fetch_settings['success_page'];
			$success_email_to = $fetch_settings['success_email_to'];
			if(substr($success_email_to, 0, 5) == 'field') {
				// Set the success_email to field to what the user entered in the specified field
				$success_email_to = htmlspecialchars($wb->add_slashes($_POST[$success_email_to]));
			}
			$success_email_from = $fetch_settings['success_email_from'];
			$success_email_fromname = $fetch_settings['success_email_fromname'];
			$success_email_text = $fetch_settings['success_email_text'];
			$success_email_subject = $fetch_settings['success_email_subject'];		
			$max_submissions = $fetch_settings['max_submissions'];
			$stored_submissions = $fetch_settings['stored_submissions'];
			$use_captcha = $fetch_settings['use_captcha'];
		} else {
			exit($TEXT['UNDER_CONSTRUCTION']);
		}
		$email_body = '';
		
		// Create blank "required" array
		$required = array();
		
		// Captcha
		if($use_captcha) {
			if(isset($_POST['captcha']) AND $_POST['captcha'] != ''){
				// Check for a mismatch
				if(!isset($_POST['captcha']) OR !isset($_SESSION['captcha']) OR $_POST['captcha'] != $_SESSION['captcha']) {
					$captcha_error = $MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'];
				}
			} else {
				$captcha_error = $MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'];
			}
		}
		if(isset($_SESSION['captcha'])) { unset($_SESSION['captcha']); }

		// Loop through fields and add to message body
		// Get list of fields
		$query_fields = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_form_fields WHERE section_id = '$section_id' ORDER BY position ASC");
		if($query_fields->numRows() > 0) {
			while($field = $query_fields->fetchRow()) {
				// Add to message body
				if($field['type'] != '') {
					if(!empty($_POST['field'.$field['field_id']])) {
						if(isset($captcha_error)) $_SESSION['field'.$field['field_id']] = htmlspecialchars($_POST['field'.$field['field_id']]);
						if($field['type'] == 'email' AND $admin->validate_email($_POST['field'.$field['field_id']]) == false) {
							$email_error = $MESSAGE['USERS']['INVALID_EMAIL'];
						}
						if($field['type'] == 'heading') {
							$email_body .= $_POST['field'.$field['field_id']]."\n\n";
						} elseif (!is_array($_POST['field'.$field['field_id']])) {
							$email_body .= $field['title'].': '.$_POST['field'.$field['field_id']]."\n\n";
						} else {
							$email_body .= $field['title'].": \n";
							foreach ($_POST['field'.$field['field_id']] as $k=>$v) {
								$email_body .= $v."\n";
							}
							$email_body .= "\n";
						}
					} elseif($field['required'] == 1) {
						$required[] = $field['title'];
					}
				}
			}
		}

		// Addslashes to email body - proposed by Icheb in topic=1170.0
		// $email_body = $wb->add_slashes($email_body);
		
		// Check if the user forgot to enter values into all the required fields
		if($required != array()) {
			if(!isset($MESSAGE['MOD_FORM']['REQUIRED_FIELDS'])) {
				echo 'You must enter details for the following fields';
			} else {
				echo $MESSAGE['MOD_FORM']['REQUIRED_FIELDS'];
			}
			echo ':<br /><ul>';
			foreach($required AS $field_title) {
				echo '<li>'.$field_title;
			}
			if(isset($email_error)) { echo '<li>'.$email_error.'</li>'; }
			if(isset($captcha_error)) { echo '<li>'.$captcha_error.'</li>'; }
			echo '</ul><a href="javascript: history.go(-1);">'.$TEXT['BACK'].'</a>';
			
		} else {
			
			if(isset($email_error)) {
				echo '<br /><ul>';
				echo '<li>'.$email_error.'</li>';
				echo '</ul><a href="javascript: history.go(-1);">'.$TEXT['BACK'].'</a>';
			} elseif(isset($captcha_error)) {
				echo '<br /><ul>';
				echo '<li>'.$captcha_error.'</li>';
				echo '</ul><a href="javascript: history.go(-1);">'.$TEXT['BACK'].'</a>';
			} else {
				
				// Check how many times form has been submitted in last hour
				$last_hour = time()-3600;
				$query_submissions = $database->query("SELECT submission_id FROM ".TABLE_PREFIX."mod_form_submissions WHERE submitted_when >= '$last_hour'");
				if($query_submissions->numRows() > $max_submissions) {
					// Too many submissions so far this hour
					echo $MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'];
					$success = false;
				} else {
					// Now send the email
					if($email_to != '') {
						if($email_from != '') {
							if($wb->mail($email_from,$email_to,$email_subject,$email_body,$email_fromname)) {
								$success = true;
							}
						} else {
							if($wb->mail('',$email_to,$email_subject,$email_body,$email_fromname)) { 
								$success = true; 
							}
						}
					}				
					if($success_email_to != '') {
						if($success_email_from != '') {
							if($wb->mail($success_email_from,$success_email_to,$success_email_subject,$success_email_text,$success_email_fromname)) {
								$success = true;
							}
						} else {
							if($wb->mail('',$success_email_to,$success_email_subject,$success_email_text,$success_email_fromname)) {
								$success = true;
							}
						}
					}				
			
					// Write submission to database
					if(isset($admin) AND $admin->is_authenticated() AND $admin->get_user_id() > 0) {
						$submitted_by = $admin->get_user_id();
					} else {
						$submitted_by = 0;
					}
					$email_body = $wb->add_slashes($email_body);
					$database->query("INSERT INTO ".TABLE_PREFIX."mod_form_submissions (page_id,section_id,submitted_when,submitted_by,body) VALUES ('".PAGE_ID."','$section_id','".mktime()."','$submitted_by','$email_body')");
					// Make sure submissions table isn't too full
					$query_submissions = $database->query("SELECT submission_id FROM ".TABLE_PREFIX."mod_form_submissions ORDER BY submitted_when");
					$num_submissions = $query_submissions->numRows();
					if($num_submissions > $stored_submissions) {
						// Remove excess submission
						$num_to_remove = $num_submissions-$stored_submissions;
						while($submission = $query_submissions->fetchRow()) {
							if($num_to_remove > 0) {
								$submission_id = $submission['submission_id'];
								$database->query("DELETE FROM ".TABLE_PREFIX."mod_form_submissions WHERE submission_id = '$submission_id'");
								$num_to_remove = $num_to_remove-1;
							}
						}
					}
					if(!$database->is_error()) {
						$success = true;
					}
				}
			}	
		}
	}
	
	// Now check if the email was sent successfully
	if(isset($success) AND $success == true) {
	    if ($success_page=='none') {
			echo str_replace("\n","<br />",$success_email_text);
  		} else {
			$query_menu = $database->query("SELECT link,target FROM ".TABLE_PREFIX."pages WHERE `page_id` = '$success_page'");
			if($query_menu->numRows() > 0) {
  	         	$fetch_settings = $query_menu->fetchRow();
			    $link = WB_URL.PAGES_DIRECTORY.$fetch_settings['link'].PAGE_EXTENSION;
			    echo "<script type='text/javascript'>location.href='".$link."';</script>";
			}    
		}
	} else {
		echo '<br />'.$TEXT['ERROR'];
	}
	
}

?>
