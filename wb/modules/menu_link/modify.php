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

// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }

// get target page_id
$table = TABLE_PREFIX.'mod_menu_link';
$sql_result = $database->query("SELECT * FROM $table WHERE section_id = '$section_id'");
$sql_row = $sql_result->fetchRow();
$target_page_id = $sql_row['target_page_id'];
$anchor = $sql_row['anchor'];
$sel = ' selected';

// Get list of all visible page-links, except menu_links and actual page
$links = array();
$table_p = TABLE_PREFIX."pages";
$table_s = TABLE_PREFIX."sections";
if($query_page = $database->query("SELECT DISTINCT p.* FROM $table_p AS p INNER JOIN $table_s AS s ON p.page_id=s.page_id WHERE s.module != 'menu_link' AND p.page_id != '$page_id' AND parent = '0' ORDER BY position")) {
	while($page = $query_page->fetchRow()) {
		if($admin->page_is_visible($page)) {
			$links[$page['page_id']]='/'.$page['page_title'];
			if($query_subpage = $database->query("SELECT DISTINCT p.* FROM $table_p AS p INNER JOIN $table_s AS s ON p.page_id=s.page_id WHERE s.module != 'menu_link' AND p.page_id != '$page_id' AND root_parent = '{$page['page_id']}' ORDER BY level")) {
				while($sub = $query_subpage->fetchRow()) {
					if($admin->page_is_visible($sub)) {
						$parent_link = (array_key_exists($sub['parent'],$links))?$links[$sub['parent']]:"";
						$links[$sub['page_id']]=$parent_link.'/'.$sub['page_title'];
					}
				}
			}
		}
	}
}
// Get list of targets (id=... or <a name ...>) from pages in $links
$targets = array();
$table_mw = TABLE_PREFIX."mod_wysiwyg";
$table_s = TABLE_PREFIX."sections";
foreach($links as $pid=>$l) {
	if($query_section = $database->query("SELECT section_id, module FROM $table_s WHERE page_id = '$pid' ORDER BY position")) {
		while($section = $query_section->fetchRow()) {
			$targets[$pid][] = "wb_section_{$section['section_id']}";
			if($section['module'] == 'wysiwyg') {
				if($query_page = $database->query("SELECT content FROM $table_mw WHERE section_id = '{$section['section_id']}' LIMIT 1")) {
					$page = $query_page->fetchRow();
					if(preg_match_all('/<(?:[^>]+id|\s*a[^>]+name)\s*=\s*"(.*)"/iuU',$page['content'], $match)) {
						foreach($match[1] AS $t) {
							$targets[$pid][] = $t;
						}
					}
				}
			}
		}
	}
}
// get target-window for actual page
$table = TABLE_PREFIX."pages";
$query_page = $database->query("SELECT target FROM $table WHERE page_id = '$page_id'");
$page = $query_page->fetchRow();
$target = $page['target'];


// script for target-select-box
?>
<script type="text/javascript">
	function populate()
	{
		o=document.getElementById('page_link');
		d=document.getElementById('page_target');
		if(!d){return;}			
		var mitems=new Array();
		mitems['0']=[' ','0'];
		<?php
		foreach($links AS $pid=>$link) {
			$str="mitems['$pid']=[";
			$str.="' ',";
			$str.="'0',";
			if(is_array($targets) && is_array($targets[$pid])) {
				foreach($targets[$pid] AS $value) {
					$str.="'#$value',";
					$str.="'$value',";
				}
				$str=rtrim($str, ',');
				$str.="];\n";
			}
			echo $str;
		}
		?>
		d.options.length=0;
		cur=mitems[o.options[o.selectedIndex].value];
		if(!cur){return;}
		d.options.length=cur.length/2;
		j=0;
		for(var i=0;i<cur.length;i=i+2)
		{
			d.options[j].text=cur[i];
			d.options[j++].value=cur[i+1];
		}
	}
</script>

<form action="<?php echo WB_URL ?>/modules/menu_link/save.php" method="post">
<input type="hidden" name="page_id" value="<?php echo $page_id ?>" />
<input type="hidden" name="section_id" value="<?php echo $section_id ?>" />
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
	<td>
		<?php echo $TEXT['LINK'].':' ?>
	</td>
	<td>
		<select name="page_link" id="page_link" onchange="populate()" style="width: 100%;">
			<option value="0"<?php echo $target_page_id=='0'?$sel:''?>><?php echo $TEXT['PLEASE_SELECT']; ?></option>
			<?php foreach($links AS $pid=>$link) {
				echo "<option value=\"$pid\" ".($target_page_id==$pid?$sel:'').">$link</option>";
			} ?>
		</select>
	</td>
</tr>
<tr>
	<td>
		<?php echo $TEXT['ANCHOR'].':' ?>
	</td>
	<td>
		<select name="page_target" id="page_target" onfocus="populate()" style="width: 100%;">
			<option value="<?php echo $anchor ?>" selected><?php echo $anchor=='0'?' ':'#'.$anchor ?></option>
		</select>
	</td>
</tr>
<tr>
	<td>
		<?php echo $TEXT['TARGET'].':' ?>
	</td>
	<td>
		<select name="target" style="width: 100%" />
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

