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
$language_code = 'NL';
$language_name = 'Nederlands';
$language_version = '2.7';
$language_platform = '2.7.x';
$language_author = 'Media-Studio en Argos Media Solutions';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Naar het hoofdmenu'; 
$MENU['PAGES'] = 'Pagina&#8217;s';
$MENU['MEDIA'] = 'Media'; 
$MENU['ADDONS'] = 'Extra&#8217;s';
$MENU['MODULES'] = 'Modules'; 
$MENU['TEMPLATES'] = 'Templates'; 
$MENU['LANGUAGES'] = 'Talen';
$MENU['PREFERENCES'] = 'Profiel';
$MENU['SETTINGS'] = 'Instellingen';
$MENU['ADMINTOOLS'] = 'Beheerinstellingen'; 
$MENU['ACCESS'] = 'Toegang';
$MENU['USERS'] = 'Gebruikers';
$MENU['GROUPS'] = 'Groepen';
$MENU['HELP'] = 'Help'; 
$MENU['VIEW'] = 'Website';
$MENU['LOGOUT'] = 'Uitloggen';
$MENU['LOGIN'] = 'Inloggen';
$MENU['FORGOT'] = 'Inlog-gegevens opnieuw aanvragen';

// Section overviews
$OVERVIEW['START'] = 'Website-beheer';
$OVERVIEW['PAGES'] = 'Aanmaken en beheren van de site-structuur en pagina&#8217;s.';
$OVERVIEW['MEDIA'] = 'Beheren van bestanden in de Media-folder.';
$OVERVIEW['MODULES'] = 'Beheren van modules die extra functies toevoegen aan uw site.';
$OVERVIEW['TEMPLATES'] = 'Beheren van de website-designs die u kunt toepassen.';
$OVERVIEW['LANGUAGES'] = 'Beheren van de aanwezige taalbestanden.';
$OVERVIEW['PREFERENCES'] = 'Beheren van uw persoonlijk profiel.';
$OVERVIEW['SETTINGS'] = 'Beheren van de technische website-instellingen.';
$OVERVIEW['USERS'] = 'Beheren van de gebruikers van uw website.';
$OVERVIEW['GROUPS'] = 'Beheren van de gebruikersgroepen en hun rechten.';
$OVERVIEW['HELP'] = 'Uitgebreide (Engelstalige) hulp voor het gebruik van dit systeem.';
$OVERVIEW['VIEW'] = 'Bekijk uw website zoals deze voor bezoekers te zien is (nieuw scherm).';
$OVERVIEW['ADMINTOOLS'] = 'Wijzig diverse beheerinstellingen...'; 

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Beheer bestaande pagina&#8217;s';
$HEADING['DELETED_PAGES'] = 'Gewiste pagina&#8217;s';
$HEADING['ADD_PAGE'] = 'Toevoegen nieuwe pagina';
$HEADING['ADD_HEADING'] = 'Toevoegen Heading';
$HEADING['MODIFY_PAGE'] = 'Aanpassen pagina';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Pagina-instellingen';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Geavanceerde pagina-instellingen';
$HEADING['MANAGE_SECTIONS'] = 'Beheer secties';
$HEADING['MODIFY_INTRO_PAGE'] = 'Wijzig introductiepagina';

$HEADING['BROWSE_MEDIA'] = 'Bladeren door Media-map';
$HEADING['CREATE_FOLDER'] = 'Toevoegen nieuwe map';
$HEADING['UPLOAD_FILES'] = 'Uploaden bestanden';

$HEADING['INSTALL_MODULE'] = 'Toevoegen module';
$HEADING['UNINSTALL_MODULE'] = 'Verwijderen module';
$HEADING['MODULE_DETAILS'] = 'Modulegegevens';

$HEADING['INSTALL_TEMPLATE'] = 'Toevoegen template';
$HEADING['UNINSTALL_TEMPLATE'] = 'Verwijderen template';
$HEADING['TEMPLATE_DETAILS'] = 'Template-gegevens';

$HEADING['INSTALL_LANGUAGE'] = 'Toevoegen taalbestand';
$HEADING['UNINSTALL_LANGUAGE'] = 'Verwijderen taalbestand';
$HEADING['LANGUAGE_DETAILS'] = 'Taalbestandgegevens';

