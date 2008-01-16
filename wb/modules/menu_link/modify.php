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

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }

// get target page_id
$table = TABLE_PREFIX.'mod_menu_link';
$sql_result = $database->query("SELECT * FROM $table WHERE section_id = '$section_id'");
$sql_row = $sql_result->fetchRow();
$target_page_id = $sql_row['target_page_id'];

// Get list of all visible page-links, except menu_links and actual page
$table_p = TABLE_PREFIX."pages";
$table_s = TABLE_PREFIX."sections";
$query_page = $database->query("SELECT DISTINCT p.* FROM $table_p AS p, $table_s AS s WHERE p.page_id=s.page_id AND s.module != 'menu_link' AND p.page_id != '$page_id' AND parent = '0' ORDER BY position");
if($query_page->numRows() > 0) {
	while($page = $query_page->fetchRow()) {
		if($admin->page_is_visible($page)) {
			$links[$page['page_id']]='/'.$page['menu_title'];
			$query_subpage = $database->query("SELECT DISTINCT p.* FROM $table_p AS p, $table_s AS s WHERE p.page_id=s.page_id AND s.module != 'menu_link' AND p.page_id != '$page_id' AND root_parent = '{$page['page_id']}' ORDER BY level");
			if($query_subpage->numRows() > 0) {
				while($sub = $query_subpage->fetchRow()) {
					if($admin->page_is_visible($sub)) {
						$links[$sub['page_id']]=$links[$sub['parent']].'/'.$sub['menu_title'];
					}
				}
			}
		}
	}
}

// get URL-target for actual page
$table = TABLE_PREFIX."pages";
$query_page = $database->query("SELECT target FROM $table WHERE page_id = '$page_id'");
$page = $query_page->fetchRow();
$target = $page['target'];

?>
<form action="<?php echo WB_URL ?>/modules/menu_link/save.php" method="post">
<input type="hidden" name="page_id" value="<?php echo $page_id ?>" />
<input type="hidden" name="section_id" value="<?php echo $section_id ?>" />
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
	<td>
		<?php echo $TEXT['LINK'].':' ?>
	</td>
	<td>
		<select name="link" style="WIDTH: 100%;" value="<?php echo "" ?>" />
		<?php
		foreach($links as $id=>$l) { ?>
			<option value="<?php echo $id ?>"<?php if($id==$target_page_id) echo ' selected'; ?>><?php echo $l ?></option>
		<?php } ?>
	</td>
</tr>
<tr>
	<td>
		<?php echo $TEXT['TARGET'].':' ?>
	</td>
	<td>
		<select name="target" style="WIDTH: 100%;" value="<?php echo "" ?>" />
			<option value="_blank"<?php if($target=='_blank') echo ' selected'; ?>><?php echo $TEXT['NEW_WINDOW'] ?></option>
			<option value="_self"<?php if($target=='_self') echo ' selected'; ?>><?php echo $TEXT['SAME_WINDOW'] ?></option>
			<option value="_top"<?php if($target=='_top') echo ' selected'; ?>><?php echo $TEXT['TOP_FRAME'] ?></option>
		</select>
	</td>
</tr>
</table>

<br />

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
	<td align="left">
		<input type="submit" value="<?php echo $TEXT['SAVE'] ?>" style="width: 100px; margin-top: 5px;" />
	</td>
	<td align="right">
		</form>
		<input type="button" value="<?php echo $TEXT['CANCEL'] ?>" onclick="javascript: window.location = 'index.php';" style="width: 100px; margin-top: 5px;" />
	</td>
</tr>
</table>

</form>

