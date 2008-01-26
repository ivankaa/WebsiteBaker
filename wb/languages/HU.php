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
$language_code = 'HU';
$language_name = 'Magyar';
$language_version = '2.7';
$language_platform = '2.7.x';
$language_author = 'Zsolt';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Kezd�lap';
$MENU['PAGES'] = 'Weblapok';
$MENU['MEDIA'] = 'M�dia';
$MENU['ADDONS'] = 'Add-on';
$MENU['MODULES'] = 'Modulok';
$MENU['TEMPLATES'] = 'Sablonok';
$MENU['LANGUAGES'] = 'Nyelvek';
$MENU['PREFERENCES'] = 'Saj�t adatok';
$MENU['SETTINGS'] = 'Param�terek';
$MENU['ADMINTOOLS'] = 'Admin-Tools'; //needs to be translated
$MENU['ACCESS'] = 'Jogosults�gok';
$MENU['USERS'] = 'Felhaszn�l�k';
$MENU['GROUPS'] = 'Csoportok';
$MENU['HELP'] = 'S�g�';
$MENU['VIEW'] = 'Port�l n�zet';
$MENU['LOGOUT'] = 'Kil�p�s';
$MENU['LOGIN'] = 'Bel�p�s';
$MENU['FORGOT'] = 'Elfelejtett jelsz�';

// Section overviews
$OVERVIEW['START'] = 'Admin �ttekint�s';
$OVERVIEW['PAGES'] = 'A Port�l Weblapjainak kezel�se...';
$OVERVIEW['MEDIA'] = 'A "media" k�nyvt�rban t�rolt fileok kezel�se...';
$OVERVIEW['MODULES'] = 'Website Baker modulok kezel�se...';
$OVERVIEW['TEMPLATES'] = 'A Honlap megjelen�s�nek v�ltoztat�sa Sablonokkal...';
$OVERVIEW['LANGUAGES'] = 'Website Baker nyelvi be�ll�t�sok...';
$OVERVIEW['PREFERENCES'] = 'Be�ll�t�sok megv�ltoztat�sa mint: email, jelsz�, stb... ';
$OVERVIEW['SETTINGS'] = 'A rendszer glob�lis be�ll�t�sa...';
$OVERVIEW['USERS'] = 'Felhaszn�l�k bejelentkez�si enged�lyei...';
$OVERVIEW['GROUPS'] = 'Csoportok �s azok rendszer jogainak kezel�se...';
$OVERVIEW['HELP'] = 'K�rd�sed van? itt tal�lsz v�laszt...  (Angol)';
$OVERVIEW['VIEW'] = 'A k�sz Port�l megtekint�se �j ablakban...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Lap m�dos�t�sa/T�rl�se';
$HEADING['DELETED_PAGES'] = 'T�r�lt Lapok';
$HEADING['ADD_PAGE'] = 'Lap hozz�ad�sa';
$HEADING['ADD_HEADING'] = 'Fejl�c hozz�ad�sa';
$HEADING['MODIFY_PAGE'] = 'Lap m�dos�t�sa';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Lap be�ll�t�sainak m�dos�t�sa';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Speci�lis be�ll�t�sok';
$HEADING['MANAGE_SECTIONS'] = 'Szakaszok kezel�se';
$HEADING['MODIFY_INTRO_PAGE'] = 'Bevezet� lap m�dos�t�sa';

$HEADING['BROWSE_MEDIA'] = 'M�dia b�ng�sz�se';
$HEADING['CREATE_FOLDER'] = '�j k�nyvt�r';
$HEADING['UPLOAD_FILES'] = 'Upload File(s)';

$HEADING['INSTALL_MODULE'] = 'Modul telep�t�s';
$HEADING['UNINSTALL_MODULE'] = 'Modul elt�vol�t�s';
$HEADING['MODULE_DETAILS'] = 'Modul inf�';

$HEADING['INSTALL_TEMPLATE'] = 'Sablon telep�t�s';
$HEADING['UNINSTALL_TEMPLATE'] = 'Sablon elt�vol�t�s';
$HEADING['TEMPLATE_DETAILS'] = 'Sablon inf�';

