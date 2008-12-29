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

$header = '<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"98%\">';
$post_loop = '<tr class=\"post_top\">
<td class=\"post_title\"><a href=\"[LINK]\">[TITLE]</a></td>
<td class=\"post_date\">[PUBLISHED_TIME], [PUBLISHED_DATE]</td>
</tr>
<tr>
<td class=\"post_short\" colspan=\"2\">
[SHORT] 
<a href=\"[LINK]\">[TEXT_READ_MORE]</a>
</td>
</tr>';
$footer = '</table>
<table cellpadding="0" cellspacing="0" border="0" width="98%" style="display: [DISPLAY_PREVIOUS_NEXT_LINKS]">
<tr>
<td width="35%" align="left">[PREVIOUS_PAGE_LINK]</td>
<td width="30%" align="center">[OF]</td>
<td width="35%" align="right">[NEXT_PAGE_LINK]</td>
</tr>
</table>';
$post_header = addslashes('<table cellpadding="0" cellspacing="0" border="0" width="98%">
<tr>
<td height="30"><h1>[TITLE]</h1></td>
<td rowspan="3" style="display: [DISPLAY_IMAGE]"><img src="[GROUP_IMAGE]" alt="[GROUP_TITLE]" /></td>
</tr>
<tr>
<td valign="top"><b>Posted by [DISPLAY_NAME] ([USERNAME]) on [PUBLISHED_DATE]</b></td>
</tr>
<tr style="display: [DISPLAY_GROUP]">
<td valign="top"><a href="[BACK]">[PAGE_TITLE]</a> >> <a href="[BACK]?g=[GROUP_ID]">[GROUP_TITLE]</a></td>
</tr>
</table>');
$post_footer = '<p>Last changed: [MODI_DATE] at [MODI_TIME]</p>
<a href=\"[BACK]\">Back</a>';
$comments_header = addslashes('<br /><br />
<h2>Comments</h2>
<table cellpadding="2" cellspacing="0" border="0" width="98%">');
$comments_loop = addslashes('<tr>
<td class="comment_title">[TITLE]</td>
<td class="comment_info">By [DISPLAY_NAME] on [DATE] at [TIME]</td>
</tr>
<tr>
<td colspan="2" class="comment_text">[COMMENT]</td>
</tr>');
$comments_footer = '</table>
<br /><a href=\"[ADD_COMMENT_URL]\">Add Comment</a>';
$comments_page = '<h1>Comment</h1>
<h2>[POST_TITLE]</h2>
<br />';
$commenting = 'none';
$use_captcha = true;
$database->query("INSERT INTO ".TABLE_PREFIX."mod_news_settings (section_id,page_id,header,post_loop,footer,post_header,post_footer,comments_header,comments_loop,comments_footer,comments_page,commenting,use_captcha) VALUES ('$section_id','$page_id','$header','$post_loop','$footer','$post_header','$post_footer','$comments_header','$comments_loop','$comments_footer','$comments_page','$commenting','$use_captcha')");

?>