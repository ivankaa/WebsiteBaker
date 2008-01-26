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
$language_code = 'ET';
$language_name = 'Eesti';
$language_version = '2.7';
$language_platform = '2.7.x';
$language_author = 'Heiko Häng';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Start'; //needs to be translated
$MENU['PAGES'] = 'Lehed';
$MENU['MEDIA'] = 'Meedia';
$MENU['ADDONS'] = 'Lisad';
$MENU['MODULES'] = 'Moodulid';
$MENU['TEMPLATES'] = 'Kujundused';
$MENU['LANGUAGES'] = 'Keeled';
$MENU['PREFERENCES'] = 'Valikud';
$MENU['SETTINGS'] = 'Seaded';
$MENU['ADMINTOOLS'] = 'Admin-Tools'; //needs to be translated
$MENU['ACCESS'] = 'Ligipääs';
$MENU['USERS'] = 'Kasutajad';
$MENU['GROUPS'] = 'Grupid';
$MENU['HELP'] = 'Abi';
$MENU['VIEW'] = 'Vaata';
$MENU['LOGOUT'] = 'Logi Välja';
$MENU['LOGIN'] = 'Logi Sisse';
$MENU['FORGOT'] = 'Retrieve Login Details'; //needs to be translated

// Section overviews
$OVERVIEW['START'] = 'Administratsiooni ülevaade';
$OVERVIEW['PAGES'] = 'Halda oma veebisaidi lehekülgi...';
$OVERVIEW['MEDIA'] = 'Halda faile mis on media kaustas...';
$OVERVIEW['MODULES'] = 'Halda Website Bakeri mooduleid...';
$OVERVIEW['TEMPLATES'] = 'Change the look and feel of your website with templates...'; //needs to be translated
$OVERVIEW['LANGUAGES'] = 'Halda Website Bakeri keeli...';
$OVERVIEW['PREFERENCES'] = 'Muuda eelistusi nagu emaili aadress, parool, jne... ';
$OVERVIEW['SETTINGS'] = 'Muuda seadeid Website Bakeri jaoks...';
$OVERVIEW['USERS'] = 'Halda kasutajaid kes saavad logida Website Bakerisse...';
$OVERVIEW['GROUPS'] = 'Halda kasutajate gruppe ja nende õiguseid...';
$OVERVIEW['HELP'] = 'On küsimusi? Leia oma vastus...';
$OVERVIEW['VIEW'] = 'Kiirelt vaata ja lehitse oma veebisaiti uues aknas...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Muuda/Kustuta Leht';
$HEADING['DELETED_PAGES'] = 'Kustutatud Lehed';
$HEADING['ADD_PAGE'] = 'Lisa Leht';
$HEADING['ADD_HEADING'] = 'Add Heading'; //needs to be translated
$HEADING['MODIFY_PAGE'] = 'Muuda Lehte';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Muuda Lehe Seadeid';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Muuda Arenenud Lehe Seadeid';
$HEADING['MANAGE_SECTIONS'] = 'Muuda Sektsioone';
$HEADING['MODIFY_INTRO_PAGE'] = 'Muuda Intro Lehte';

$HEADING['BROWSE_MEDIA'] = 'Sirvi Meediat';
$HEADING['CREATE_FOLDER'] = 'Loo Kaust';
$HEADING['UPLOAD_FILES'] = 'Saada Fail(id)';

$HEADING['INSTALL_MODULE'] = 'Paigalda Moodul';
$HEADING['UNINSTALL_MODULE'] = 'Eemalda Moodul';
$HEADING['MODULE_DETAILS'] = 'Mooduli Detailid';

$HEADING['INSTALL_TEMPLATE'] = 'Paigalda Kujundus';
$HEADING['UNINSTALL_TEMPLATE'] = 'Eemalda Kujundus';
$HEADING['TEMPLATE_DETAILS'] = 'Kujunduse Detailid';

$HEADING['INSTALL_LANGUAGE'] = 'Paigalda Keel';
$HEADING['UNINSTALL_LANGUAGE'] = 'Eemalda Keel';
$HEADING['LANGUAGE_DETAILS'] = 'Keele Detailid';

$HEADING['MY_SETTINGS'] = 'Minu Seaded';
$HEADING['MY_EMAIL'] = 'Minu Email';
$HEADING['MY_PASSWORD'] = 'Minu Parool';

