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
$language_code = 'TR';
$language_name = 'Turkish';
$language_version = '2.7';
$language_platform = '2.7.x';
$language_author = 'Atakan KO�';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Ba�lat';
$MENU['PAGES'] = 'Sayfalar';
$MENU['MEDIA'] = 'Resimler';
$MENU['ADDONS'] = 'Eklentiler';
$MENU['MODULES'] = 'Mod�ller';
$MENU['TEMPLATES'] = 'Kal�plar';
$MENU['LANGUAGES'] = 'Diller';
$MENU['PREFERENCES'] = 'Tercihler';
$MENU['SETTINGS'] = 'Ayarlar';
$MENU['ADMINTOOLS'] = 'Admin-Tools'; //needs to be translated
$MENU['ACCESS'] = 'Giri�';
$MENU['USERS'] = 'Kullan�c�lar';
$MENU['GROUPS'] = 'Gruplar';
$MENU['HELP'] = 'Yard�m';
$MENU['VIEW'] = 'G�r�nt�le';
$MENU['LOGOUT'] = '��k��';
$MENU['LOGIN'] = 'Giri�';
$MENU['FORGOT'] = 'Giri� Bilgilerini Gerial';

// Section overviews
$OVERVIEW['START'] = 'Y�netici G�r�n�m�';
$OVERVIEW['PAGES'] = 'Website Sayfalar�n� Y�netme...';
$OVERVIEW['MEDIA'] = 'Resim Deposundaki Dosyalar� Y�netme...';
$OVERVIEW['MODULES'] = 'Website Baker Mod�llerini Y�netme...';
$OVERVIEW['TEMPLATES'] = 'Websitenizdeki Kal�plar� De�i�tirme Ve D�zenleme...';
$OVERVIEW['LANGUAGES'] = 'Website Baker Dilleri D�zenleme...';
$OVERVIEW['PREFERENCES'] = 'Email, �ifre gibi ayarlar� d�zenleme... ';
$OVERVIEW['SETTINGS'] = 'Website Baker i�in ayarlar� d�zenleme...';
$OVERVIEW['USERS'] = 'Website Baker kullan�c�lar�n� d�zenleme...';
$OVERVIEW['GROUPS'] = 'Kullan�c� Gruplar�n�n �zinlerini D�zenleme...';
$OVERVIEW['HELP'] = 'Sorular�n�z? Cevaplar�...';
$OVERVIEW['VIEW'] = 'Yeni bir pencerede sitenizin �ng�r�n�m�...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'De�i�tir/Sil Sayfa';
$HEADING['DELETED_PAGES'] = 'Sayfay� Sil';
$HEADING['ADD_PAGE'] = 'Sayfa Ekle';
$HEADING['ADD_HEADING'] = 'Ba�l�k Ekle';
$HEADING['MODIFY_PAGE'] = 'Sayfay� De�i�tir';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Sayfa Ayarlar�n� De�i�tir';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Geli�tirilmi� Sayfa Ayarlar�n� De�i�tir';
$HEADING['MANAGE_SECTIONS'] = 'K�s�mlar� Y�net';
$HEADING['MODIFY_INTRO_PAGE'] = 'Ba�lang�� Sayfas�n� D�zenle';

$HEADING['BROWSE_MEDIA'] = 'Resimleri Y�netme';
$HEADING['CREATE_FOLDER'] = 'Dizin Yarat';
$HEADING['UPLOAD_FILES'] = 'Dosya Y�kle';

$HEADING['INSTALL_MODULE'] = 'Mod�l Y�kle';
$HEADING['UNINSTALL_MODULE'] = 'Mod�l Kald�r';
$HEADING['MODULE_DETAILS'] = 'Mod�l A��klamas�';

$HEADING['INSTALL_TEMPLATE'] = 'Kal�p Y�kle';
$HEADING['UNINSTALL_TEMPLATE'] = 'Kal�p Kald�r';
$HEADING['TEMPLATE_DETAILS'] = 'Kal�p A��klamas�';

$HEADING['INSTALL_LANGUAGE'] = 'Dil Y�kle';
$HEADING['UNINSTALL_LANGUAGE'] = 'Dil Kald�r';
$HEADING['LANGUAGE_DETAILS'] = 'Dil A��klamas�';

