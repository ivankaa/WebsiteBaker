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
$language_code = 'HR';
$language_name = 'Hrvatski';
$language_version = '2.7';
$language_platform = '2.7.x';
$language_author = 'Vedran Presecki';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Start'; //needs to be translated
$MENU['PAGES'] = 'Stranice';
$MENU['MEDIA'] = 'Media'; //needs to be translated
$MENU['ADDONS'] = 'Dodaci';
$MENU['MODULES'] = 'Moduli';
$MENU['TEMPLATES'] = 'Predlo�ci';
$MENU['LANGUAGES'] = 'Jezici';
$MENU['PREFERENCES'] = 'Pode�avanja';
$MENU['SETTINGS'] = 'Postavke';
$MENU['ADMINTOOLS'] = 'Admin-Too //needs to be translatedls';
$MENU['ACCESS'] = 'Pristup';
$MENU['USERS'] = 'Korisnici';
$MENU['GROUPS'] = 'Grupe';
$MENU['HELP'] = 'Pomo&aelig;';
$MENU['VIEW'] = 'Pogled';
$MENU['LOGOUT'] = 'Odlogiranje';
$MENU['LOGIN'] = 'Logiranje';
$MENU['FORGOT'] = 'Dobivanje detalja lozinke';

// Section overviews
$OVERVIEW['START'] = 'Pregled administracije';
$OVERVIEW['PAGES'] = 'Uredite va�e web stranice...';
$OVERVIEW['MEDIA'] = 'Uredite fileove pohranjene u direktoriju "Media"...';
$OVERVIEW['MODULES'] = 'Uredite Website Baker module...';
$OVERVIEW['TEMPLATES'] = 'Promijenite izgled i do�ivljaj va�eg weba s predlo�cima...';
$OVERVIEW['LANGUAGES'] = 'Uredite Website Baker jezike...';
$OVERVIEW['PREFERENCES'] = 'Izmjenite postavke email adresa, lozinka i sl.... ';
$OVERVIEW['SETTINGS'] = 'Promjenite postavke za Website Baker...';
$OVERVIEW['USERS'] = 'Upravljajte korisnicima koji se mogu logirati na Website Baker...';
$OVERVIEW['GROUPS'] = 'Upravljajte grupama korisnika i njihovim sistemskim dopu�tenjima.';
$OVERVIEW['HELP'] = 'Imate pitanje? Prona&eth;ite odgovor...';
$OVERVIEW['VIEW'] = 'Brzo pogledajte i listajte Va� web u novom prozoru...';
$OVERVIEW['ADMINTOOLS'] = 'Access the Website Baker administration tools...'; //needs to be translated

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Izmenj/Obri�i stranicu';
$HEADING['DELETED_PAGES'] = 'Obrisane stranice';
$HEADING['ADD_PAGE'] = 'Dodaj stranicu';
$HEADING['ADD_HEADING'] = 'Dodaj zaglavlje';
$HEADING['MODIFY_PAGE'] = 'Izmjeni stranicu';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Mijenjaj postavke stranice';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Mijenjaj napredne postavke stranice';
$HEADING['MANAGE_SECTIONS'] = 'Upravljaj dijelovima';
$HEADING['MODIFY_INTRO_PAGE'] = 'Modificiraj intro stranicu';

$HEADING['BROWSE_MEDIA'] = 'Pogledaj Mediu';
$HEADING['CREATE_FOLDER'] = 'napravi direktorij';
$HEADING['UPLOAD_FILES'] = 'Nasnimi fileove';

$HEADING['INSTALL_MODULE'] = 'Instaliraj module';
$HEADING['UNINSTALL_MODULE'] = 'Deinstaliraj module';
$HEADING['MODULE_DETAILS'] = 'Detalji modula';

$HEADING['INSTALL_TEMPLATE'] = 'Instaliraj predlo�ak';
$HEADING['UNINSTALL_TEMPLATE'] = 'Deinstaliraj predlo�ak';
$HEADING['TEMPLATE_DETAILS'] = 'Detalji predlo�ka';

