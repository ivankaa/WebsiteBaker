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
$language_code = 'DA';
$language_name = 'Danish';
$language_version = '2.7';
$language_platform = '2.7.x';
$language_author = 'Websitebaker.dk';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Start'; //needs to be translated
$MENU['PAGES'] = 'Sider';
$MENU['MEDIA'] = 'Media'; //needs to be translated
$MENU['ADDONS'] = 'Add-ons'; //needs to be translated
$MENU['MODULES'] = 'Moduler';
$MENU['TEMPLATES'] = 'Skabeloner';
$MENU['LANGUAGES'] = 'Sprog';
$MENU['PREFERENCES'] = 'Pr&aelig;ferencer';
$MENU['SETTINGS'] = 'Indstillinger';
$MENU['ADMINTOOLS'] = 'Admin-Tools'; //needs to be translated
$MENU['ACCESS'] = 'Adgang';
$MENU['USERS'] = 'Brugere';
$MENU['GROUPS'] = 'Grupper';
$MENU['HELP'] = 'Hj&aelig;lp';
$MENU['VIEW'] = 'Se';
$MENU['LOGOUT'] = 'Log ud';
$MENU['LOGIN'] = 'Log ind';
$MENU['FORGOT'] = 'Modtag login oplysninger';

// Section overviews
$OVERVIEW['START'] = 'Administrationsoversigt';
$OVERVIEW['PAGES'] = 'H&aring;ndt&eacute;r dine websider...';
$OVERVIEW['MEDIA'] = 'H&aring;ndt&eacute;r filer i mappen media...';
$OVERVIEW['MODULES'] = 'H&aring;ndt&eacute;r Website Baker moduler...';
$OVERVIEW['TEMPLATES'] = '&AElig;ndre udseende og layout/design p&aring; din webside v.h.a. skabeloner....';
$OVERVIEW['LANGUAGES'] = 'H&aring;ndtering af sprog i Website Baker...';
$OVERVIEW['PREFERENCES'] = '&AElig;ndre pr&aelig;ferencer s&aring;som e-mail adresse, adgangskode, etc... ';
$OVERVIEW['SETTINGS'] = '&AElig;ndre indstillinger for Website Baker...';
$OVERVIEW['USERS'] = 'H&aring;ndtering af brugere som kan logge ind p&aring; Website Baker systemet...';
$OVERVIEW['GROUPS'] = 'H&aring;ndt&eacute;r brugergrupper og deres systemrettigheder...';
$OVERVIEW['HELP'] = 'Nogle sp&oslash;rgsm&aring;l? Find dit svar her...';
$OVERVIEW['VIEW'] = 'Hurtig visning og gennemsyn af dit website i et NYT VINDUE..';
$OVERVIEW['ADMINTOOLS'] = 'Access the Website Baker administration tools...'; //needs to be translated

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = '&AElig;ndre/Slette side';
$HEADING['DELETED_PAGES'] = 'Slettede sider';
$HEADING['ADD_PAGE'] = 'Tilf&oslash;j side';
$HEADING['ADD_HEADING'] = 'Tilf&oslash;j overskrift';
$HEADING['MODIFY_PAGE'] = '&AElig;ndre side';
$HEADING['MODIFY_PAGE_SETTINGS'] = '&AElig;ndre side-indstillinger';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = '&AElig;ndre avancerede indstillinger for site';
$HEADING['MANAGE_SECTIONS'] = 'Sektionsh&aring;ndtering';
$HEADING['MODIFY_INTRO_PAGE'] = '&AElig;ndre Intro-side';

$HEADING['BROWSE_MEDIA'] = 'Gennemse Media-mappe';
$HEADING['CREATE_FOLDER'] = 'Opret Mappe';
$HEADING['UPLOAD_FILES'] = 'Upload Fil(er)';

$HEADING['INSTALL_MODULE'] = 'Install&eacute;r Modul';
$HEADING['UNINSTALL_MODULE'] = 'Afinstall&eacute;r Modul';
$HEADING['MODULE_DETAILS'] = 'Modul Detaljer';

$HEADING['INSTALL_TEMPLATE'] = 'Install&eacute;r skabelon';
$HEADING['UNINSTALL_TEMPLATE'] = 'Afinstall&eacute;r skabelon';
$HEADING['TEMPLATE_DETAILS'] = 'Skabelon - Detaljer';

