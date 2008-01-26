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
$MENU['START'] = 'Kezdõlap';
$MENU['PAGES'] = 'Weblapok';
$MENU['MEDIA'] = 'Média';
$MENU['ADDONS'] = 'Add-on';
$MENU['MODULES'] = 'Modulok';
$MENU['TEMPLATES'] = 'Sablonok';
$MENU['LANGUAGES'] = 'Nyelvek';
$MENU['PREFERENCES'] = 'Saját adatok';
$MENU['SETTINGS'] = 'Paraméterek';
$MENU['ADMINTOOLS'] = 'Admin-Tools'; //needs to be translated
$MENU['ACCESS'] = 'Jogosultságok';
$MENU['USERS'] = 'Felhasználók';
$MENU['GROUPS'] = 'Csoportok';
$MENU['HELP'] = 'Súgó';
$MENU['VIEW'] = 'Portál nézet';
$MENU['LOGOUT'] = 'Kilépés';
$MENU['LOGIN'] = 'Belépés';
$MENU['FORGOT'] = 'Elfelejtett jelszó';

// Section overviews
$OVERVIEW['START'] = 'Admin áttekintés';
$OVERVIEW['PAGES'] = 'A Portál Weblapjainak kezelése...';
$OVERVIEW['MEDIA'] = 'A "media" könyvtárban tárolt fileok kezelése...';
$OVERVIEW['MODULES'] = 'Website Baker modulok kezelése...';
$OVERVIEW['TEMPLATES'] = 'A Honlap megjelenésének változtatása Sablonokkal...';
$OVERVIEW['LANGUAGES'] = 'Website Baker nyelvi beállítások...';
$OVERVIEW['PREFERENCES'] = 'Beállítások megváltoztatása mint: email, jelszó, stb... ';
$OVERVIEW['SETTINGS'] = 'A rendszer globális beállítása...';
$OVERVIEW['USERS'] = 'Felhasználók bejelentkezési engedélyei...';
$OVERVIEW['GROUPS'] = 'Csoportok és azok rendszer jogainak kezelése...';
$OVERVIEW['HELP'] = 'Kérdésed van? itt találsz választ...  (Angol)';
$OVERVIEW['VIEW'] = 'A kész Portál megtekintése új ablakban...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Lap módosítása/Törlése';
$HEADING['DELETED_PAGES'] = 'Törölt Lapok';
$HEADING['ADD_PAGE'] = 'Lap hozzáadása';
$HEADING['ADD_HEADING'] = 'Fejléc hozzáadása';
$HEADING['MODIFY_PAGE'] = 'Lap módosítása';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Lap beállításainak módosítása';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Speciális beállítások';
$HEADING['MANAGE_SECTIONS'] = 'Szakaszok kezelése';
$HEADING['MODIFY_INTRO_PAGE'] = 'Bevezetõ lap módosítása';

$HEADING['BROWSE_MEDIA'] = 'Média böngészése';
$HEADING['CREATE_FOLDER'] = 'új könyvtár';
$HEADING['UPLOAD_FILES'] = 'Upload File(s)';

$HEADING['INSTALL_MODULE'] = 'Modul telepítés';
$HEADING['UNINSTALL_MODULE'] = 'Modul eltávolítás';
$HEADING['MODULE_DETAILS'] = 'Modul infó';

$HEADING['INSTALL_TEMPLATE'] = 'Sablon telepítés';
$HEADING['UNINSTALL_TEMPLATE'] = 'Sablon eltávolítás';
$HEADING['TEMPLATE_DETAILS'] = 'Sablon infó';

$HEADING['INSTALL_LANGUAGE'] = 'Nyelv telepítés';
$HEADING['UNINSTALL_LANGUAGE'] = 'Nyelv eltávolítás';
$HEADING['LANGUAGE_DETAILS'] = 'Nyelv Infó';

$HEADING['MY_SETTINGS'] = 'Beállítások';
$HEADING['MY_EMAIL'] = 'E-mail';
$HEADING['MY_PASSWORD'] = 'Jelszó';