$HEADING['GENERAL_SETTINGS'] = 'Üldised Seaded';
$HEADING['DEFAULT_SETTINGS'] = 'Vaikimisi Seaded';
$HEADING['SEARCH_SETTINGS'] = 'Otsingu Seaded';
$HEADING['FILESYSTEM_SETTINGS'] = 'Failisüsteemi Seaded';
$HEADING['SERVER_SETTINGS'] = 'Server Settings'; //needs to be translated
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings'; //needs to be translated
$HEADING['ADMINISTRATION_TOOLS'] = 'Administration Tools'; //needs to be translated

$HEADING['MODIFY_DELETE_USER'] = 'Muuda/Kustuta Kasutaja';
$HEADING['ADD_USER'] = 'Lisa Kasutaja';
$HEADING['MODIFY_USER'] = 'Muuda Kasutajat';

$HEADING['MODIFY_DELETE_GROUP'] = 'Muuda/Kustuta Grupp';
$HEADING['ADD_GROUP'] = 'Lisa Grupp';
$HEADING['MODIFY_GROUP'] = 'Muuda Gruppi';

// Other text
$TEXT['ADD'] = 'Lisa';
$TEXT['MODIFY'] = 'Muuda';
$TEXT['SETTINGS'] = 'Seaded';
$TEXT['DELETE'] = 'Kustuta';
$TEXT['SAVE'] = 'Salvesta';
$TEXT['RESET'] = 'Tagasta';
$TEXT['LOGIN'] = 'Logi Sisse';
$TEXT['RELOAD'] = 'Lae Uuesti';
$TEXT['CANCEL'] = 'Katkesta';
$TEXT['NAME'] = 'Nimi';
$TEXT['PLEASE_SELECT'] = 'Palun vali';
$TEXT['TITLE'] = 'Pealkiri';
$TEXT['PARENT'] = 'Vanem';
$TEXT['TYPE'] = 'Tüüp';
$TEXT['VISIBILITY'] = 'Nähtavus';
$TEXT['PRIVATE'] = 'Privaatne';
$TEXT['PUBLIC'] = 'Avalik';
$TEXT['NONE'] = 'Mitte Ükski';
$TEXT['NONE_FOUND'] = 'Ei Leitud';
$TEXT['CURRENT'] = 'Praegune';
$TEXT['CHANGE'] = 'Muuda';
$TEXT['WINDOW'] = 'Aken';
$TEXT['DESCRIPTION'] = 'Kirjeldus';
$TEXT['KEYWORDS'] = 'Märksõnad';
$TEXT['ADMINISTRATORS'] = 'Administraatorid';
$TEXT['PRIVATE_VIEWERS'] = 'Privaatsed Vaatajad';
$TEXT['EXPAND'] = 'Laienda';
$TEXT['COLLAPSE'] = 'Kollaps';
$TEXT['MOVE_UP'] = 'Liigu Ülesse';
$TEXT['MOVE_DOWN'] = 'Liigu Alla';
$TEXT['RENAME'] = 'Nimeta Ümber';
$TEXT['MODIFY_SETTINGS'] = 'Muuda Seadeid';
$TEXT['MODIFY_CONTENT'] = 'Muuda Sisu';
$TEXT['VIEW'] = 'Vaata';
$TEXT['UP'] = 'Ülesse';
$TEXT['FORGOTTEN_DETAILS'] = 'Unustasid oma detailid?';
$TEXT['NEED_TO_LOGIN'] = 'Vajad sisselogimist?';
$TEXT['SEND_DETAILS'] = 'Saada detailid';
$TEXT['USERNAME'] = 'Kasutajanimi';
$TEXT['PASSWORD'] = 'Parool';
$TEXT['HOME'] = 'Kodu';
$TEXT['TARGET_FOLDER'] = 'Siht kaust';
$TEXT['OVERWRITE_EXISTING'] = 'Kirjuta olemasolev üle';
$TEXT['FILE'] = 'Fail';
$TEXT['FILES'] = 'Failid';
$TEXT['FOLDER'] = 'Kaust';
$TEXT['FOLDERS'] = 'Kaustad';
$TEXT['CREATE_FOLDER'] = 'Loo Kaust';
$TEXT['UPLOAD_FILES'] = 'Saada Fail(id)';
$TEXT['CURRENT_FOLDER'] = 'Praegune Kaust';
$TEXT['TO'] = 'Kellele';
$TEXT['FROM'] = 'Kellelt';
$TEXT['INSTALL'] = 'Paigalda';
$TEXT['UNINSTALL'] = 'Eemalda';
$TEXT['VIEW_DETAILS'] = 'Vaata Detaile';
$TEXT['DISPLAY_NAME'] = 'Vaate Nimi';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['VERSION'] = 'Versioon';
$TEXT['DESIGNED_FOR'] = 'Kavandatud';
$TEXT['DESCRIPTION'] = 'Kirjeldus';
$TEXT['EMAIL'] = 'Email'; //needs to be translated
$TEXT['LANGUAGE'] = 'Keel';
$TEXT['TIMEZONE'] = 'Ajatsoon';
$TEXT['CURRENT_PASSWORD'] = 'Praegune Parool';
$TEXT['NEW_PASSWORD'] = 'Uus Parool';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Korda Uut Parooli';
$TEXT['ACTIVE'] = 'Aktiivne';
$TEXT['DISABLED'] = 'Blokeeritud';
$TEXT['ENABLED'] = 'Lubatud';
$TEXT['RETYPE_PASSWORD'] = 'Korda Parooli';
$TEXT['GROUP'] = 'Grupp';
$TEXT['SYSTEM_PERMISSIONS'] = 'Süsteemi Õigused';
$TEXT['MODULE_PERMISSIONS'] = 'Mooduli Õigused';
$TEXT['SHOW_ADVANCED'] = 'Näita Arenenud Valikuid';
$TEXT['HIDE_ADVANCED'] = 'Peida Arenenud Valikud';
$TEXT['BASIC'] = 'Alus';
$TEXT['ADVANCED'] = 'Arenenud';
$TEXT['WEBSITE'] = 'Veebisait';
$TEXT['DEFAULT'] = 'Vaikimisi';
$TEXT['KEYWORDS'] = 'Märksõnad';
$TEXT['TEXT'] = 'Tekst';
$TEXT['HEADER'] = 'Päis';
$TEXT['FOOTER'] = 'Jalus';
$TEXT['TEMPLATE'] = 'Kujundus';
$TEXT['INSTALLATION'] = 'Installatsioon';
$TEXT['DATABASE'] = 'Andmebaas';
$TEXT['HOST'] = 'Hostia';
$TEXT['INTRO'] = 'Intro'; //needs to be translated
$TEXT['PAGE'] = 'Lehekülg';
$TEXT['SIGNUP'] = 'Registreeri';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Vea Esitamise Tase';
$TEXT['ADMIN'] = 'Admin'; //needs to be translated
$TEXT['PATH'] = 'Rada';
$TEXT['URL'] = 'URL'; //needs to be translated
$TEXT['FRONTEND'] = 'Frondi-lõpp';
$TEXT['EXTENSION'] = 'Ulatus';
$TEXT['TABLE_PREFIX'] = 'Tabelite Prefiks';
$TEXT['CHANGES'] = 'Muudatused';
$TEXT['ADMINISTRATION'] = 'Administratsioon';
$TEXT['FORGOT_DETAILS'] = 'Unustasid Andmed?';
$TEXT['LOGGED_IN'] = 'Sisse Logitud';
$TEXT['WELCOME_BACK'] = 'Teretulemast tagasi';
$TEXT['FULL_NAME'] = 'Täisnimi';
$TEXT['ACCOUNT_SIGNUP'] = 'Registreerimine';
$TEXT['LINK'] = 'Link'; //needs to be translated
$TEXT['ANCHOR'] = 'Anchor'; //needs to be translated
$TEXT['TARGET'] = 'Sihtmärk';
$TEXT['NEW_WINDOW'] = 'Uus Aken';
$TEXT['SAME_WINDOW'] = 'Sama Aken';
$TEXT['TOP_FRAME'] = 'Top Frame'; //needs to be translated
$TEXT['PAGE_LEVEL_LIMIT'] = 'Lehekülje Taseme Limiit';
$TEXT['SUCCESS'] = 'Edu';
$TEXT['ERROR'] = 'Viga';
$TEXT['ARE_YOU_SURE'] = 'Oled sa kindel?';
$TEXT['YES'] = 'Jah';
$TEXT['NO'] = 'Ei';
$TEXT['SYSTEM_DEFAULT'] = 'Süsteemi Vaikimisi Valik';
$TEXT['PAGE_TITLE'] = 'Lehekülje Pealkiri';
$TEXT['MENU_TITLE'] = 'Menüü Pealkiri';
$TEXT['ACTIONS'] = 'Actions'; //needs to be translated
$TEXT['UNKNOWN'] = 'Teadmata';
$TEXT['BLOCK'] = 'Blokeeri';
$TEXT['SEARCH'] = 'Otsi';
$TEXT['SEARCHING'] = 'Otsib';
$TEXT['POST'] = 'Post'; //needs to be translated
$TEXT['COMMENT'] = 'Kommentaar';
$TEXT['COMMENTS'] = 'Kommentaarid';
$TEXT['COMMENTING'] = 'Kommenteerimine';
$TEXT['SHORT'] = 'Lühike';
$TEXT['LONG'] = 'Pikk';
$TEXT['LOOP'] = 'Tsükkel';
$TEXT['FIELD'] = 'Väli';
$TEXT['REQUIRED'] = 'Required'; //needs to be translated
$TEXT['LENGTH'] = 'Pikkus';
$TEXT['MESSAGE'] = 'Teade';
$TEXT['SUBJECT'] = 'Pealkiri';
$TEXT['MATCH'] = 'Sobima';
$TEXT['ALL_WORDS'] = 'Kõik Sõnad';
$TEXT['ANY_WORDS'] = 'Mistages Sõnad';
$TEXT['EXACT_MATCH'] = 'Täpne Sobivus';
$TEXT['SHOW'] = 'Näita';
$TEXT['HIDE'] = 'Peida';
$TEXT['START_PUBLISHING'] = 'Alusta Avaldamist';
$TEXT['FINISH_PUBLISHING'] = 'Lõpeta Avaldamine';
$TEXT['DATE'] = 'Kuupäev';
$TEXT['START'] = 'Algus';
$TEXT['END'] = 'Lõpp';
$TEXT['IMAGE'] = 'Pilt';
$TEXT['ICON'] = 'Ikoon';
$TEXT['SECTION'] = 'Sektsioon';
$TEXT['DATE_FORMAT'] = 'Kuupäeva Formaat';
$TEXT['TIME_FORMAT'] = 'Aja Formaat';
$TEXT['RESULTS'] = 'Tulemused';
$TEXT['RESIZE'] = 'Re-size'; //needs to be translated
$TEXT['MANAGE'] = 'Halda';
$TEXT['CODE'] = 'Kood';
$TEXT['WIDTH'] = 'Laius';
$TEXT['HEIGHT'] = 'Kõrgus';
$TEXT['MORE'] = 'Rohkem';
$TEXT['READ_MORE'] = 'Loe Rohkem';
$TEXT['CHANGE_SETTINGS'] = 'Muuda Seadeid';
$TEXT['CURRENT_PAGE'] = 'Praegune Lehekülg';
$TEXT['CLOSE'] = 'Sulge';
$TEXT['INTRO_PAGE'] = 'Intro Lehekülg';
$TEXT['INSTALLATION_URL'] = 'Installatsiooni URL';
$TEXT['INSTALLATION_PATH'] = 'Installatsiooni Rada';
$TEXT['PAGE_EXTENSION'] = 'Lehekülje Ulatus';
$TEXT['NO_RESULTS'] = 'Tulemusi Ei Ole';
$TEXT['WEBSITE_TITLE'] = 'Veebisaidi Pealkiri';
$TEXT['WEBSITE_DESCRIPTION'] = 'Veebisaidi Kirjeldus';
$TEXT['WEBSITE_KEYWORDS'] = 'Veebisaidi Märksõnad';
$TEXT['WEBSITE_HEADER'] = 'Veebisaidi Päis';
$TEXT['WEBSITE_FOOTER'] = 'Veebisaidi Jalus';
$TEXT['RESULTS_HEADER'] = 'Tulemuste Päis';
$TEXT['RESULTS_LOOP'] = 'Tulemuste Tsükkel';
$TEXT['RESULTS_FOOTER'] = 'Tulemuste Jalus';
$TEXT['LEVEL'] = 'Tase';
$TEXT['NOT_FOUND'] = 'Ei Leitud';
$TEXT['PAGE_SPACER'] = 'Lehekülje Vahepuks';
$TEXT['MATCHING'] = 'Sobiv';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Kujunduse Õigused';
$TEXT['PAGES_DIRECTORY'] = 'Lehekülgede Kataloog';
$TEXT['MEDIA_DIRECTORY'] = 'Meedia Kataloog';
$TEXT['FILE_MODE'] = 'Faili Tööreziim';
$TEXT['USER'] = 'Kasutaja';
$TEXT['OTHERS'] = 'Teise';
$TEXT['READ'] = 'Loe';
$TEXT['WRITE'] = 'Kirjuta';
$TEXT['EXECUTE'] = 'Täida';
$TEXT['SMART_LOGIN'] = 'Nutikas Sisselogimine';
$TEXT['REMEMBER_ME'] = 'Pea Mind Meeles';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Failisüsteemi Õigused';
$TEXT['DIRECTORIES'] = 'Kataloogid';
$TEXT['DIRECTORY_MODE'] = 'Kataloogi Tööreziim';
$TEXT['LIST_OPTIONS'] = 'Nimekirja Valikud';
$TEXT['OPTION'] = 'Valikud';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Luba Arvukad Valikud';
$TEXT['TEXTFIELD'] = 'Tekstilahter';
$TEXT['TEXTAREA'] = 'Tekstikast';
$TEXT['SELECT_BOX'] = 'Selekteeri Kast';
$TEXT['CHECKBOX_GROUP'] = 'Märkeruut Grupp';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio Nupu Grupp';
$TEXT['SIZE'] = 'Suurus';
$TEXT['DEFAULT_TEXT'] = 'Vaikimisi Tekst';
$TEXT['SEPERATOR'] = 'Seperator';
$TEXT['BACK'] = 'Tagasi';
$TEXT['UNDER_CONSTRUCTION'] = 'Ehitamisel';
$TEXT['MULTISELECT'] = 'Multi-valik';
$TEXT['SHORT_TEXT'] = 'Lühike Tekst';
$TEXT['LONG_TEXT'] = 'Pikk Tekst';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Kodulehe Ümbersuunamine';
$TEXT['HEADING'] = 'Päis';
$TEXT['MULTIPLE_MENUS'] = 'Arvukas Menüü\'s';
$TEXT['REGISTERED'] = 'Registreeritud';
$TEXT['START'] = 'Alusta';
$TEXT['SECTION_BLOCKS'] = 'Sektsiooni Blokid';
$TEXT['REGISTERED_VIEWERS'] = 'Registered Viewers'; //needs to be translated
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers'; //needs to be translated
$TEXT['SUBMISSION_ID'] = 'Kaastöö ID';
$TEXT['SUBMISSIONS'] = 'Kaastööd';
$TEXT['SUBMITTED'] = 'Saadetud';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. Kaastöid Tunnis';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Kaastööd Salvestatud Andmebaasi';
$TEXT['EMAIL_ADDRESS'] = 'Emaili Aadress';
$TEXT['CUSTOM'] = 'Tava';
$TEXT['ANONYMOUS'] = 'Anonüümne';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Serveri Operatsioonisüsteem';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'World-writeable file permissions'; //needs to be translated
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix tuginev';
$TEXT['WINDOWS'] = 'Windows'; //needs to be translated
$TEXT['HOME_FOLDER'] = 'Kodu Kaust';
$TEXT['HOME_FOLDERS'] = 'Kodu Kaustad';
$TEXT['PAGE_TRASH'] = 'Lehekülje Prügi';
$TEXT['INLINE'] = 'Rivis';
$TEXT['SEPARATE'] = 'Eralduma';
$TEXT['DELETED'] = 'Kustutatud';
$TEXT['VIEW_DELETED_PAGES'] = 'Vaata Kustutatud Lehekülgi';
$TEXT['EMPTY_TRASH'] = 'Tühi Prügikast';
$TEXT['TRASH_EMPTIED'] = 'Prügikast Tühjendatud';
$TEXT['ADD_SECTION'] = 'Lisa Sektsioon';
$TEXT['POST_HEADER'] = 'Posti Päis';
$TEXT['POST_FOOTER'] = 'Posti Jalus';
$TEXT['POSTS_PER_PAGE'] = 'Postitusi Lehele';
$TEXT['RESIZE_IMAGE_TO'] = 'Resize Image To'; //needs to be translated
$TEXT['UNLIMITED'] = 'Piiramatu';
$TEXT['OF'] = 'Of'; //needs to be translated
$TEXT['OUT_OF'] = 'Out Of'; //needs to be translated
$TEXT['NEXT'] = 'Järgmine';
$TEXT['PREVIOUS'] = 'Eelmine';
$TEXT['NEXT_PAGE'] = 'Järgmine Lehekülg';
$TEXT['PREVIOUS_PAGE'] = 'Eelmine lehekülg';
$TEXT['ON'] = 'Edasi';
$TEXT['LAST_UPDATED_BY'] = 'Viimati Uuendatud';
$TEXT['RESULTS_FOR'] = 'Tulemused';
$TEXT['TIME'] = 'Aeg';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Stiil';
$TEXT['WYSIWYG_EDITOR'] = "WYSIWYG Editor"; //needs to be translated
$TEXT['SERVER_EMAIL'] = 'Serveri Email';
$TEXT['MENU'] = 'Menüü';
$TEXT['MANAGE_GROUPS'] = 'Halda Gruppe';
$TEXT['MANAGE_USERS'] = 'Halda Kasutajaid';
$TEXT['PAGE_LANGUAGES'] = 'Lehekülje Keeled';
$TEXT['HIDDEN'] = 'Varjatud';
$TEXT['MAIN'] = 'Peamine';
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
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Vabandame, sul ei ole õigusi selle lehe vaatamiseks';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display'; //needs to be translated

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Insufficient privelliges to be here'; //needs to be translated

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Palun sisesta oma kasutajanimi ja parool allapoole';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'Palun sisesta kasutajanimi';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'Palun sisesta parool';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'Sisestatud kasutajanimi on liiga lühike';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'Sisestatud parool on liiga lühike';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'Sisestatud kasutajanimi on liiga pikk';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'Sisestatud parool on liiga pikk';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Kasutajanimi või parool on vigane';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'Sa pead sisestama emaili aadressi';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'Palun sisesta oma emaili aadress allapoole';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'Sisestatud emaili eileitud andmebaasist';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Võimetu emailima parooli, palun kontakteeru süsteemi administraatoriga';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'Sinukasutajanimi ja parool on saadetud su emaili aadressile';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Parooliei saa taastada rohkem kui üks kord tunnis, vabandame';