$HEADING['INSTALL_LANGUAGE'] = 'Nyelv telep�t�s';
$HEADING['UNINSTALL_LANGUAGE'] = 'Nyelv elt�vol�t�s';
$HEADING['LANGUAGE_DETAILS'] = 'Nyelv Inf�';

$HEADING['MY_SETTINGS'] = 'Be�ll�t�sok';
$HEADING['MY_EMAIL'] = 'E-mail';
$HEADING['MY_PASSWORD'] = 'Jelsz�';

$HEADING['GENERAL_SETTINGS'] = '�ltal�nos be�ll�t�sok';
$HEADING['DEFAULT_SETTINGS'] = 'Alap�rtelmezett Be�ll�t�sok';
$HEADING['SEARCH_SETTINGS'] = 'Keres�si be�ll�t�sok';
$HEADING['FILESYSTEM_SETTINGS'] = 'Filerendszer';
$HEADING['SERVER_SETTINGS'] = 'Server Settings'; //needs to be translated
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings'; //needs to be translated
$HEADING['ADMINISTRATION_TOOLS'] = 'Administration Tools'; //needs to be translated

$HEADING['MODIFY_DELETE_USER'] = 'Felhaszn�l� m�dos�t�sa/t�rl�se';
$HEADING['ADD_USER'] = 'Felhaszn�l� hozz�ad�sa';
$HEADING['MODIFY_USER'] = 'Felhaszn�l� m�dos�t�sa';

$HEADING['MODIFY_DELETE_GROUP'] = 'Csoport m�dos�t�sa/t�rl�se';
$HEADING['ADD_GROUP'] = 'Csoport m�dos�t�sa';
$HEADING['MODIFY_GROUP'] = 'csoport m�dos�t�sa';