$HEADING['GENERAL_SETTINGS'] = 'Általános beállítások';
$HEADING['DEFAULT_SETTINGS'] = 'Alapértelmezett Beállítások';
$HEADING['SEARCH_SETTINGS'] = 'Keresési beállítások';
$HEADING['FILESYSTEM_SETTINGS'] = 'Filerendszer';
$HEADING['SERVER_SETTINGS'] = 'Server Settings'; //needs to be translated
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings'; //needs to be translated
$HEADING['ADMINISTRATION_TOOLS'] = 'Administration Tools'; //needs to be translated

$HEADING['MODIFY_DELETE_USER'] = 'Felhasználó módosítása/törlése';
$HEADING['ADD_USER'] = 'Felhasználó hozzáadása';
$HEADING['MODIFY_USER'] = 'Felhasználó módosítása';

$HEADING['MODIFY_DELETE_GROUP'] = 'Csoport módosítása/törlése';
$HEADING['ADD_GROUP'] = 'Csoport módosítása';
$HEADING['MODIFY_GROUP'] = 'csoport módosítása';

// Other text
$TEXT['ADD'] = 'Hozzáad';
$TEXT['MODIFY'] = 'Módosítás';
$TEXT['SETTINGS'] = 'Beállítás';
$TEXT['DELETE'] = 'Törlés';
$TEXT['SAVE'] = 'Mentés';
$TEXT['RESET'] = 'Visszavon';
$TEXT['LOGIN'] = 'Belépés';
$TEXT['RELOAD'] = 'újratöltés';
$TEXT['CANCEL'] = 'Mégse';
$TEXT['NAME'] = 'Név';
$TEXT['PLEASE_SELECT'] = 'Kérem válasszon';
$TEXT['TITLE'] = 'Cím';
$TEXT['PARENT'] = 'Almenüje ennek';
$TEXT['TYPE'] = 'Típus';
$TEXT['VISIBILITY'] = 'Megjelenés';
$TEXT['PRIVATE'] = 'Privát';
$TEXT['PUBLIC'] = 'Publikus';
$TEXT['NONE'] = 'egyik sem';
$TEXT['NONE_FOUND'] = 'Nem található';
$TEXT['CURRENT'] = 'Aktuális';
$TEXT['CHANGE'] = 'Módosít';
$TEXT['WINDOW'] = 'ablak';
$TEXT['DESCRIPTION'] = 'Leírás';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['ADMINISTRATORS'] = 'Adminisztrátorok';
$TEXT['PRIVATE_VIEWERS'] = 'Privát jogosultak';
$TEXT['EXPAND'] = 'Kibont';
$TEXT['COLLAPSE'] = 'Összecsuk';
$TEXT['MOVE_UP'] = 'Mozgat Fel';
$TEXT['MOVE_DOWN'] = 'Mozgat Le';
$TEXT['RENAME'] = 'Átnevez';
$TEXT['MODIFY_SETTINGS'] = 'Beállítások módosítása';
$TEXT['MODIFY_CONTENT'] = 'Tartalom módosítása';
$TEXT['VIEW'] = 'Nézet';
$TEXT['UP'] = 'Fel';
$TEXT['FORGOTTEN_DETAILS'] = 'Mi is a jelszó?';
$TEXT['NEED_TO_LOGIN'] = 'Vissza a belépéshez';
$TEXT['SEND_DETAILS'] = 'Jelszó elküldése';
$TEXT['USERNAME'] = 'Felhasználónév';
$TEXT['PASSWORD'] = 'Jelszó';
$TEXT['HOME'] = 'Kezdõlap';
$TEXT['TARGET_FOLDER'] = 'Cél könyvtár';
$TEXT['OVERWRITE_EXISTING'] = 'Meglévõ felülírása';
$TEXT['FILE'] = 'File'; //needs to be translated
$TEXT['FILES'] = 'File-ok';
$TEXT['FOLDER'] = 'Folder'; //needs to be translated
$TEXT['FOLDERS'] = 'Könyvtárak';
$TEXT['CREATE_FOLDER'] = 'Könyvtár létrehozása';
$TEXT['UPLOAD_FILES'] = 'File feltöltés';
$TEXT['CURRENT_FOLDER'] = 'aktuális könyvtár';
$TEXT['TO'] = 'Címzett';
$TEXT['FROM'] = 'Feladó';
$TEXT['INSTALL'] = 'Telepít';
$TEXT['UNINSTALL'] = 'Eltávolít';
$TEXT['VIEW_DETAILS'] = 'infót megzéz';
$TEXT['DISPLAY_NAME'] = 'Megjelenõ Név';
$TEXT['AUTHOR'] = 'Szerzõ';
$TEXT['VERSION'] = 'Verzió';
$TEXT['DESIGNED_FOR'] = 'tervezve';
$TEXT['DESCRIPTION'] = 'Leírás';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['LANGUAGE'] = 'Nyelv';
$TEXT['TIMEZONE'] = 'Idõzóna';
$TEXT['CURRENT_PASSWORD'] = 'Aktuális Jelszó';
$TEXT['NEW_PASSWORD'] = 'Új Jelszó';
$TEXT['RETYPE_NEW_PASSWORD'] = 'új Jelszó mégegyszer';
$TEXT['ACTIVE'] = 'Aktív';
$TEXT['DISABLED'] = 'Letiltva';
$TEXT['ENABLED'] = 'Engedélyezve';
$TEXT['RETYPE_PASSWORD'] = 'Jelszó mégegyszer';
$TEXT['GROUP'] = 'Csoport';
$TEXT['SYSTEM_PERMISSIONS'] = 'Rendzser engedélyek';
$TEXT['MODULE_PERMISSIONS'] = 'Modul engedélyek';
$TEXT['SHOW_ADVANCED'] = 'Speciális beállítások mutatása';
$TEXT['HIDE_ADVANCED'] = 'Speciális beállítások elrejtése';
$TEXT['BASIC'] = 'Alap';
$TEXT['ADVANCED'] = 'Bõvített';
$TEXT['WEBSITE'] = 'Weblap';
$TEXT['DEFAULT'] = 'Alapértelmezett';
$TEXT['KEYWORDS'] = 'Kulcsszavak';
$TEXT['TEXT'] = 'Szöveg';
$TEXT['HEADER'] = 'Fejléc';
$TEXT['FOOTER'] = 'Lábléc';
$TEXT['TEMPLATE'] = 'Sablon';
$TEXT['INSTALLATION'] = 'Telepítés';
$TEXT['DATABASE'] = 'Adatbázis';
$TEXT['HOST'] = 'Host'; //needs to be translated
$TEXT['INTRO'] = 'Bevezetõ';
$TEXT['PAGE'] = 'Lap';
$TEXT['SIGNUP'] = 'Regisztrálás...';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP hibajelentési szint';
$TEXT['ADMIN'] = 'Admin'; //needs to be translated
$TEXT['PATH'] = 'Path'; //needs to be translated
$TEXT['URL'] = 'URL'; //needs to be translated
$TEXT['FRONTEND'] = 'Megjelenõ felület';
$TEXT['EXTENSION'] = 'kiterjesztés';
$TEXT['TABLE_PREFIX'] = 'Tábla elõtag';
$TEXT['CHANGES'] = 'Vátozások';
$TEXT['ADMINISTRATION'] = 'Adminisztrálás';
$TEXT['FORGOT_DETAILS'] = 'Elfelejtettem a jelszót.';
$TEXT['LOGGED_IN'] = 'Bejelentkezve';
$TEXT['WELCOME_BACK'] = 'Üdv';
$TEXT['FULL_NAME'] = 'Teljes név';
$TEXT['ACCOUNT_SIGNUP'] = 'Account Sign-Up'; //needs to be translated
$TEXT['LINK'] = 'Link'; //needs to be translated
$TEXT['ANCHOR'] = 'Anchor'; //needs to be translated
$TEXT['TARGET'] = 'cél';
$TEXT['NEW_WINDOW'] = 'Új ablak';
$TEXT['SAME_WINDOW'] = 'Azonos Ablak';
$TEXT['TOP_FRAME'] = 'Top Frame'; //needs to be translated
$TEXT['PAGE_LEVEL_LIMIT'] = 'Lap szint limit';
$TEXT['SUCCESS'] = 'Sikeres';
$TEXT['ERROR'] = 'Hiba';
$TEXT['ARE_YOU_SURE'] = 'Biztos?';
$TEXT['YES'] = 'Igen';
$TEXT['NO'] = 'Nem';
$TEXT['SYSTEM_DEFAULT'] = 'Rendszer alapértelmezett';
$TEXT['PAGE_TITLE'] = 'Lap cím';
$TEXT['MENU_TITLE'] = 'Menu Cím';
$TEXT['ACTIONS'] = 'Tevékenységek';
$TEXT['UNKNOWN'] = 'Ismeretlen';
$TEXT['BLOCK'] = 'Blokk';
$TEXT['SEARCH'] = 'Keresés';
$TEXT['SEARCHING'] = 'Keresés...';
$TEXT['POST'] = 'Cikk';
$TEXT['COMMENT'] = 'Megjegyzés';
$TEXT['COMMENTS'] = 'Megjegyzések';
$TEXT['COMMENTING'] = 'Kommentálás';
$TEXT['SHORT'] = 'Rövid';
$TEXT['LONG'] = 'Hosszû';
$TEXT['LOOP'] = 'ismétlõdõ</br> törzs szakasz';
$TEXT['FIELD'] = 'Mezõ';
$TEXT['REQUIRED'] = 'Kötelezõ';
$TEXT['LENGTH'] = 'hossz';
$TEXT['MESSAGE'] = 'Üzenet';
$TEXT['SUBJECT'] = 'Tárgy';
$TEXT['MATCH'] = 'egyezik';
$TEXT['ALL_WORDS'] = 'Minden szó';
$TEXT['ANY_WORDS'] = 'Bármely szó';
$TEXT['EXACT_MATCH'] = 'Pontos egyezés';
$TEXT['SHOW'] = 'Mutat';
$TEXT['HIDE'] = 'Elrejt';
$TEXT['START_PUBLISHING'] = 'Publikálás kezdete';
$TEXT['FINISH_PUBLISHING'] = 'Publikálás vége';
$TEXT['DATE'] = 'Dátum';
$TEXT['START'] = 'Kezd';
$TEXT['END'] = 'vége';
$TEXT['IMAGE'] = 'Kép';
$TEXT['ICON'] = 'Ikon';
$TEXT['SECTION'] = 'Szakasz';
$TEXT['DATE_FORMAT'] = 'Dátum formátum';
$TEXT['TIME_FORMAT'] = 'Idõ formátum';
$TEXT['RESULTS'] = 'Eredmények';
$TEXT['RESIZE'] = 'újra méretez';
$TEXT['MANAGE'] = 'Kezel';
$TEXT['CODE'] = 'Kód';
$TEXT['WIDTH'] = 'Szélesség';
$TEXT['HEIGHT'] = 'Magasság';
$TEXT['MORE'] = 'Bõvebben';
$TEXT['READ_MORE'] = '</br>Tovább...</br>';
$TEXT['CHANGE_SETTINGS'] = 'Beállítások megváltoztatása';
$TEXT['CURRENT_PAGE'] = 'Aktuális Lap';
$TEXT['CLOSE'] = 'Bezár';
$TEXT['INTRO_PAGE'] = 'Bevezetõ Lap';
$TEXT['INSTALLATION_URL'] = 'Telepítési URL';
$TEXT['INSTALLATION_PATH'] = 'Telepítési útvonal';
$TEXT['PAGE_EXTENSION'] = 'Lap kiterjesztés';
$TEXT['NO_RESULTS'] = 'Nincs eredmény';
$TEXT['WEBSITE_TITLE'] = 'Weblap Cím';
$TEXT['WEBSITE_DESCRIPTION'] = 'Weblap leírás';
$TEXT['WEBSITE_KEYWORDS'] = 'Weblap kulcsszavak';
$TEXT['WEBSITE_HEADER'] = 'Weblap fejléc';
$TEXT['WEBSITE_FOOTER'] = 'Weblap lábléc';
$TEXT['RESULTS_HEADER'] = 'Eredmények fejléc';
$TEXT['RESULTS_LOOP'] = 'Eredmények ciklus';
$TEXT['RESULTS_FOOTER'] = 'Eredmények lábléc';
$TEXT['LEVEL'] = 'Szint';
$TEXT['NOT_FOUND'] = 'Nem található';
$TEXT['PAGE_SPACER'] = 'Lap filenév elválasztó';
$TEXT['MATCHING'] = 'Egyezés';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Sablon jogosultságok';
$TEXT['PAGES_DIRECTORY'] = 'Lap könyvtár';
$TEXT['MEDIA_DIRECTORY'] = 'Média könyvtár';
$TEXT['FILE_MODE'] = 'File Mód';
$TEXT['USER'] = 'Felhasználó';
$TEXT['OTHERS'] = 'Egyebek';
$TEXT['READ'] = 'Olvasás';
$TEXT['WRITE'] = 'Írás';
$TEXT['EXECUTE'] = 'Végrehajtás';
$TEXT['SMART_LOGIN'] = 'Okos bejelentkezés';
$TEXT['REMEMBER_ME'] = 'Emlékezzen';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'File rendszer jogosultságok';
$TEXT['DIRECTORIES'] = 'Könyvtárak';
$TEXT['DIRECTORY_MODE'] = 'Könyvtár mód';
$TEXT['LIST_OPTIONS'] = 'Lista opciók';
$TEXT['OPTION'] = 'Opciók';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Többet is kiválaszthat';
$TEXT['TEXTFIELD'] = 'Szövegmezõ';
$TEXT['TEXTAREA'] = 'Szövegterület';
$TEXT['SELECT_BOX'] = 'Jelölõ négyzet';
$TEXT['CHECKBOX_GROUP'] = 'Jelölõ négyzet csoport';
$TEXT['RADIO_BUTTON_GROUP'] = 'Választó gomb csoport';
$TEXT['SIZE'] = 'méret';
$TEXT['DEFAULT_TEXT'] = 'Alapértelmezett szöveg';
$TEXT['SEPERATOR'] = 'Elválasztó';
$TEXT['BACK'] = 'Vissza';
$TEXT['UNDER_CONSTRUCTION'] = 'Fejlesztés alatt';
$TEXT['MULTISELECT'] = 'Több választásos';
$TEXT['SHORT_TEXT'] = 'Rövid szöveg';
$TEXT['LONG_TEXT'] = 'Hosszú szöveg';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Honlap átirányítás';
$TEXT['HEADING'] = 'Címsor';
$TEXT['MULTIPLE_MENUS'] = 'Többszintû menü';
$TEXT['REGISTERED'] = 'Regisztrálva';
$TEXT['START'] = 'Start'; //needs to be translated
$TEXT['SECTION_BLOCKS'] = 'Szakaszok';
$TEXT['REGISTERED_VIEWERS'] = 'Regisztrált látogatók';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers'; //needs to be translated
$TEXT['SUBMISSION_ID'] = 'Beküldés azonosító';
$TEXT['SUBMISSIONS'] = 'Beküldések';
$TEXT['SUBMITTED'] = 'Elküldve';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. beküldés óránként';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Tárolva az adatbázisban';
$TEXT['EMAIL_ADDRESS'] = 'E-mail Cím';
$TEXT['CUSTOM'] = 'Egyéni';
$TEXT['ANONYMOUS'] = 'Anonymous'; //needs to be translated
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Szerver Operációs Rendszer';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Mindenki által írható file jogok';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix';
$TEXT['WINDOWS'] = 'Windows'; //needs to be translated
$TEXT['HOME_FOLDER'] = 'Home Könyvtár';
$TEXT['HOME_FOLDERS'] = 'Home Könyvtárak';
$TEXT['PAGE_TRASH'] = 'Lap kuka';
$TEXT['INLINE'] = 'sorban';
$TEXT['SEPARATE'] = 'különálló';
$TEXT['DELETED'] = 'Törölve';
$TEXT['VIEW_DELETED_PAGES'] = 'Törölt Lapok megtekintése';
$TEXT['EMPTY_TRASH'] = 'Kuka ürítése';
$TEXT['TRASH_EMPTIED'] = 'Kuka kiürítve';
$TEXT['ADD_SECTION'] = 'Szakasz hozzáadása';
$TEXT['POST_HEADER'] = 'Üzenet fejléc';
$TEXT['POST_FOOTER'] = 'Üzenet lábléc';
$TEXT['POSTS_PER_PAGE'] = 'Üzenetek laponként';
$TEXT['RESIZE_IMAGE_TO'] = 'Kép átméretezése';
$TEXT['UNLIMITED'] = 'Végtelen';
$TEXT['OF'] = 'összesen:';
$TEXT['OUT_OF'] = 'Túl';
$TEXT['NEXT'] = 'Következõ';
$TEXT['PREVIOUS'] = 'Elõzõ';
$TEXT['NEXT_PAGE'] = 'Következõ oldal';
$TEXT['PREVIOUS_PAGE'] = 'Elõzõ oldal';
$TEXT['ON'] = 'Be';
$TEXT['LAST_UPDATED_BY'] = 'Módosította';
$TEXT['RESULTS_FOR'] = 'Keresett';
$TEXT['TIME'] = 'Idõ';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style'; //needs to be translated
$TEXT['WYSIWYG_EDITOR'] = "WYSIWYG Editor"; //needs to be translated
$TEXT['SERVER_EMAIL'] = 'Portál E-mail címe';
$TEXT['MENU'] = 'Menü';
$TEXT['MANAGE_GROUPS'] = 'Csoportok kezelése';
$TEXT['MANAGE_USERS'] = 'Felhasználók kezelése';
$TEXT['PAGE_LANGUAGES'] = 'Lap nyelv';
$TEXT['HIDDEN'] = 'Rejtett';
$TEXT['MAIN'] = 'Fõ';
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
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Sajnáljuk, de a megjelenítéshez nincs jogosultsága!';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display'; //needs to be translated

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Itt nincs elegendõ jogosultságod!';

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Kérem adja meg a Felhasználónevet és a jelszót';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'Kérem adja meg a Felhasználónevet';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'Kérem adja meg a jelszót';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'Túl rövid Felhasználónév';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'Túl rövid jelszó';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'Túl hosszú Felhasználónév';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'Túl hosszú jelszó';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Felhasználónév vagy a jelszó nem megfelelõ!';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'E-mail címet meg kell adnia';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'Kérem írja be az E-mail címét';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'Az Ön által megadott E-mail cím nem talalható adatbázisunkban';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Az E-mail küldés problémába ütközött, kérem vegye fel a kapcsolatot az adminisztrátorral';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'A Felhasználónevét és jelszavát elküldtük az Ön E-mail címére';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Sajnáljuk, de a jelszót nem lehet egy órán belül többször újrakérni';