$HEADING['MY_SETTINGS'] = 'Mijn gegevens';
$HEADING['MY_EMAIL'] = 'Mijn e-mailadres';
$HEADING['MY_PASSWORD'] = 'Mijn wachtwoord';

$HEADING['GENERAL_SETTINGS'] = 'Algemene instellingen';
$HEADING['DEFAULT_SETTINGS'] = 'Standaardinstellingen';
$HEADING['SEARCH_SETTINGS'] = 'Zoekinstellingen';
$HEADING['FILESYSTEM_SETTINGS'] = 'Bestandssysteeminstellingen';
$HEADING['SERVER_SETTINGS'] = 'Server-instellingen';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings';
$HEADING['ADMINISTRATION_TOOLS'] = 'Beheerinstellingen';

$HEADING['MODIFY_DELETE_USER'] = 'Beheren gebruikers';
$HEADING['ADD_USER'] = 'Toevoegen gebruiker';
$HEADING['MODIFY_USER'] = 'Gebruikersgegevens';

$HEADING['MODIFY_DELETE_GROUP'] = 'Beheren groep';
$HEADING['ADD_GROUP'] = 'Toevoegen groep';
$HEADING['MODIFY_GROUP'] = 'Groepsgegevens';

// Other text
$TEXT['OPEN'] = 'Open'; //needs to be translated
$TEXT['ADD'] = 'Toevoegen';
$TEXT['MODIFY'] = 'Wijzigen';
$TEXT['SETTINGS'] = 'Instellingen';
$TEXT['DELETE'] = 'Verwijderen';
$TEXT['SAVE'] = 'Opslaan';
$TEXT['RESET'] = 'Opnieuw';
$TEXT['LOGIN'] = 'Inloggen';
$TEXT['RELOAD'] = 'Vernieuwen';
$TEXT['CANCEL'] = 'Annuleren';
$TEXT['NAME'] = 'Naam';
$TEXT['PLEASE_SELECT'] = 'Selecteer';
$TEXT['TITLE'] = 'Titel';
$TEXT['PARENT'] = 'Ouder';
$TEXT['TYPE'] = 'Type'; 
$TEXT['VISIBILITY'] = 'Zichtbaarheid';
$TEXT['PRIVATE'] = 'Alleen aangemelde bezoekers';
$TEXT['PUBLIC'] = 'Iedereen';
$TEXT['NONE'] = 'Geen';
$TEXT['NONE_FOUND'] = 'Niet gevonden';
$TEXT['CURRENT'] = 'Huidig(e)';
$TEXT['CHANGE'] = 'Verander';
$TEXT['WINDOW'] = 'Scherm';
$TEXT['DESCRIPTION'] = 'Omschrijving';
$TEXT['KEYWORDS'] = 'Zoektermen';
$TEXT['ADMINISTRATORS'] = 'Beheerders';
$TEXT['PRIVATE_VIEWERS'] = 'Aangemelde bezoekers';
$TEXT['EXPAND'] = 'Uitklappen';
$TEXT['COLLAPSE'] = 'Inklappen';
$TEXT['MOVE_UP'] = 'Naar boven';
$TEXT['MOVE_DOWN'] = 'Naar beneden';
$TEXT['RENAME'] = 'Hernoemen';
$TEXT['MODIFY_SETTINGS'] = 'Wijzig instellingen';
$TEXT['MODIFY_CONTENT'] = 'Wijzig inhoud';
$TEXT['VIEW'] = 'Bekijken';
$TEXT['UP'] = 'Omhoog';
$TEXT['FORGOTTEN_DETAILS'] = 'Gegevens vergeten?';
$TEXT['NEED_TO_LOGIN'] = 'Inloggen?';
$TEXT['SEND_DETAILS'] = 'Stuur gegevens';
$TEXT['USERNAME'] = 'Gebruikersnaam';
$TEXT['PASSWORD'] = 'Wachtwoord';
$TEXT['HOME'] = 'Home'; 
$TEXT['TARGET_FOLDER'] = 'Doelmap';
$TEXT['OVERWRITE_EXISTING'] = 'Overschrijf bestaand(e)';
$TEXT['FILE'] = 'Bestand';
$TEXT['FILES'] = 'bestanden';
$TEXT['FOLDER'] = 'Map';
$TEXT['FOLDERS'] = 'Mappen';
$TEXT['CREATE_FOLDER'] = 'Cre&euml;er map';
$TEXT['UPLOAD_FILES'] = 'Upload bestand(en)';
$TEXT['CURRENT_FOLDER'] = 'Huidige map';
$TEXT['TO'] = 'Naar';
$TEXT['FROM'] = 'Van';
$TEXT['INSTALL'] = 'Installeren';
$TEXT['UNINSTALL'] = 'Verwijderen';
$TEXT['VIEW_DETAILS'] = 'Gegevens bekijken';
$TEXT['DISPLAY_NAME'] = 'Naamweergave';
$TEXT['AUTHOR'] = 'Auteur';
$TEXT['VERSION'] = 'Versie';
$TEXT['DESIGNED_FOR'] = 'Ontworpen voor';
$TEXT['DESCRIPTION'] = 'Omschrijving';
$TEXT['EMAIL'] = 'E-mail';
$TEXT['LANGUAGE'] = 'Taal';
$TEXT['TIMEZONE'] = 'Tijdzone';
$TEXT['CURRENT_PASSWORD'] = 'Huidig wachtwoord';
$TEXT['NEW_PASSWORD'] = 'Nieuw wachtwoord';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Herhaal nieuw wachtwoord';
$TEXT['ACTIVE'] = 'Actief';
$TEXT['DISABLED'] = 'Uit';
$TEXT['ENABLED'] = 'Aan';
$TEXT['RETYPE_PASSWORD'] = 'Herhaal wachtwoord';
$TEXT['GROUP'] = 'Groep'; 
$TEXT['SYSTEM_PERMISSIONS'] = 'Systeembevoegdheden';
$TEXT['MODULE_PERMISSIONS'] = 'Modulebevoegdheden';
$TEXT['SHOW_ADVANCED'] = 'Bekijk geavanceerde opties';
$TEXT['HIDE_ADVANCED'] = 'Verberg geavanceerde opties';
$TEXT['BASIC'] = 'Basis';
$TEXT['ADVANCED'] = 'Geavanceerd';
$TEXT['WEBSITE'] = 'Website'; 
$TEXT['DEFAULT'] = 'Standaard';
$TEXT['KEYWORDS'] = 'Zoektermen';
$TEXT['TEXT'] = 'Tekst';
$TEXT['HEADER'] = 'Koptekst'; 
$TEXT['FOOTER'] = 'Voettekst'; 
$TEXT['TEMPLATE'] = 'Template'; 
$TEXT['INSTALLATION'] = 'Installatie';
$TEXT['DATABASE'] = 'Database'; 
$TEXT['HOST'] = 'Host'; 
$TEXT['INTRO'] = 'Introductie';
$TEXT['PAGE'] = 'Pagina';
$TEXT['SIGNUP'] = 'Aanmelden';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP-foutmeldingsniveau';
$TEXT['ADMIN'] = 'Beheerder';
$TEXT['PATH'] = 'Pad';
$TEXT['URL'] = 'URL'; 
$TEXT['FRONTEND'] = 'Bezoekersversie van website';
$TEXT['EXTENSION'] = 'Extensie';
$TEXT['TABLE_PREFIX'] = 'Tabelvoorvoegsel';
$TEXT['CHANGES'] = 'Veranderingen';
$TEXT['ADMINISTRATION'] = 'Beheer';
$TEXT['FORGOT_DETAILS'] = 'Gegevens vergeten?';
$TEXT['LOGGED_IN'] = 'Ingelogd';
$TEXT['WELCOME_BACK'] = 'Welkom terug';
$TEXT['FULL_NAME'] = 'Volledige naam';
$TEXT['ACCOUNT_SIGNUP'] = 'Aanmelden als gebruiker';
$TEXT['LINK'] = 'Link'; 
$TEXT['ANCHOR'] = 'Anker'; 
$TEXT['TARGET'] = 'Doel';
$TEXT['NEW_WINDOW'] = 'Nieuw scherm';
$TEXT['SAME_WINDOW'] = 'Zelfde scherm';
$TEXT['TOP_FRAME'] = 'Bovenste Frame'; 
$TEXT['PAGE_LEVEL_LIMIT'] = 'Paginaniveaulimiet';
$TEXT['SUCCESS'] = 'Succes';
$TEXT['ERROR'] = 'Fout';
$TEXT['ARE_YOU_SURE'] = 'Weet u het zeker?';
$TEXT['YES'] = 'Ja';
$TEXT['NO'] = 'Nee';
$TEXT['SYSTEM_DEFAULT'] = 'Standaardinstellingen';
$TEXT['PAGE_TITLE'] = 'Paginatitel';
$TEXT['MENU_TITLE'] = 'Menutitel';
$TEXT['ACTIONS'] = 'Acties';
$TEXT['UNKNOWN'] = 'Onbekend(e)';
$TEXT['BLOCK'] = 'Blok';
$TEXT['SEARCH'] = 'Zoeken';
$TEXT['SEARCHING'] = 'Zoekfunctie';
$TEXT['POST'] = 'Bericht';
$TEXT['COMMENT'] = 'Commentaar';
$TEXT['COMMENTS'] = 'Commentaren';
$TEXT['COMMENTING'] = 'Commentaar-opties';
$TEXT['SHORT'] = 'Kort';
$TEXT['LONG'] = 'Lang';
$TEXT['LOOP'] = 'Herhaling';
$TEXT['FIELD'] = 'Veld';
$TEXT['REQUIRED'] = 'Verplicht';
$TEXT['LENGTH'] = 'Lengte';
$TEXT['MESSAGE'] = 'Bericht';
$TEXT['SUBJECT'] = 'Onderwerp';
$TEXT['MATCH'] = 'Gelijk aan';
$TEXT['ALL_WORDS'] = 'Term of deel van term';
$TEXT['ANY_WORDS'] = 'E&eacute;n van de termen';
$TEXT['EXACT_MATCH'] = 'Exacte term';
$TEXT['SHOW'] = 'Tonen';
$TEXT['HIDE'] = 'Verbergen';
$TEXT['START_PUBLISHING'] = 'Start publicatie';
$TEXT['FINISH_PUBLISHING'] = 'Einde publicatie';
$TEXT['DATE'] = 'Datum';
$TEXT['START'] = 'Start'; 
$TEXT['END'] = 'Einde';
$TEXT['IMAGE'] = 'Afbeelding';
$TEXT['ICON'] = 'Icoon';
$TEXT['SECTION'] = 'Sectie';
$TEXT['DATE_FORMAT'] = 'Datumweergave';
$TEXT['TIME_FORMAT'] = 'Tijdweergave';
$TEXT['RESULTS'] = 'Resultaten';
$TEXT['RESIZE'] = 'Veranderen grootte';
$TEXT['MANAGE'] = 'Beheren';
$TEXT['CODE'] = 'Code'; 
$TEXT['WIDTH'] = 'Breedte';
$TEXT['HEIGHT'] = 'Hoogte';
$TEXT['MORE'] = 'Meer';
$TEXT['READ_MORE'] = 'Lees verder';
$TEXT['CHANGE_SETTINGS'] = 'Verander instellingen';
$TEXT['CURRENT_PAGE'] = 'Huidige pagina';
$TEXT['CLOSE'] = 'Sluiten';
$TEXT['INTRO_PAGE'] = 'Introductiepagina';
$TEXT['INSTALLATION_URL'] = 'Installatie-URL';
$TEXT['INSTALLATION_PATH'] = 'Installatiepad';
$TEXT['PAGE_EXTENSION'] = 'Pagina-extensie';
$TEXT['NO_RESULTS'] = 'Geen resultaten';
$TEXT['WEBSITE_TITLE'] = 'Website-titel';
$TEXT['WEBSITE_DESCRIPTION'] = 'Website-omschrijving';
$TEXT['WEBSITE_KEYWORDS'] = 'Website-keywords';
$TEXT['WEBSITE_HEADER'] = 'Website-header';
$TEXT['WEBSITE_FOOTER'] = 'Website-footer';
$TEXT['RESULTS_HEADER'] = 'Resultaten-header';
$TEXT['RESULTS_LOOP'] = 'Zoekresultaten';
$TEXT['RESULTS_FOOTER'] = 'Zoekresultaten-footer';
$TEXT['LEVEL'] = 'Niveau';
$TEXT['NOT_FOUND'] = 'Niet gevonden';
$TEXT['PAGE_SPACER'] = 'Pagina-spacer';
$TEXT['MATCHING'] = 'Overeenkomend';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Template-bevoegdheden';
$TEXT['PAGES_DIRECTORY'] = 'Pagina&#8217;s directory';
$TEXT['MEDIA_DIRECTORY'] = 'Media-directory';
$TEXT['FILE_MODE'] = 'Bestandsmodus';
$TEXT['USER'] = 'Gebruiker'; 
$TEXT['OTHERS'] = 'Anderen'; 
$TEXT['READ'] = 'Lees'; 
$TEXT['WRITE'] = 'Schrijf'; 
$TEXT['EXECUTE'] = 'Uitvoeren'; 
$TEXT['SMART_LOGIN'] = 'Slim inloggen';
$TEXT['REMEMBER_ME'] = 'Onthoud mijn gegevens.';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Bestandssysteembevoegdheden';
$TEXT['DIRECTORIES'] = 'Mappen'; 
$TEXT['DIRECTORY_MODE'] = 'Directory-modus';
$TEXT['LIST_OPTIONS'] = 'Lijstopties';
$TEXT['OPTION'] = 'Opties';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Meerdere selecties toestaan';
$TEXT['TEXTFIELD'] = 'Tekstveld';
$TEXT['TEXTAREA'] = 'Tekstomgeving';
$TEXT['SELECT_BOX'] = 'Selectievakje';
$TEXT['CHECKBOX_GROUP'] = 'Aankruisvakjesgroep';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio-buttongroep';
$TEXT['SIZE'] = 'Grootte';
$TEXT['DEFAULT_TEXT'] = 'Standaard tekst';
$TEXT['SEPERATOR'] = 'Scheidingslijn';
$TEXT['BACK'] = 'Terug';
$TEXT['UNDER_CONSTRUCTION'] = 'In bewerking';
$TEXT['MULTISELECT'] = 'Meervoudige selectie';
$TEXT['SHORT_TEXT'] = 'Korte tekst';
$TEXT['LONG_TEXT'] = 'Lange tekst';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Homepage redirection';
$TEXT['HEADING'] = 'Titel';
$TEXT['MULTIPLE_MENUS'] = 'Meervoudige menu&#8217;s';
$TEXT['REGISTERED'] = 'Geregistreerd';
$TEXT['START'] = 'Start'; 
$TEXT['SECTION_BLOCKS'] = 'Sectieblokken';
$TEXT['REGISTERED_VIEWERS'] = 'Geregistreerde bezoekers';
$TEXT['ALLOWED_VIEWERS'] = 'Toegestane kijkers'; 
$TEXT['SUBMISSION_ID'] = 'Toegevoegd bericht';
$TEXT['SUBMISSIONS'] = 'Toevoegingen';
$TEXT['SUBMITTED'] = 'Toegevoegd';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. toevoegingen per uur';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Toevoegingen opgeslagen in database';
$TEXT['EMAIL_ADDRESS'] = 'E-mailadres';
$TEXT['CUSTOM'] = 'Maatwerk';
$TEXT['ANONYMOUS'] = 'Anoniem';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Server-besturingssysteem';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Volledig veranderbare bestandspermissies';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix-gebaseerd';
$TEXT['WINDOWS'] = 'Windows'; 
$TEXT['HOME_FOLDER'] = 'Home-map';
$TEXT['HOME_FOLDERS'] = 'Home-mappen';
$TEXT['PAGE_TRASH'] = 'Pagina-prullenbak';
$TEXT['INLINE'] = 'Inline';
$TEXT['SEPARATE'] = 'Gescheiden';
$TEXT['DELETED'] = 'Gewist';
$TEXT['VIEW_DELETED_PAGES'] = 'Bekijk gewiste pagina&#8217;s';
$TEXT['EMPTY_TRASH'] = 'Legen prullenbak';
$TEXT['TRASH_EMPTIED'] = 'Prullenbak geleegd';
$TEXT['ADD_SECTION'] = 'Toevoegen sectie';
$TEXT['POST_HEADER'] = 'Bericht-header';
$TEXT['POST_FOOTER'] = 'Bericht-footer';
$TEXT['POSTS_PER_PAGE'] = 'Berichten per pagina';
$TEXT['RESIZE_IMAGE_TO'] = 'Verander afbeeldingsgrootte naar';
$TEXT['UNLIMITED'] = 'Ongelimiteerd';
$TEXT['OF'] = 'Uit';
$TEXT['OUT_OF'] = 'Buiten';
$TEXT['NEXT'] = 'Volgende';
$TEXT['PREVIOUS'] = 'Vorige';
$TEXT['NEXT_PAGE'] = 'Volgende pagina';
$TEXT['PREVIOUS_PAGE'] = 'Vorige pagina';
$TEXT['ON'] = 'Op';
$TEXT['LAST_UPDATED_BY'] = 'Laatst vernieuwd door';
$TEXT['RESULTS_FOR'] = 'Resultaten voor';
$TEXT['TIME'] = 'Tijd';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG-stijl';
$TEXT['WYSIWYG_EDITOR'] = 'WYSIWYG-editor';
$TEXT['SERVER_EMAIL'] = 'Server e-mail';
$TEXT['MENU'] = 'Menu'; 
$TEXT['MANAGE_GROUPS'] = 'Beheer groepen';
$TEXT['MANAGE_USERS'] = 'Beheer gebruikers';
$TEXT['PAGE_LANGUAGES'] = 'Talen';
$TEXT['HIDDEN'] = 'Verborgen';
$TEXT['MAIN'] = 'Primair(e)';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Bestanden hernoemen bij uploaden';
$TEXT['APP_NAME'] = 'Applicatienaam';
$TEXT['SESSION_IDENTIFIER'] = 'Sessie-identificatie';
$TEXT['BACKUP'] = 'Backup maken';
$TEXT['RESTORE'] = 'Backup terugzetten';
$TEXT['BACKUP_DATABASE'] = 'Database-backup maken';
$TEXT['RESTORE_DATABASE'] = 'Database-backup terugzetten';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup van alle tabellen in de database'; 
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup van enkel WB-gerelateerde tabellen'; 
$TEXT['BACKUP_MEDIA'] = 'Backuppen Media-folder';
$TEXT['RESTORE_MEDIA'] = 'Terugzetten Media-folder';
$TEXT['ADMINISTRATION_TOOL'] = 'Beheeropties';
$TEXT['CAPTCHA_VERIFICATION'] = 'Captcha-verificatie';
$TEXT['VERIFICATION'] = 'Verificatie';
$TEXT['DEFAULT_CHARSET'] = 'Standaard tekenset';
$TEXT['CHARSET'] = 'Tekenset';
$TEXT['MODULE_ORDER'] = 'Module volgorde om te zoeken'; 
$TEXT['MAX_EXCERPT'] = 'Max lijnen per zoeksessie'; 
$TEXT['TIME_LIMIT'] = 'Max time to gather excerpts per module'; //needs to be translated
$TEXT['PUBL_START_DATE'] = 'Start datum'; 
$TEXT['PUBL_END_DATE'] = 'Eind datum'; 
$TEXT['CALENDAR'] = 'Kalender'; 
$TEXT['DELETE_DATE'] = 'Wis datum'; 
$TEXT['WBMAILER_DEFAULT_SETTINGS_NOTICE'] = 'Specifieer hieronder een standaard "VAN" adres en "AFZENDER" naam. Het is aanbevolen om een VAN adres zoals: <strong>admin@yourdomain.com</strong> te gebruiken. Om spam te verhinderen kunnen sommige mailproviders (vb <em>mail.com</em>) mails verwerpen met een VAN: adres zoals <em>name@mail.com</em>, die verzonden worden vanaf een vreemde relay-server.<br /><br />Onderstaande standaardwaarden worden enkel gebruikt indien geen andere waarden gespecifieerd worden door Website Baker. Indien uw server <acronym title="Simple mail transfer protocol">SMTP</acronym> ondersteunt kunt u deze optie gebruiken voor het versturen van uitgaande mails.'; 
$TEXT['WBMAILER_DEFAULT_SENDER_MAIL'] = 'Standaard mail Van'; 
$TEXT['WBMAILER_DEFAULT_SENDER_NAME'] = 'Standaard Afzender Naam'; 
$TEXT['WBMAILER_NOTICE'] = '<strong>SMTP Mailer Instellingen:</strong><br />Onderstaande instellingen zijn enkel van toepassing indien u mails wenst te verzenden via <acronym title="Simple mail transfer protocol">SMTP</acronym>. Indien u de naam of instellingen van de SMTP server niet kent, selecteer dan bij de standaard mail routine: PHP MAIL.'; 
$TEXT['WBMAILER_FUNCTION'] = 'Mail Routine'; 
$TEXT['WBMAILER_SMTP_HOST'] = 'SMTP Host'; 
$TEXT['WBMAILER_PHP'] = 'PHP MAIL'; 
$TEXT['WBMAILER_SMTP'] = 'SMTP'; 
$TEXT['WBMAILER_SMTP_AUTH'] = 'SMTP authenticatie'; 
$TEXT['WBMAILER_SMTP_AUTH_NOTICE'] = 'Enkel wanneer men zich dient aan te melden op de SMTP Host'; 
$TEXT['WBMAILER_SMTP_USERNAME'] = 'SMTP gebruikersnaam'; 
$TEXT['WBMAILER_SMTP_PASSWORD'] = 'SMTP Paswoord'; 
$TEXT['PLEASE_LOGIN'] = 'Inloggen aub'; 