// Other text
$TEXT['ADD'] = 'Hozz�ad';
$TEXT['MODIFY'] = 'M�dos�t�s';
$TEXT['SETTINGS'] = 'Be�ll�t�s';
$TEXT['DELETE'] = 'T�rl�s';
$TEXT['SAVE'] = 'Ment�s';
$TEXT['RESET'] = 'Visszavon';
$TEXT['LOGIN'] = 'Bel�p�s';
$TEXT['RELOAD'] = '�jrat�lt�s';
$TEXT['CANCEL'] = 'M�gse';
$TEXT['NAME'] = 'N�v';
$TEXT['PLEASE_SELECT'] = 'K�rem v�lasszon';
$TEXT['TITLE'] = 'C�m';
$TEXT['PARENT'] = 'Almen�je ennek';
$TEXT['TYPE'] = 'T�pus';
$TEXT['VISIBILITY'] = 'Megjelen�s';
$TEXT['PRIVATE'] = 'Priv�t';
$TEXT['PUBLIC'] = 'Publikus';
$TEXT['NONE'] = 'egyik sem';
$TEXT['NONE_FOUND'] = 'Nem tal�lhat�';
$TEXT['CURRENT'] = 'Aktu�lis';
$TEXT['CHANGE'] = 'M�dos�t';
$TEXT['WINDOW'] = 'ablak';
$TEXT['DESCRIPTION'] = 'Le�r�s';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['ADMINISTRATORS'] = 'Adminisztr�torok';
$TEXT['PRIVATE_VIEWERS'] = 'Priv�t jogosultak';
$TEXT['EXPAND'] = 'Kibont';
$TEXT['COLLAPSE'] = '�sszecsuk';
$TEXT['MOVE_UP'] = 'Mozgat Fel';
$TEXT['MOVE_DOWN'] = 'Mozgat Le';
$TEXT['RENAME'] = '�tnevez';
$TEXT['MODIFY_SETTINGS'] = 'Be�ll�t�sok m�dos�t�sa';
$TEXT['MODIFY_CONTENT'] = 'Tartalom m�dos�t�sa';
$TEXT['VIEW'] = 'N�zet';
$TEXT['UP'] = 'Fel';
$TEXT['FORGOTTEN_DETAILS'] = 'Mi is a jelsz�?';
$TEXT['NEED_TO_LOGIN'] = 'Vissza a bel�p�shez';
$TEXT['SEND_DETAILS'] = 'Jelsz� elk�ld�se';
$TEXT['USERNAME'] = 'Felhaszn�l�n�v';
$TEXT['PASSWORD'] = 'Jelsz�';
$TEXT['HOME'] = 'Kezd�lap';
$TEXT['TARGET_FOLDER'] = 'C�l k�nyvt�r';
$TEXT['OVERWRITE_EXISTING'] = 'Megl�v� fel�l�r�sa';
$TEXT['FILE'] = 'File'; //needs to be translated
$TEXT['FILES'] = 'File-ok';
$TEXT['FOLDER'] = 'Folder'; //needs to be translated
$TEXT['FOLDERS'] = 'K�nyvt�rak';
$TEXT['CREATE_FOLDER'] = 'K�nyvt�r l�trehoz�sa';
$TEXT['UPLOAD_FILES'] = 'File felt�lt�s';
$TEXT['CURRENT_FOLDER'] = 'aktu�lis k�nyvt�r';
$TEXT['TO'] = 'C�mzett';
$TEXT['FROM'] = 'Felad�';
$TEXT['INSTALL'] = 'Telep�t';
$TEXT['UNINSTALL'] = 'Elt�vol�t';
$TEXT['VIEW_DETAILS'] = 'inf�t megz�z';
$TEXT['DISPLAY_NAME'] = 'Megjelen� N�v';
$TEXT['AUTHOR'] = 'Szerz�';
$TEXT['VERSION'] = 'Verzi�';
$TEXT['DESIGNED_FOR'] = 'tervezve';
$TEXT['DESCRIPTION'] = 'Le�r�s';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['LANGUAGE'] = 'Nyelv';
$TEXT['TIMEZONE'] = 'Id�z�na';
$TEXT['CURRENT_PASSWORD'] = 'Aktu�lis Jelsz�';
$TEXT['NEW_PASSWORD'] = '�j Jelsz�';
$TEXT['RETYPE_NEW_PASSWORD'] = '�j Jelsz� m�gegyszer';
$TEXT['ACTIVE'] = 'Akt�v';
$TEXT['DISABLED'] = 'Letiltva';
$TEXT['ENABLED'] = 'Enged�lyezve';
$TEXT['RETYPE_PASSWORD'] = 'Jelsz� m�gegyszer';
$TEXT['GROUP'] = 'Csoport';
$TEXT['SYSTEM_PERMISSIONS'] = 'Rendzser enged�lyek';
$TEXT['MODULE_PERMISSIONS'] = 'Modul enged�lyek';
$TEXT['SHOW_ADVANCED'] = 'Speci�lis be�ll�t�sok mutat�sa';
$TEXT['HIDE_ADVANCED'] = 'Speci�lis be�ll�t�sok elrejt�se';
$TEXT['BASIC'] = 'Alap';
$TEXT['ADVANCED'] = 'B�v�tett';
$TEXT['WEBSITE'] = 'Weblap';
$TEXT['DEFAULT'] = 'Alap�rtelmezett';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['TEXT'] = 'Sz�veg';
$TEXT['HEADER'] = 'Fejl�c';
$TEXT['FOOTER'] = 'L�bl�c';
$TEXT['TEMPLATE'] = 'Sablon';
$TEXT['INSTALLATION'] = 'Telep�t�s';
$TEXT['DATABASE'] = 'Adatb�zis';
$TEXT['HOST'] = 'Host'; //needs to be translated
$TEXT['INTRO'] = 'Bevezet�';
$TEXT['PAGE'] = 'Lap';
$TEXT['SIGNUP'] = 'Regisztr�l�s...';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP hibajelent�si szint';
$TEXT['ADMIN'] = 'Admin'; //needs to be translated
$TEXT['PATH'] = 'Path'; //needs to be translated
$TEXT['URL'] = 'URL'; //needs to be translated
$TEXT['FRONTEND'] = 'Megjelen� fel�let';
$TEXT['EXTENSION'] = 'kiterjeszt�s';
$TEXT['TABLE_PREFIX'] = 'T�bla el�tag';
$TEXT['CHANGES'] = 'V�toz�sok';
$TEXT['ADMINISTRATION'] = 'Adminisztr�l�s';
$TEXT['FORGOT_DETAILS'] = 'Elfelejtettem a jelsz�t.';
$TEXT['LOGGED_IN'] = 'Bejelentkezve';
$TEXT['WELCOME_BACK'] = '�dv';
$TEXT['FULL_NAME'] = 'Teljes n�v';
$TEXT['ACCOUNT_SIGNUP'] = 'Account Sign-Up'; //needs to be translated
$TEXT['LINK'] = 'Link'; //needs to be translated
$TEXT['ANCHOR'] = 'Anchor'; //needs to be translated
$TEXT['TARGET'] = 'c�l';
$TEXT['NEW_WINDOW'] = '�j ablak';
$TEXT['SAME_WINDOW'] = 'Azonos Ablak';
$TEXT['TOP_FRAME'] = 'Top Frame'; //needs to be translated
$TEXT['PAGE_LEVEL_LIMIT'] = 'Lap szint limit';
$TEXT['SUCCESS'] = 'Sikeres';
$TEXT['ERROR'] = 'Hiba';
$TEXT['ARE_YOU_SURE'] = 'Biztos?';
$TEXT['YES'] = 'Igen';
$TEXT['NO'] = 'Nem';
$TEXT['SYSTEM_DEFAULT'] = 'Rendszer alap�rtelmezett';
$TEXT['PAGE_TITLE'] = 'Lap c�m';
$TEXT['MENU_TITLE'] = 'Menu C�m';
$TEXT['ACTIONS'] = 'Tev�kenys�gek';
$TEXT['UNKNOWN'] = 'Ismeretlen';
$TEXT['BLOCK'] = 'Blokk';
$TEXT['SEARCH'] = 'Keres�s';
$TEXT['SEARCHING'] = 'Keres�s...';
$TEXT['POST'] = 'Cikk';
$TEXT['COMMENT'] = 'Megjegyz�s';
$TEXT['COMMENTS'] = 'Megjegyz�sek';
$TEXT['COMMENTING'] = 'Komment�l�s';
$TEXT['SHORT'] = 'R�vid';
$TEXT['LONG'] = 'Hossz�';
$TEXT['LOOP'] = 'ism�tl�d�</br> t�rzs szakasz';
$TEXT['FIELD'] = 'Mez�';
$TEXT['REQUIRED'] = 'K�telez�';
$TEXT['LENGTH'] = 'hossz';
$TEXT['MESSAGE'] = '�zenet';
$TEXT['SUBJECT'] = 'T�rgy';
$TEXT['MATCH'] = 'egyezik';
$TEXT['ALL_WORDS'] = 'Minden sz�';
$TEXT['ANY_WORDS'] = 'B�rmely sz�';
$TEXT['EXACT_MATCH'] = 'Pontos egyez�s';
$TEXT['SHOW'] = 'Mutat';
$TEXT['HIDE'] = 'Elrejt';
$TEXT['START_PUBLISHING'] = 'Publik�l�s kezdete';
$TEXT['FINISH_PUBLISHING'] = 'Publik�l�s v�ge';
$TEXT['DATE'] = 'D�tum';
$TEXT['START'] = 'Kezd';
$TEXT['END'] = 'v�ge';
$TEXT['IMAGE'] = 'K�p';
$TEXT['ICON'] = 'Ikon';
$TEXT['SECTION'] = 'Szakasz';
$TEXT['DATE_FORMAT'] = 'D�tum form�tum';
$TEXT['TIME_FORMAT'] = 'Id� form�tum';
$TEXT['RESULTS'] = 'Eredm�nyek';
$TEXT['RESIZE'] = '�jra m�retez';
$TEXT['MANAGE'] = 'Kezel';
$TEXT['CODE'] = 'K�d';
$TEXT['WIDTH'] = 'Sz�less�g';
$TEXT['HEIGHT'] = 'Magass�g';
$TEXT['MORE'] = 'B�vebben';
$TEXT['READ_MORE'] = '</br>Tov�bb...</br>';
$TEXT['CHANGE_SETTINGS'] = 'Be�ll�t�sok megv�ltoztat�sa';
$TEXT['CURRENT_PAGE'] = 'Aktu�lis Lap';
$TEXT['CLOSE'] = 'Bez�r';
$TEXT['INTRO_PAGE'] = 'Bevezet� Lap';
$TEXT['INSTALLATION_URL'] = 'Telep�t�si URL';
$TEXT['INSTALLATION_PATH'] = 'Telep�t�si �tvonal';
$TEXT['PAGE_EXTENSION'] = 'Lap kiterjeszt�s';
$TEXT['NO_RESULTS'] = 'Nincs eredm�ny';
$TEXT['WEBSITE_TITLE'] = 'Weblap C�m';
$TEXT['WEBSITE_DESCRIPTION'] = 'Weblap le�r�s';
$TEXT['WEBSITE_KEYWORDS'] = 'Weblap kulcsszavak';
$TEXT['WEBSITE_HEADER'] = 'Weblap fejl�c';
$TEXT['WEBSITE_FOOTER'] = 'Weblap l�bl�c';
$TEXT['RESULTS_HEADER'] = 'Eredm�nyek fejl�c';
$TEXT['RESULTS_LOOP'] = 'Eredm�nyek ciklus';
$TEXT['RESULTS_FOOTER'] = 'Eredm�nyek l�bl�c';
$TEXT['LEVEL'] = 'Szint';
$TEXT['NOT_FOUND'] = 'Nem tal�lhat�';
$TEXT['PAGE_SPACER'] = 'Lap filen�v elv�laszt�';
$TEXT['MATCHING'] = 'Egyez�s';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Sablon jogosults�gok';
$TEXT['PAGES_DIRECTORY'] = 'Lap k�nyvt�r';
$TEXT['MEDIA_DIRECTORY'] = 'M�dia k�nyvt�r';
$TEXT['FILE_MODE'] = 'File M�d';
$TEXT['USER'] = 'Felhaszn�l�';
$TEXT['OTHERS'] = 'Egyebek';
$TEXT['READ'] = 'Olvas�s';
$TEXT['WRITE'] = '�r�s';
$TEXT['EXECUTE'] = 'V�grehajt�s';
$TEXT['SMART_LOGIN'] = 'Okos bejelentkez�s';
$TEXT['REMEMBER_ME'] = 'Eml�kezzen';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'File rendszer jogosults�gok';
$TEXT['DIRECTORIES'] = 'K�nyvt�rak';
$TEXT['DIRECTORY_MODE'] = 'K�nyvt�r m�d';
$TEXT['LIST_OPTIONS'] = 'Lista opci�k';
$TEXT['OPTION'] = 'Opci�k';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'T�bbet is kiv�laszthat';
$TEXT['TEXTFIELD'] = 'Sz�vegmez�';
$TEXT['TEXTAREA'] = 'Sz�vegter�let';
$TEXT['SELECT_BOX'] = 'Jel�l� n�gyzet';
$TEXT['CHECKBOX_GROUP'] = 'Jel�l� n�gyzet csoport';
$TEXT['RADIO_BUTTON_GROUP'] = 'V�laszt� gomb csoport';
$TEXT['SIZE'] = 'm�ret';
$TEXT['DEFAULT_TEXT'] = 'Alap�rtelmezett sz�veg';
$TEXT['SEPERATOR'] = 'Elv�laszt�';
$TEXT['BACK'] = 'Vissza';
$TEXT['UNDER_CONSTRUCTION'] = 'Fejleszt�s alatt';
$TEXT['MULTISELECT'] = 'T�bb v�laszt�sos';
$TEXT['SHORT_TEXT'] = 'R�vid sz�veg';
$TEXT['LONG_TEXT'] = 'Hossz� sz�veg';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Honlap �tir�ny�t�s';
$TEXT['HEADING'] = 'C�msor';
$TEXT['MULTIPLE_MENUS'] = 'T�bbszint� men�';
$TEXT['REGISTERED'] = 'Regisztr�lva';
$TEXT['START'] = 'Start'; //needs to be translated
$TEXT['SECTION_BLOCKS'] = 'Szakaszok';
$TEXT['REGISTERED_VIEWERS'] = 'Regisztr�lt l�togat�k';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers'; //needs to be translated
$TEXT['SUBMISSION_ID'] = 'Bek�ld�s azonos�t�';
$TEXT['SUBMISSIONS'] = 'Bek�ld�sek';
$TEXT['SUBMITTED'] = 'Elk�ldve';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. bek�ld�s �r�nk�nt';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'T�rolva az adatb�zisban';
$TEXT['EMAIL_ADDRESS'] = 'E-mail C�m';
$TEXT['CUSTOM'] = 'Egy�ni';
$TEXT['ANONYMOUS'] = 'Anonymous'; //needs to be translated
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Szerver Oper�ci�s Rendszer';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Mindenki �ltal �rhat� file jogok';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix';
$TEXT['WINDOWS'] = 'Windows'; //needs to be translated
$TEXT['HOME_FOLDER'] = 'Home K�nyvt�r';
$TEXT['HOME_FOLDERS'] = 'Home K�nyvt�rak';
$TEXT['PAGE_TRASH'] = 'Lap kuka';
$TEXT['INLINE'] = 'sorban';
$TEXT['SEPARATE'] = 'k�l�n�ll�';
$TEXT['DELETED'] = 'T�r�lve';
$TEXT['VIEW_DELETED_PAGES'] = 'T�r�lt Lapok megtekint�se';
$TEXT['EMPTY_TRASH'] = 'Kuka �r�t�se';
$TEXT['TRASH_EMPTIED'] = 'Kuka ki�r�tve';
$TEXT['ADD_SECTION'] = 'Szakasz hozz�ad�sa';
$TEXT['POST_HEADER'] = '�zenet fejl�c';
$TEXT['POST_FOOTER'] = '�zenet l�bl�c';
$TEXT['POSTS_PER_PAGE'] = '�zenetek laponk�nt';
$TEXT['RESIZE_IMAGE_TO'] = 'K�p �tm�retez�se';
$TEXT['UNLIMITED'] = 'V�gtelen';
$TEXT['OF'] = '�sszesen:';
$TEXT['OUT_OF'] = 'T�l';
$TEXT['NEXT'] = 'K�vetkez�';
$TEXT['PREVIOUS'] = 'El�z�';
$TEXT['NEXT_PAGE'] = 'K�vetkez� oldal';
$TEXT['PREVIOUS_PAGE'] = 'El�z� oldal';
$TEXT['ON'] = 'Be';
$TEXT['LAST_UPDATED_BY'] = 'M�dos�totta';
$TEXT['RESULTS_FOR'] = 'Keresett';
$TEXT['TIME'] = 'Id�';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style'; //needs to be translated
$TEXT['WYSIWYG_EDITOR'] = "WYSIWYG Editor"; //needs to be translated
$TEXT['SERVER_EMAIL'] = 'Port�l E-mail c�me';
$TEXT['MENU'] = 'Men�';
$TEXT['MANAGE_GROUPS'] = 'Csoportok kezel�se';
$TEXT['MANAGE_USERS'] = 'Felhaszn�l�k kezel�se';
$TEXT['PAGE_LANGUAGES'] = 'Lap nyelv';
$TEXT['HIDDEN'] = 'Rejtett';
$TEXT['MAIN'] = 'F�';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Rename Files On Upload'; //needs to be translated
$TEXT['APP_NAME'] = 'Application Name'; //needs to be translated
$TEXT['SESSION_IDENTIFIER'] = 'Session Identifier'; //needs to be translated
$TEXT['BACKUP'] = 'Backup'; //needs to be translated
$TEXT['RESTORE'] = 'Restore'; //needs to be translated
$TEXT['BACKUP_DATABASE'] = 'Backup Database'; //needs to be translated
$TEXT['RESTORE_DATABASE'] = 'Restore Database'; //needs to be translated
$TEXT['BACKUP_ALL_TABLES'] = 'Backup all tables in database'; //needs to be translated
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup only WB-specific tables'; //needs to be translated
$TEXT['BACKUP_MEDIA'] = 'Backup Media'; //needs to be translated
$TEXT['RESTORE_MEDIA'] = 'Restore Media'; //needs to be translated
$TEXT['ADMINISTRATION_TOOL'] = 'Administration tool'; //needs to be translated
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha Verification'; //needs to be translated
$TEXT['VERIFICATION'] = 'Verification'; //needs to be translated
$TEXT['DEFAULT_CHARSET'] = 'Default Charset'; //needs to be translated
$TEXT['CHARSET'] = 'Charset'; //needs to be translated
$TEXT['MODULE_ORDER'] = 'Module-order for searching'; //needs to be translated
$TEXT['MAX_EXCERPT'] = 'Max lines of excerpt'; //needs to be translated
$TEXT['PUBL_START_DATE'] = 'Start date'; //needs to be translated
$TEXT['PUBL_END_DATE'] = 'End date'; //needs to be translated
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
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Sajn�ljuk, de a megjelen�t�shez nincs jogosults�ga!';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display'; //needs to be translated

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Itt nincs elegend� jogosults�god!';

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'K�rem adja meg a Felhaszn�l�nevet �s a jelsz�t';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'K�rem adja meg a Felhaszn�l�nevet';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'K�rem adja meg a jelsz�t';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'T�l r�vid Felhaszn�l�n�v';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'T�l r�vid jelsz�';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'T�l hossz� Felhaszn�l�n�v';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'T�l hossz� jelsz�';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Felhaszn�l�n�v vagy a jelsz� nem megfelel�!';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'E-mail c�met meg kell adnia';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'K�rem �rja be az E-mail c�m�t';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'Az �n �ltal megadott E-mail c�m nem talalhat� adatb�zisunkban';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Az E-mail k�ld�s probl�m�ba �tk�z�tt, k�rem vegye fel a kapcsolatot az adminisztr�torral';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'A Felhaszn�l�nev�t �s jelszav�t elk�ldt�k az �n E-mail c�m�re';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Sajn�ljuk, de a jelsz�t nem lehet egy �r�n bel�l t�bbsz�r �jrak�rni';

