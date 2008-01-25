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

// Include config file
require('../../config.php');

require_once(WB_PATH.'/framework/class.wb.php');
$wb = new wb;

// Check if we should show the form or add a comment
if(is_numeric($_GET['page_id']) AND is_numeric($_GET['section_id']) AND isset($_GET['post_id']) AND is_numeric($_GET['post_id']) AND isset($_POST['comment']) AND $_POST['comment'] != '') {
	
	// Check captcha
	$query_settings = $database->query("SELECT use_captcha FROM ".TABLE_PREFIX."mod_news_settings WHERE section_id = '".$_GET['section_id']."'");
	if($query_settings->numRows() == 0) { 
		exit(header("Location: ".WB_URL.PAGES_DIRECTORY.""));
	} else {
		$settings = $query_settings->fetchRow();
		$t=time();
		if(ENABLED_ASP && ( // Advanced Spam Protection
			($_SESSION['session_started']+ASP_SESSION_MIN_AGE > $t) OR // session too young
			(!isset($_SESSION['comes_from_view'])) OR // user doesn't come from view.php
			(!isset($_SESSION['comes_from_view_time']) OR $_SESSION['comes_from_view_time'] > $t-ASP_VIEW_MIN_AGE) OR // user is too fast
			(!isset($_SESSION['submitted_when']) OR !isset($_POST['submitted_when'])) OR // faked form
			($_SESSION['submitted_when'] != $_POST['submitted_when']) OR // faked form
			($_SESSION['submitted_when'] > $t-ASP_INPUT_MIN_AGE) OR // user too fast
			($_SESSION['submitted_when'] < $t-43200) OR // form older than 12h
			($_POST['email'] OR $_POST['url'] OR $_POST['homepage']) // honeypot-fields
		)) {
			exit(header("Location: ".WB_URL.PAGES_DIRECTORY.""));
		}
		if($settings['use_captcha']) {
			if(isset($_POST['captcha']) AND $_POST['captcha'] != '') {
				// Check for a mismatch
				if(!isset($_POST['captcha']) OR !isset($_SESSION['captcha']) OR $_POST['captcha'] != $_SESSION['captcha']) {
					$_SESSION['captcha_error'] = $MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'];
					$_SESSION['comment_title'] = $_POST['title'];
					$_SESSION['comment_body'] = $_POST['comment'];
					exit(header('Location: '.WB_URL."/modules/news/comment.php?id={$_GET['post_id']}&sid={$_GET['section_id']}"));
				}
			} else {
				$_SESSION['captcha_error'] = $MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'];
				$_SESSION['comment_title'] = $_POST['title'];
				$_SESSION['comment_body'] = $_POST['comment'];
				exit(header('Location: '.WB_URL."/modules/news/comment.php?id={$_GET['post_id']}&sid={$_GET['section_id']}"));
			}
		}
	}
	if(isset($_SESSION['captcha'])) { unset($_SESSION['captcha']); }
	if(ENABLED_ASP) {
		unset($_SESSION['comes_from_view']);
		unset($_SESSION['comes_from_view_time']);
		unset($_SESSION['submitted_when']);
	}

	// Insert the comment into db
	$page_id = $_GET['page_id'];
	$section_id = $_GET['section_id'];
	$post_id = $_GET['post_id'];
	$title = $wb->add_slashes(strip_tags($_POST['title']));
	$comment = $wb->add_slashes(strip_tags($_POST['comment']));
	$commented_when = mktime();
	if($wb->is_authenticated() == true) {
		$commented_by = $wb->get_user_id();
	} else {
		$commented_by = '';
	}
	$query = $database->query("INSERT INTO ".TABLE_PREFIX."mod_news_comments (section_id,page_id,post_id,title,comment,commented_when,commented_by) VALUES ('$section_id','$page_id','$post_id','$title','$comment','$commented_when','$commented_by')");
	// Get page link
	$query_page = $database->query("SELECT link FROM ".TABLE_PREFIX."mod_news_posts WHERE post_id = '$post_id'");
	$page = $query_page->fetchRow();
	header('Location: '.$wb->page_link($page['link']).'?id='.$post_id);
} else {
	header('Location: '.WB_URL."/modules/news/comment.php?id={$_GET['post_id']}&sid={$_GET['section_id']}");
}

?>