// Success/error messages
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Sorry, u heeft geen bevoegdheden om deze pagina te bekijken';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, niets om af te beelden'; 

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Onvoldoende rechten om hier te zijn';

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Vul uw gebruikersnaam en wachtwoord in:';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'Vul uw gebruikersnaam in';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'Vul uw wachtwoord in';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'Deze gebruikersnaam is te kort';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'Dit wachtwoord is te kort';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'Deze gebruikersnaam is te lang';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'Dit wachtwoord is te lang';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Gebruikersnaam en/of wachtwoord incorrect';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'U moet een e-mailadres invullen';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'Vult u alstublieft uw e-mailadres hieronder in';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'Het door u opgegeven e-mailadres is niet gevonden in onze database';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Het is niet mogelijk uw wachtwoord per e-mail te versturen. Neem contact op met de beheerder';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'Uw gebruikersnaam en wachtwoord zijn verzonden naar het opgegeven e-mailadres';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Sorry, het wachtwoord kan maximaal eens per uur worden aangepast.';

$MESSAGE['START']['WELCOME_MESSAGE'] = 'Welkom bij het website-beheer';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Waarschuwing, de installatiemap bestaat nog steeds!';
$MESSAGE['START']['CURRENT_USER'] = 'U bent ingelogd als';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'Het configuratiebestand kan niet worden geopend';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Kan niet wegschrijven naar het configuratiebestand';
$MESSAGE['SETTINGS']['SAVED'] = 'Instellingen succesvol opgeslagen';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Opgelet: sla eerst de wijzigingen op die u eventueel zojuist heeft aangebracht!';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Opgelet: dit is alleen bedoeld voor testdoeleinden!';

