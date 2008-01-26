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
$language_code = 'CA';
$language_name = 'Catalan';
$language_version = '2.7';
$language_platform = '2.7.x';
$language_author = 'Carles Escrig (simkin)';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Inici';
$MENU['PAGES'] = 'P�gines';
$MENU['MEDIA'] = 'Fitxers';
$MENU['ADDONS'] = 'Afegits';
$MENU['MODULES'] = 'M�duls';
$MENU['TEMPLATES'] = 'Plantilles';
$MENU['LANGUAGES'] = 'Idiomes';
$MENU['PREFERENCES'] = 'Perfil';
$MENU['SETTINGS'] = 'Par�metres';
$MENU['ADMINTOOLS'] = 'Admin-Tools'; //needs to be translated
$MENU['ACCESS'] = 'Acc�s';
$MENU['USERS'] = 'Usuaris';
$MENU['GROUPS'] = 'Grups';
$MENU['HELP'] = 'Ajuda';
$MENU['VIEW'] = 'Veure';
$MENU['LOGOUT'] = 'Eixir';
$MENU['LOGIN'] = 'Entrar';
$MENU['FORGOT'] = 'Demanar Dades del Compte';

// Section overviews
$OVERVIEW['START'] = '�ndex d\'Administraci�';
$OVERVIEW['PAGES'] = 'Administreu les p�gines de la vostra web...';
$OVERVIEW['MEDIA'] = 'Administreu la carpeta de fitxers...';
$OVERVIEW['MODULES'] = 'Administreu els m�duls de Website Baker...';
$OVERVIEW['TEMPLATES'] = 'Canvieu l\'aspecte i estil de la vostra p�gina amb plantilles...';
$OVERVIEW['LANGUAGES'] = 'Administreu els idiomes de Website Baker...';
$OVERVIEW['PREFERENCES'] = 'Canvieu les prefer�ncies com l\'adre�a de correu electr�nic, contrasenya, etc... ';
$OVERVIEW['SETTINGS'] = 'Canvieu els par�metres de Website Baker...';
$OVERVIEW['USERS'] = 'Administreu els usuaris que poden identificar-se a Website Baker...';
$OVERVIEW['GROUPS'] = 'Administreu els grups d\'usuaris i els seus permisos de sistema...';
$OVERVIEW['HELP'] = 'Teniu una pregunta? Trobeu la vostra resposta...';
$OVERVIEW['VIEW'] = 'Veure i navegar r�pidament la vostra p�gina web en una nova finestra...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Modifica/Esborra P�gina';
$HEADING['DELETED_PAGES'] = 'P�gines Esborrades';
$HEADING['ADD_PAGE'] = 'Afegeix P�gina';
$HEADING['ADD_HEADING'] = 'Afegeix Encap�alament';
$HEADING['MODIFY_PAGE'] = 'Modifica P�gina';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Modifica els Par�metres de la P�gina';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Modifica els Par�metres Avan�ats de la P�gina';
$HEADING['MANAGE_SECTIONS'] = 'Administra les Seccions';
$HEADING['MODIFY_INTRO_PAGE'] = 'Modifica P�gina Introduct�ria';

$HEADING['BROWSE_MEDIA'] = 'Explorar Fitxers';
$HEADING['CREATE_FOLDER'] = 'Crea Carpeta';
$HEADING['UPLOAD_FILES'] = 'Penja Fitxer(s)';

$HEADING['INSTALL_MODULE'] = 'Instal�la M�dul';
$HEADING['UNINSTALL_MODULE'] = 'Desinstal�la M�dul';
$HEADING['MODULE_DETAILS'] = 'Detalls del M�dul';

$HEADING['INSTALL_TEMPLATE'] = 'Instal�la Plantilla';
$HEADING['UNINSTALL_TEMPLATE'] = 'Desinstal�la Plantilla';
$HEADING['TEMPLATE_DETAILS'] = 'Detalls de la Plantilla';