$MESSAGE['START']['WELCOME_MESSAGE'] = '�dv a Website Baker Admin fel�let�n';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Figyelmeztet�s! A telep�t�si k�nyvt�r m�g nem lett t�r�lve!';
$MESSAGE['START']['CURRENT_USER'] = 'Bejelentkezve mint:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'A konfigur�ci�s file nem nyithat� meg';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Nem lehets�ges a konfigur�ci�s file �r�sa';
$MESSAGE['SETTINGS']['SAVED'] = 'Be�ll�t�sok sikeresen elmentve';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Figyelmeztet�s: A nem mentett v�ltoz�sok elvesznek';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Figyelmeztet�s: Ez csak tesztk�rnyezetben javasolt';

$MESSAGE['USERS']['ADDED'] = 'Felhaszn�l� sikeresen hozz�adva';
$MESSAGE['USERS']['SAVED'] = 'Felhaszn�l� sikeresen mentve';
$MESSAGE['USERS']['DELETED'] = 'Felhaszn�l� t�r�lve';
$MESSAGE['USERS']['NO_GROUP'] = 'Csoport nincs kiv�lasztva';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'A be�rt Felhaszn�l�n�v t�l r�vid';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'A be�rt jelsz� t�l r�vid';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'A be�rt jelsz� nem eggyezik';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'Az E-mail c�m nem val�s';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'Sajnos a megadott E-mail c�met m�r haszn�latban van';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'M�r foglalt Felhaszn�l�n�v';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Figyelem: A jelsz�t itt csak annak megv�ltoztat�sakor kell megadni';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Biztos, hogy t�r�lni a kiv�lasztott felhaszn�l�t?';