$HEADING['MY_SETTINGS'] = 'Ayarlar�m';
$HEADING['MY_EMAIL'] = 'Emailim';
$HEADING['MY_PASSWORD'] = '�ifrem';

$HEADING['GENERAL_SETTINGS'] = 'Genel Ayarlar';
$HEADING['DEFAULT_SETTINGS'] = 'Varsay�lan Ayarlar';
$HEADING['SEARCH_SETTINGS'] = 'Arama Ayarlar�';
$HEADING['FILESYSTEM_SETTINGS'] = 'Dosya Sistemi Ayarlar�';
$HEADING['SERVER_SETTINGS'] = 'Server Ayarlar�';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings'; //needs to be translated
$HEADING['ADMINISTRATION_TOOLS'] = 'Administration Ara�lar�';

$HEADING['MODIFY_DELETE_USER'] = 'De�i�tir/Sil kullan�c�';
$HEADING['ADD_USER'] = 'Kullan�c� Ekle';
$HEADING['MODIFY_USER'] = 'Kullan�c� D�zenle';

$HEADING['MODIFY_DELETE_GROUP'] = 'De�i�tir/Sil Grup';
$HEADING['ADD_GROUP'] = 'Grup Ekle';
$HEADING['MODIFY_GROUP'] = 'Grup D�zenle';