$MESSAGE['START']['WELCOME_MESSAGE'] = 'Teretulemast Website Baker Administratsiooni';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Hoiatus, Installatsiooni kataloog eksisteerib!';
$MESSAGE['START']['CURRENT_USER'] = 'Sa oled praegu sisse logitud:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'Võimetu avama konfiguratsioonifaili';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Ei saa kirjutada konfiguratsioonifaili';
$MESSAGE['SETTINGS']['SAVED'] = 'Seaded edukalt salvestatud';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Märge: Selle nupu vajutamine algseadistab kõik salvestamata failid';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Märge: see on vajalik ainult ümbruse testimiseks';

$MESSAGE['USERS']['ADDED'] = 'Kasutaja edukalt lisatud';
$MESSAGE['USERS']['SAVED'] = 'Kasutaja edukalt salvestatud';
$MESSAGE['USERS']['DELETED'] = 'Kasutaja edukalt kustutatud';
$MESSAGE['USERS']['NO_GROUP'] = 'Grupp selekteerimata';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'Sisestatud kasutajanimi on liiga lühike';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'Sisestatud parool on liiga lühike';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'Sisestatud paroolid ei kattu';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'Sisestatud emaili aadress on vigane';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'Sisestatud e-mail on juba kasutusel';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'Sisestatud kasutajanimi on jubakasutusel';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Märge: Sa pead ainult sisestama põhimõtted alumistesse lahtritesse kui sa tahad muuta selle kasutaja parooli';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Kas sa oled kindel et tahad seda kasutajat kustutada?';