$MESSAGE['GROUPS']['ADDED'] = 'Csoport sikeresen hozz�adva';
$MESSAGE['GROUPS']['SAVED'] = 'Csoport elmentve';
$MESSAGE['GROUPS']['DELETED'] = 'Csoport t�r�lve';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = '�res a csoportn�v';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Biztos, hogy t�r�lni akarja a kijel�lt csoportot? (Minden felhaszn�l�ja t�rl�dik)';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'Nincs csoport';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Group name already exists'; //needs to be translated

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Sikeres ment�s';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'E-mail friss�tve';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'A jelenlegi jelsz� hib�s';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'A jelsz� sikeresen megv�ltozott';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Figyelem: A sablon megv�ltoztat�s�t a be�ll�t�sokban teheti meg';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Nem tartalmazhat ../ -t a k�nyvt�r n�v';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Nem lehet ../ a c�l mez�ben';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Cannot have ../ in the folder target'; //needs to be translated
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Nem lehet ../ a n�vben';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'Nem lehet index.php a n�v';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'Nem tal�lhat� semmilyen m�dia file az aktu�lis k�nyvt�rban';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'File nem tal�lhat�';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'File t�r�lve';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'K�nyvt�r t�r�lve';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Biztos hogy t�rli a k�vetkez� file-t vagy k�nyvt�rat?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Nem lehet t�r�lni a kiv�lasztott file-t';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Nem lehet t�r�lni a kiv�lasztott k�nyvt�rat';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'Nem adott meg �j nevet';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'Nem adott meg file kiterjeszt�st';
$MESSAGE['MEDIA']['RENAMED'] = '�tnevez�s sikeres';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Nem siker�lt �tnevezni';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Ilyen nev� file m�r l�tezik';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Ilyen nev� k�nyvt�r m�r l�tezik';
$MESSAGE['MEDIA']['DIR_MADE'] = 'A k�nyvt�r sikeresen l�trehozva';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'nem siker�lt l�trehozni a k�nyvt�rat';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' file sikeresen felt�ltve';
$MESSAGE['MEDIA']['UPLOADED'] = ' file sikeresen felt�ltve';

