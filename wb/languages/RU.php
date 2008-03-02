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

// Define that this file is loaded
if(!defined('LANGUAGE_LOADED')) {
	define('LANGUAGE_LOADED', true);
}

// Set the language information
$language_code = 'RU';
$language_name = 'Russian';
$language_version = '2.7';
$language_platform = '2.7.x';
$language_author = 'Bulat N (&#1066;I&#1092;)';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = '&#1043;&#1083;&#1072;&#1074;&#1085;&#1072;&#1103;';
$MENU['PAGES'] = '&#1057;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1099;';
$MENU['MEDIA'] = '&#1052;&#1077;&#1076;&#1080;&#1072;';
$MENU['ADDONS'] = '&#1040;&#1076;&#1076;&#1086;&#1085;&#1099;';
$MENU['MODULES'] = '&#1052;&#1086;&#1076;&#1091;&#1083;&#1080;';
$MENU['TEMPLATES'] = '&#1064;&#1072;&#1073;&#1083;&#1086;&#1085;&#1099;';
$MENU['LANGUAGES'] = '&#1071;&#1079;&#1099;&#1082;&#1080;';
$MENU['PREFERENCES'] = '&#1057;&#1074;&#1086;&#1081;&#1089;&#1090;&#1074;&#1072;';
$MENU['SETTINGS'] = '&#1053;&#1072;&#1089;&#1090;&#1088;&#1086;&#1081;&#1082;&#1080;';
$MENU['ADMINTOOLS'] = 'Admin-Tools'; //needs to be translated
$MENU['ACCESS'] = '&#1044;&#1086;&#1089;&#1090;&#1091;&#1087;';
$MENU['USERS'] = '&#1055;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1080;';
$MENU['GROUPS'] = '&#1043;&#1088;&#1091;&#1087;&#1087;&#1099;';
$MENU['HELP'] = '&#1055;&#1086;&#1084;&#1086;&#1097;&#1100;';
$MENU['VIEW'] = '&#1053;&#1072; &#1089;&#1072;&#1081;&#1090;';
$MENU['LOGOUT'] = '&#1042;&#1099;&#1093;&#1086;&#1076;';
$MENU['LOGIN'] = '&#1042;&#1093;&#1086;&#1076;';
$MENU['FORGOT'] = '&#1047;&#1072;&#1073;&#1099;&#1083;&#1080; &#1087;&#1072;&#1088;&#1086;&#1083;&#1100;?';