// Other text
$TEXT['ADD'] = 'Ekle';
$TEXT['MODIFY'] = 'D�zenle';
$TEXT['SETTINGS'] = 'Ayarlar';
$TEXT['DELETE'] = 'Sil';
$TEXT['SAVE'] = 'Kay�t et';
$TEXT['RESET'] = 'S�f�rla';
$TEXT['LOGIN'] = 'Giri�';
$TEXT['RELOAD'] = 'Tekrarla';
$TEXT['CANCEL'] = '�ptal';
$TEXT['NAME'] = '�sim';
$TEXT['PLEASE_SELECT'] = 'L�tfen Se�in';
$TEXT['TITLE'] = 'Ba�l�k';
$TEXT['PARENT'] = 'Ana Grup';
$TEXT['TYPE'] = 'Tip';
$TEXT['VISIBILITY'] = 'G�r�n�rl�k';
$TEXT['PRIVATE'] = '�zel';
$TEXT['PUBLIC'] = 'Herkez';
$TEXT['NONE'] = 'Yok';
$TEXT['NONE_FOUND'] = 'Hi�biri bulmad�';
$TEXT['CURRENT'] = 'Kullan�lan';
$TEXT['CHANGE'] = 'De�i�tir';
$TEXT['WINDOW'] = 'Pencere';
$TEXT['DESCRIPTION'] = 'A��klama';
$TEXT['KEYWORDS'] = 'Keywords'; //needs to be translated
$TEXT['ADMINISTRATORS'] = 'Y�nerici';
$TEXT['PRIVATE_VIEWERS'] = '�zel izleyiciler';
$TEXT['EXPAND'] = 'Geni�let';
$TEXT['COLLAPSE'] = 'Daralt';
$TEXT['MOVE_UP'] = 'Yukar� Ta��';
$TEXT['MOVE_DOWN'] = 'A�a�� Ta��';
$TEXT['RENAME'] = 'Yeni isim ver';
$TEXT['MODIFY_SETTINGS'] = 'Ayarlar� De�i�tir';
$TEXT['MODIFY_CONTENT'] = 'D�zeni De�i�tir';
$TEXT['VIEW'] = 'G�r�n��';
$TEXT['UP'] = 'Yukar�';
$TEXT['FORGOTTEN_DETAILS'] = 'Sizin Ayr�nt�l� Detaylar�n�z?';
$TEXT['NEED_TO_LOGIN'] = 'Need to log-in?'; //needs to be translated
$TEXT['SEND_DETAILS'] = 'Detaylar� G�nder';
$TEXT['USERNAME'] = 'Kullan�c� Ad�';
$TEXT['PASSWORD'] = '�ifre';
$TEXT['HOME'] = 'Ana Sayfa';
$TEXT['TARGET_FOLDER'] = 'Hedef Dizin';
$TEXT['OVERWRITE_EXISTING'] = '�st�ne Yaz';
$TEXT['FILE'] = 'Dosya';
$TEXT['FILES'] = 'Dosyalar';
$TEXT['FOLDER'] = 'Dizin';
$TEXT['FOLDERS'] = 'Dizinler';
$TEXT['CREATE_FOLDER'] = 'Dizin Yarat';
$TEXT['UPLOAD_FILES'] = 'Dosya Y�kle';
$TEXT['CURRENT_FOLDER'] = 'Kullan�lan Dizin';
$TEXT['TO'] = 'To'; //needs to be translated
$TEXT['FROM'] = 'From'; //needs to be translated
$TEXT['INSTALL'] = 'Y�kle';
$TEXT['UNINSTALL'] = 'Kald�r';
$TEXT['VIEW_DETAILS'] = 'Detaylar';
$TEXT['DISPLAY_NAME'] = 'G�r�n�m Ad�';
$TEXT['AUTHOR'] = 'Yazar';
$TEXT['VERSION'] = 'Versiyon';
$TEXT['DESIGNED_FOR'] = 'D�zenleyen';
$TEXT['DESCRIPTION'] = 'A��klama';
$TEXT['EMAIL'] = 'Email'; //needs to be translated
$TEXT['LANGUAGE'] = 'Dil';
$TEXT['TIMEZONE'] = 'Zaman Dilimi';
$TEXT['CURRENT_PASSWORD'] = 'Kullan�lan �ifre';
$TEXT['NEW_PASSWORD'] = 'Yeni �ifre';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Tekrarla Yeni �ifre';
$TEXT['ACTIVE'] = 'Aktif';
$TEXT['DISABLED'] = '�ptal';
$TEXT['ENABLED'] = '�zin Ver';
$TEXT['RETYPE_PASSWORD'] = '�ifreyi Tekrarla';
$TEXT['GROUP'] = 'Grup';
$TEXT['SYSTEM_PERMISSIONS'] = 'Sistem �zinleri';
$TEXT['MODULE_PERMISSIONS'] = 'Mod�l �zinleri';
$TEXT['SHOW_ADVANCED'] = '�leri Se�enekleri G�ster';
$TEXT['HIDE_ADVANCED'] = '�leri Se�enekleri Gizle';
$TEXT['BASIC'] = 'Ba�lang��';
$TEXT['ADVANCED'] = '�leri';
$TEXT['WEBSITE'] = 'Website'; //needs to be translated
$TEXT['DEFAULT'] = 'Varsay�lan';
$TEXT['KEYWORDS'] = 'Keywords'; //needs to be translated
$TEXT['TEXT'] = 'Yaz�';
$TEXT['HEADER'] = '�st K�s�m';
$TEXT['FOOTER'] = 'Alt K�s�m';
$TEXT['TEMPLATE'] = 'Kal�p';
$TEXT['INSTALLATION'] = 'Y�kle';
$TEXT['DATABASE'] = 'Database'; //needs to be translated
$TEXT['HOST'] = 'Host'; //needs to be translated
$TEXT['INTRO'] = 'Demo';
$TEXT['PAGE'] = 'Sayfa';
$TEXT['SIGNUP'] = 'Kay�t Ol';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Hata Rapor D�zeyi';
$TEXT['ADMIN'] = 'Admin'; //needs to be translated
$TEXT['PATH'] = 'Yol';
$TEXT['URL'] = 'URL'; //needs to be translated
$TEXT['FRONTEND'] = 'Son Kullan�c�';
$TEXT['EXTENSION'] = 'Uzatma';
$TEXT['TABLE_PREFIX'] = 'Table D�zen Ad�';
$TEXT['CHANGES'] = 'De�i�iklikler';
$TEXT['ADMINISTRATION'] = 'Y�netici';
$TEXT['FORGOT_DETAILS'] = 'Detay Hat�rlat?';
$TEXT['LOGGED_IN'] = 'Giri� Kaydet';
$TEXT['WELCOME_BACK'] = 'Ho�geldiniz';
$TEXT['FULL_NAME'] = 'Tam Ad�n�z';
$TEXT['ACCOUNT_SIGNUP'] = 'Kull�c� Kay�t Ol';
$TEXT['LINK'] = 'Link'; //needs to be translated
$TEXT['ANCHOR'] = 'Anchor'; //needs to be translated
$TEXT['TARGET'] = 'Hedef';
$TEXT['NEW_WINDOW'] = 'Yeni Pencere';
$TEXT['SAME_WINDOW'] = 'Ayn� Pencere';
$TEXT['TOP_FRAME'] = 'Top Frame'; //needs to be translated
$TEXT['PAGE_LEVEL_LIMIT'] = 'Sayfa Alt Limiti';
$TEXT['SUCCESS'] = '��lem Ba�ar�ld�';
$TEXT['ERROR'] = 'Hata';
$TEXT['ARE_YOU_SURE'] = 'eminmisin?';
$TEXT['YES'] = 'Evet';
$TEXT['NO'] = 'Hay�r';
$TEXT['SYSTEM_DEFAULT'] = 'Sistem Varsay�lan�';
$TEXT['PAGE_TITLE'] = 'Sayfa Ba�l���';
$TEXT['MENU_TITLE'] = 'Menu Ba�l���';
$TEXT['ACTIONS'] = 'Hareketler';
$TEXT['UNKNOWN'] = 'Bilinmeyen';
$TEXT['BLOCK'] = 'Blok';
$TEXT['SEARCH'] = 'Ara';
$TEXT['SEARCHING'] = 'Arama';
$TEXT['POST'] = 'Mesaj';
$TEXT['COMMENT'] = 'Yorum';
$TEXT['COMMENTS'] = 'Yorumlar';
$TEXT['COMMENTING'] = 'Yorum yapan';
$TEXT['SHORT'] = 'K�sa';
$TEXT['LONG'] = 'Uzun';
$TEXT['LOOP'] = 'S�rekli';
$TEXT['FIELD'] = 'Alan';
$TEXT['REQUIRED'] = 'Gerekli';
$TEXT['LENGTH'] = 'Uzunluk';
$TEXT['MESSAGE'] = 'Mesaj';
$TEXT['SUBJECT'] = 'Konu';
$TEXT['MATCH'] = 'Bul';
$TEXT['ALL_WORDS'] = 'B�t�n Kelimeler';
$TEXT['ANY_WORDS'] = 'Herhangi bir s�zc�k';
$TEXT['EXACT_MATCH'] = 'Tam Bul';
$TEXT['SHOW'] = 'G�ster';
$TEXT['HIDE'] = 'Gizle';
$TEXT['START_PUBLISHING'] = 'Yay�na Ba�la';
$TEXT['FINISH_PUBLISHING'] = 'Yay�n� Bitir';
$TEXT['DATE'] = 'Tarih';
$TEXT['START'] = 'Ba�la';
$TEXT['END'] = 'Son';
$TEXT['IMAGE'] = 'Resim';
$TEXT['ICON'] = 'Ikon';
$TEXT['SECTION'] = 'K�s�m';
$TEXT['DATE_FORMAT'] = 'Tarih Format�';
$TEXT['TIME_FORMAT'] = 'Saat Format�';
$TEXT['RESULTS'] = 'Sonu�lar';
$TEXT['RESIZE'] = 'Tekrar Boyutland�r';
$TEXT['MANAGE'] = 'Y�net';
$TEXT['CODE'] = 'Kod';
$TEXT['WIDTH'] = 'Geni�lik';
$TEXT['HEIGHT'] = 'Y�kseklik';
$TEXT['MORE'] = 'Daha �ok';
$TEXT['READ_MORE'] = 'Oku';
$TEXT['CHANGE_SETTINGS'] = 'Ayarlar� De�i�tir';
$TEXT['CURRENT_PAGE'] = 'Kullan�lan Sayfa';
$TEXT['CLOSE'] = 'Kapat';
$TEXT['INTRO_PAGE'] = 'Demo Sayfas�';
$TEXT['INSTALLATION_URL'] = 'Y�keleme URL';
$TEXT['INSTALLATION_PATH'] = 'Y�kleme Yolu';
$TEXT['PAGE_EXTENSION'] = 'Sayfa Uzant�s�';
$TEXT['NO_RESULTS'] = 'Bulunamad�';
$TEXT['WEBSITE_TITLE'] = 'Website Ba�l���';
$TEXT['WEBSITE_DESCRIPTION'] = 'Website A��klamas�';
$TEXT['WEBSITE_KEYWORDS'] = 'Website Keywords'; //needs to be translated
$TEXT['WEBSITE_HEADER'] = 'Website �st K�s�m';
$TEXT['WEBSITE_FOOTER'] = 'Website Alt K�s�m';
$TEXT['RESULTS_HEADER'] = 'Bulundu�unda �st K�s�m';
$TEXT['RESULTS_LOOP'] = 'Bulundu�unda D�ng�';
$TEXT['RESULTS_FOOTER'] = 'Bulundu�unda Alt K�s�m';
$TEXT['LEVEL'] = 'Limit';
$TEXT['NOT_FOUND'] = 'Bulunamad�';
$TEXT['PAGE_SPACER'] = 'Sayfa Bo�lu�u';
$TEXT['MATCHING'] = 'Bulunanlar';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Kal�p �zinleri';
$TEXT['PAGES_DIRECTORY'] = 'Sayfa Dizini';
$TEXT['MEDIA_DIRECTORY'] = 'Resim Dizini';
$TEXT['FILE_MODE'] = 'Dosya �zini';
$TEXT['USER'] = 'Kullan�c�';
$TEXT['OTHERS'] = 'Di�erleri';
$TEXT['READ'] = 'Oku';
$TEXT['WRITE'] = 'Yaz';
$TEXT['EXECUTE'] = '�al��t�r';
$TEXT['SMART_LOGIN'] = 'G�venli Giri�';
$TEXT['REMEMBER_ME'] = 'Haz�rla';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Dosya Sistemi �zinleri';
$TEXT['DIRECTORIES'] = 'Dizinler';
$TEXT['DIRECTORY_MODE'] = 'Dizin Modu';
$TEXT['LIST_OPTIONS'] = 'Liste se�enekleri';
$TEXT['OPTION'] = 'Se�enekler';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = '�oklu se�imlere izin ver';
$TEXT['TEXTFIELD'] = 'Textfield'; //needs to be translated
$TEXT['TEXTAREA'] = 'Textarea'; //needs to be translated
$TEXT['SELECT_BOX'] = 'Se�meli Men�';
$TEXT['CHECKBOX_GROUP'] = 'T�klamal� Se�im';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radyo D��meleri';
$TEXT['SIZE'] = 'Boyut';
$TEXT['DEFAULT_TEXT'] = 'Varsay�lan Yaz�';
$TEXT['SEPERATOR'] = 'B�l�c�';
$TEXT['BACK'] = 'Geri';
$TEXT['UNDER_CONSTRUCTION'] = 'Yap�m A�amas�nda';
$TEXT['MULTISELECT'] = '�oklu Se�im';
$TEXT['SHORT_TEXT'] = 'K�sa Yaz�';
$TEXT['LONG_TEXT'] = 'Uzun Yaz�';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Ana sayfa y�nlendir';
$TEXT['HEADING'] = 'Ba�l�k';
$TEXT['MULTIPLE_MENUS'] = '�oklu men�ler';
$TEXT['REGISTERED'] = 'Kay�tl� Kullan�c�';
$TEXT['START'] = 'Ba�lat';
$TEXT['SECTION_BLOCKS'] = 'K�s�m bloklar�';
$TEXT['REGISTERED_VIEWERS'] = '�zleyiciler kaydetti';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers'; //needs to be translated
$TEXT['SUBMISSION_ID'] = 'Sunu�lar ID';
$TEXT['SUBMISSIONS'] = 'Sunu�lar';
$TEXT['SUBMITTED'] = 'G�nderildi';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Maksimum Saat Ba�� Sunum';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Sunu�lar, veritaban�nda depolad�';
$TEXT['EMAIL_ADDRESS'] = 'Email Adresi';
$TEXT['CUSTOM'] = 'Custom'; //needs to be translated
$TEXT['ANONYMOUS'] = 'Bilinmeyen';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Server ��letim Sistemi';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Yaz�labilir dosya izinleri';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix tabanl�';
$TEXT['WINDOWS'] = 'Windows'; //needs to be translated
$TEXT['HOME_FOLDER'] = 'Ana Dizin';
$TEXT['HOME_FOLDERS'] = 'Ana Dizinler';
$TEXT['PAGE_TRASH'] = 'Sayfay� Sil';
$TEXT['INLINE'] = 'In-line'; //needs to be translated
$TEXT['SEPARATE'] = 'Ay�r�c�';
$TEXT['DELETED'] = 'Silindi';
$TEXT['VIEW_DELETED_PAGES'] = 'Silinen Sayfay� G�ster';
$TEXT['EMPTY_TRASH'] = '��p kutusu bo�';
$TEXT['TRASH_EMPTIED'] = '��p kutusu bo�alt�ld�';
$TEXT['ADD_SECTION'] = 'K�s�m Ekle';
$TEXT['POST_HEADER'] = '�st Mesaj�';
$TEXT['POST_FOOTER'] = 'Alt Mesaj';
$TEXT['POSTS_PER_PAGE'] = 'Sayfa ba��na mesajlar';
$TEXT['RESIZE_IMAGE_TO'] = 'Boyutland�r resimi';
$TEXT['UNLIMITED'] = 'S�n�rs�z';
$TEXT['OF'] = 'Of'; //needs to be translated
$TEXT['OUT_OF'] = 'D��ar�';
$TEXT['NEXT'] = 'Sonraki';
$TEXT['PREVIOUS'] = '�nceki';
$TEXT['NEXT_PAGE'] = 'Sonraki Sayfa';
$TEXT['PREVIOUS_PAGE'] = '�nceki Sayfa';
$TEXT['ON'] = 'On'; //needs to be translated
$TEXT['LAST_UPDATED_BY'] = 'Son G�ncelleyen';
$TEXT['RESULTS_FOR'] = 'Sonu�lar';
$TEXT['TIME'] = 'Saat';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style'; //needs to be translated
$TEXT['WYSIWYG_EDITOR'] = "WYSIWYG Editor"; //needs to be translated
$TEXT['SERVER_EMAIL'] = 'Server Email'; //needs to be translated
$TEXT['MENU'] = 'Menu'; //needs to be translated
$TEXT['MANAGE_GROUPS'] = 'Grup Y�netimi';
$TEXT['MANAGE_USERS'] = 'Kullan�c� Y�netimi';
$TEXT['PAGE_LANGUAGES'] = 'Sayfa Dili';
$TEXT['HIDDEN'] = 'Gizli';
$TEXT['MAIN'] = 'Ana';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Y�klenen dosyan�n ad�n� de�i�tir';
$TEXT['APP_NAME'] = 'Application Ad�';
$TEXT['SESSION_IDENTIFIER'] = 'Session Identifier'; //needs to be translated
$TEXT['BACKUP'] = 'Yedek Al';
$TEXT['RESTORE'] = 'Yede�i y�kle';
$TEXT['BACKUP_DATABASE'] = 'Database Yedekle';
$TEXT['RESTORE_DATABASE'] = 'Database Geri Y�kle';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup all tables in database'; //needs to be translated
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup only WB-specific tables'; //needs to be translated
$TEXT['BACKUP_MEDIA'] = 'Media Yedekle';
$TEXT['RESTORE_MEDIA'] = 'Media Geri Y�kle';
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
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = '�zg�n�m, bu sayfay� g�r�nt�lemeye yetkiniz yok';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display'; //needs to be translated

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Insufficient privelliges to be here'; //needs to be translated

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Kullan�c� ad� ve �ifre giriniz';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'L�tfen kullanc� ad� girin';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'L�tfen �ifre girin';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'Kullan�c� ad� �ok k�sa';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = '�ifreniz �ok k�sa';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'Kullan�c� ad�n�z �ok uzun';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = '�ifreniz �ok uzun';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Kullan�c� ad� ve �ifreniz yanl��';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'Bir email adresi girmelisiniz.';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'L�tfen email adresini girin';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'Bu email adresi veritaban�nda bulunamad�';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Uygunsuz email �ifresi, L�tfen Y�netici ile Kontak kurun';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'Sizin kullan�c� ad�n�z ve �ifreniz email adresinize g�nderildi';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Paralonuzu 1 saat aral�klarla de�i�tirebilirsiniz.';