$MESSAGE['START']['WELCOME_MESSAGE'] = 'Üdv a Website Baker Admin felületén';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Figyelmeztetés! A telepítési könyvtár még nem lett törölve!';
$MESSAGE['START']['CURRENT_USER'] = 'Bejelentkezve mint:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'A konfigurációs file nem nyitható meg';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Nem lehetséges a konfigurációs file írása';
$MESSAGE['SETTINGS']['SAVED'] = 'Beállítások sikeresen elmentve';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Figyelmeztetés: A nem mentett változások elvesznek';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Figyelmeztetés: Ez csak tesztkörnyezetben javasolt';

$MESSAGE['USERS']['ADDED'] = 'Felhasználó sikeresen hozzáadva';
$MESSAGE['USERS']['SAVED'] = 'Felhasználó sikeresen mentve';
$MESSAGE['USERS']['DELETED'] = 'Felhasználó törölve';
$MESSAGE['USERS']['NO_GROUP'] = 'Csoport nincs kiválasztva';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'A beírt Felhasználónév túl rövid';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'A beírt jelszó túl rövid';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'A beírt jelszó nem eggyezik';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'Az E-mail cím nem valós';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'Sajnos a megadott E-mail címet már használatban van';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'Már foglalt Felhasználónév';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Figyelem: A jelszót itt csak annak megváltoztatásakor kell megadni';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Biztos, hogy törölni a kiválasztott felhasználót?';