$HEADING['INSTALL_LANGUAGE'] = 'Instal�la Idioma';
$HEADING['UNINSTALL_LANGUAGE'] = 'Desinstal�la Idioma';
$HEADING['LANGUAGE_DETAILS'] = 'Detalls de l\'Idioma';

$HEADING['MY_SETTINGS'] = 'Els meus Par�metres';
$HEADING['MY_EMAIL'] = 'El meu Correu';
$HEADING['MY_PASSWORD'] = 'La meua Contrasenya';

$HEADING['GENERAL_SETTINGS'] = 'Par�metres Generals';
$HEADING['DEFAULT_SETTINGS'] = 'Par�metres per Defecte';
$HEADING['SEARCH_SETTINGS'] = 'Par�metres de Cerca';
$HEADING['FILESYSTEM_SETTINGS'] = 'Par�metres del Sistema de Fitxers';
$HEADING['SERVER_SETTINGS'] = 'Server Settings'; //needs to be translated
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings'; //needs to be translated
$HEADING['ADMINISTRATION_TOOLS'] = 'Administration Tools'; //needs to be translated

$HEADING['MODIFY_DELETE_USER'] = 'Modifica/Esborra Usuari';
$HEADING['ADD_USER'] = 'Afegeix Usuari';
$HEADING['MODIFY_USER'] = 'Modifica Usuari';

$HEADING['MODIFY_DELETE_GROUP'] = 'Modifica/Esborra Grup';
$HEADING['ADD_GROUP'] = 'Afegeix Grup';
$HEADING['MODIFY_GROUP'] = 'Modifica Grup';