$MESSAGE['START']['WELCOME_MESSAGE'] = 'Ho�geldiniz Website Baker Y�netimine';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Uyar�! Y�kleme dizini halen duruyor!';
$MESSAGE['START']['CURRENT_USER'] = 'Sizin kulland���n�z giri� ismi:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'Unable to open the configuration file'; //needs to be translated
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Cannot write to configuration file'; //needs to be translated
$MESSAGE['SETTINGS']['SAVED'] = 'Ayarlar ba�ar�l� bir �ekilde kay�t edildi';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Not Edin: Bu buton b�t�n de�i�iklikleri ilk haline geri getirir';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Please note: this is only recommended for testing environments'; //needs to be translated

$MESSAGE['USERS']['ADDED'] = 'Kullan�c�, ba�ar�l� bir �ekilde ekledi';
$MESSAGE['USERS']['SAVED'] = 'Kullan�c�, ba�ar�l� bir �ekilde kay�t edildi';
$MESSAGE['USERS']['DELETED'] = 'Kullan�c�, ba�ar�l� bir �ekilde silindi';
$MESSAGE['USERS']['NO_GROUP'] = 'Hi�bir grup se�ilmedi';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'Girdi�iniz kullan�c� ad� k�sa';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'Girdi�iniz �ifre k�sa';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'Girdi�iniz �ifre bulunamad�';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'Girdi�iniz email adresi ge�ersiz';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'Girdi�iniz email ba�kas� taraf�ndan kullan�l�yor';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'Girdi�iniz kullan�c� ad� ba�kas� taraf�ndan kullan�l�yor';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Not Edin: Sen sadece yukar�daki alanlara de�erleri gir. E�er bu kullan�c�lar� dile de�i�tirseydin.';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Se�ti�iniz kullan�c�lar� silmek istedi�inizden eminmisiniz?';