$MESSAGE['GROUPS']['ADDED'] = 'Grupp edukalt lisatud';
$MESSAGE['GROUPS']['SAVED'] = 'Grupp edukalt salvestatud';
$MESSAGE['GROUPS']['DELETED'] = 'Grupp edukalt kustutatud';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = 'Grupi nimi on tühi';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Oled sa kindel et tahad seda gruppi kustutada (ja kõik kasutajad mis kuuluvad selle alla)?';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'Gruppe ei leitud';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Group name already exists'; //needs to be translated

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Detailid edukalt salvestatud';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'Email edukalt uuendatud';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'Pragune parool mida sa sisestasid on vigane';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'Parool edukalt muudetud';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Märge: kujunduse muutmiseks sa pead minema Seadete sektsiooni';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Ei saa sisaldada ../ kausta nimes';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Ei saa omada ../ kausta sihtmärgis';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Cannot have ../ in the folder target'; //needs to be translated
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Ei saa sisaldada ../ nimes';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'Ei saa kasutada index.php nimena';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'Meediat ei leitud praeguses kataloogis';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'Faili ei leitud';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'Fail edukalt kustutatud';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Kaust edukalt kustutatud';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Oled sa kindel et tahad kustutada järgnevat faili või kausta?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Ei saa selekteeritud faili kustutada';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Ei saa selekteeritud kausta kustutada';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'Sa ei sisestanud uut nime';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'Sa ei sisestanud faili ulatust';
$MESSAGE['MEDIA']['RENAMED'] = 'Edukalt ümber nimetatud';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Ümbernimetamine ebaõnnestus';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Sisestatud faili nimi eksisteerib';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Sisestatud kausta nimi eksisteerib';
$MESSAGE['MEDIA']['DIR_MADE'] = 'Kaust edukalt loodud';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'Võimetu looma kausta';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' fail edukalt üles laetud';
$MESSAGE['MEDIA']['UPLOADED'] = ' failid edukalt üles laetud';