// Other text
$TEXT['ADD'] = 'Afegeix';
$TEXT['MODIFY'] = 'Modifica';
$TEXT['SETTINGS'] = 'Par�metres';
$TEXT['DELETE'] = 'Esborra';
$TEXT['SAVE'] = 'Desa';
$TEXT['RESET'] = 'Reinicia';
$TEXT['LOGIN'] = 'Identificaci�';
$TEXT['RELOAD'] = 'Recarrega';
$TEXT['CANCEL'] = 'Cancel�la';
$TEXT['NAME'] = 'Nom';
$TEXT['PLEASE_SELECT'] = 'Per favor trieu';
$TEXT['TITLE'] = 'T�tol';
$TEXT['PARENT'] = 'Mare';
$TEXT['TYPE'] = 'Tipus';
$TEXT['VISIBILITY'] = 'Visibilitat';
$TEXT['PRIVATE'] = 'Privat';
$TEXT['PUBLIC'] = 'P�blic';
$TEXT['NONE'] = 'Cap';
$TEXT['NONE_FOUND'] = 'No s\'ha trobat cap';
$TEXT['CURRENT'] = 'Actual';
$TEXT['CHANGE'] = 'Canvia';
$TEXT['WINDOW'] = 'Finestra';
$TEXT['DESCRIPTION'] = 'Descripci�';
$TEXT['KEYWORDS'] = 'Paraules clau';
$TEXT['ADMINISTRATORS'] = 'Administradors';
$TEXT['PRIVATE_VIEWERS'] = 'Visualitzadors Privats';
$TEXT['EXPAND'] = 'Expandeix';
$TEXT['COLLAPSE'] = 'Contrau';
$TEXT['MOVE_UP'] = 'Mou Amunt';
$TEXT['MOVE_DOWN'] = 'Mou Avall';
$TEXT['RENAME'] = 'Reanomena';
$TEXT['MODIFY_SETTINGS'] = 'Modifica Par�metres';
$TEXT['MODIFY_CONTENT'] = 'Modifica Contingut';
$TEXT['VIEW'] = 'Veure';
$TEXT['UP'] = 'Amunt';
$TEXT['FORGOTTEN_DETAILS'] = 'Heu oblidat la contrasenya?';
$TEXT['NEED_TO_LOGIN'] = 'Voleu identificar-vos?';
$TEXT['SEND_DETAILS'] = 'Envia les Dades';
$TEXT['USERNAME'] = 'Nom d\'Usuari';
$TEXT['PASSWORD'] = 'Contrasenya';
$TEXT['HOME'] = 'Inici';
$TEXT['TARGET_FOLDER'] = 'Carpeta de dest�';
$TEXT['OVERWRITE_EXISTING'] = 'Sobreescriure';
$TEXT['FILE'] = 'fitxer';
$TEXT['FILES'] = 'fitxers';
$TEXT['FOLDER'] = 'carpeta';
$TEXT['FOLDERS'] = 'carpetes';
$TEXT['CREATE_FOLDER'] = 'Crea Carpeta';
$TEXT['UPLOAD_FILES'] = 'Penja Fitxer(s)';
$TEXT['CURRENT_FOLDER'] = 'Carpeta Actual';
$TEXT['TO'] = 'a';
$TEXT['FROM'] = 'des de';
$TEXT['INSTALL'] = 'Instal�la';
$TEXT['UNINSTALL'] = 'Desinstal�la';
$TEXT['VIEW_DETAILS'] = 'Veure Detalls';
$TEXT['DISPLAY_NAME'] = 'Nom a Mostrar';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['VERSION'] = 'Versi�';
$TEXT['DESIGNED_FOR'] = 'Dissenyat Per';
$TEXT['DESCRIPTION'] = 'Descripci�';
$TEXT['EMAIL'] = 'Correu';
$TEXT['LANGUAGE'] = 'Idioma';
$TEXT['TIMEZONE'] = 'Fus Horari';
$TEXT['CURRENT_PASSWORD'] = 'Contrasenya Actual';
$TEXT['NEW_PASSWORD'] = 'Nova Contrasenya';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Nova Contrasenya (de nou)';
$TEXT['ACTIVE'] = 'Actiu';
$TEXT['DISABLED'] = 'Inhabilitat';
$TEXT['ENABLED'] = 'Habilitat';
$TEXT['RETYPE_PASSWORD'] = 'Contrasenya (de nou)';
$TEXT['GROUP'] = 'Grup';
$TEXT['SYSTEM_PERMISSIONS'] = 'Permisos de Sistema';
$TEXT['MODULE_PERMISSIONS'] = 'Permisos de M�dul';
$TEXT['SHOW_ADVANCED'] = 'Mostra Opcions Avan�ades';
$TEXT['HIDE_ADVANCED'] = 'Oculta Opcions Avan�ades';
$TEXT['BASIC'] = 'B�sic';
$TEXT['ADVANCED'] = 'Avan�at';
$TEXT['WEBSITE'] = 'P�gina Web';
$TEXT['DEFAULT'] = 'Per defecte';
$TEXT['KEYWORDS'] = 'Paraules Clau';
$TEXT['TEXT'] = 'Text'; //needs to be translated
$TEXT['HEADER'] = 'Cap�alera';
$TEXT['FOOTER'] = 'Peu';
$TEXT['TEMPLATE'] = 'Plantilla';
$TEXT['INSTALLATION'] = 'Instal�laci�';
$TEXT['DATABASE'] = 'Base de Dades';
$TEXT['HOST'] = 'Servidor';
$TEXT['INTRO'] = 'Entrada';
$TEXT['PAGE'] = 'P�gina';
$TEXT['SIGNUP'] = 'Registre';
$TEXT['PHP_ERROR_LEVEL'] = 'Nivell d\'Informe d\'Error de PHP';
$TEXT['ADMIN'] = 'Admin'; //needs to be translated
$TEXT['PATH'] = 'Ruta';
$TEXT['URL'] = 'URL'; //needs to be translated
$TEXT['FRONTEND'] = 'Frontal';
$TEXT['EXTENSION'] = 'Extensions';
$TEXT['TABLE_PREFIX'] = 'Prefix de Taula';
$TEXT['CHANGES'] = 'Canvis';
$TEXT['ADMINISTRATION'] = 'Administraci�';
$TEXT['FORGOT_DETAILS'] = 'Heu oblidat els Detalls?';
$TEXT['LOGGED_IN'] = 'Identificat';
$TEXT['WELCOME_BACK'] = 'Benvingut de nou';
$TEXT['FULL_NAME'] = 'Nom Complet';
$TEXT['ACCOUNT_SIGNUP'] = 'Registre de Compte';
$TEXT['LINK'] = 'Enlla�';
$TEXT['ANCHOR'] = 'Anchor'; //needs to be translated
$TEXT['TARGET'] = 'Dest�';
$TEXT['NEW_WINDOW'] = 'Nova Finestra';
$TEXT['SAME_WINDOW'] = 'La Mateixa Finestra';
$TEXT['TOP_FRAME'] = 'Top Frame'; //needs to be translated
$TEXT['PAGE_LEVEL_LIMIT'] = 'L�mit de Nivell de P�gina';
$TEXT['SUCCESS'] = '�xit';
$TEXT['ERROR'] = 'Error'; //needs to be translated
$TEXT['ARE_YOU_SURE'] = 'Esteu segur?';
$TEXT['YES'] = 'S�';
$TEXT['NO'] = 'No'; //needs to be translated
$TEXT['SYSTEM_DEFAULT'] = 'Per Defecte del Sistema';
$TEXT['PAGE_TITLE'] = 'T�tol de la P�gina';
$TEXT['MENU_TITLE'] = 'T�tol del Men�';
$TEXT['ACTIONS'] = 'Accions';
$TEXT['UNKNOWN'] = 'Desconegut';
$TEXT['BLOCK'] = 'Bloc';
$TEXT['SEARCH'] = 'Cerca';
$TEXT['SEARCHING'] = 'Recerca';
$TEXT['POST'] = 'Missatge';
$TEXT['COMMENT'] = 'Comentari';
$TEXT['COMMENTS'] = 'Comentaris';
$TEXT['COMMENTING'] = 'Comentaris';
$TEXT['SHORT'] = 'Curt';
$TEXT['LONG'] = 'Llarg';
$TEXT['LOOP'] = 'Repetici�';
$TEXT['FIELD'] = 'Camp';
$TEXT['REQUIRED'] = 'Requerit';
$TEXT['LENGTH'] = 'Longitud';
$TEXT['MESSAGE'] = 'Missatge';
$TEXT['SUBJECT'] = 'Assumpte';
$TEXT['MATCH'] = 'Coincidir';
$TEXT['ALL_WORDS'] = 'Totes les Paraules';
$TEXT['ANY_WORDS'] = 'Qualsevol Paraula';
$TEXT['EXACT_MATCH'] = 'Coincid�ncia Exacta';
$TEXT['SHOW'] = 'Mostra';
$TEXT['HIDE'] = 'Amaga';
$TEXT['START_PUBLISHING'] = 'Inici de Publicaci�';
$TEXT['FINISH_PUBLISHING'] = 'Fi de Publicaci�';
$TEXT['DATE'] = 'Data';
$TEXT['START'] = 'Inici';
$TEXT['END'] = 'Fi';
$TEXT['IMAGE'] = 'Imatge';
$TEXT['ICON'] = 'Icona';
$TEXT['SECTION'] = 'Secci�';
$TEXT['DATE_FORMAT'] = 'Format de Data';
$TEXT['TIME_FORMAT'] = 'Format de Temps';
$TEXT['RESULTS'] = 'Resultats';
$TEXT['RESIZE'] = 'Redimensiona';
$TEXT['MANAGE'] = 'Administreu';
$TEXT['CODE'] = 'Codi';
$TEXT['WIDTH'] = 'Amplada';
$TEXT['HEIGHT'] = 'Al�ada';
$TEXT['MORE'] = 'M�s';
$TEXT['READ_MORE'] = 'Llegir M�s';
$TEXT['CHANGE_SETTINGS'] = 'Canvia Par�metres';
$TEXT['CURRENT_PAGE'] = 'P�gina Actual';
$TEXT['CLOSE'] = 'Tanca';
$TEXT['INTRO_PAGE'] = 'P�gina d\'Entrada';
$TEXT['INSTALLATION_URL'] = 'URL d\'Instal�laci�';
$TEXT['INSTALLATION_PATH'] = 'Ruta d\'Instal�laci�';
$TEXT['PAGE_EXTENSION'] = 'Extensi� de P�gina';
$TEXT['NO_RESULTS'] = 'Cap Resultat';
$TEXT['WEBSITE_TITLE'] = 'T�tol del Lloc Web';
$TEXT['WEBSITE_DESCRIPTION'] = 'Descripci� del Lloc Web';
$TEXT['WEBSITE_KEYWORDS'] = 'Paraules clau del Lloc Web';
$TEXT['WEBSITE_HEADER'] = 'Cap�alera del Lloc Web';
$TEXT['WEBSITE_FOOTER'] = 'Peu del Lloc Web';
$TEXT['RESULTS_HEADER'] = 'Cap�alera de Resultats';
$TEXT['RESULTS_LOOP'] = 'Bucle de Resultats';
$TEXT['RESULTS_FOOTER'] = 'Peu de Resultats';
$TEXT['LEVEL'] = 'Nivell';
$TEXT['NOT_FOUND'] = 'No Trobat';
$TEXT['PAGE_SPACER'] = 'Separador de P�gina';
$TEXT['MATCHING'] = 'Matching'; //needs to be translated
$TEXT['TEMPLATE_PERMISSIONS'] = 'Permisos de Plantilla';
$TEXT['PAGES_DIRECTORY'] = 'Directori de P�gines';
$TEXT['MEDIA_DIRECTORY'] = 'Directori de Fitxers';
$TEXT['FILE_MODE'] = 'Mode Fitxer';
$TEXT['USER'] = 'Usuari';
$TEXT['OTHERS'] = 'Altres';
$TEXT['READ'] = 'Lectura';
$TEXT['WRITE'] = 'Escriptura';
$TEXT['EXECUTE'] = 'Execuci�';
$TEXT['SMART_LOGIN'] = 'Identificaci� R�pida';
$TEXT['REMEMBER_ME'] = 'Recorda les meues dades';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Permisos del Sistema de Fitxers';
$TEXT['DIRECTORIES'] = 'Directoris';
$TEXT['DIRECTORY_MODE'] = 'Mode Directori';
$TEXT['LIST_OPTIONS'] = 'Llista Opcions';
$TEXT['OPTION'] = 'Opci�';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Permetre Diverses Seleccions';
$TEXT['TEXTFIELD'] = 'Camp de text';
$TEXT['TEXTAREA'] = '�rea de text';
$TEXT['SELECT_BOX'] = 'Quadre de Selecci�';
$TEXT['CHECKBOX_GROUP'] = 'Grup de quadres de verificaci�';
$TEXT['RADIO_BUTTON_GROUP'] = 'Grup de Botons';
$TEXT['SIZE'] = 'Mida';
$TEXT['DEFAULT_TEXT'] = 'Text per defecte';
$TEXT['SEPERATOR'] = 'Separador';
$TEXT['BACK'] = 'Arrere';
$TEXT['UNDER_CONSTRUCTION'] = 'En Construcci�';
$TEXT['MULTISELECT'] = 'Multi-selecci�';
$TEXT['SHORT_TEXT'] = 'Text Curt';
$TEXT['LONG_TEXT'] = 'Text Llarg';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Redirecci� de P�gina Inicial';
$TEXT['HEADING'] = 'Encap�alament';
$TEXT['MULTIPLE_MENUS'] = 'Diversos Men�s';
$TEXT['REGISTERED'] = 'Registrat';
$TEXT['START'] = 'Inici';
$TEXT['SECTION_BLOCKS'] = 'Blocs de la Secci�';
$TEXT['REGISTERED_VIEWERS'] = 'Visualitzadors Registrats';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers'; //needs to be translated
$TEXT['SUBMISSION_ID'] = 'ID de Tramesa';
$TEXT['SUBMISSIONS'] = 'Trameses';
$TEXT['SUBMITTED'] = 'Tram�s';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Trameses M�x. Per Hora';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Trameses Emmagatzemades a la Base de Dades';
$TEXT['EMAIL_ADDRESS'] = 'Adre�a de Correu';
$TEXT['CUSTOM'] = 'Personalitzat';
$TEXT['ANONYMOUS'] = 'An�nim';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Sistema Operatiu del Servidor';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Permisos d\'escriptura de fitxer per a tothom';
$TEXT['LINUX_UNIX_BASED'] = 'Basat en Linux/Unix';
$TEXT['WINDOWS'] = 'Windows'; //needs to be translated
$TEXT['HOME_FOLDER'] = 'Carpeta de l\'usuari';
$TEXT['HOME_FOLDERS'] = 'Carpetes dels usuaris';
$TEXT['PAGE_TRASH'] = 'Paperera';
$TEXT['INLINE'] = 'Inserida';
$TEXT['SEPARATE'] = 'Separada';
$TEXT['DELETED'] = 'Esborrat';
$TEXT['VIEW_DELETED_PAGES'] = 'Mostra P�gines Esborrades';
$TEXT['EMPTY_TRASH'] = 'Buida la Paperera';
$TEXT['TRASH_EMPTIED'] = 'Paperera Buidada';
$TEXT['ADD_SECTION'] = 'Afegeix Secci�';
$TEXT['POST_HEADER'] = 'Post Header'; //needs to be translated
$TEXT['POST_FOOTER'] = 'Post Footer'; //needs to be translated
$TEXT['POSTS_PER_PAGE'] = 'Posts Per Page'; //needs to be translated
$TEXT['RESIZE_IMAGE_TO'] = 'Redimensiona Imatge A';
$TEXT['UNLIMITED'] = 'Il�limitat';
$TEXT['OF'] = 'De';
$TEXT['OUT_OF'] = 'Fora De';
$TEXT['NEXT'] = 'Seg�ent';
$TEXT['PREVIOUS'] = 'Anterior';
$TEXT['NEXT_PAGE'] = 'P�gina Seg�ent';
$TEXT['PREVIOUS_PAGE'] = 'P�gina Anterior';
$TEXT['ON'] = 'A';
$TEXT['LAST_UPDATED_BY'] = '�ltima Actualitzaci� Per';
$TEXT['RESULTS_FOR'] = 'Resultats De';
$TEXT['TIME'] = 'Temps';
$TEXT['WYSIWYG_STYLE'] = 'Estil WYSIWYG';
$TEXT['WYSIWYG_EDITOR'] = "WYSIWYG Editor"; //needs to be translated
$TEXT['SERVER_EMAIL'] = 'Correu del Servidor';
$TEXT['MENU'] = 'Men�';
$TEXT['MANAGE_GROUPS'] = 'Administra els Grups';
$TEXT['MANAGE_USERS'] = 'Administra els Usuaris';
$TEXT['PAGE_LANGUAGES'] = 'Idiomes de la p�gina';
$TEXT['HIDDEN'] = 'Amagat';
$TEXT['MAIN'] = 'Principal';
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
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Ho sentim, no teniu permisos per a veure aquesta p�gina';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display'; //needs to be translated

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'No teniu privilegis suficients per estar ac�';

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Per favor introdu�u el vostre nom d\'usuari i contrasenya a baix';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'Per favor introdu�u un nom d\'usuari';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'Per favor introdu�u una contrasenya';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'El nom d\'usuari �s massa curt';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'La contrasenya �s massa curta';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'El nom d\'usuari �s massa llarg';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'La contrasenya �s massa llarga';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Nom d\'usuari o contrasenya incorrectes';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'Heu d\'Introduir una adre�a de correu';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'Per favor introdu�u la vostra adre�a de correu a baix';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'El correu que heu introdu�t no s\'ha trobat a la base de dades';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'No ha estat possible enviar la contrasenya, per favor contacteu amb l\'administrador del sistema';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'El nom d\'usuari i contrasenya han estat enviats a la vostra adre�a de correu';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'La contrasenya no es pot reiniciar m�s d\'un cop per hora, disculpeu';