$HEADING['INSTALL_LANGUAGE'] = 'Install&eacute;r sprog';
$HEADING['UNINSTALL_LANGUAGE'] = 'Afinstall&eacute;r sprog';
$HEADING['LANGUAGE_DETAILS'] = 'Sprog - Detaljer';

$HEADING['MY_SETTINGS'] = 'Mine indstillinger';
$HEADING['MY_EMAIL'] = 'Min e-mail adresse';
$HEADING['MY_PASSWORD'] = 'Min adgangskode';

$HEADING['GENERAL_SETTINGS'] = 'Generelle indstillinger';
$HEADING['DEFAULT_SETTINGS'] = 'Standard indstillinger';
$HEADING['SEARCH_SETTINGS'] = 'S&oslash;ge-indstillinger';
$HEADING['FILESYSTEM_SETTINGS'] = 'Filsystem - Indstillinger';
$HEADING['SERVER_SETTINGS'] = 'Server Indstillinger';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings'; //needs to be translated
$HEADING['ADMINISTRATION_TOOLS'] = 'Administrations v&aelig;rkt&oslash;jer';

$HEADING['MODIFY_DELETE_USER'] = '&AElig;ndre/Slette bruger';
$HEADING['ADD_USER'] = 'Tilf&oslash;j bruger';
$HEADING['MODIFY_USER'] = '&AElig;ndre bruger';

$HEADING['MODIFY_DELETE_GROUP'] = '&AElig;ndre/Slette gruppe';
$HEADING['ADD_GROUP'] = 'Tilf&oslash;j Gruppe';
$HEADING['MODIFY_GROUP'] = '&AElig;ndre Gruppe';