$HEADING['INSTALL_LANGUAGE'] = 'Instaliraj jezik';
$HEADING['UNINSTALL_LANGUAGE'] = 'Deinstaliraj jezik';
$HEADING['LANGUAGE_DETAILS'] = 'Detalji jezika';

$HEADING['MY_SETTINGS'] = 'Moje postavke';
$HEADING['MY_EMAIL'] = 'Moj Email';
$HEADING['MY_PASSWORD'] = 'Moja Lozinka';

$HEADING['GENERAL_SETTINGS'] = 'Glavne postavke';
$HEADING['DEFAULT_SETTINGS'] = 'Prija�nje postavke';
$HEADING['SEARCH_SETTINGS'] = 'Tra�enje postavki';
$HEADING['FILESYSTEM_SETTINGS'] = 'Postavke sistema direktorija';
$HEADING['SERVER_SETTINGS'] = 'Postavke servera';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings'; //needs to be translated
$HEADING['ADMINISTRATION_TOOLS'] = 'Administracijski alati';

$HEADING['MODIFY_DELETE_USER'] = 'Izmjeni/Obri�i korisnika';
$HEADING['ADD_USER'] = 'Dodaj korisnika';
$HEADING['MODIFY_USER'] = 'Izmjeni korisnika';

$HEADING['MODIFY_DELETE_GROUP'] = 'Izmjeni/Obri�i Grupu';
$HEADING['ADD_GROUP'] = 'Dodaj grupu';
$HEADING['MODIFY_GROUP'] = 'Izmjeni grupu';