$MESSAGE['USERS']['ADDED'] = 'Gebruiker succesvol toegevoegd';
$MESSAGE['USERS']['SAVED'] = 'Gebruiker succesvol opgeslagen';
$MESSAGE['USERS']['DELETED'] = 'Gebruiker succesvol verwijderd';
$MESSAGE['USERS']['NO_GROUP'] = 'Geen groep geselecteerd';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'De ingevoerde  gebruikersnaam is te kort';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'Het ingevoerde wachtwoord is te kort';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'De ingevoerde wachtwoorden komen niet overeen';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'Het ingevoerde e-mailadres is niet correct';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'Het ingevoerde e-mailadres is al in gebruik';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'De ingevoerde gebruikersnaam is al in gebruik';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Attentie: vul alleen de bovenstaande velden in wanneer u het wachtwoord van de gebruiker wilt veranderen';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Weet u zeker dat u de geselecteerde gebruiker wilt verwijderen?';

$MESSAGE['GROUPS']['ADDED'] = 'Groep succesvol toegevoegd';
$MESSAGE['GROUPS']['SAVED'] = 'Groep succesvol opgeslagen';
$MESSAGE['GROUPS']['DELETED'] = 'Groep succesvol verwijderd';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = 'Groepsnaam is niet ingevuld';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Weet u zeker dat u de geselecteerde groep wilt verwijderen (en alle daarbij behorende gebruikers)?';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'Geen groep gevonden';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Groepnaam is reeds in gebruik';

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Details succesvol opgeslagen';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'E-mail succesvol gewijzigd';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'Het (huidige) ingevoerde wachtwoord is niet correct';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'Wachtwoord succesvol gewijzigd';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Attentie: Om de template aan te passen moet u naar de instellingensectie';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Gebruik van ../ in de mapnaam is niet toegestaan';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Map bestaat niet';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Gebruik van ../ in de map is niet toegestaan';
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Gebruik van ../ in de naam is niet toegestaan';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'index.php als naam is niet toegestaan';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'Geen media bestanden gevonden in de huidige map';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'Bestand niet gevonden';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'Bestand succesvol verwijderd';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Map succesvol verwijderd';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Weet u zeker dat u het volgende bestand of map wilt verwijderen?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Kan geselecteerde bestand niet verwijderen';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Kan geselecteerde map niet verwijderen';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'U heeft geen nieuwe naam opgegeven';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'U heeft geen bestandsextensie opgegeven';
$MESSAGE['MEDIA']['RENAMED'] = 'Succesvol hernoemd';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Hernoemen niet gelukt';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Opgegeven bestandsnaam bestaat al';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Opgegeven naam van de map bestaat al';
$MESSAGE['MEDIA']['DIR_MADE'] = 'Folder succesvol aangemaakt';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'Aanmaken map mislukt';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' succesvol geupload';
$MESSAGE['MEDIA']['UPLOADED'] = ' succesvol geupload';