$MESSAGE['GROUPS']['ADDED'] = 'Grup, ba�ar�l� bir �ekilde ekledi';
$MESSAGE['GROUPS']['SAVED'] = 'Grup, ba�ar�l� bir �ekilde kay�t edildi';
$MESSAGE['GROUPS']['DELETED'] = 'Grup, ba�ar�l� bir �ekilde silindi';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = 'Grup ad� bo�';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Se�ti�iniz grubu silmek istedi�inizden eminmisiniz? (ve bu gruba ekli kullan�c�lar�)?';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'Hi�bir grup bulmad�';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Bu grup ad� zaten var';

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Ayr�nt�lar, ba�ar�l� bir �ekilde kay�t edildi';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'Email, ba�ar�l� bir �ekilde g�ncelle�tirdi';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'Girdi�iniz �ifre yanl��';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'Parola, ba�ar�l� bir �ekilde de�i�tirdi';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Please note: to change the template you must go to the Settings section'; //needs to be translated

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Giremezsiniz ../ i�indeki dizin ad�';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Directory does not exist'; //needs to be translated
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Cannot have ../ in the folder target'; //needs to be translated
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Giremezsiniz ../ ismine';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'index.php isimini kullanamazs�n�z';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'No media found in the current folder'; //needs to be translated
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'Dosya Bulunamad�';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'Dosya, ba�ar�l� bir �ekilde silindi';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Dizin, ba�ar�l� bir �ekilde silindi';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Dosya ve dizinleri silmek istedi�inizden eminmisiniz?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Se�ti�iniz dosya silinemiyor';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Se�ti�iniz dizin silinemiyor';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'Mutlaka bir isim girmelisiniz';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'Mutlaka bir uzant� girmelisinz';
$MESSAGE['MEDIA']['RENAMED'] = 'Yeni isim ver ba�ar�l�.';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Yeni isim ver ba�ar�s�z';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Girmi� oldu�unuz dosya zaten var';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Girmi� oldu�unuz dizin zaten var';
$MESSAGE['MEDIA']['DIR_MADE'] = 'Dizin, ba�ar�l� bir �ekilde yaratt�';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'Dizin yaratma ba�ar�s�z';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' Dosya ba�ar�l� bir �ekilde y�klendi';
$MESSAGE['MEDIA']['UPLOADED'] = ' Dosyalar ba�ar�l� bir �ekilde y�klendi';