// Other text
$TEXT['ADD'] = 'Tilf&oslash;j';
$TEXT['MODIFY'] = '&AElig;ndre';
$TEXT['SETTINGS'] = 'Indstillinger';
$TEXT['DELETE'] = 'Slet';
$TEXT['SAVE'] = 'Gem';
$TEXT['RESET'] = 'Nulstil';
$TEXT['LOGIN'] = 'Log ind';
$TEXT['RELOAD'] = 'Opdat&eacute;r';
$TEXT['CANCEL'] = 'Annull&eacute;r';
$TEXT['NAME'] = 'Navn';
$TEXT['PLEASE_SELECT'] = 'V&aelig;lg venligst';
$TEXT['TITLE'] = 'Titel';
$TEXT['PARENT'] = 'Hovedoversigt';
$TEXT['TYPE'] = 'Type'; //needs to be translated
$TEXT['VISIBILITY'] = 'Synlighed';
$TEXT['PRIVATE'] = 'Privat';
$TEXT['PUBLIC'] = 'Offentlig';
$TEXT['NONE'] = 'Ingen';
$TEXT['NONE_FOUND'] = 'Ingen fundet';
$TEXT['CURRENT'] = 'Eksisterende/Nuv&aelig;rende';
$TEXT['CHANGE'] = '&AElig;ndre';
$TEXT['WINDOW'] = 'Vindue';
$TEXT['DESCRIPTION'] = 'Beskrivelse';
$TEXT['KEYWORDS'] = 'N&oslash;gleord';
$TEXT['ADMINISTRATORS'] = 'Administratorer';
$TEXT['PRIVATE_VIEWERS'] = 'Private Bes&oslash;gende';
$TEXT['EXPAND'] = 'Udvid';
$TEXT['COLLAPSE'] = 'Sammentr&aelig;k';
$TEXT['MOVE_UP'] = 'Flyt OP';
$TEXT['MOVE_DOWN'] = 'Flyt NED';
$TEXT['RENAME'] = 'Omd&oslash;b';
$TEXT['MODIFY_SETTINGS'] = '&AElig;ndre indstillinger';
$TEXT['MODIFY_CONTENT'] = '&AElig;ndre indhold';
$TEXT['VIEW'] = 'Se';
$TEXT['UP'] = 'Op';
$TEXT['FORGOTTEN_DETAILS'] = 'Har du glemt dine login-detaljer?';
$TEXT['NEED_TO_LOGIN'] = 'Brug for at logge ind?';
$TEXT['SEND_DETAILS'] = 'Send Detaljer';
$TEXT['USERNAME'] = 'Brugernavn';
$TEXT['PASSWORD'] = 'Adgangskode';
$TEXT['HOME'] = 'Hjem';
$TEXT['TARGET_FOLDER'] = 'M&aring;l folder/mappe';
$TEXT['OVERWRITE_EXISTING'] = 'Overskriv eksisterende';
$TEXT['FILE'] = 'Fil';
$TEXT['FILES'] = 'Filer';
$TEXT['FOLDER'] = 'Mappe';
$TEXT['FOLDERS'] = 'Mapper';
$TEXT['CREATE_FOLDER'] = 'Opret Mappe';
$TEXT['UPLOAD_FILES'] = 'Upload Fil(er)';
$TEXT['CURRENT_FOLDER'] = 'Nuv&aelig;rende mappe';
$TEXT['TO'] = 'Til';
$TEXT['FROM'] = 'Fra';
$TEXT['INSTALL'] = 'Install&eacute;r';
$TEXT['UNINSTALL'] = 'Afinstall&eacute;r';
$TEXT['VIEW_DETAILS'] = 'Se detaljer';
$TEXT['DISPLAY_NAME'] = 'Vis Navn';
$TEXT['AUTHOR'] = 'Udvikler/Forfatter';
$TEXT['VERSION'] = 'Version'; //needs to be translated
$TEXT['DESIGNED_FOR'] = 'Designet til';
$TEXT['DESCRIPTION'] = 'Beskrivelse';
$TEXT['EMAIL'] = 'e-mail adresse';
$TEXT['LANGUAGE'] = 'Sprog';
$TEXT['TIMEZONE'] = 'Tidszone';
$TEXT['CURRENT_PASSWORD'] = 'Nuv&aelig;rende adgangskode';
$TEXT['NEW_PASSWORD'] = 'Ny adgangskode';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Skriv ny adgangskode igen';
$TEXT['ACTIVE'] = 'Aktiv';
$TEXT['DISABLED'] = 'Deaktiveret';
$TEXT['ENABLED'] = 'Aktiveret';
$TEXT['RETYPE_PASSWORD'] = 'Indtast adgangskode igen';
$TEXT['GROUP'] = 'Gruppe';
$TEXT['SYSTEM_PERMISSIONS'] = 'System Rettigheder';
$TEXT['MODULE_PERMISSIONS'] = 'Modul Rettigheder';
$TEXT['SHOW_ADVANCED'] = 'Vis avancerede muligheder';
$TEXT['HIDE_ADVANCED'] = 'Skjul avancerede muligheder';
$TEXT['BASIC'] = 'Basisindstillinger';
$TEXT['ADVANCED'] = 'Avanceret';
$TEXT['WEBSITE'] = 'Website'; //needs to be translated
$TEXT['DEFAULT'] = 'Standard';
$TEXT['KEYWORDS'] = 'N&oslash;gleord';
$TEXT['TEXT'] = 'Text'; //needs to be translated
$TEXT['HEADER'] = 'Header'; //needs to be translated
$TEXT['FOOTER'] = 'Footer (Bund)';
$TEXT['TEMPLATE'] = 'Skabelon';
$TEXT['INSTALLATION'] = 'Installation'; //needs to be translated
$TEXT['DATABASE'] = 'Database'; //needs to be translated
$TEXT['HOST'] = 'Host'; //needs to be translated
$TEXT['INTRO'] = 'Intro'; //needs to be translated
$TEXT['PAGE'] = 'Side';
$TEXT['SIGNUP'] = 'Registr&eacute;r dig';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Fejlrapporterings-trin';
$TEXT['ADMIN'] = 'Admin'; //needs to be translated
$TEXT['PATH'] = 'Sti';
$TEXT['URL'] = 'URL'; //needs to be translated
$TEXT['FRONTEND'] = 'Front-end (live preview af dit website)';
$TEXT['EXTENSION'] = 'Udvidelse';
$TEXT['TABLE_PREFIX'] = 'Tabel pr&aelig;fix';
$TEXT['CHANGES'] = '&AElig;ndringer';
$TEXT['ADMINISTRATION'] = 'Administration'; //needs to be translated
$TEXT['FORGOT_DETAILS'] = 'Glemt login-detaljer?';
$TEXT['LOGGED_IN'] = 'Logget ind';
$TEXT['WELCOME_BACK'] = 'Velkommen igen';
$TEXT['FULL_NAME'] = 'Fulde navn';
$TEXT['ACCOUNT_SIGNUP'] = 'Konto Registrering';
$TEXT['LINK'] = 'Link'; //needs to be translated
$TEXT['ANCHOR'] = 'Anchor'; //needs to be translated
$TEXT['TARGET'] = 'M&aring;l';
$TEXT['NEW_WINDOW'] = 'Nyt vindue';
$TEXT['SAME_WINDOW'] = 'Samme vindue';
$TEXT['TOP_FRAME'] = 'Top Frame'; //needs to be translated
$TEXT['PAGE_LEVEL_LIMIT'] = 'Side Trin - Begr&aelig;nsninger';
$TEXT['SUCCESS'] = 'Succes!';
$TEXT['ERROR'] = 'Fejl';
$TEXT['ARE_YOU_SURE'] = 'Er du helt sikker?';
$TEXT['YES'] = 'Ja';
$TEXT['NO'] = 'Nej';
$TEXT['SYSTEM_DEFAULT'] = 'System Standard';
$TEXT['PAGE_TITLE'] = 'Titel p&aring; side';
$TEXT['MENU_TITLE'] = 'Menu Titel';
$TEXT['ACTIONS'] = 'Handlinger';
$TEXT['UNKNOWN'] = 'Ukendt';
$TEXT['BLOCK'] = 'Blok&eacute;r';
$TEXT['SEARCH'] = 'S&oslash;g';
$TEXT['SEARCHING'] = 'S&oslash;gefunktion';
$TEXT['POST'] = 'Post'; //needs to be translated
$TEXT['COMMENT'] = 'Kommentar';
$TEXT['COMMENTS'] = 'Kommentarer';
$TEXT['COMMENTING'] = 'Kommenterede';
$TEXT['SHORT'] = 'Kort';
$TEXT['LONG'] = 'Lang';
$TEXT['LOOP'] = 'Loop'; //needs to be translated
$TEXT['FIELD'] = 'Felt';
$TEXT['REQUIRED'] = 'P&aring;kr&aelig;vet';
$TEXT['LENGTH'] = 'L&aelig;ngde';
$TEXT['MESSAGE'] = 'Besked';
$TEXT['SUBJECT'] = 'Emne';
$TEXT['MATCH'] = 'Match'; //needs to be translated
$TEXT['ALL_WORDS'] = 'Alle ord';
$TEXT['ANY_WORDS'] = 'Ethvert ord';
$TEXT['EXACT_MATCH'] = 'Pr&aelig;cis match';
$TEXT['SHOW'] = 'Vis';
$TEXT['HIDE'] = 'Skjul';
$TEXT['START_PUBLISHING'] = 'Start Offentligg&oslash;relse';
$TEXT['FINISH_PUBLISHING'] = 'Afslut/Oph&aelig;v Offentligg&oslash;relse';
$TEXT['DATE'] = 'Dato';
$TEXT['START'] = 'Start'; //needs to be translated
$TEXT['END'] = 'Oph&oslash;r';
$TEXT['IMAGE'] = 'Billede';
$TEXT['ICON'] = 'Ikon';
$TEXT['SECTION'] = 'Sektion';
$TEXT['DATE_FORMAT'] = 'Dato Format';
$TEXT['TIME_FORMAT'] = 'Tidsformat';
$TEXT['RESULTS'] = 'Resultater';
$TEXT['RESIZE'] = '&AElig;ndre st&oslash;rrelse';
$TEXT['MANAGE'] = 'H&aring;ndt&eacute;r';
$TEXT['CODE'] = 'Kode';
$TEXT['WIDTH'] = 'Bredde';
$TEXT['HEIGHT'] = 'H&oslash;jde';
$TEXT['MORE'] = 'Mere';
$TEXT['READ_MORE'] = 'L&aelig;s mere';
$TEXT['CHANGE_SETTINGS'] = '&AElig;ndre indstillinger';
$TEXT['CURRENT_PAGE'] = 'Nuv&aelig;rende side';
$TEXT['CLOSE'] = 'Luk';
$TEXT['INTRO_PAGE'] = 'Intro-side';
$TEXT['INSTALLATION_URL'] = 'Installations URL';
$TEXT['INSTALLATION_PATH'] = 'Installations Sti';
$TEXT['PAGE_EXTENSION'] = 'Side-udvidelse';
$TEXT['NO_RESULTS'] = 'Ingen resultater';
$TEXT['WEBSITE_TITLE'] = 'Titel p&aring; dit website';
$TEXT['WEBSITE_DESCRIPTION'] = 'Beskrivelse af dit website';
$TEXT['WEBSITE_KEYWORDS'] = 'Website N&oslash;gleord';
$TEXT['WEBSITE_HEADER'] = 'Website Header'; //needs to be translated
$TEXT['WEBSITE_FOOTER'] = 'Website Footer (Bund)';
$TEXT['RESULTS_HEADER'] = 'Resultater - Header';
$TEXT['RESULTS_LOOP'] = 'Resultater - Loop';
$TEXT['RESULTS_FOOTER'] = 'Resultater - Footer';
$TEXT['LEVEL'] = 'Niveau';
$TEXT['NOT_FOUND'] = 'Ikke fundet';
$TEXT['PAGE_SPACER'] = 'Side Spacer';
$TEXT['MATCHING'] = 'Matchede';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Skabelon - Tilladelser';
$TEXT['PAGES_DIRECTORY'] = 'Side Bibliotek (Mappe)';
$TEXT['MEDIA_DIRECTORY'] = 'Media Bibliotek (Mappe)';
$TEXT['FILE_MODE'] = 'Fil Tilstand';
$TEXT['USER'] = 'Bruger';
$TEXT['OTHERS'] = 'Andre';
$TEXT['READ'] = 'L&aelig;s';
$TEXT['WRITE'] = 'Skriv';
$TEXT['EXECUTE'] = 'Udf&oslash;r';
$TEXT['SMART_LOGIN'] = 'Smart Log-ind';
$TEXT['REMEMBER_ME'] = 'Husk mig';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Filesystem - Tilladelser';
$TEXT['DIRECTORIES'] = 'Biblioteker (Mapper)';
$TEXT['DIRECTORY_MODE'] = 'Bibliotek Tilstand';
$TEXT['LIST_OPTIONS'] = 'Vis valgmuligheder';
$TEXT['OPTION'] = 'Mulighed';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Tillad valg af flere muligheder';
$TEXT['TEXTFIELD'] = 'Tekstfelt';
$TEXT['TEXTAREA'] = 'Tekstomr&aring;de';
$TEXT['SELECT_BOX'] = 'V&aelig;lg box';
$TEXT['CHECKBOX_GROUP'] = 'Checkbox Gruppe';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio Button Gruppe';
$TEXT['SIZE'] = 'St&oslash;rrelse';
$TEXT['DEFAULT_TEXT'] = 'Standard Tekst';
$TEXT['SEPERATOR'] = 'Separator'; //needs to be translated
$TEXT['BACK'] = 'Tilbage';
$TEXT['UNDER_CONSTRUCTION'] = 'Under konstruktion';
$TEXT['MULTISELECT'] = 'Multi-valg';
$TEXT['SHORT_TEXT'] = 'Kort tekst';
$TEXT['LONG_TEXT'] = 'Lang tekst';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Viderestilling af hjemmeside';
$TEXT['HEADING'] = 'Overskrift';
$TEXT['MULTIPLE_MENUS'] = 'Flere menuer';
$TEXT['REGISTERED'] = 'Registreret';
$TEXT['START'] = 'Start'; //needs to be translated
$TEXT['SECTION_BLOCKS'] = 'Sektionsblokke';
$TEXT['REGISTERED_VIEWERS'] = 'Registrerede brugere';
$TEXT['ALLOWED_VIEWERS'] = 'Tilladte Brugere';
$TEXT['SUBMISSION_ID'] ='Tilmeldings-ID';
$TEXT['SUBMISSIONS'] = 'Indsendte bidrag';
$TEXT['SUBMITTED'] = 'Indsendt';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. indsendte bidrag pr. time';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Indsendte bidrag gemt i databasen';
$TEXT['EMAIL_ADDRESS'] = 'e-mail adresse';
$TEXT['CUSTOM'] = '&AElig;ndret';
$TEXT['ANONYMOUS'] = 'Anonym';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Server Operativ System';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'World-writeable fil rettigheder';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix baseret';
$TEXT['WINDOWS'] = 'Windows'; //needs to be translated
$TEXT['HOME_FOLDER'] = 'Hjemme Bibliotek (Mappe)';
$TEXT['HOME_FOLDERS'] = 'Hjemme Biblioteker (Mapper)';
$TEXT['PAGE_TRASH'] = 'Side - Papirkurv';
$TEXT['INLINE'] = 'In-line'; //needs to be translated
$TEXT['SEPARATE'] = 'Separeret';
$TEXT['DELETED'] = 'Slettede';
$TEXT['VIEW_DELETED_PAGES'] = 'Vis slettede sider';
$TEXT['EMPTY_TRASH'] = 'T&oslash;m Papirkurv';
$TEXT['TRASH_EMPTIED'] = 'Papirkurv t&oslash;mt !';
$TEXT['ADD_SECTION'] = 'Tilf&oslash;j sektion';
$TEXT['POST_HEADER'] = 'Overskrift - Indl&aelig;g';
$TEXT['POST_FOOTER'] = 'Bund/Footer - Indl&aelig;g';
$TEXT['POSTS_PER_PAGE'] = 'Indl&aelig;g pr. side';
$TEXT['RESIZE_IMAGE_TO'] = 'Forst&oslash;r/formindsk billede til';
$TEXT['UNLIMITED'] = 'Ubegr&aelig;nset';
$TEXT['OF'] = 'Af';
$TEXT['OUT_OF'] = 'Ud af i alt';
$TEXT['NEXT'] = 'N&aelig;ste';
$TEXT['PREVIOUS'] = 'Forrige';
$TEXT['NEXT_PAGE'] = 'N&aelig;ste side';
$TEXT['PREVIOUS_PAGE'] = 'Forrige side';
$TEXT['ON'] = 'D.';
$TEXT['LAST_UPDATED_BY'] = 'Sidst opdateret af :';
$TEXT['RESULTS_FOR'] = 'Resultater for';
$TEXT['TIME'] = 'Tid';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style'; //needs to be translated
$TEXT['WYSIWYG_EDITOR'] = "WYSIWYG Editor"; //needs to be translated
$TEXT['SERVER_EMAIL'] = 'Server e-mail';
$TEXT['MENU'] = 'Menu'; //needs to be translated
$TEXT['MANAGE_GROUPS'] = 'H&aring;ndt&eacute;r Grupper';
$TEXT['MANAGE_USERS'] = 'H&aring;ndt&eacute;r Brugere';
$TEXT['PAGE_LANGUAGES'] = 'Sprog';
$TEXT['HIDDEN'] = 'Skjulte';
$TEXT['MAIN'] = 'Hovedoversigt';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Omd&oslash;b filer under opload';
$TEXT['APP_NAME'] = 'Application Navn';
$TEXT['SESSION_IDENTIFIER'] = 'Session Identifikation';
$TEXT['BACKUP'] = 'Backup'; //needs to be translated
$TEXT['RESTORE'] = 'Gendan';
$TEXT['BACKUP_DATABASE'] = 'Backup Database'; //needs to be translated
$TEXT['RESTORE_DATABASE'] = 'Gendan Database';
$TEXT['BACKUP_ALL_TABLES'] = 'Lav backup af alle tabeller i databasen';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Lav kun backup af WB-specifikke tabeller';
$TEXT['BACKUP_MEDIA'] = 'Backup Media'; //needs to be translated
$TEXT['RESTORE_MEDIA'] = 'Gendan Media';
$TEXT['ADMINISTRATION_TOOL'] = 'Administrations V&aelig;rkt&oslash;jer';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha verifikation';
$TEXT['VERIFICATION'] = 'Godkendelse';
$TEXT['DEFAULT_CHARSET'] = 'Standard Karakt&eacute;rs&aelig;t/Charset';
$TEXT['CHARSET'] = 'Karakt&eacute;rs&aelig;t/Charset';
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
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Beklager - du har ikke rettigheder til at se denne side';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display'; //needs to be translated

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Du har ikke de forn&oslash;dne rettigheder til dette omr&aring;de';

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Indtast venligst dit brugernavn og din adgangskode nedenfor';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'V&aelig;r venlig at indtaste et brugernavn';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'V&aelig;r venlig at indtaste en adgangskode ';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'Det indtastede brugernavn er for KORT';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'Den indtastede adgangskode er for KORT';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'Det indtastede brugernavn er for LANGT';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'Den indtastede adgangskode er for LANG';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Brugernavn og/eller adgangskode er ikke korrekt !!';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'Du SKAL indtaste en gyldig e-mail adresse';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'Indtast venligst din e-mail adresse nedenfor';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'Den e-mail adresse du indtastede kunne ikke findes i vores database';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Kunne ikke sende din adgangskode til din e-mail adresse - Kontak venligst en administrator !';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'Dit brugernavn og din adgangskode er nu afsendt til din e-mail adresse';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Adgangskode kan kun nulstilles 1 gang i timen - Vi beklager !';