$MESSAGE['GROUPS']['ADDED'] = 'Csoport sikeresen hozzáadva';
$MESSAGE['GROUPS']['SAVED'] = 'Csoport elmentve';
$MESSAGE['GROUPS']['DELETED'] = 'Csoport törölve';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = 'Üres a csoportnév';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Biztos, hogy törölni akarja a kijelölt csoportot? (Minden felhasználója törlõdik)';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'Nincs csoport';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Group name already exists'; //needs to be translated

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Sikeres mentés';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'E-mail frissítve';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'A jelenlegi jelszó hibás';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'A jelszó sikeresen megváltozott';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Figyelem: A sablon megváltoztatását a beállításokban teheti meg';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Nem tartalmazhat ../ -t a könyvtár név';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Nem lehet ../ a cél mezõben';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Cannot have ../ in the folder target'; //needs to be translated
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Nem lehet ../ a névben';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'Nem lehet index.php a név';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'Nem található semmilyen média file az aktuális könyvtárban';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'File nem található';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'File törölve';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Könyvtár törölve';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Biztos hogy törli a következõ file-t vagy könyvtárat?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Nem lehet törölni a kiválasztott file-t';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Nem lehet törölni a kiválasztott könyvtárat';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'Nem adott meg új nevet';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'Nem adott meg file kiterjesztést';
$MESSAGE['MEDIA']['RENAMED'] = 'Átnevezés sikeres';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Nem sikerült átnevezni';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Ilyen nevû file már létezik';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Ilyen nevû könyvtár már létezik';
$MESSAGE['MEDIA']['DIR_MADE'] = 'A könyvtár sikeresen létrehozva';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'nem sikerült létrehozni a könyvtárat';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' file sikeresen feltöltve';
$MESSAGE['MEDIA']['UPLOADED'] = ' file sikeresen feltöltve';