// Other text
$TEXT['ADD'] = 'Dodaj';
$TEXT['MODIFY'] = 'Izmjeni';
$TEXT['SETTINGS'] = 'Postavke';
$TEXT['DELETE'] = 'Obri�i';
$TEXT['SAVE'] = 'Snimi';
$TEXT['RESET'] = 'Resetiraj';
$TEXT['LOGIN'] = 'Logiranje';
$TEXT['RELOAD'] = 'Ponovo u&egrave;itavanje';
$TEXT['CANCEL'] = 'Otka�i';
$TEXT['NAME'] = 'Ime';
$TEXT['PLEASE_SELECT'] = 'Odaberite';
$TEXT['TITLE'] = 'Naslov';
$TEXT['PARENT'] = 'Vezan';
$TEXT['TYPE'] = 'Tip';
$TEXT['VISIBILITY'] = 'Vidljivost';
$TEXT['PRIVATE'] = 'Privatni';
$TEXT['PUBLIC'] = 'Javni';
$TEXT['NONE'] = 'Nijedan';
$TEXT['NONE_FOUND'] = 'Nijedan na&eth;en';
$TEXT['CURRENT'] = 'Postoje&aelig;i';
$TEXT['CHANGE'] = 'Izmjeni';
$TEXT['WINDOW'] = 'Prozor';
$TEXT['DESCRIPTION'] = 'Opis';
$TEXT['KEYWORDS'] = 'Klju&egrave;ne rije&egrave;i';
$TEXT['ADMINISTRATORS'] = 'Administratori';
$TEXT['PRIVATE_VIEWERS'] = 'Privatni pregledatelji';
$TEXT['EXPAND'] = 'Pro�iri';
$TEXT['COLLAPSE'] = 'Kolaps';
$TEXT['MOVE_UP'] = 'Podigni gore';
$TEXT['MOVE_DOWN'] = 'Spusti dolje';
$TEXT['RENAME'] = 'Preimenuj';
$TEXT['MODIFY_SETTINGS'] = 'Izmjeni postavke';
$TEXT['MODIFY_CONTENT'] = 'Izmjeni sadr�aj';
$TEXT['VIEW'] = 'Pogled';
$TEXT['UP'] = 'Gore';
$TEXT['FORGOTTEN_DETAILS'] = 'Zaboravili ste va�e podatke?';
$TEXT['NEED_TO_LOGIN'] = 'Molimo logirajte se?';
$TEXT['SEND_DETAILS'] = '�aljite podatke';
$TEXT['USERNAME'] = 'Korisni&egrave;ko ime';
$TEXT['PASSWORD'] = 'Lozinka';
$TEXT['HOME'] = 'Po&egrave;etak';
$TEXT['TARGET_FOLDER'] = 'Ciljani direktorij';
$TEXT['OVERWRITE_EXISTING'] = 'Napi�ite preko postoje&aelig;eg';
$TEXT['FILE'] = 'File'; //needs to be translated
$TEXT['FILES'] = 'Fileovi';
$TEXT['FOLDER'] = 'Direktorij';
$TEXT['FOLDERS'] = 'Direktoriji';
$TEXT['CREATE_FOLDER'] = 'napravi direktorij';
$TEXT['UPLOAD_FILES'] = 'Nasnimi fajlove)';
$TEXT['CURRENT_FOLDER'] = 'Postoje&aelig;i direktorij';
$TEXT['TO'] = 'Za';
$TEXT['FROM'] = 'Od';
$TEXT['INSTALL'] = 'Instaliraj';
$TEXT['UNINSTALL'] = 'Deinstaliraj';
$TEXT['VIEW_DETAILS'] = 'Vidi detalje';
$TEXT['DISPLAY_NAME'] = 'Prika�i ime';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['VERSION'] = 'VVerzija';
$TEXT['DESIGNED_FOR'] = 'Dizajniran za';
$TEXT['DESCRIPTION'] = 'Opis';
$TEXT['EMAIL'] = 'Email'; //needs to be translated
$TEXT['LANGUAGE'] = 'Jezik';
$TEXT['TIMEZONE'] = 'Vremenska zona';
$TEXT['CURRENT_PASSWORD'] = 'Potoje&aelig;a lozinka';
$TEXT['NEW_PASSWORD'] = 'Nova lozinka';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Ponovo otipkaj novu lozinku';
$TEXT['ACTIVE'] = 'Aktivan';
$TEXT['DISABLED'] = 'Onesposobljen';
$TEXT['ENABLED'] = 'Omogu&aelig;en';
$TEXT['RETYPE_PASSWORD'] = 'Ponovo otipkaj novu lozinku';
$TEXT['GROUP'] = 'Grupa';
$TEXT['SYSTEM_PERMISSIONS'] = 'Sistemske dozvole';
$TEXT['MODULE_PERMISSIONS'] = 'Modulske dozvole';
$TEXT['SHOW_ADVANCED'] = 'Prika�i napredne opcije';
$TEXT['HIDE_ADVANCED'] = 'Sakrij napredne opcije';
$TEXT['BASIC'] = 'Osnovno';
$TEXT['ADVANCED'] = 'Napredno';
$TEXT['WEBSITE'] = 'Web stranica';
$TEXT['DEFAULT'] = 'Postoje&aelig;i';
$TEXT['KEYWORDS'] = 'Klju&egrave;ne rije&egrave;i';
$TEXT['TEXT'] = 'Tekst';
$TEXT['HEADER'] = 'Zaglavlje';
$TEXT['FOOTER'] = 'Podno�je';
$TEXT['TEMPLATE'] = 'Predlo�ak';
$TEXT['INSTALLATION'] = 'Instalacija';
$TEXT['DATABASE'] = 'Baza podataka';
$TEXT['HOST'] = 'Host'; //needs to be translated
$TEXT['INTRO'] = 'Intro'; //needs to be translated
$TEXT['PAGE'] = 'Strenica';
$TEXT['SIGNUP'] = 'Upi�i se';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Gre�ka Izvje�taj nivoa';
$TEXT['ADMIN'] = 'Admin'; //needs to be translated
$TEXT['PATH'] = 'Dio';
$TEXT['URL'] = 'URL'; //needs to be translated
$TEXT['FRONTEND'] = 'Po&egrave;etak-kraj';
$TEXT['EXTENSION'] = 'Ekstenzija';
$TEXT['TABLE_PREFIX'] = 'Prefix tablice';
$TEXT['CHANGES'] = 'Izmjene';
$TEXT['ADMINISTRATION'] = 'Administracija';
$TEXT['FORGOT_DETAILS'] = 'Zaboravili ste datelje?';
$TEXT['LOGGED_IN'] = 'Logiran';
$TEXT['WELCOME_BACK'] = 'Dobro do�li nazad';
$TEXT['FULL_NAME'] = 'Puno ime';
$TEXT['ACCOUNT_SIGNUP'] = 'Logiranje na Account';
$TEXT['LINK'] = 'Link'; //needs to be translated
$TEXT['ANCHOR'] = 'Anchor'; //needs to be translated
$TEXT['TARGET'] = 'Cilj';
$TEXT['NEW_WINDOW'] = 'Novi prozor';
$TEXT['SAME_WINDOW'] = 'Isti prozor';
$TEXT['TOP_FRAME'] = 'Gornji okvir';
$TEXT['PAGE_LEVEL_LIMIT'] = 'Nivo limita stranice';
$TEXT['SUCCESS'] = 'Uspjeh';
$TEXT['ERROR'] = 'Gre�ka';
$TEXT['ARE_YOU_SURE'] = 'Jeste li sigurni?';
$TEXT['YES'] = 'Da';
$TEXT['NO'] = 'Ne';
$TEXT['SYSTEM_DEFAULT'] = 'Postoje&aelig;i sistem';
$TEXT['PAGE_TITLE'] = 'Naslov stranice';
$TEXT['MENU_TITLE'] = 'Naslov menia';
$TEXT['ACTIONS'] = 'Akcije';
$TEXT['UNKNOWN'] = 'Nepoznat';
$TEXT['BLOCK'] = 'Blokiraj';
$TEXT['SEARCH'] = 'Tra�i';
$TEXT['SEARCHING'] = 'Pretra�ivanje';
$TEXT['POST'] = 'Post'; //needs to be translated
$TEXT['COMMENT'] = 'Komentar';
$TEXT['COMMENTS'] = 'Komentari';
$TEXT['COMMENTING'] = 'Komentiranje';
$TEXT['SHORT'] = 'Kratko';
$TEXT['LONG'] = 'Dugo';
$TEXT['LOOP'] = 'Petlja';
$TEXT['FIELD'] = 'Polje';
$TEXT['REQUIRED'] = 'Tra�eno';
$TEXT['LENGTH'] = 'Du�ina';
$TEXT['MESSAGE'] = 'Poruka';
$TEXT['SUBJECT'] = 'Subjekt';
$TEXT['MATCH'] = 'Usporedi';
$TEXT['ALL_WORDS'] = 'Sve rije&egrave;i';
$TEXT['ANY_WORDS'] = 'Neke rije&egrave;i';
$TEXT['EXACT_MATCH'] = 'To&egrave;no odgovara';
$TEXT['SHOW'] = 'Prika�i';
$TEXT['HIDE'] = 'Sakrij';
$TEXT['START_PUBLISHING'] = 'Zapo&egrave;ni objavljivanje';
$TEXT['FINISH_PUBLISHING'] = 'Zavr�i objavljivanje';
$TEXT['DATE'] = 'Datum';
$TEXT['START'] = 'Start'; //needs to be translated
$TEXT['END'] = 'Kraj';
$TEXT['IMAGE'] = 'Slika';
$TEXT['ICON'] = 'Ikona';
$TEXT['SECTION'] = 'Dio';
$TEXT['DATE_FORMAT'] = 'Format datuma';
$TEXT['TIME_FORMAT'] = 'Format vrmena';
$TEXT['RESULTS'] = 'Rezultati';
$TEXT['RESIZE'] = 'Izmjeni veli&egrave;inu';
$TEXT['MANAGE'] = 'Upravljaj';
$TEXT['CODE'] = 'Kod';
$TEXT['WIDTH'] = '�irina';
$TEXT['HEIGHT'] = 'Visina';
$TEXT['MORE'] = 'Vi�e';
$TEXT['READ_MORE'] = '&Egrave;itaj vi�e';
$TEXT['CHANGE_SETTINGS'] = 'Promjeni postavke';
$TEXT['CURRENT_PAGE'] = 'Trenutna stranica';
$TEXT['CLOSE'] = 'Zatvori';
$TEXT['INTRO_PAGE'] = 'Intro Stranica';
$TEXT['INSTALLATION_URL'] = 'Instalacija URL';
$TEXT['INSTALLATION_PATH'] = 'Instalacijski dio';
$TEXT['PAGE_EXTENSION'] = 'EKstenzije stranice';
$TEXT['NO_RESULTS'] = 'Nema rezultata';
$TEXT['WEBSITE_TITLE'] = 'Ime web stranice';
$TEXT['WEBSITE_DESCRIPTION'] = 'Opis web stranice';
$TEXT['WEBSITE_KEYWORDS'] = 'Klju&egrave;ne rije&egrave;i web stranice';
$TEXT['WEBSITE_HEADER'] = 'Zaglavlje web stranice';
$TEXT['WEBSITE_FOOTER'] = 'Podno�je web stranice';
$TEXT['RESULTS_HEADER'] = 'Rezultati zaglavlja';
$TEXT['RESULTS_LOOP'] = 'Rezultati petlje';
$TEXT['RESULTS_FOOTER'] = 'Rezultati podno�ja';
$TEXT['LEVEL'] = 'Nivo';
$TEXT['NOT_FOUND'] = 'Neprona&eth;eno';
$TEXT['PAGE_SPACER'] = 'Razmaknica stranica';
$TEXT['MATCHING'] = 'Podudaranje';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Pristup predlo�cima';
$TEXT['PAGES_DIRECTORY'] = 'Direktorij stranica';
$TEXT['MEDIA_DIRECTORY'] = 'Direktorij medije';
$TEXT['FILE_MODE'] = 'File Mod';
$TEXT['USER'] = 'Korisnik';
$TEXT['OTHERS'] = 'Drugi';
$TEXT['READ'] = '&Egrave;itaj';
$TEXT['WRITE'] = 'Pi�i';
$TEXT['EXECUTE'] = 'Izvr�i';
$TEXT['SMART_LOGIN'] = 'Inteligentno logiranje';
$TEXT['REMEMBER_ME'] = 'Sjeti me';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Dopu�tanja sitema fileova';
$TEXT['DIRECTORIES'] = 'direktoriji';
$TEXT['DIRECTORY_MODE'] = 'Mod direktorija';
$TEXT['LIST_OPTIONS'] = 'Lista opcija';
$TEXT['OPTION'] = 'Opcija';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Dopusti vi�estruki odabir';
$TEXT['TEXTFIELD'] = 'Pole teksta';
$TEXT['TEXTAREA'] = 'Podru&egrave;je teksta';
$TEXT['SELECT_BOX'] = 'Ozna&egrave;i kvadrat';
$TEXT['CHECKBOX_GROUP'] = 'Ozna&egrave;i kvadrat grupe';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio gumb grupe';
$TEXT['SIZE'] = 'Veli&egrave;ina';
$TEXT['DEFAULT_TEXT'] = 'Postoje&aelig;i tekstt';
$TEXT['SEPERATOR'] = 'Odvajanje';
$TEXT['BACK'] = 'Nazad';
$TEXT['UNDER_CONSTRUCTION'] = 'U izradi';
$TEXT['MULTISELECT'] = 'Vi�estruki odabir';
$TEXT['SHORT_TEXT'] = 'Kratki tekst';
$TEXT['LONG_TEXT'] = 'Dugi tekst';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Redirekcija po&egrave;etne stranice';
$TEXT['HEADING'] = 'Zaglavlje';
$TEXT['MULTIPLE_MENUS'] = 'Ve�estruki menii';
$TEXT['REGISTERED'] = 'Registriran';
$TEXT['START'] = 'Start'; //needs to be translated
$TEXT['SECTION_BLOCKS'] = 'Kvadrati sekcije';
$TEXT['REGISTERED_VIEWERS'] = 'Registrirani promatra&egrave;i';
$TEXT['ALLOWED_VIEWERS'] = 'Dopu�teni promatra&egrave;i';
$TEXT['SUBMISSION_ID'] = 'Podpristupni ID';
$TEXT['SUBMISSIONS'] = 'Podpristupe';
$TEXT['SUBMITTED'] = 'Pristupljen';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Maximalan podpristup po satu';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Podpristupi pohranjeni u bazi podataka';
$TEXT['EMAIL_ADDRESS'] = 'Email adresa';
$TEXT['CUSTOM'] = 'Korisni&egrave;ki';
$TEXT['ANONYMOUS'] = 'anoniman';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Serverski operacijski sutav';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'World-zapisuju&aelig;i prisup fileovima';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix baziran';
$TEXT['WINDOWS'] = 'Windows'; //needs to be translated
$TEXT['HOME_FOLDER'] = 'Po&egrave;etni direktoriji';
$TEXT['HOME_FOLDERS'] = 'Po&egrave;etni direktoriji';
$TEXT['PAGE_TRASH'] = 'Sme&aelig;e stranice';
$TEXT['INLINE'] = 'U liniji';
$TEXT['SEPARATE'] = 'Odvojen';
$TEXT['DELETED'] = 'Obrisan';
$TEXT['VIEW_DELETED_PAGES'] = 'Pogledaj obrisane stranice';
$TEXT['EMPTY_TRASH'] = 'Isprazni sme&aelig;e';
$TEXT['TRASH_EMPTIED'] = 'Sme&aelig;e ispra�njeno';
$TEXT['ADD_SECTION'] = 'Dodaj sekciju';
$TEXT['POST_HEADER'] = 'Objavi zaglavlje';
$TEXT['POST_FOOTER'] = 'Objavi podno�je';
$TEXT['POSTS_PER_PAGE'] = 'Broj objava po stranici';
$TEXT['RESIZE_IMAGE_TO'] = 'Izmjeni veli&egrave;inu slike na';
$TEXT['UNLIMITED'] = 'Neograni&egrave;en';
$TEXT['OF'] = 'Of'; //needs to be translated
$TEXT['OUT_OF'] = 'Izvan Of';
$TEXT['NEXT'] = 'Slijede&aelig;i';
$TEXT['PREVIOUS'] = 'Prethodni';
$TEXT['NEXT_PAGE'] = 'Nova stranica';
$TEXT['PREVIOUS_PAGE'] = 'Prethodna stranica';
$TEXT['ON'] = 'On'; //needs to be translated
$TEXT['LAST_UPDATED_BY'] = 'Zadnje izmjenjen od';
$TEXT['RESULTS_FOR'] = 'Rezultati za';
$TEXT['TIME'] = 'Vrijeme';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style'; //needs to be translated
$TEXT['WYSIWYG_EDITOR'] = "WYSIWYG Editor"; //needs to be translated
$TEXT['SERVER_EMAIL'] = 'Server Email'; //needs to be translated
$TEXT['MENU'] = 'Meni';
$TEXT['MANAGE_GROUPS'] = 'Upravljanje grupama';
$TEXT['MANAGE_USERS'] = 'Upravljanje korisnicima';
$TEXT['PAGE_LANGUAGES'] = 'Jezici stranice';
$TEXT['HIDDEN'] = 'Skriven';
$TEXT['MAIN'] = 'Glevni';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Izmjeni fileove kod ponovnog upisa';
$TEXT['APP_NAME'] = 'Ime aplikacije';
$TEXT['SESSION_IDENTIFIER'] = 'Session Identifier'; //needs to be translated
$TEXT['BACKUP'] = 'Backup'; //needs to be translated
$TEXT['RESTORE'] = 'Povrati';
$TEXT['BACKUP_DATABASE'] = 'Backup baze podataka';
$TEXT['RESTORE_DATABASE'] = 'Povrati bazu podataka';
$TEXT['BACKUP_ALL_TABLES'] = 'Backupiraj sve tablice u bazi podataka';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backupiraj samo WB-specificirane tablice';
$TEXT['BACKUP_MEDIA'] = 'Backup Media'; //needs to be translated
$TEXT['RESTORE_MEDIA'] = 'Povrati Media';
$TEXT['ADMINISTRATION_TOOL'] = 'Administracijski alati';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha verifikacija';
$TEXT['VERIFICATION'] = 'Verifikacija';
$TEXT['DEFAULT_CHARSET'] = 'Po&egrave;etna postavka znakova';
$TEXT['CHARSET'] = 'Postavka znakova';
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
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Nemate dopu�tenje za gledanje ove stranice';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display'; //needs to be translated

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Nedovoljne privilegije tu';

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Molimo unesite svoje korisni&egrave;ko ime i lozinku ispod';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'Molimo unesite svoje korisni&egrave;ko ime';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'Molimo unesite svoju lozinku';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'Korisni&egrave;ko ime je prekratko';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'Lozinka je prekratka';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'Korisni&egrave;ko ime je predugo';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'Lozinka je preduga';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Krivo korisni&egrave;ko ime ili lozinka';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'Unesite email adresu';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'Unesite svoju email adresu ispod';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'Email adresu koju ste unjeli nemamo upisanu u bazi';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Ne mo�emo vam emailom poslati lozinku, molimo kontakirajte sistemskog administratora';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'Va�e korisni&egrave;ko ime i lozinka poslani su na va�u email adresu';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Na�alost lozinka ne mo�e biti resetirana/izmjenjena vi�e od jednom u jednom satu';

