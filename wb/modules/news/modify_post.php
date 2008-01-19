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

require('../../config.php');

// Get id
if(!isset($_GET['post_id']) OR !is_numeric($_GET['post_id'])) {
	header("Location: ".ADMIN_URL."/pages/index.php");
	exit(0);
} else {
	$post_id = $_GET['post_id'];
}

// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');

// Get header and footer
$query_content = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_news_posts WHERE post_id = '$post_id'");
$fetch_content = $query_content->fetchRow();

if (!defined('WYSIWYG_EDITOR') OR WYSIWYG_EDITOR=="none" OR !file_exists(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php')) {
	function show_wysiwyg_editor($name,$id,$content,$width,$height) {
		echo '<textarea name="'.$name.'" id="'.$id.'" style="width: '.$width.'; height: '.$height.';">'.$content.'</textarea>';
	}
} else {
	$id_list=array("short","long");
			require(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php');
}

// include jscalendar-setup
$jscal_use_time = false; // whether to use a clock, too
require_once(WB_PATH."/include/jscalendar/wb-setup.php");
// override some vars: (normally, there is no need to change this)
//$jscal_lang = "en"; //- calendar-language (default: wb-backend-language)
//$jscal_today = ""; // - date the calendar offers if the text-field is empty (default: today)
//$jscal_firstday = "0"; // - first-day-of-week (0-sunday, 1-monday, ...) (default: 0(EN) or 1(everything else))
//$jscal_format = "Y-m-d"; // - initial-format used for the text-field (default: from wb-backend-date-format)
//$jscal_ifformat = "%Y-%m-%d"; // - format for jscalendar (default: from wb-backend-date-format)

?>

<h2><?php echo $TEXT['ADD'].'/'.$TEXT['MODIFY'].' '.$TEXT['POST']; ?></h2>

<form name="modify" action="<?php echo WB_URL; ?>/modules/news/save_post.php" method="post" style="margin: 0;">

<input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
<input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
<input type="hidden" name="link" value="<?php echo $fetch_content['link']; ?>">

<table class="row_a" cellpadding="2" cellspacing="0" border="0" width="100%">
<tr>
	<td><?php echo $TEXT['TITLE']; ?>:</td>
	<td width="80%">
		<input type="text" name="title" value="<?php echo (htmlspecialchars($fetch_content['title'])); ?>" style="width: 98%;" maxlength="255" />
	</td>
</tr>
<tr>
	<td><?php echo $TEXT['GROUP']; ?>:</td>
	<td>
		<select name="group" style="width: 100%;">
			<option value="0"><?php echo $TEXT['NONE']; ?></option>
			<?php
			$query = $database->query("SELECT group_id,title FROM ".TABLE_PREFIX."mod_news_groups WHERE section_id = '$section_id' ORDER BY position ASC");
			if($query->numRows() > 0) {
				// Loop through groups
				while($group = $query->fetchRow()) {
					?>
					<option value="<?php echo $group['group_id']; ?>"<?php if($fetch_content['group_id'] == $group['group_id']) { echo ' selected'; } ?>><?php echo $group['title']; ?></option>
					<?php
				}
			}
			?>
		</select>
	</td>
</tr>
<tr>
	<td><?php echo $TEXT['COMMENTING']; ?>:</td>
	<td>
		<select name="commenting" style="width: 100%;">
			<option value="none"><?php echo $TEXT['DISABLED']; ?></option>
			<option value="public" <?php if($fetch_content['commenting'] == 'public') { echo 'selected'; } ?>><?php echo $TEXT['PUBLIC']; ?></option>
			<option value="private" <?php if($fetch_content['commenting'] == 'private') { echo 'selected'; } ?>><?php echo $TEXT['PRIVATE']; ?></option>
		</select>
	</td>
</tr>
<tr>
	<td><?php echo $TEXT['ACTIVE']; ?>:</td>
	<td>
		<input type="radio" name="active" id="active_true" value="1" <?php if($fetch_content['active'] == 1) { echo ' checked'; } ?> />
		<a href="#" onclick="javascript: document.getElementById('active_true').checked = true;">
		<?php echo $TEXT['YES']; ?>
		</a>
		&nbsp;
		<input type="radio" name="active" id="active_false" value="0" <?php if($fetch_content['active'] == 0) { echo ' checked'; } ?> />
		<a href="#" onclick="javascript: document.getElementById('active_false').checked = true;">
		<?php echo $TEXT['NO']; ?>
		</a>
	</td>
</tr>
<tr>
	<td><?php echo $TEXT['DATE']; ?>:</td>
	<td>
	<input type="text" id="publishdate" name="publishdate" value="<?php if($fetch_content['published_when']==0) print ""; else print date($jscal_format, $fetch_content['published_when'])?>" style="width: 120px;" />
	<img src="<?php echo WB_URL ?>/include/jscalendar/img.gif" id="publishdate_trigger" style="cursor: pointer; border: 1px solid red;" title="Calendar" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />
	</td>
</tr>
</table>

<table class="row_a" cellpadding="2" cellspacing="0" border="0" width="100%">
<tr>
	<td valign="top"><?php echo $TEXT['SHORT']; ?>:</td>
</tr>
<tr>
	<td>
	<?php
	show_wysiwyg_editor("short","short",htmlspecialchars($fetch_content['content_short']),"100%","135px");
	?>
	</td>
</tr>
<tr>
	<td valign="top"><?php echo $TEXT['LONG']; ?>:</td>
</tr>
<tr>
	<td>
	<?php
	show_wysiwyg_editor("long","long",htmlspecialchars($fetch_content['content_long']),"100%","300px");
	?>
	</td>
</tr>
</table>

<table cellpadding="2" cellspacing="0" border="0" width="100%">
<tr>
	<td align="left">
		<input name="save" type="submit" value="<?php echo $TEXT['SAVE']; ?>" style="width: 100px; margin-top: 5px;"></form>
	</td>
	<td align="right">
		<input type="button" value="<?php echo $TEXT['CANCEL']; ?>" onclick="javascript: window.location = '<?php echo ADMIN_URL; ?>/pages/modify.php?page_id=<?php echo $page_id; ?>';" style="width: 100px; margin-top: 5px;" />
	</td>
</tr>
</table>

<script type="text/javascript">
	Calendar.setup(
		{
			inputField  : "publishdate",
			ifFormat    : "<?php echo $jscal_ifformat ?>",
			button      : "publishdate_trigger",
			firstDay    : <?php echo $jscal_firstday ?>,
			<?php if(isset($jscal_use_time) && $jscal_use_time==TRUE) { ?>
				showsTime   : "true",
				timeFormat  : "24",
			<?php } ?>
			date        : "<?php echo $jscal_today ?>",
			range       : [1970, 2037],
			step        : 1
		}
	);
</script>

<br />

<h2><?php echo $TEXT['MODIFY'].'/'.$TEXT['DELETE'].' '.$TEXT['COMMENT']; ?></h2>

<?php

// Loop through existing posts
$query_comments = $database->query("SELECT * FROM `".TABLE_PREFIX."mod_news_comments` WHERE section_id = '$section_id' AND post_id = '$post_id' ORDER BY commented_when DESC");
if($query_comments->numRows() > 0) {
	$row = 'a';
	?>
	<table cellpadding="2" cellspacing="0" border="0" width="100%">
	<?php
	while($comment = $query_comments->fetchRow()) {
		?>
		<tr class="row_<?php echo $row; ?>" height="20">
			<td width="20" style="padding-left: 5px;">
				<a href="<?php echo WB_URL; ?>/modules/news/modify_comment.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&comment_id=<?php echo $comment['comment_id']; ?>" title="<?php echo $TEXT['MODIFY']; ?>">
					<img src="<?php echo ADMIN_URL; ?>/images/modify_16.png" border="0" alt="^" />
				</a>
			</td>	
			<td>
				<a href="<?php echo WB_URL; ?>/modules/news/modify_comment.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&comment_id=<?php echo $comment['comment_id']; ?>">
					<?php echo $comment['title']; ?>
				</a>
			</td>
			<td width="20">
				<a href="javascript: confirm_link('<?php echo $TEXT['ARE_YOU_SURE']; ?>', '<?php echo WB_URL; ?>/modules/news/delete_comment.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&post_id=<?php echo $post_id; ?>&comment_id=<?php echo $comment['comment_id']; ?>');" title="<?php echo $TEXT['DELETE']; ?>">
					<img src="<?php echo ADMIN_URL; ?>/images/delete_16.png" border="0" alt="X" />
				</a>
			</td>
		</tr>
		<?php
		// Alternate row color
		if($row == 'a') {
			$row = 'b';
		} else {
			$row = 'a';
		}
	}
	?>
	</table>
	<?php
} else {
	echo $TEXT['NONE_FOUND'];
}

?>



<?php

// Print admin footer
$admin->print_footer();

?>