$MESSAGE['PAGES']['ADDED'] = 'Lap sikeresen hozz�adva';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Lap c�msor sikeresen hozz�adva';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Ilyen lap m�r l�tezik';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Nem lehet l�trehozni az access filet a /pages k�nyvt�rban (nem megfelel� jogosults�gok)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Nem lehet t�r�lni az access filet a /pages k�nyvt�rban (nem megfelel� jogosults�gok)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Lap nem tal�lhat�';
$MESSAGE['PAGES']['SAVED'] = 'Lap sikeresen elmentve';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Lap be�ll�t�sok elmentve';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Hiba a lap ment�se k�zben';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Biztos, hogy t�r�lni akarja az adott lapot? (�s az �sszes al lapj�t)';
$MESSAGE['PAGES']['DELETED'] = 'Lap t�r�lve';
$MESSAGE['PAGES']['RESTORED'] = 'lap vissza�ll�tva';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'K�rem adjon meg Lap c�met';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'K�rem adjon meg men� nevet';
$MESSAGE['PAGES']['REORDERED'] = 'Lap sikeresen �trendezve';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Hiba a Lap �trendez�s k�zben';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'Nincs joga m�dos�tani ezt a lapot';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Nem lehet l�trehozni /pages/intro.php file-t (nincs megfelel� jogosults�g)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Bevezet� lap sikeresen elmentve';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Utolj�ra m�dos�totta:';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Kattintson ide az Bevezet� Lap m�dos�t�s�hoz';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Szakasz tulajdons�gok elmentve';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Visszat�r�s a lapokhoz';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'K�rem t�rjen vissza �s t�lts�n ki minden mez�t';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'A felt�lt�tt file csak ilyen form�tum� lehet:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'A felt�lt�tt file-ok csak a k�vetkez� form�tumuak lehetnek:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'File felt�lt�s nem lehets�ges';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'M�r telep�tve';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Nincs telp�tve';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Nem lehet elt�vol�tani';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Kicsomagol�s nem lehets�ges';
$MESSAGE['GENERIC']['INSTALLED'] = 'Telep�t�s sikeres';
$MESSAGE['GENERIC']['UPGRADED'] = 'Upgraded successfully'; //needs to be translated
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Elt�vol�t�s sikeres';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'A c�l k�nyvt�r nem �rhat�';
$MESSAGE['GENERIC']['INVALID'] = 'A felt�lt�tt file nem megfelel�';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Nem lehet elt�volt�tani! A file haszn�latban van.';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION'] = 'A weblap fejleszt�s alatt!';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'K�rem t�rjen vissza k�s�bb!';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Please be patient, this might take a while.'; //needs to be translated
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Error opening file.'; //needs to be translated

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'A k�vetkez� mez�ket k�telez� kit�ltenie';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Sajn�ljuk, de ez az �rlap t�l sokszor lett kit�ltve egy �ran bel�l! K�rem pr�b�lja meg egy �ra m�lva.';
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: '.SERVER_EMAIL; //needs to be translated

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'Please selected which add-ons you would like to have reloaded'; //needs to be translated
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'Modules reloaded successfully'; //needs to be translated
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Templates reloaded successfully'; //needs to be translated
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Languages reloaded successfully'; //needs to be translated
?>