$MESSAGE['START']['WELCOME_MESSAGE'] = 'Dobro do�li u Website Baker administraciju';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Upozorenje, instalacijski direktoriji nije jo� obrisan!';
$MESSAGE['START']['CURRENT_USER'] = 'Trenutno ste logirani kao:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'Nemogu&aelig;e je otvoriti konfiguracijski file';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Ne mo�e zapisivati u konfiguracijski file';
$MESSAGE['SETTINGS']['SAVED'] = 'Postavke su uspje�no snimljene';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Obavijest: Pritisnite ovaj gumb za reset svih nesnimljenih izmjena';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Obavijest: ovo je preporu&egrave;ljivo samo za uvijete testiranja';

$MESSAGE['USERS']['ADDED'] = 'Korisnik je dodan supje�no';
$MESSAGE['USERS']['SAVED'] = 'Korisnik je snimljen uspje�no';
$MESSAGE['USERS']['DELETED'] = 'Korisnik je uspje�no obrisan';
$MESSAGE['USERS']['NO_GROUP'] = 'Niti jedna grupa nije odabrana';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'Predlo�eno korisni&egrave;ko ime je prekratko';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'Predlo�ena lozinka je prekratka';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'Une�ena lozinka ne odgovara';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'Une�ena email adresa je nepotpuna';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'Une�en email je ve&aelig; u upotrebi';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'Predlo�eno korisni&egrave;ko ime ve&aelig; je netko odabrao prije vas';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Obavijest: Trebate samo unjeti vrijednosti u polja ispod ako �elite izmjeniti korisni&egrave;ku lozinku';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Jeste li sigurni da �elite obrisati odabranog korisnika?';

