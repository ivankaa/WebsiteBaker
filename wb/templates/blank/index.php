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

if(!defined('WB_URL')) {
	header('Location: ../index.php');
	exit(0);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php page_title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php if(defined('DEFAULT_CHARSET')) { echo DEFAULT_CHARSET; } else { echo 'utf-8'; }?>" />
<meta name="description" content="<?php page_description(); ?>" />
<meta name="keywords" content="<?php page_keywords(); ?>" />
<link href="<?php echo TEMPLATE_DIR; ?>/screen.css" rel="stylesheet" type="text/css" media="screen" />
<?php
// this allows to include the optional module files (frontend.css, frontend.js) into the head section
if(function_exists('register_frontend_modfiles')) {
  register_frontend_modfiles('css');
  register_frontend_modfiles('js');
} ?>
<?php 
// this allows to add custom information to the head section of your template (WB-->Settings-->Website Header)
echo WEBSITE_HEADER; 
?>
</head>


<body>
<?php 
	// display menu
	show_menu();
	
	// display page content
	page_content(); 
	
	// display website footer
	page_footer();
?>
</body>
</html>