$MESSAGE['PAGES']['ADDED'] = 'Lehekülg edukalt lisatud';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Lehekülje päis edukalt lisatud';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Lehekülg sama või sarnase pealkirjaga eksisteerib';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Viga faili tekitamisel kausta /pages kataloog';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Viga faili kustutamisel kaustast /pages kataloog';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Lehekülge ei leitud';
$MESSAGE['PAGES']['SAVED'] = 'Lehekülg edukalt salvestatud';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Lehekülje seaded edukalt salvestatud';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Viga lehekülje salvestamisel';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Oled sa kindel et tahad seda lehekülge kustutada (ja kõiki selle alamlehti ka)';
$MESSAGE['PAGES']['DELETED'] = 'Lehekülg edukalt kustutatud';
$MESSAGE['PAGES']['RESTORED'] = 'Lehekülg edukalt taastatud';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'Sisesta lehekülje pealkiri';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'Sisesta menüü pealkiri';
$MESSAGE['PAGES']['REORDERED'] = 'Lehekülje taaskorrastamine õnnestus';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Viga lehekülje taaskorrastamisel';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'Sul pole selle lehekülje muutmiseks õigusi';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Ei saa kirjutada faili /pages/intro.php';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Intro lehekülg edukalt salvestatud';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Vimane muudatus';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Vajuta siia et muta intro lehekülge';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Sektsiooni atribuudud edukalt salvestatud';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Naase lehekülgedele';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'Palun mine tagasi ja täida kõik väljad';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'Pea meeles et üles laetav fail peab olema järgmistes formaatides:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'Pea meeles et üles laetavad failid peavad olema järgmistes formaatides:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'Ei saa faili üles laadida';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'Juba paigaldatud';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Ei ole paigaldatud';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Cannot uninstall'; //needs to be translated
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Ei saa faili lahti pakkida';
$MESSAGE['GENERIC']['INSTALLED'] = 'Edukalt paigaldatud';
$MESSAGE['GENERIC']['UPGRADED'] = 'Upgraded successfully'; //needs to be translated
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Edukalt eemaldatud';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'Võimetu kirjutama siht kataloogi';
$MESSAGE['GENERIC']['INVALID'] = 'Üles laetud fail on vigane';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Ei saa eemaldada: selekteeritud fail on kasutuses';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION'] = 'Veebisait Ehitamisel';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'Külasta hiljem uuesti...';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Please be patient, this might take a while.'; //needs to be translated
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Error opening file.'; //needs to be translated

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'Sa pead detailid sisestama järgnevatesse lahtritesse';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Vabandame, see vorm on juba liiga palju kordi selle tunni jooksul saadetud. Palun proovi järgmine tund uuesti.';
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: '.SERVER_EMAIL; //needs to be translated

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'Please selected which add-ons you would like to have reloaded'; //needs to be translated
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'Modules reloaded successfully'; //needs to be translated
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Templates reloaded successfully'; //needs to be translated
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Languages reloaded successfully'; //needs to be translated

?>