// Section overviews
$OVERVIEW['START'] = 'Administration overview';
$OVERVIEW['PAGES'] = '&#1059;&#1087;&#1088;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1072;&#1084;&#1080; &#1089;&#1072;&#1081;&#1090;&#1072;...';
$OVERVIEW['MEDIA'] = '&#1059;&#1087;&#1088;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077; &#1092;&#1072;&#1081;&#1083;&#1072;&#1084;&#1080; &#1074; &#1087;&#1072;&#1087;&#1082;&#1077; Media...';
$OVERVIEW['MODULES'] = '&#1059;&#1087;&#1088;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077; &#1084;&#1086;&#1076;&#1091;&#1083;&#1103;&#1084;&#1080;...';
$OVERVIEW['TEMPLATES'] = 'Change the look and feel of your website with templates...';
$OVERVIEW['LANGUAGES'] = '&#1059;&#1087;&#1088;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077; &#1103;&#1079;&#1099;&#1082;&#1086;&#1074;&#1099;&#1084;&#1080; &#1087;&#1072;&#1082;&#1077;&#1090;&#1072;&#1084;&#1080;...';
$OVERVIEW['PREFERENCES'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1077;&#1085;&#1080;&#1077; &#1089;&#1074;&#1086;&#1081;&#1089;&#1090;&#1074; &#1089;&#1072;&#1081;&#1090;&#1072;, &#1090;&#1072;&#1082;&#1080;&#1077; &#1082;&#1072;&#1082; email &#1072;&#1076;&#1088;&#1077;&#1089;, &#1087;&#1072;&#1088;&#1086;&#1083;&#1100; &#1072;&#1076;&#1084;&#1080;&#1085;&#1080;&#1089;&#1090;&#1088;&#1072;&#1090;&#1086;&#1088;&#1072;, &#1080;.&#1090;.&#1076;.... ';
$OVERVIEW['SETTINGS'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1077;&#1085;&#1080;&#1077; &#1085;&#1072;&#1089;&#1090;&#1088;&#1086;&#1077;&#1082; &#1089;&#1072;&#1081;&#1090;&#1072;...';
$OVERVIEW['USERS'] = '&#1059;&#1087;&#1088;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1103;&#1084;&#1080; &#1082;&#1086;&#1090;&#1086;&#1088;&#1099;&#1077; &#1084;&#1086;&#1075;&#1091;&#1090; &#1072;&#1076;&#1084;&#1080;&#1085;&#1080;&#1089;&#1090;&#1088;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100; &#1089;&#1072;&#1081;&#1090;...';
$OVERVIEW['GROUPS'] = '&#1059;&#1087;&#1088;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077; &#1075;&#1088;&#1091;&#1087;&#1087;&#1072;&#1084;&#1080; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1077;&#1081; &#1080; &#1080;&#1093; &#1087;&#1088;&#1072;&#1074;&#1072;&#1084;&#1080;...';
$OVERVIEW['HELP'] = '&#1045;&#1089;&#1090;&#1100; &#1074;&#1086;&#1087;&#1088;&#1086;&#1089;&#1099;? &#1053;&#1072;&#1081;&#1076;&#1080; &#1086;&#1090;&#1074;&#1077;&#1090;...';
$OVERVIEW['VIEW'] = '&#1041;&#1099;&#1089;&#1090;&#1088;&#1099;&#1081; &#1087;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088; &#1042;&#1072;&#1096;&#1077;&#1075;&#1086; &#1089;&#1072;&#1081;&#1090;&#1072; &#1074; &#1085;&#1086;&#1074;&#1086;&#1084; &#1086;&#1082;&#1085;&#1077;...';
$OVERVIEW['ADMINTOOLS'] = 'Access the Website Baker administration tools...'; //needs to be translated

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100;/&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1091;';
$HEADING['DELETED_PAGES'] = '&#1059;&#1076;&#1072;&#1083;&#1077;&#1085;&#1085;&#1099;&#1077; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1099;';
$HEADING['ADD_PAGE'] = '&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1091;';
$HEADING['ADD_HEADING'] = '&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1079;&#1072;&#1075;&#1086;&#1083;&#1086;&#1074;&#1086;&#1082;';
$HEADING['MODIFY_PAGE'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1091;';
$HEADING['MODIFY_PAGE_SETTINGS'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; Page Settings';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Modify Advanced Page Settings';
$HEADING['MANAGE_SECTIONS'] = 'Manage Sections';
$HEADING['MODIFY_INTRO_PAGE'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1085;&#1072;&#1095;&#1072;&#1083;&#1100;&#1085;&#1091;&#1102; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1091;';

$HEADING['BROWSE_MEDIA'] = '&#1054;&#1073;&#1079;&#1086;&#1088; Media';
$HEADING['CREATE_FOLDER'] = '&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100; &#1087;&#1072;&#1087;&#1082;&#1091;';
$HEADING['UPLOAD_FILES'] = '&#1047;&#1072;&#1075;&#1088;&#1091;&#1079;&#1080;&#1090;&#1100;';

$HEADING['INSTALL_MODULE'] = '&#1059;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1080;&#1090;&#1100; &#1084;&#1086;&#1076;&#1091;&#1083;&#1100;';
$HEADING['UNINSTALL_MODULE'] = '&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100; &#1084;&#1086;&#1076;&#1091;&#1083;&#1100;';
$HEADING['MODULE_DETAILS'] = '&#1048;&#1085;&#1092;&#1086;&#1088;&#1084;&#1072;&#1094;&#1080;&#1103; &#1086; &#1084;&#1086;&#1076;&#1091;&#1083;&#1077;';

$HEADING['INSTALL_TEMPLATE'] = '&#1059;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1080;&#1090;&#1100; &#1096;&#1072;&#1073;&#1083;&#1086;&#1085;';
$HEADING['UNINSTALL_TEMPLATE'] = '&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100; &#1096;&#1072;&#1073;&#1083;&#1086;&#1085;';
$HEADING['TEMPLATE_DETAILS'] = '&#1044;&#1072;&#1085;&#1085;&#1099;&#1077; &#1096;&#1072;&#1073;&#1083;&#1086;&#1085;&#1072;';

$HEADING['INSTALL_LANGUAGE'] = '&#1059;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1080;&#1090;&#1100; &#1103;&#1079;. &#1087;&#1072;&#1082;&#1077;&#1090;';
$HEADING['UNINSTALL_LANGUAGE'] = '&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100; &#1103;&#1079;. &#1087;&#1072;&#1082;&#1077;&#1090;';
$HEADING['LANGUAGE_DETAILS'] = '&#1054; &#1103;&#1079;&#1099;&#1082;&#1086;&#1074;&#1086;&#1084; &#1087;&#1072;&#1082;&#1077;&#1090;&#1077;';

$HEADING['MY_SETTINGS'] = '&#1052;&#1086;&#1080; &#1085;&#1072;&#1089;&#1090;&#1088;&#1086;&#1081;&#1082;&#1080;';
$HEADING['MY_EMAIL'] = '&#1052;&#1086;&#1081; Email';
$HEADING['MY_PASSWORD'] = '&#1052;&#1086;&#1081; &#1087;&#1072;&#1088;&#1086;&#1083;&#1100;';

$HEADING['GENERAL_SETTINGS'] = '&#1054;&#1089;&#1085;&#1086;&#1074;&#1085;&#1099;&#1077; &#1085;&#1072;&#1089;&#1090;&#1088;&#1086;&#1081;&#1082;&#1080;';
$HEADING['DEFAULT_SETTINGS'] = '&#1053;&#1072;&#1089;&#1090;&#1088;&#1086;&#1081;&#1082;&#1080; &#1087;&#1086; &#1091;&#1084;&#1086;&#1083;&#1095;&#1072;&#1085;&#1080;&#1102;';
$HEADING['SEARCH_SETTINGS'] = '&#1053;&#1072;&#1089;&#1090;&#1088;&#1086;&#1081;&#1082;&#1080; &#1087;&#1086;&#1080;&#1089;&#1082;&#1072;';
$HEADING['FILESYSTEM_SETTINGS'] = '&#1053;&#1072;&#1089;&#1090;&#1088;&#1086;&#1081;&#1082;&#1080; &#1092;&#1072;&#1081;&#1083;&#1086;&#1074;&#1086;&#1081; &#1089;&#1080;&#1089;&#1090;&#1077;&#1084;&#1099;';
$HEADING['SERVER_SETTINGS'] = '&#1053;&#1072;&#1089;&#1090;&#1088;&#1086;&#1081;&#1082;&#1080; &#1089;&#1077;&#1088;&#1074;&#1077;&#1088;&#1072;';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings'; //needs to be translated
$HEADING['ADMINISTRATION_TOOLS'] = '&#1057;&#1088;&#1077;&#1076;&#1089;&#1090;&#1074;&#1072; &#1072;&#1076;&#1084;&#1080;&#1085;&#1080;&#1089;&#1090;&#1088;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1080;&#1103;';

$HEADING['MODIFY_DELETE_USER'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100;/&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1103;';
$HEADING['ADD_USER'] = '&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1103;';
$HEADING['MODIFY_USER'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1103;';

$HEADING['MODIFY_DELETE_GROUP'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100;/&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100; &#1075;&#1088;&#1091;&#1087;&#1087;&#1091;';
$HEADING['ADD_GROUP'] = '&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1075;&#1088;&#1091;&#1087;&#1087;&#1091;';
$HEADING['MODIFY_GROUP'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1075;&#1088;&#1091;&#1087;&#1087;&#1091;';

// Other text
$TEXT['OPEN'] = 'Open'; //needs to be translated
$TEXT['ADD'] = '&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100;';
$TEXT['MODIFY'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100;';
$TEXT['SETTINGS'] = '&#1053;&#1072;&#1089;&#1090;&#1088;&#1086;&#1081;&#1082;&#1080;';
$TEXT['DELETE'] = '&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100;';
$TEXT['SAVE'] = '&#1057;&#1086;&#1093;&#1088;&#1072;&#1085;&#1080;&#1090;&#1100;';
$TEXT['RESET'] = '&#1054;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100;';
$TEXT['LOGIN'] = '&#1042;&#1093;&#1086;&#1076;';
$TEXT['RELOAD'] = '&#1054;&#1073;&#1085;&#1086;&#1074;&#1080;&#1090;&#1100;';
$TEXT['CANCEL'] = '&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;';
$TEXT['NAME'] = '&#1048;&#1084;&#1103;';
$TEXT['PLEASE_SELECT'] = '&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077;';
$TEXT['TITLE'] = '&#1047;&#1072;&#1075;&#1086;&#1083;&#1086;&#1074;&#1086;&#1082;';
$TEXT['PARENT'] = '&#1056;&#1086;&#1076;&#1080;&#1090;&#1077;&#1083;&#1100;';
$TEXT['TYPE'] = '&#1058;&#1080;&#1087;';
$TEXT['VISIBILITY'] = '&#1042;&#1080;&#1076;&#1080;&#1084;&#1086;&#1089;&#1090;&#1100;';
$TEXT['PRIVATE'] = '&#1053;&#1091; &#1087;&#1091;&#1073;&#1083;&#1080;&#1082;&#1086;&#1074;&#1072;&#1090;&#1100;';
$TEXT['PUBLIC'] = '&#1055;&#1091;&#1073;&#1083;&#1080;&#1082;&#1086;&#1074;&#1072;&#1090;&#1100;';
$TEXT['NONE'] = '&#1053;&#1077;&#1090;';
$TEXT['NONE_FOUND'] = '&#1053;&#1077; &#1085;&#1072;&#1081;&#1076;&#1077;&#1085;&#1086;';
$TEXT['CURRENT'] = '&#1058;&#1077;&#1082;&#1091;&#1097;&#1077;&#1077;';
$TEXT['CHANGE'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100;';
$TEXT['WINDOW'] = '&#1054;&#1082;&#1085;&#1086;';
$TEXT['DESCRIPTION'] = '&#1054;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1077;';
$TEXT['KEYWORDS'] = '&#1050;&#1083;&#1102;&#1095;&#1077;&#1074;&#1099;&#1077; &#1089;&#1083;&#1086;&#1074;&#1072;';
$TEXT['ADMINISTRATORS'] = '&#1040;&#1076;&#1084;&#1080;&#1085;&#1080;&#1089;&#1090;&#1088;&#1072;&#1090;&#1086;&#1088;&#1099;';
$TEXT['PRIVATE_VIEWERS'] = '&#1047;&#1072;&#1088;&#1077;&#1075;&#1080;&#1089;&#1090;&#1088;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1085;&#1099;&#1077; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1080;';
$TEXT['EXPAND'] = 'Expand';
$TEXT['COLLAPSE'] = 'Collapse';
$TEXT['MOVE_UP'] = '&#1042;&#1074;&#1077;&#1088;&#1093;';
$TEXT['MOVE_DOWN'] = '&#1042;&#1085;&#1080;&#1079;';
$TEXT['RENAME'] = '&#1087;&#1077;&#1088;&#1077;&#1080;&#1084;&#1077;&#1085;&#1086;&#1074;&#1072;&#1090;&#1100;';
$TEXT['MODIFY_SETTINGS'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1085;&#1072;&#1089;&#1090;&#1088;&#1086;&#1081;&#1082;&#1080;';
$TEXT['MODIFY_CONTENT'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1089;&#1086;&#1076;&#1077;&#1088;&#1078;&#1072;&#1085;&#1080;&#1077;';
$TEXT['VIEW'] = '&#1087;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088;';
$TEXT['UP'] = '&#1042;&#1074;&#1077;&#1088;&#1093;';
$TEXT['FORGOTTEN_DETAILS'] = '&#1047;&#1072;&#1073;&#1099;&#1083;&#1080; &#1042;&#1072;&#1096;&#1080; &#1076;&#1072;&#1085;&#1085;&#1099;&#1077;?';
$TEXT['NEED_TO_LOGIN'] = '&#1053;&#1091;&#1078;&#1085;&#1086; &#1072;&#1074;&#1090;&#1086;&#1088;&#1080;&#1079;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100;&#1089;&#1103;?';
$TEXT['SEND_DETAILS'] = '&#1055;&#1086;&#1089;&#1083;&#1072;&#1090;&#1100; &#1076;&#1072;&#1085;&#1085;&#1099;&#1077;';
$TEXT['USERNAME'] = '&#1051;&#1086;&#1075;&#1080;&#1085;';
$TEXT['PASSWORD'] = '&#1055;&#1072;&#1088;&#1086;&#1083;&#1100;';
$TEXT['HOME'] = '&#1043;&#1083;&#1072;&#1074;&#1085;&#1072;&#1103;';
$TEXT['TARGET_FOLDER'] = '&#1042; &#1087;&#1072;&#1087;&#1082;&#1091;';
$TEXT['OVERWRITE_EXISTING'] = '&#1047;&#1072;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1089;&#1091;&#1097;&#1077;&#1089;&#1090;&#1074;&#1091;&#1102;&#1097;&#1080;&#1081;';
$TEXT['FILE'] = '&#1060;&#1072;&#1081;&#1083;';
$TEXT['FILES'] = '&#1060;&#1072;&#1081;&#1083;&#1099;';
$TEXT['FOLDER'] = '&#1055;&#1072;&#1087;&#1082;&#1072;';
$TEXT['FOLDERS'] = '&#1055;&#1072;&#1087;&#1082;&#1080;';
$TEXT['CREATE_FOLDER'] = '&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100; &#1087;&#1072;&#1087;&#1082;&#1091;';
$TEXT['UPLOAD_FILES'] = '&#1047;&#1072;&#1075;&#1088;&#1091;&#1079;&#1080;&#1090;&#1100; &#1092;&#1072;&#1081;&#1083;';
$TEXT['CURRENT_FOLDER'] = '&#1058;&#1077;&#1082;&#1091;&#1097;&#1072;&#1103; &#1087;&#1072;&#1087;&#1082;&#1072;';
$TEXT['TO'] = '&#1042;';
$TEXT['FROM'] = '&#1048;&#1079;';
$TEXT['INSTALL'] = '&#1059;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1080;&#1090;&#1100;';
$TEXT['UNINSTALL'] = '&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100;';
$TEXT['VIEW_DETAILS'] = '&#1048;&#1085;&#1092;&#1086;&#1088;&#1084;&#1072;&#1094;&#1080;&#1103;';
$TEXT['DISPLAY_NAME'] = '&#1055;&#1086;&#1082;&#1072;&#1079;&#1099;&#1074;&#1072;&#1090;&#1100; &#1080;&#1084;&#1103;';
$TEXT['AUTHOR'] = '&#1040;&#1074;&#1090;&#1086;&#1088;';
$TEXT['VERSION'] = '&#1042;&#1077;&#1088;&#1089;&#1080;&#1103;';
$TEXT['DESIGNED_FOR'] = '&#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1086; &#1076;&#1083;&#1103;';
$TEXT['DESCRIPTION'] = '&#1054;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1077;';
$TEXT['EMAIL'] = 'Email';
$TEXT['LANGUAGE'] = '&#1071;&#1079;&#1099;&#1082;';
$TEXT['TIMEZONE'] = '&#1063;&#1072;&#1089;&#1086;&#1074;&#1086;&#1081; &#1087;&#1086;&#1103;&#1089;';
$TEXT['CURRENT_PASSWORD'] = '&#1058;&#1077;&#1082;&#1091;&#1097;&#1080;&#1081; &#1087;&#1072;&#1088;&#1086;&#1083;&#1100;';
$TEXT['NEW_PASSWORD'] = '&#1053;&#1086;&#1074;&#1099;&#1081; &#1087;&#1072;&#1088;&#1086;&#1083;&#1100;';
$TEXT['RETYPE_NEW_PASSWORD'] = '&#1055;&#1086;&#1074;&#1090;&#1086;&#1088;&#1080;&#1090;&#1077; &#1085;&#1086;&#1074;&#1099;&#1081; &#1087;&#1072;&#1088;&#1086;&#1083;&#1100;';
$TEXT['ACTIVE'] = '&#1040;&#1082;&#1090;&#1080;&#1074;&#1085;&#1086;';
$TEXT['DISABLED'] = '&#1042;&#1099;&#1082;&#1083;&#1102;&#1095;&#1077;&#1085;&#1086;';
$TEXT['ENABLED'] = '&#1042;&#1082;&#1083;&#1102;&#1095;&#1077;&#1085;&#1086;';
$TEXT['RETYPE_PASSWORD'] = '&#1055;&#1086;&#1074;&#1090;&#1086;&#1088;&#1080;&#1090;&#1077; &#1087;&#1072;&#1088;&#1086;&#1083;&#1100;';
$TEXT['GROUP'] = '&#1043;&#1088;&#1091;&#1087;&#1087;&#1072;';
$TEXT['SYSTEM_PERMISSIONS'] = '&#1057;&#1080;&#1089;&#1090;&#1077;&#1084;&#1085;&#1099;&#1077; &#1087;&#1088;&#1072;&#1074;&#1072;';
$TEXT['MODULE_PERMISSIONS'] = '&#1055;&#1088;&#1072;&#1074;&#1072; &#1084;&#1086;&#1076;&#1091;&#1083;&#1103;';
$TEXT['SHOW_ADVANCED'] = '&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100; &#1076;&#1086;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1077;&#1083;&#1100;&#1085;&#1099;&#1077; &#1086;&#1087;&#1094;&#1080;&#1080;';
$TEXT['HIDE_ADVANCED'] = '&#1057;&#1082;&#1088;&#1099;&#1090;&#1100; &#1076;&#1086;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1077;&#1083;&#1100;&#1085;&#1099;&#1077; &#1086;&#1087;&#1094;&#1080;&#1080;';
$TEXT['BASIC'] = '&#1054;&#1089;&#1085;&#1086;&#1074;&#1085;&#1086;&#1081;';
$TEXT['ADVANCED'] = '&#1056;&#1072;&#1089;&#1096;&#1080;&#1088;&#1077;&#1085;&#1085;&#1099;&#1081;';
$TEXT['WEBSITE'] = '&#1042;&#1077;&#1073;&#1089;&#1072;&#1081;&#1090;';
$TEXT['DEFAULT'] = '&#1055;&#1086; &#1091;&#1084;&#1086;&#1083;&#1095;&#1072;&#1085;&#1080;&#1102;';
$TEXT['KEYWORDS'] = '&#1050;&#1083;&#1102;&#1095;&#1077;&#1074;&#1099;&#1077; &#1089;&#1083;&#1086;&#1074;&#1072;';
$TEXT['TEXT'] = '&#1058;&#1077;&#1082;&#1089;&#1090;';
$TEXT['HEADER'] = 'Header';
$TEXT['FOOTER'] = 'Footer';
$TEXT['TEMPLATE'] = '&#1064;&#1072;&#1073;&#1083;&#1086;&#1085;';
$TEXT['INSTALLATION'] = '&#1059;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1082;&#1072;';
$TEXT['DATABASE'] = '&#1041;&#1072;&#1079;&#1072; &#1076;&#1072;&#1085;&#1085;&#1099;&#1093;';
$TEXT['HOST'] = 'Host';
$TEXT['INTRO'] = '&#1048;&#1085;&#1090;&#1088;&#1086;';
$TEXT['PAGE'] = '&#1057;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1072;';
$TEXT['SIGNUP'] = 'Sign-up';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Error Reporting Level';
$TEXT['ADMIN'] = '&#1040;&#1076;&#1084;&#1080;&#1085;';
$TEXT['PATH'] = '&#1055;&#1091;&#1090;&#1100;';
$TEXT['URL'] = 'URL';
$TEXT['FRONTEND'] = 'Front-end';
$TEXT['EXTENSION'] = '&#1056;&#1072;&#1089;&#1096;&#1080;&#1088;&#1077;&#1085;&#1080;&#1077;';
$TEXT['TABLE_PREFIX'] = '&#1055;&#1088;&#1077;&#1092;&#1080;&#1082;&#1089; &#1090;&#1072;&#1073;&#1083;&#1080;&#1094;&#1099;';
$TEXT['CHANGES'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1077;&#1085;&#1080;&#1103;';
$TEXT['ADMINISTRATION'] = '&#1040;&#1076;&#1084;&#1080;&#1085;&#1080;&#1089;&#1090;&#1088;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1080;&#1077;';
$TEXT['FORGOT_DETAILS'] = '&#1047;&#1072;&#1073;&#1099;&#1083;&#1080; &#1087;&#1072;&#1088;&#1086;&#1083;&#1100;?';
$TEXT['LOGGED_IN'] = '&#1040;&#1074;&#1090;&#1086;&#1088;&#1080;&#1079;&#1080;&#1088;&#1086;&#1074;&#1072;&#1083;&#1080;&#1089;&#1100;';
$TEXT['WELCOME_BACK'] = '&#1046;&#1076;&#1077;&#1084; &#1089;&#1085;&#1086;&#1074;&#1072;';
$TEXT['FULL_NAME'] = '&#1055;&#1086;&#1083;&#1085;&#1086;&#1077; &#1080;&#1084;&#1103;';
$TEXT['ACCOUNT_SIGNUP'] = 'Account Sign-Up';
$TEXT['LINK'] = 'Link';
$TEXT['ANCHOR'] = 'Anchor'; //needs to be translated
$TEXT['TARGET'] = 'Target';
$TEXT['NEW_WINDOW'] = '&#1042; &#1085;&#1086;&#1074;&#1086;&#1084; &#1086;&#1082;&#1085;&#1077;';
$TEXT['SAME_WINDOW'] = '&#1042; &#1090;&#1077;&#1082;&#1091;&#1097;&#1077;&#1084; &#1086;&#1082;&#1085;&#1077;';
$TEXT['TOP_FRAME'] = 'Top Frame';
$TEXT['PAGE_LEVEL_LIMIT'] = '&#1051;&#1080;&#1084;&#1080;&#1090; &#1091;&#1088;&#1086;&#1074;&#1085;&#1103; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;';
$TEXT['SUCCESS'] = '&#1059;&#1076;&#1072;&#1095;&#1085;&#1086;';
$TEXT['ERROR'] = 'Error';
$TEXT['ARE_YOU_SURE'] = '&#1042;&#1099; &#1091;&#1074;&#1077;&#1088;&#1077;&#1085;&#1099;?';
$TEXT['YES'] = '&#1044;&#1072;';
$TEXT['NO'] = '&#1053;&#1077;&#1090;';
$TEXT['SYSTEM_DEFAULT'] = '&#1055;&#1086; &#1091;&#1084;&#1086;&#1083;&#1095;&#1072;&#1085;&#1080;&#1102;';
$TEXT['PAGE_TITLE'] = '&#1047;&#1072;&#1075;&#1086;&#1083;&#1086;&#1074;&#1086;&#1082; &#1057;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1099;';
$TEXT['MENU_TITLE'] = '&#1047;&#1072;&#1075;&#1086;&#1083;&#1086;&#1074;&#1086;&#1082; &#1052;&#1077;&#1085;&#1102;';
$TEXT['ACTIONS'] = '&#1044;&#1077;&#1081;&#1089;&#1090;&#1074;&#1080;&#1103;';
$TEXT['UNKNOWN'] = '&#1053;&#1077;&#1080;&#1079;&#1074;&#1077;&#1089;&#1090;&#1085;&#1086;';
$TEXT['BLOCK'] = '&#1041;&#1083;&#1086;&#1082;';
$TEXT['SEARCH'] = '&#1055;&#1086;&#1080;&#1089;&#1082;';
$TEXT['SEARCHING'] = '&#1048;&#1076;&#1077;&#1090; &#1087;&#1086;&#1080;&#1089;&#1082;';
$TEXT['POST'] = 'Post';
$TEXT['COMMENT'] = 'Comment';
$TEXT['COMMENTS'] = 'Comments';
$TEXT['COMMENTING'] = 'Commenting';
$TEXT['SHORT'] = 'Short';
$TEXT['LONG'] = 'Long';
$TEXT['LOOP'] = 'Loop';
$TEXT['FIELD'] = 'Field';
$TEXT['REQUIRED'] = 'Required';
$TEXT['LENGTH'] = 'Length';
$TEXT['MESSAGE'] = 'Message';
$TEXT['SUBJECT'] = 'Subject';
$TEXT['MATCH'] = 'Match';
$TEXT['ALL_WORDS'] = '&#1042;&#1089;&#1077; &#1089;&#1083;&#1086;&#1074;&#1072;';
$TEXT['ANY_WORDS'] = '&#1051;&#1102;&#1073;&#1099;&#1077; &#1089;&#1083;&#1086;&#1074;&#1072;';
$TEXT['EXACT_MATCH'] = 'Exact Match';
$TEXT['SHOW'] = '&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1085;&#1086;';
$TEXT['HIDE'] = '&#1057;&#1082;&#1088;&#1099;&#1090;&#1086;';
$TEXT['START_PUBLISHING'] = 'Start Publishing';
$TEXT['FINISH_PUBLISHING'] = 'Finish Publishing';
$TEXT['DATE'] = '&#1044;&#1072;&#1090;&#1072;';
$TEXT['START'] = '&#1053;&#1072;&#1095;&#1072;&#1083;&#1086;';
$TEXT['END'] = '&#1050;&#1086;&#1085;&#1077;&#1094;';
$TEXT['IMAGE'] = '&#1048;&#1079;&#1086;&#1073;&#1088;&#1072;&#1078;&#1077;&#1085;&#1080;&#1077;';
$TEXT['ICON'] = '&#1048;&#1082;&#1086;&#1085;&#1082;&#1072;';
$TEXT['SECTION'] = '&#1057;&#1077;&#1082;&#1094;&#1080;&#1103;';
$TEXT['DATE_FORMAT'] = '&#1060;&#1086;&#1088;&#1084;&#1072;&#1090; &#1076;&#1072;&#1090;&#1099;';
$TEXT['TIME_FORMAT'] = '&#1060;&#1086;&#1088;&#1084;&#1072;&#1090; &#1074;&#1088;&#1077;&#1084;&#1077;&#1085;&#1080;';
$TEXT['RESULTS'] = '&#1056;&#1077;&#1079;&#1091;&#1083;&#1100;&#1090;&#1072;&#1090;&#1099;';
$TEXT['RESIZE'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1088;&#1072;&#1079;&#1084;&#1077;&#1088;';
$TEXT['MANAGE'] = '&#1059;&#1087;&#1088;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077;';
$TEXT['CODE'] = '&#1050;&#1086;&#1076;';
$TEXT['WIDTH'] = '&#1064;&#1080;&#1088;&#1080;&#1085;&#1072;';
$TEXT['HEIGHT'] = '&#1042;&#1099;&#1089;&#1086;&#1090;&#1072;';
$TEXT['MORE'] = '&#1044;&#1072;&#1083;&#1077;&#1077;';
$TEXT['READ_MORE'] = '&#1055;&#1086;&#1076;&#1088;&#1086;&#1073;&#1085;&#1077;&#1077;';
$TEXT['CHANGE_SETTINGS'] = '&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1085;&#1072;&#1089;&#1090;&#1088;&#1086;&#1081;&#1082;&#1080;';
$TEXT['CURRENT_PAGE'] = '&#1058;&#1077;&#1082;&#1091;&#1097;&#1072;&#1103; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1072;';
$TEXT['CLOSE'] = '&#1047;&#1072;&#1082;&#1088;&#1099;&#1090;&#1100;';
$TEXT['INTRO_PAGE'] = '&#1057;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1072; &#1080;&#1085;&#1090;&#1088;&#1086;';
$TEXT['INSTALLATION_URL'] = 'URL &#1091;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1082;&#1080;';
$TEXT['INSTALLATION_PATH'] = '&#1087;&#1091;&#1090;&#1100; &#1091;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1082;&#1080;';
$TEXT['PAGE_EXTENSION'] = '&#1056;&#1072;&#1089;&#1096;&#1080;&#1088;&#1077;&#1085;&#1080;&#1077; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1099;';
$TEXT['NO_RESULTS'] = '&#1053;&#1077;&#1090; &#1088;&#1077;&#1079;&#1091;&#1083;&#1100;&#1090;&#1072;&#1090;&#1086;&#1074;';
$TEXT['WEBSITE_TITLE'] = '&#1047;&#1072;&#1075;&#1086;&#1083;&#1086;&#1074;&#1086;&#1082;';
$TEXT['WEBSITE_DESCRIPTION'] = '&#1054;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1077; &#1089;&#1072;&#1081;&#1090;&#1072;';
$TEXT['WEBSITE_KEYWORDS'] = '&#1050;&#1083;&#1102;&#1095;&#1077;&#1074;&#1099;&#1077; &#1089;&#1083;&#1086;&#1074;&#1072;';
$TEXT['WEBSITE_HEADER'] = 'Website Header';
$TEXT['WEBSITE_FOOTER'] = 'Website Footer';
$TEXT['RESULTS_HEADER'] = 'Results Header';
$TEXT['RESULTS_LOOP'] = 'Results Loop';
$TEXT['RESULTS_FOOTER'] = 'Results Footer';
$TEXT['LEVEL'] = '&#1059;&#1088;&#1086;&#1074;&#1077;&#1085;&#1100;';
$TEXT['NOT_FOUND'] = '&#1053;&#1077; &#1085;&#1072;&#1081;&#1076;&#1077;&#1085;&#1086;';
$TEXT['PAGE_SPACER'] = 'Page Spacer';
$TEXT['MATCHING'] = 'Matching';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Template Permissions';
$TEXT['PAGES_DIRECTORY'] = '&#1055;&#1072;&#1087;&#1082;&#1072; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;';
$TEXT['MEDIA_DIRECTORY'] = 'Media &#1087;&#1072;&#1087;&#1082;&#1072;';
$TEXT['FILE_MODE'] = 'File Mode';
$TEXT['USER'] = 'User';
$TEXT['OTHERS'] = 'Others';
$TEXT['READ'] = 'Read';
$TEXT['WRITE'] = 'Write';
$TEXT['EXECUTE'] = 'Execute';
$TEXT['SMART_LOGIN'] = 'Smart Login';
$TEXT['REMEMBER_ME'] = '&#1047;&#1072;&#1087;&#1086;&#1084;&#1085;&#1080;&#1090;&#1100; &#1084;&#1077;&#1085;&#1103;';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Filesystem Permissions';
$TEXT['DIRECTORIES'] = '&#1044;&#1080;&#1088;&#1077;&#1082;&#1090;&#1086;&#1088;&#1080;&#1080;';
$TEXT['DIRECTORY_MODE'] = 'Directory Mode';
$TEXT['LIST_OPTIONS'] = 'List Options';
$TEXT['OPTION'] = 'Option';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Allow Multiple Selections';
$TEXT['TEXTFIELD'] = 'Textfield';
$TEXT['TEXTAREA'] = 'Textarea';
$TEXT['SELECT_BOX'] = 'Select Box';
$TEXT['CHECKBOX_GROUP'] = 'Checkbox Group';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio Button Group';
$TEXT['SIZE'] = 'Size';
$TEXT['DEFAULT_TEXT'] = 'Default Text';
$TEXT['SEPERATOR'] = 'Separator';
$TEXT['BACK'] = 'Back';
$TEXT['UNDER_CONSTRUCTION'] = 'Under Construction';
$TEXT['MULTISELECT'] = 'Multi-select';
$TEXT['SHORT_TEXT'] = 'Short Text';
$TEXT['LONG_TEXT'] = 'Long Text';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Homepage Redirection';
$TEXT['HEADING'] = 'Heading';
$TEXT['MULTIPLE_MENUS'] = 'Multiple Menus';
$TEXT['REGISTERED'] = 'Registered';
$TEXT['START'] = 'Start';
$TEXT['SECTION_BLOCKS'] = 'Section Blocks';
$TEXT['REGISTERED_VIEWERS'] = 'Registered Viewers';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers';
$TEXT['SUBMISSION_ID'] = 'Submission ID';
$TEXT['SUBMISSIONS'] = 'Submissions';
$TEXT['SUBMITTED'] = 'Submitted';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. Submissions Per Hour';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Submissions Stored In Database';
$TEXT['EMAIL_ADDRESS'] = 'Email Address';
$TEXT['CUSTOM'] = 'Custom';
$TEXT['ANONYMOUS'] = 'Anonymous';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Server Operating System';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'World-writeable file permissions';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix based';
$TEXT['WINDOWS'] = 'Windows';
$TEXT['HOME_FOLDER'] = 'Home Folder';
$TEXT['HOME_FOLDERS'] = 'Home Folders';
$TEXT['PAGE_TRASH'] = 'Page Trash';
$TEXT['INLINE'] = 'In-line';
$TEXT['SEPARATE'] = 'Separate';
$TEXT['DELETED'] = 'Deleted';
$TEXT['VIEW_DELETED_PAGES'] = 'View Deleted Pages';
$TEXT['EMPTY_TRASH'] = 'Empty Trash';
$TEXT['TRASH_EMPTIED'] = 'Trash Emptied';
$TEXT['ADD_SECTION'] = 'Add Section';
$TEXT['POST_HEADER'] = 'Post Header';
$TEXT['POST_FOOTER'] = 'Post Footer';
$TEXT['POSTS_PER_PAGE'] = 'Posts Per Page';
$TEXT['RESIZE_IMAGE_TO'] = 'Resize Image To';
$TEXT['UNLIMITED'] = 'Unlimited';
$TEXT['OF'] = 'Of';
$TEXT['OUT_OF'] = 'Out Of';
$TEXT['NEXT'] = 'Next';
$TEXT['PREVIOUS'] = 'Previous';
$TEXT['NEXT_PAGE'] = 'Next Page';
$TEXT['PREVIOUS_PAGE'] = 'Previous Page';
$TEXT['ON'] = 'On';
$TEXT['LAST_UPDATED_BY'] = 'Last Updated By';
$TEXT['RESULTS_FOR'] = 'Results For';
$TEXT['TIME'] = 'Time';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG Editor';
$TEXT['SERVER_EMAIL'] = 'Server Email';
$TEXT['MENU'] = 'Menu';
$TEXT['MANAGE_GROUPS'] = '&#1059;&#1087;&#1088;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077; &#1075;&#1088;&#1091;&#1087;&#1087;&#1072;&#1084;&#1080;';
$TEXT['MANAGE_USERS'] = '&#1059;&#1087;&#1088;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1103;&#1084;&#1080;';
$TEXT['PAGE_LANGUAGES'] = '&#1071;&#1079;&#1099;&#1082;&#1086;&#1074;&#1086;&#1081; &#1087;&#1072;&#1082;&#1077;&#1090;';
$TEXT['HIDDEN'] = '&#1057;&#1082;&#1088;&#1099;&#1090;';
$TEXT['MAIN'] = 'Main';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Rename Files On Upload';
$TEXT['APP_NAME'] = 'Application Name';
$TEXT['SESSION_IDENTIFIER'] = 'Session Identifier';
$TEXT['BACKUP'] = 'Backup';
$TEXT['RESTORE'] = 'Restore';
$TEXT['BACKUP_DATABASE'] = 'Backup Database';
$TEXT['RESTORE_DATABASE'] = 'Restore Database';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup all tables in database';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup only WB-specific tables';
$TEXT['BACKUP_MEDIA'] = 'Backup Media';
$TEXT['RESTORE_MEDIA'] = 'Restore Media';
$TEXT['ADMINISTRATION_TOOL'] = 'Administration tool';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha Verification';
$TEXT['VERIFICATION'] = 'Verification';
$TEXT['DEFAULT_CHARSET'] = 'Default Charset';
$TEXT['CHARSET'] = 'Charset';
$TEXT['MODULE_ORDER'] = 'Module-order for searching'; //needs to be translated
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt'; //needs to be translated
$TEXT['PUBL_START_DATE'] = 'Start date'; //needs to be translated
$TEXT['PUBL_END_DATE'] = 'End date'; //needs to be translated
$TEXT['CALENDAR'] = 'Calender'; //needs to be translated
$TEXT['DELETE_DATE'] = 'Delete date'; //needs to be translated
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Please specify a default "FROM" address and "SENDER" name below. It is recommended to use a FROM address like: <strong>admin@yourdomain.com</strong>. Some mail provider (e.g. <em>mail.com</em>) may reject mails with a FROM: address like <em>name@mail.com</em> sent via a foreign relay to avoid spam.<br /><br />The default values are only used if no other values are specified by Website Baker. If your server supports <acronym title="Simple mail transfer protocol">SMTP</acronym>, you may want use this option for outgoing mails.'; //needs to be translated
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Default From Mail'; //needs to be translated
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Default Sender Name'; //needs to be translated
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP Mailer Settings:</strong><br />The settings below are only required if you want to send mails via <acronym title="Simple mail transfer protocol">SMTP</acronym>. If you do not know your SMTP host or you are not sure about the required settings, simply stay with the default mail routine: PHP MAIL.'; //needs to be translated
$TEXT['WBMAILER_FUNCTION'] = 'Mail Routine'; //needs to be translated
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP Host'; //needs to be translated
$TEXT['WBMAILER_PHP'] = 'PHP MAIL'; //needs to be translated
$TEXT['WBMAILER_SMTP'] = 'SMTP'; //needs to be translated
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP Authentification'; //needs to be translated
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'only activate if your SMTP host requires authentification'; //needs to be translated
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP Username'; //needs to be translated
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP Password'; //needs to be translated
$TEXT['PLEASE_LOGIN'] = 'Please login'; //needs to be translated

// Success/error messages
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Sorry, you do not have permissions to view this page';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display';

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Insufficient privelliges to be here';

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Please enter your username and password below';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'Please enter a username';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'Please enter a password';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'Supplied username to short';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'Supplied password to short';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'Supplied username to long';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'Supplied password to long';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Username or password incorrect';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'You must enter an email address';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'Please enter your email address below';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'The email that you entered cannot be found in the database';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Unable to email password, please contact system administrator';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'Your username and password have been sent to your email address';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Password cannot be reset more than once per hour, sorry';

$MESSAGE['START']['WELCOME_MESSAGE'] = '&#1044;&#1086;&#1073;&#1088;&#1086; &#1087;&#1086;&#1078;&#1072;&#1083;&#1086;&#1074;&#1072;&#1090;&#1100; &#1074; &#1072;&#1076;&#1084;&#1080;&#1085; &#1087;&#1072;&#1085;&#1077;&#1083;&#1100; &#1089;&#1080;&#1089;&#1090;&#1077;&#1084;&#1099; Website Baker';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = '&#1042;&#1085;&#1080;&#1084;&#1072;&#1085;&#1080;&#1077;! &#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1077; &#1076;&#1080;&#1088;&#1077;&#1082;&#1090;&#1086;&#1088;&#1080;&#1102; &#1080;&#1079; &#1082;&#1086;&#1090;&#1086;&#1088;&#1086;&#1081; &#1087;&#1088;&#1086;&#1080;&#1079;&#1074;&#1086;&#1076;&#1080;&#1083;&#1072;&#1089;&#1100; &#1091;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1082;&#1072;!';
$MESSAGE['START']['CURRENT_USER'] = '&#1042;&#1099; &#1072;&#1074;&#1090;&#1086;&#1088;&#1080;&#1079;&#1080;&#1088;&#1086;&#1074;&#1072;&#1076;&#1080;&#1089;&#1100; &#1082;&#1072;&#1082;:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'Unable to open the configuration file';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Cannot write to configuration file';
$MESSAGE['SETTINGS']['SAVED'] = 'Settings saved successfully';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Please Note: Pressing this button resets all unsaved changes';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Please note: this is only recommended for testing environments';

$MESSAGE['USERS']['ADDED'] = 'User added successfully';
$MESSAGE['USERS']['SAVED'] = 'User saved successfully';
$MESSAGE['USERS']['DELETED'] = 'User deleted successfully';
$MESSAGE['USERS']['NO_GROUP'] = 'No group was selected';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'The username you entered was too short';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'The password you entered was too short';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'The passwords you entered do not match';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'The email address you entered is invalid';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'The email you entered is already in use';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'The username you entered is already taken';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Please note: You should only enter values in the above fields if you wish to change this users password';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Are you sure you want to delete the selected user?';

$MESSAGE['GROUPS']['ADDED'] = 'Group added successfully';
$MESSAGE['GROUPS']['SAVED'] = 'Group saved successfully';
$MESSAGE['GROUPS']['DELETED'] = 'Group deleted successfully';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = 'Group name is blank';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Are you sure you want to delete the selected group (and any users that belong to it)?';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'No groups found';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Group name already exists';

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Details saved successfully';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'Email updated successfully';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'The (current) password you entered is incorrect';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'Password changed successfully';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Please note: to change the template you must go to the Settings section';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Cannot include ../ in the folder name';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Directory does not exist';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Cannot have ../ in the folder target';
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Cannot include ../ in the name';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = '&#1053;&#1077;&#1083;&#1100;&#1079;&#1103; &#1080;&#1089;&#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1100; index.php &#1082;&#1072;&#1082; &#1080;&#1084;&#1103;';
$MESSAGE['MEDIA']['NONE_FOUND'] = '&#1053;&#1077;&#1090; &#1092;&#1072;&#1081;&#1083;&#1086;&#1074; &#1074; &#1076;&#1072;&#1085;&#1085;&#1086;&#1081; &#1076;&#1080;&#1088;&#1077;&#1082;&#1090;&#1088;&#1080;&#1080;';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'File not found';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'File deleted successfully';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Folder deleted successfully';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Are you sure you want to delete the following file or folder?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Cannot delete the selected file';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Cannot delete the selected folder';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'You did not enter a new name';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'You did not enter a file extension';
$MESSAGE['MEDIA']['RENAMED'] = 'Rename successful';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Rename unsuccessful';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'A file matching the name you entered already exists';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'A folder matching the name you entered already exists';
$MESSAGE['MEDIA']['DIR_MADE'] = 'Folder created successfully';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'Unable to create folder';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' file was successfully uploaded';
$MESSAGE['MEDIA']['UPLOADED'] = ' files were successfully uploaded';

$MESSAGE['PAGES']['ADDED'] = 'Page added successfully';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Page heading added successfully';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'A page with the same or similar title exists';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Error creating access file in the /pages directory (insufficient privileges)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Error deleting access file in the /pages directory (insufficient privileges)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Page not found';
$MESSAGE['PAGES']['SAVED'] = 'Page saved successfully';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Page settings saved successfully';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Error saving page';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Are you sure you want to delete the selected page (and all of its sub-pages)';
$MESSAGE['PAGES']['DELETED'] = 'Page deleted successfully';
$MESSAGE['PAGES']['RESTORED'] = 'Page restored successfully';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'Please enter a page title';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'Please enter a menu title';
$MESSAGE['PAGES']['REORDERED'] = 'Page re-ordered successfully';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Error re-ordering page';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = '&#1059; &#1042;&#1072;&#1089; &#1085;&#1077;&#1090; &#1087;&#1088;&#1072;&#1074; &#1076;&#1083;&#1103; &#1080;&#1079;&#1084;&#1077;&#1085;&#1077;&#1085;&#1080;&#1103; &#1101;&#1090;&#1086;&#1081; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1099;';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Cannot write to file /pages/intro.php (insufficient privileges)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Intro page saved successfully';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Last modification by';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Click HERE to modify the intro page';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Section properties saved successfully';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Return to pages';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'Please go back and fill-in all fields';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'Please note that the file you upload must be of the following format:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'Please note that the file you upload must be in one of the following formats:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'Cannot upload file';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'Already installed';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Not installed';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Cannot uninstall';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Cannot unzip file';
$MESSAGE['GENERIC']['INSTALLED'] = 'Installed successfully';
$MESSAGE['GENERIC']['UPGRADED'] = 'Upgraded successfully';
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Uninstalled successfully';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'Unable to write to the target directory';
$MESSAGE['GENERIC']['INVALID'] = 'The file you uploaded is invalid';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Cannot Uninstall: the selected file is in use';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONSTRUCTION'] = 'Website Under Construction';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'Please check back soon...';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Please be patient, this might take a while.';
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Error opening file.';

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'You must enter details for the following fields';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Sorry, this form has been submitted too many times so far this hour. Please retry in the next hour.';
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: '.SERVER_EMAIL;

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'Please selected which add-ons you would like to have reloaded';
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'Modules reloaded successfully';
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Templates reloaded successfully';
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Languages reloaded successfully';

?>