$MESSAGE['PAGES']['ADDED'] = 'Pagina succesvol opgeslagen';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Pagina-heading succesvol opgeslagen';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Een pagina met dezelfde naam bestaat al';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Kan geen bestanden opslaan in de /pages-map (onvoldoende rechten)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Kan geen bestanden verwijderen uit de /pages-map (onvoldoende rechten)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Pagina niet gevonden';
$MESSAGE['PAGES']['SAVED'] = 'Pagina succesvol opgeslagen';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Pagina-instellingen succesvol opgeslagen';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Fout tijdens opslaan pagina';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Weet u zeker dat u deze pagina wilt verwijderen (en al zijn subpagina&#8217;s)';
$MESSAGE['PAGES']['DELETED'] = 'Pagina succesvol verwijderd';
$MESSAGE['PAGES']['RESTORED'] = 'Pagina succesvol teruggehaald';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'Vul aub een paginatitel in';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'Vul aub een menutitel in';
$MESSAGE['PAGES']['REORDERED'] = 'Pagina succesvol herordend';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Fout bij herordenen pagina';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'U heeft niet de rechten om deze pagina aan te passen';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Kan instellingen niet wegschrijven naar het bestand /pages/intro.php (onvoldoende rechten)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Introductiepagina succesvol opgeslagen';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Als laatste aangepast door';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Klik hier om de introductiepagina aan te passen';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Sectie-instellingen succesvol opgeslagen';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Keer terug naar pagina&#8217;s';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'Niet alle velden zijn ingevuld. Probeert u het nog eens';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'Let op: het bestand moet het volgende formaat hebben:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'Let op: de bestanden moeten het volgende formaat hebben:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'Kan niet uploaden';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'Is al ge&iuml;nstalleerd';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Niet ge&iuml;nstalleerd';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Kan niet de&iuml;nstalleren';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Kan het bestand niet uitpakken';
$MESSAGE['GENERIC']['INSTALLED'] = 'Installatie succesvol';
$MESSAGE['GENERIC']['UPGRADED'] = 'Upgrade succesvol';
$MESSAGE['GENERIC']['UNINSTALLED'] = 'De&iuml;nstallatie succesvol';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'Kan niet schrijven naar doelmap';
$MESSAGE['GENERIC']['INVALID'] = 'Ongeldig bestand';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Kan niet de&iuml;nstalleren: het geselecteerde bestand is in gebruik';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION'] = 'Website in bewerking';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'Probeert u aub het binnenkort nog eens.';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Even geduld aub, dit kan even duren.';
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Kan bestand niet openen.';

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'De volgende velden zijn verplicht';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Sorry, dit formulier is te vaak verstuurd binnen dit uur. Probeert u het over een uur nog eens.';
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'Het verificatienummer (ook wel Captcha genoemd) dat u hebt ingevoerd is incorrect. Als u de Captcha niet goed kunt lezen, stuur dan een e-mail naar: '.SERVER_EMAIL;

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'Selecteer de extra&#8217;s die u opnieuw wilt laden';
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'Modules succesvol herladen';
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Templates succesvol herladen';
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Taalbestanden succesvol herladen';

?>