$MESSAGE['START']['WELCOME_MESSAGE'] = 'Benvingut/da al Panell de Control de Website Baker';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Atenci�, el Directori d\'Instal�laci� Encara Existeix!';
$MESSAGE['START']['CURRENT_USER'] = 'Actualment esteu identificat com a:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'No ha estat possible obrir el fitxer de configuraci�';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'No es pot escriure al fitxer de configuraci�';
$MESSAGE['SETTINGS']['SAVED'] = 'Par�metres desats amb �xit';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Av�s: Pr�mer aquest bot� reinicia tots els canvis no desats';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Av�s: a�� nom�s �s recomana per a entorns de proves';

$MESSAGE['USERS']['ADDED'] = 'Usuari afegit amb �xit';
$MESSAGE['USERS']['SAVED'] = 'Usuari desat amb �xit';
$MESSAGE['USERS']['DELETED'] = 'Usuari esborrat amb �xit';
$MESSAGE['USERS']['NO_GROUP'] = 'No s\'ha seleccionat cap grup';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'El nom d\'usuari introdu�t �s massa curt';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'La contrasenya introdu�da �s massa curta';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'La contrasenya introdu�da no coincideix';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'L\'adre�a de correu introdu�da �s inv�lida';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'L\'adre�a de correu que heu introdu�t ja est� en �s';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'El nom d\'usuari introdu�t ja est� en �s';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Av�s: Nom�s haur�eu d\'introduir valors als camps superiors si voleu canviar aquestes contrasenyes d\'usuari';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Esteu segur de voler esborrar l\'usuari seleccionat?';

