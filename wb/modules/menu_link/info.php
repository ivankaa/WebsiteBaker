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

/* History:

2.6.1.1 - 16. Jan. 2008 - thorn
- added table mod_menu_link
- added install.php, delete.php, add.php
- changed wb/index.php: redirect if page is menu_link
- removed special-handling of menu_link in: admin/pages/settings2.php

*/

$module_directory = 'menu_link';
$module_name = 'Menu Link';
$module_function = 'page';
$module_version = '2.6.1.1';
$module_platform = '2.6.x';
$module_author = 'Ryan Djurovich, thorn';
$module_license = 'GNU General Public License';
$module_description = 'This module allows you to insert a link into the menu.';

?>