$MESSAGE['START']['WELCOME_MESSAGE'] = 'Velkommen til din Website Baker Administration';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'ADVARSEL !!!  Installations mappen findes stadig p&aring; serveren. Slet den venligst omg. p.g.a sikkerhedsrisikoen !!';
$MESSAGE['START']['CURRENT_USER'] = 'Du er lige nu logget ind som :';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'Er ikke i stand til at &aring;bne konfigurationsfilen';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Kan ikke skrive til konfigurationsfilen (check rettigheder for filen!';
$MESSAGE['SETTINGS']['SAVED'] = 'Indstillingerne blev gemt med succes !';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = '<br>OBS: Ved at klikke p&aring; denne knap nulstilles alle IKKE gemte &aelig;ndringer !!';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'OBS !!!! : Dette anbefales KUN i testmilj&oslash;er p&aring; en lokal placering - IKKE offentligt';

$MESSAGE['USERS']['ADDED'] = 'Bruger blev tilf&oslash;jet med succes !';
$MESSAGE['USERS']['SAVED'] = 'Bruger blev gemt med succes !';
$MESSAGE['USERS']['DELETED'] = 'Bruger blev slettet med held';
$MESSAGE['USERS']['NO_GROUP'] = 'Der blev ikke valgt nogen gruppe';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'Brugernavnet du indtastede var for kort';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'Adgangskoden du indtastede var for kort';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'De to adgangskoder du indtastede passer ikke sammen - de skal v&aelig;re ENS !';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'e-mail adressen du indtastede er ugyldig !';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'Den e-mail adresse du indtastede findes allerede i vores database i forvejen !';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'Brugernavnet du indtastede er allerede optaget af en anden bruger !';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'OBS ! Du skal kun indtaste v&aelig;rdier i felterne ovenfor, s&aring;fremt du &oslash;nsker at &aelig;ndre denne brugers adgangskode !';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Er du HELT sikker p&aring; du vil slette den valgte bruger?';

$MESSAGE['GROUPS']['ADDED'] = 'Gruppe blev tilf&oslash;jet med succes!';
$MESSAGE['GROUPS']['SAVED'] = 'Gruppe blev gemt med succes!';
$MESSAGE['GROUPS']['DELETED'] = 'Gruppe blev slettet med succes!';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = 'Gruppenavn er blank!';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Er du HELT sikker p&aring; du vil slette denne gruppe (og alle brugere som findes i denne)?';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'Der blev ikke fundet nogle grupper!';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Gruppens navn eksisterer allerede';

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Detaljer blev gemt med succes!';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'e-mail adresse blev opdateret med succes!';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'Den (nuv&aelig;rende) adgangskode som du indtastede er ikke korrekt!';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'Adgangskode &aelig;ndret med succes!';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'OBS: For at &aelig;ndre skabelonen skal du g&aring; ind i sektionen med indstillinger!';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Kan ikke inkludere ../ i mappenavnet';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Mappen eksisterer ikke';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Kan ikke have ../ i m&aring;let for biblioteket(mappen)';
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Kan ikke inkludere ../ i navnet';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'Kan ikke anvende index.php som navn';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'Der blev ikke fundet nogle media i det p&aring;g&aelig;ldende bibliotek (mappe)';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'Filen blev ikke fundet';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'Fil blev slettet med succes!';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Bibliotek (Mappe) blev slettet med succes!';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Er du sikker p&aring; du &oslash;nsker at slette flg. fil/bibliotek(Mappe)?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Kan IKKE slette den valgte fil';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Kan IKKE slette det valgte bibliotek (Mappe)';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'Du indtastede ikke et NYT navn';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'Du har ikke angivet en filtype!';
$MESSAGE['MEDIA']['RENAMED'] = 'Omd&oslash;bning foretaget med succes!';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Omd&oslash;bning slog fejl !!';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Der findes allerede en fil med det navn du indtastede! ';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Der findes allerede et bibliotek (Mappe) med det navn du indtastede!';
$MESSAGE['MEDIA']['DIR_MADE'] = 'Bibliotek (Mappe) blev oprettet med succes!';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'Kunne ikke oprette bibliotek (Mappe)';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' fil blev uploadet med succes!';
$MESSAGE['MEDIA']['UPLOADED'] = ' filer blev uploadet med succes!';

$MESSAGE['PAGES']['ADDED'] = 'Side blev tilf&oslash;jet systemet med succes!';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Overskrift til side blev tilf&oslash;jet med succes!';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Der findes allerede en side med dette eller lign. navn i forvejen!';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Fejl under oprettelse af access fil i /pages biblioteket (Mappen) (utilstr&aelig;kkelige rettigheder)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Fejl under sletning af access fil i /pages biblioteket  (utilstr&aelig;kkelige privilegier)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Siden blev ikke fundet!';
$MESSAGE['PAGES']['SAVED'] = 'Side blev gemt med succes!';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Side-indstillinger blev gemt med succes!';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Der opstod en fejl under fors&oslash;get p&aring; at gemme siden';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Er du sikker p&aring; du &oslash;nsker at slette den valgte side (og alle dens undersider)';
$MESSAGE['PAGES']['DELETED'] = 'Side blev slettet med succes!';
$MESSAGE['PAGES']['RESTORED'] = 'Side blev gendannet med succes!';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'Indtast venligst en titel til siden!';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'Indtast venligst en titel til menuen';
$MESSAGE['PAGES']['REORDERED'] = 'Side om-arrangeret med succes!';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Fejl ved fors&oslash;g p&aring; om-arrangering af side';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'Du har ikke rettigheder til at &aelig;ndre denne side';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Kan ikke skrive til filen /pages/intro.php (utilstr&aelig;kkelige privilegier)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Intro Side blev gemt med succes!';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Sidste &aelig;ndring blev foretaget af :';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Klik HER for at &aelig;ndre din intro-side!';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Egenskaber for SEKTION blev &aelig;ndret med succes!';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Tilbage til sider';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'G&aring; venligst tilbage og udfyld ALLE felter';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'OBS: V&aelig;r venligst opm&aelig;rksom p&aring; at den fil du vil uploade skal v&aelig;re i et af flg. formater:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'OBS: V&aelig;r venligst opm&aelig;rksom p&aring; at den fil du vil uploade skal v&aelig;re i et af flg. formater:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'Kunne ikke uploade filen';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'Er allerede installeret';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Ikke installeret';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Kan ikke afinstallere';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Kan ikke udpakke fil';
$MESSAGE['GENERIC']['INSTALLED'] = 'Installeret med succes!';
$MESSAGE['GENERIC']['UPGRADED'] = 'Upgraderet med succes';
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Afinstalleret med succes!';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'Kan ikke skrive til det valgte m&aring;lbibliotek(Mappe)';
$MESSAGE['GENERIC']['INVALID'] = 'Filen du uploadede er UGYLDIG';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Kan ikke afinstallere : den valgte fil er i brug!';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION'] = 'Hjemmeside under opbygning';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'Kom venligst igen senere...';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'V&aelig;r venligst t&aring;lmodig, dette kan godt vare et stykke tid.';
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Fejl ved &aring;bning af filen.';

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'Du SKAL indtaste detaljer i flg. felter:';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Beklager ! Denne formular er blevet afsendt alt for mange gange indenfor den sidste time, og du vil derfor blive afvist - Pr&oslash;v igen om en times tid!';
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'Verifikations tallene (ogs&aring; kendt som Captcha) som du tastede er ikke korrekte. Hvis du har problemer med at l&aelig;se Captha tallene, s&aring; kontakt venligst sidens Administrator p&aring; denne mailadresse: '.SERVER_EMAIL;

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'V&aelig;lg venligst hvilke add-ons du vil have opdateret';
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'Moduler opdateret med succes';
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Templates opdateret med succes';
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Sprog opdateret med succes';

?>