$MESSAGE['GROUPS']['ADDED'] = 'Grup afegit amb �xit';
$MESSAGE['GROUPS']['SAVED'] = 'Grup desat amb �xit';
$MESSAGE['GROUPS']['DELETED'] = 'Grup esborrat amb �xit';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = 'El nom del grup �s buit';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Esteu segur de voler esborrar el grup seleccionat (i qualsevol usuari que pertanyi a aquest)?';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'No s\'han trobat grups';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Group name already exists';

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Dades desades amb �xit';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'Correu actualitzat amb �xit';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'La contrasenya (actual) que heu introdu�t �s incorrecta';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'Contrasenya canviada amb �xit';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Av�s: per a canviar la plantilla heu d\'anar a la secci� Par�metres';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'No es pot incloure ../ al nom de la carpeta';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Directory does not exist';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'No es pot tenir ../ a la carpeta de dest�';
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'No es pot incloure ../ al nom';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'No es pot usar index.php com a nom';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'No s\'han trobat fitxers a la carpeta actual';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'Fitxer no trobat';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'Fitxer esborrat amb �xit';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Carpeta esborrada amb �xit';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Esteu segur que voleu esborrar el seg�ent fitxer o carpeta?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'No es pot esborrar el fitxer seleccionat';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'No es pot esborrar la carpeta seleccionada';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'No heu introdu�t un nou nom';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'No heu introdu�t una extensi� de fitxer';
$MESSAGE['MEDIA']['RENAMED'] = 'S\'ha canviat el nom amb �xit';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'No s\'ha pogut canviar el nom';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Ja existeix un fitxer amb el nom que heu introdu�t';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Ja existeix una carpeta amb el nom que heu introdu�t';
$MESSAGE['MEDIA']['DIR_MADE'] = 'Carpeta creada amb �xit';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'No s\'ha pogut crear la carpeta';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' fitxer s\'ha penjat amb �xit';
$MESSAGE['MEDIA']['UPLOADED'] = ' fitxers han estat penjats amb �xit';