$MESSAGE['PAGES']['ADDED'] = 'Lap sikeresen hozzáadva';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Lap címsor sikeresen hozzáadva';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Ilyen lap már létezik';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Nem lehet létrehozni az access filet a /pages könyvtárban (nem megfelelõ jogosultságok)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Nem lehet törölni az access filet a /pages könyvtárban (nem megfelelõ jogosultságok)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Lap nem található';
$MESSAGE['PAGES']['SAVED'] = 'Lap sikeresen elmentve';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Lap beállítások elmentve';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Hiba a lap mentése közben';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Biztos, hogy törölni akarja az adott lapot? (és az összes al lapját)';
$MESSAGE['PAGES']['DELETED'] = 'Lap törölve';
$MESSAGE['PAGES']['RESTORED'] = 'lap visszaállítva';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'Kérem adjon meg Lap címet';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'Kérem adjon meg menü nevet';
$MESSAGE['PAGES']['REORDERED'] = 'Lap sikeresen átrendezve';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Hiba a Lap átrendezés közben';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'Nincs joga módosítani ezt a lapot';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Nem lehet létrehozni /pages/intro.php file-t (nincs megfelelõ jogosultság)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Bevezetõ lap sikeresen elmentve';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Utoljára módosította:';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Kattintson ide az Bevezetõ Lap módosításához';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Szakasz tulajdonságok elmentve';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Visszatérés a lapokhoz';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'Kérem térjen vissza és töltsön ki minden mezõt';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'A feltöltött file csak ilyen formátumú lehet:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'A feltöltött file-ok csak a következõ formátumuak lehetnek:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'File feltöltés nem lehetséges';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'Már telepítve';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Nincs telpítve';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Nem lehet eltávolítani';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Kicsomagolás nem lehetséges';
$MESSAGE['GENERIC']['INSTALLED'] = 'Telepítés sikeres';
$MESSAGE['GENERIC']['UPGRADED'] = 'Upgraded successfully'; //needs to be translated
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Eltávolítás sikeres';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'A cél könyvtár nem írható';
$MESSAGE['GENERIC']['INVALID'] = 'A feltöltött file nem megfelelõ';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Nem lehet eltávoltítani! A file használatban van.';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION'] = 'A weblap fejlesztés alatt!';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'Kérem térjen vissza késõbb!';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Please be patient, this might take a while.'; //needs to be translated
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Error opening file.'; //needs to be translated

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'A következõ mezõket kötelezõ kitöltenie';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Sajnáljuk, de ez az ûrlap túl sokszor lett kitöltve egy óran belül! Kérem próbálja meg egy óra múlva.';
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: '.SERVER_EMAIL; //needs to be translated

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'Please selected which add-ons you would like to have reloaded'; //needs to be translated
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'Modules reloaded successfully'; //needs to be translated
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Templates reloaded successfully'; //needs to be translated
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Languages reloaded successfully'; //needs to be translated
?>