$MESSAGE['GROUPS']['ADDED'] = 'Grupa je uspje�no dodana';
$MESSAGE['GROUPS']['SAVED'] = 'Grupa je uspje�no snimljena';
$MESSAGE['GROUPS']['DELETED'] = 'Grupa je uspje�no obrisana';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = 'Ime grupe je prazno';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Jeste li sigurni da �elite obrisati odabranu gurupu i sve korisnike koji joj pripadaju?';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'Grupa nije na&eth;ena';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Ime grupe ve&aelig; postoji';

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Detalji su uspje�no snimljeni';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'Email je snimljen uspje�no';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'Une�ena lozinka nije to&egrave;na';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'Lozinka je uspje�no izmjenjena';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Obavijest: Za promjenu predlo�ka idite na dio s Postavkama';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Ne mo�e uklju&egrave;iti ../ u ime direktorija';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Direktorij ne postoji';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Ne mo�e ../ u cilj direktorija';
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Ne mo�e uklju&egrave;iti ../ u ime';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'Ne mo�e koristiti index.php kao ime';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'Ni jedna medija nije na&eth;ena u postoje&aelig;em direktoriju';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'File nije prona&eth;en';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'File je uspje�no obrisan';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Folder je uspje�no obrisan';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Jeste li sigurni da �elite obrisati file ili direktorij?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Ne mo�e obrisati odabrani file';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Ne mo�e obrisati odabrani direktorij';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'Niste unjeli novo ime';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'Niste unjeli ekstenziju file-a';
$MESSAGE['MEDIA']['RENAMED'] = 'Preimenovanje je uspje�no';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Preimenovanje je neuspje�no';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'File se podudara s imenom koje ste unjeli, a koje ve&aelig; postoji';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Direktorij se podudara s imenom koje ste unjeli, a koje ve&aelig; postoji';
$MESSAGE['MEDIA']['DIR_MADE'] = 'Direktorij je uspje�no stvoren';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'Ne mo�e napraviti direktorij';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' file je uspje�no nasnimljen';
$MESSAGE['MEDIA']['UPLOADED'] = ' fileovi su supje�no nasnimljeni';