$MESSAGE['PAGES']['ADDED'] = 'P�gina afegida amb �xit';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Cap�alera de p�gina afegida amb �xit';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Existeix una p�gina amb el mateix t�tol o similar';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Error creant el fitxer d\'acc�s al directori /pages (privilegis insuficients)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Error esborrant el fitxer d\'acc�s al directori /pages (privilegis insuficients)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'No s\'ha trobat la p�gina';
$MESSAGE['PAGES']['SAVED'] = 'P�gina desada amb �xit';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Par�metres de p�gina desats amb �xit';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Error desant la p�gina';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Esteu segur de voler esborrar la p�gina seleccionada';
$MESSAGE['PAGES']['DELETED'] = 'P�gina esborrada amb �xit';
$MESSAGE['PAGES']['RESTORED'] = 'P�gina restaurada amb �xit';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'Per favor introdu�u un t�tol de p�gina';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'Per favor introdu�u un t�tol per al men�';
$MESSAGE['PAGES']['REORDERED'] = 'P�gina re-ordenada amb �xit';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Error re-ordenant p�gina';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'No teniu permisos per a modificar aquesta p�gina';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'No s\'ha pogut escriure al fitxer /pages/intro.php (privilegis insuficients)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'P�gina d\'entrada desada amb �xit';
$MESSAGE['PAGES']['LAST_MODIFIED'] = '�ltima modificaci� per';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Premeu AC� per a modificar la p�gina d\'entrada';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Propietats de la secci� desades amb �xit';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Torna a les p�gines';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'Per favor torneu arrere i completeu tots els camps';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'Per favor recordeu que el fitxer que pengeu ha d\'estar en un dels seg�ents formats:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'Per favor recordeu que els fitxers que pengeu han d\'estar en un dels seg�ents formats:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'No s\'ha pogut penjar el fitxer';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'Ja est� instal�lat';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'No est� instal�lat';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'No s\'ha pogut desinstal�lar';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'No s\'ha pogut descomprimir el fitxer';
$MESSAGE['GENERIC']['INSTALLED'] = 'Instal�lat amb �xit';
$MESSAGE['GENERIC']['UPGRADED'] = 'Upgraded successfully'; //needs to be translated
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Desinstal�lat amb �xit';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'No s\'ha pogut escriure al directori de dest�';
$MESSAGE['GENERIC']['INVALID'] = 'El fitxer que heu penjat no �s v�lid';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'No s\'ha pogut desinstal�lar: s\'est� usant el fitxer seleccionat';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONSTRUCTION'] = 'Lloc Web en Construcci�';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'Per favor torneu-ho a intentar prompte...';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Please be patient, this might take a while.'; //needs to be translated
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Error opening file.'; //needs to be translated

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'Heu d\'introduir les dades per als seg�ents camps';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Ho sentim, aquest formulari ha estat enviat massa vegades durant l\'�ltima hora. Per favor torneu-ho a intentar d\'ac� una hora.';
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: '.SERVER_EMAIL; //needs to be translated

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'Please selected which add-ons you would like to have reloaded'; //needs to be translated
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'Modules reloaded successfully'; //needs to be translated
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Templates reloaded successfully'; //needs to be translated
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Languages reloaded successfully'; //needs to be translated

?>