$MESSAGE['PAGES']['ADDED'] = 'Sayfa, ba�ar�l� bir �ekilde ekledi';
$MESSAGE['PAGES']['ADDED_HEADING'] = '�st sayfa, ba�ar�l� bir �ekilde ekledi';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Bu sayfa veya dosya zaten var.';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Yarat�rken hatal� giri� /pages dizini i�in (Yetersiz yetki)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Silinirken hatal� giri� /pages dizini i�in (Yetersiz yetki)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Sayfa bulunamad�';
$MESSAGE['PAGES']['SAVED'] = 'Sayfa, ba�ar�l� bir �ekilde kay�t edildi';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Sayfa ayarlar� ba�ar�l� bir �ekilde kay�t edildi';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Kay�t edilen sayfa hatal�';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Se�ti�iniz sayfay� silmek istedi�inizden eminmisiniz (B�t�n alt sayfalar silinecektir)';
$MESSAGE['PAGES']['DELETED'] = 'Sayfa, ba�ar�l� bir �ekilde silindi';
$MESSAGE['PAGES']['RESTORED'] = 'Sayfa, ba�ar�l� bir �ekilde kurtar�ld�';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'L�tfen sayfa ba�l���n� girin';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'L�tfen men� ba�l���n� girin';
$MESSAGE['PAGES']['REORDERED'] = 'Ba�ar�l� bi�imde yenilendi';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Yenilenen sayfada hata var';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'Sizin bu sayfay� de�i�tirme izininiz yok';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Dosyaya yaz�lam�yor /pages/intro.php (Yetersiz yetki)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Giri� sayfas� ba�ar�l� bir �ekilde kay�t edildi';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Son de�i�iklik yapan';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Buraya t�klayarak Giri� Sayfas�n� D�zenleye Bilirsiniz.';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Section properties saved successfully'; //needs to be translated
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Sayfaya Git';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'L�tfen geri d�n�p b�t�n alanlar� doldurunuz';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'Y�kledi�in dosyan�n izin verilen dosya olmas�na dikkat edin:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'Y�kledi�in dosyalar�n izin verilen dosya olmas�na dikkat edin:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'Dosya Y�klenemiyor';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'Daha �nce y�klenmi�ti';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Y�klenemiyor';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Kald�r�lam�yor';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Dosya unzip edilemiyor';
$MESSAGE['GENERIC']['INSTALLED'] = 'Ba�ar�l� bir �ekilde yerle�tirildi';
$MESSAGE['GENERIC']['UPGRADED'] = 'G�ncelleme ba�ar�l� bir�ekilde yap�ld�';
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Ba�ar�l� bir �ekilde kald�r�ld�';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'Uygunsuz, hedef dizin yaz�lam�yor';
$MESSAGE['GENERIC']['INVALID'] = 'Senin y�kledi�in dosya, ge�ersizdir';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Kald�rama: Se�ilen dosya, kullan�mdad�r';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION'] = 'Website Yap�m A�amas�nda';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'L�tfen daha sonra kontrol edin...';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Ol hasta memnun et, bu, bir anda alabilirdi.';
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Dosya a�arken hata.';

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'You must enter details for the following fields'; //needs to be translated
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Sorry, this form has been submitted too many times so far this hour. Please retry in the next hour.'; //needs to be translated
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: '.SERVER_EMAIL; //needs to be translated

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'Please selected which add-ons you would like to have reloaded'; //needs to be translated
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'Mod�l, ba�ar�l� bir �ekildeninkini tekrar y�klendi';
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Kal�plar, ba�ar�l� bir �ekildeninkini tekrar y�klendi';
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Diller, ba�ar�l� bir �ekildeninkini tekrar y�klendi';
?>