$MESSAGE['PAGES']['ADDED'] = 'Stranica je uspje�no dodana';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Zaglavlje stranice uspje�no je dodano';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Stranica s sli&egrave;nim ili istim imenom ve&aelig; postoji';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Gre�ka pri stvaranju pristupnog filea u stranicama direktorija(nedovoljne privilegije)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Gre�ka pri brisanju pristupnog filea u stranicama direktorija(nedovoljne privilegije)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Stranica nije na&eth;ena';
$MESSAGE['PAGES']['SAVED'] = 'Stranica je uspje�no snimljena';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Postavke stranice uspje�no su snimljene';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Gre�ka pri snimanju stranice';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Jeste li sigurni da �elite obrisati odabranu stranicu i sve njene podstranice';
$MESSAGE['PAGES']['DELETED'] = 'Stranice su supje�no obrisane';
$MESSAGE['PAGES']['RESTORED'] = 'Stranice su supje�no obnovljene';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'Unesite naslov stranice';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'Unesite naziv menia';
$MESSAGE['PAGES']['REORDERED'] = 'Stranice re-ordered uspje�no';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Gre�ka pri re-ordering stranice';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'Nemate dopu�tenje za izmjenu stranice';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Ne mo�e pisati file /pages/intro.php (nedovoljne privilegije)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Intro stranica je uspje�no snimljena';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Zadnje izmjene';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Kliknite OVDJE za izmjenu intro stranice';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Sekcijske postavke snimljene uspje�no';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Povratak na stranice';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'Molimo, vratite se nazad i popunite sva polja';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'File koji nasnimavate mora biti slijede&aelig;eg formata:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'File koji nasnimavate mora biti u jednom od slijede&aelig;ih formata:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'Ne mo�e nasnimiti file';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'Ve&aelig; instalirano';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Nije instalirano';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Ne mo�e deinstalirati';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Ne mo�e unzipirati file';
$MESSAGE['GENERIC']['INSTALLED'] = 'Instaliran uspje�no';
$MESSAGE['GENERIC']['UPGRADED'] = 'Nadogra&eth;en uspje�no';
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Deinstaliran uspje�no';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'Ne mo�e zapisati u ciljani direktorij';
$MESSAGE['GENERIC']['INVALID'] = 'Instaliran file je nevaljal';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Ne mo�e deinstalirati: odabrani file je trenutno u upotrebi';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONSTRUCTION'] = 'Webstranica u izradi';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'Molimo poku�ajte ponovo za&egrave;as...';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Budite strpljivo, ovo mo�e potrajati.';
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Gre�ka pri otvaranju filea.';

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'Morate unjeti detaljen podatke u nadoilaze&aelig;a polja';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Ova forma je pregledavana previ�e puta u jednom satu. Molimo poku�ajte slijede&aelig;i sat.';
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'Broj provjere (poznat kao Captcha) neto&egrave;no je une�en. Ako imate problema s &egrave;itanjem Captcha, molimo po�aljite email: '.SERVER_EMAIL;

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'Molimo odaberite koje dodatke �elite ponovo nasnimiti';
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'Uspje�no nasnimljeni moduli';
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Uspje�no nasnimljeni predlo�ci';
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Uspje�no nasnimljeni jezici';

?>