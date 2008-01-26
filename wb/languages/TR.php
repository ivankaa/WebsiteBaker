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
$language_author = 'Atakan KOÇ';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'Baþlat';
$MENU['PAGES'] = 'Sayfalar';
$MENU['MEDIA'] = 'Resimler';
$MENU['ADDONS'] = 'Eklentiler';
$MENU['MODULES'] = 'Modüller';
$MENU['TEMPLATES'] = 'Kalýplar';
$MENU['LANGUAGES'] = 'Diller';
$MENU['PREFERENCES'] = 'Tercihler';
$MENU['SETTINGS'] = 'Ayarlar';
$MENU['ADMINTOOLS'] = 'Admin-Tools'; //needs to be translated
$MENU['ACCESS'] = 'Giriþ';
$MENU['USERS'] = 'Kullanýcýlar';
$MENU['GROUPS'] = 'Gruplar';
$MENU['HELP'] = 'Yardým';
$MENU['VIEW'] = 'Görüntüle';
$MENU['LOGOUT'] = 'Çýkýþ';
$MENU['LOGIN'] = 'Giriþ';
$MENU['FORGOT'] = 'Giriþ Bilgilerini Gerial';

// Section overviews
$OVERVIEW['START'] = 'Yönetici Görünümü';
$OVERVIEW['PAGES'] = 'Website Sayfalarýný Yönetme...';
$OVERVIEW['MEDIA'] = 'Resim Deposundaki Dosyalarý Yönetme...';
$OVERVIEW['MODULES'] = 'Website Baker Modüllerini Yönetme...';
$OVERVIEW['TEMPLATES'] = 'Websitenizdeki Kalýplarý Deðiþtirme Ve Düzenleme...';
$OVERVIEW['LANGUAGES'] = 'Website Baker Dilleri Düzenleme...';
$OVERVIEW['PREFERENCES'] = 'Email, Þifre gibi ayarlarý düzenleme... ';
$OVERVIEW['SETTINGS'] = 'Website Baker için ayarlarý düzenleme...';
$OVERVIEW['USERS'] = 'Website Baker kullanýcýlarýný düzenleme...';
$OVERVIEW['GROUPS'] = 'Kullanýcý Gruplarýnýn Ýzinlerini Düzenleme...';
$OVERVIEW['HELP'] = 'Sorularýnýz? Cevaplarý...';
$OVERVIEW['VIEW'] = 'Yeni bir pencerede sitenizin öngörünümü...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Deðiþtir/Sil Sayfa';
$HEADING['DELETED_PAGES'] = 'Sayfayý Sil';
$HEADING['ADD_PAGE'] = 'Sayfa Ekle';
$HEADING['ADD_HEADING'] = 'Baþlýk Ekle';
$HEADING['MODIFY_PAGE'] = 'Sayfayý Deðiþtir';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Sayfa Ayarlarýný Deðiþtir';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Geliþtirilmiþ Sayfa Ayarlarýný Deðiþtir';
$HEADING['MANAGE_SECTIONS'] = 'Kýsýmlarý Yönet';
$HEADING['MODIFY_INTRO_PAGE'] = 'Baþlangýç Sayfasýný Düzenle';

$HEADING['BROWSE_MEDIA'] = 'Resimleri Yönetme';
$HEADING['CREATE_FOLDER'] = 'Dizin Yarat';
$HEADING['UPLOAD_FILES'] = 'Dosya Yükle';

$HEADING['INSTALL_MODULE'] = 'Modül Yükle';
$HEADING['UNINSTALL_MODULE'] = 'Modül Kaldýr';
$HEADING['MODULE_DETAILS'] = 'Modül Açýklamasý';

$HEADING['INSTALL_TEMPLATE'] = 'Kalýp Yükle';
$HEADING['UNINSTALL_TEMPLATE'] = 'Kalýp Kaldýr';
$HEADING['TEMPLATE_DETAILS'] = 'Kalýp Açýklamasý';

$HEADING['INSTALL_LANGUAGE'] = 'Dil Yükle';
$HEADING['UNINSTALL_LANGUAGE'] = 'Dil Kaldýr';
$HEADING['LANGUAGE_DETAILS'] = 'Dil Açýklamasý';

$HEADING['MY_SETTINGS'] = 'Ayarlarým';
$HEADING['MY_EMAIL'] = 'Emailim';
$HEADING['MY_PASSWORD'] = 'Þifrem';

$HEADING['GENERAL_SETTINGS'] = 'Genel Ayarlar';
$HEADING['DEFAULT_SETTINGS'] = 'Varsayýlan Ayarlar';
$HEADING['SEARCH_SETTINGS'] = 'Arama Ayarlarý';
$HEADING['FILESYSTEM_SETTINGS'] = 'Dosya Sistemi Ayarlarý';
$HEADING['SERVER_SETTINGS'] = 'Server Ayarlarý';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings'; //needs to be translated
$HEADING['ADMINISTRATION_TOOLS'] = 'Administration Araçlarý';

$HEADING['MODIFY_DELETE_USER'] = 'Deðiþtir/Sil kullanýcý';
$HEADING['ADD_USER'] = 'Kullanýcý Ekle';
$HEADING['MODIFY_USER'] = 'Kullanýcý Düzenle';

$HEADING['MODIFY_DELETE_GROUP'] = 'Deðiþtir/Sil Grup';
$HEADING['ADD_GROUP'] = 'Grup Ekle';
$HEADING['MODIFY_GROUP'] = 'Grup Düzenle';

// Other text
$TEXT['ADD'] = 'Ekle';
$TEXT['MODIFY'] = 'Düzenle';
$TEXT['SETTINGS'] = 'Ayarlar';
$TEXT['DELETE'] = 'Sil';
$TEXT['SAVE'] = 'Kayýt et';
$TEXT['RESET'] = 'Sýfýrla';
$TEXT['LOGIN'] = 'Giriþ';
$TEXT['RELOAD'] = 'Tekrarla';
$TEXT['CANCEL'] = 'Ýptal';
$TEXT['NAME'] = 'Ýsim';
$TEXT['PLEASE_SELECT'] = 'Lütfen Seçin';
$TEXT['TITLE'] = 'Baþlýk';
$TEXT['PARENT'] = 'Ana Grup';
$TEXT['TYPE'] = 'Tip';
$TEXT['VISIBILITY'] = 'Görünürlük';
$TEXT['PRIVATE'] = 'Özel';
$TEXT['PUBLIC'] = 'Herkez';
$TEXT['NONE'] = 'Yok';
$TEXT['NONE_FOUND'] = 'Hiçbiri bulmadý';
$TEXT['CURRENT'] = 'Kullanýlan';
$TEXT['CHANGE'] = 'Deðiþtir';
$TEXT['WINDOW'] = 'Pencere';
$TEXT['DESCRIPTION'] = 'Açýklama';
$TEXT['KEYWORDS'] = 'Keywords'; //needs to be translated
$TEXT['ADMINISTRATORS'] = 'Yönerici';
$TEXT['PRIVATE_VIEWERS'] = 'Özel izleyiciler';
$TEXT['EXPAND'] = 'Geniþlet';
$TEXT['COLLAPSE'] = 'Daralt';
$TEXT['MOVE_UP'] = 'Yukarý Taþý';
$TEXT['MOVE_DOWN'] = 'Aþaðý Taþý';
$TEXT['RENAME'] = 'Yeni isim ver';
$TEXT['MODIFY_SETTINGS'] = 'Ayarlarý Deðiþtir';
$TEXT['MODIFY_CONTENT'] = 'Düzeni Deðiþtir';
$TEXT['VIEW'] = 'Görünüþ';
$TEXT['UP'] = 'Yukarý';
$TEXT['FORGOTTEN_DETAILS'] = 'Sizin Ayrýntýlý Detaylarýnýz?';
$TEXT['NEED_TO_LOGIN'] = 'Need to log-in?'; //needs to be translated
$TEXT['SEND_DETAILS'] = 'Detaylarý Gönder';
$TEXT['USERNAME'] = 'Kullanýcý Adý';
$TEXT['PASSWORD'] = 'Þifre';
$TEXT['HOME'] = 'Ana Sayfa';
$TEXT['TARGET_FOLDER'] = 'Hedef Dizin';
$TEXT['OVERWRITE_EXISTING'] = 'Üstüne Yaz';
$TEXT['FILE'] = 'Dosya';
$TEXT['FILES'] = 'Dosyalar';
$TEXT['FOLDER'] = 'Dizin';
$TEXT['FOLDERS'] = 'Dizinler';
$TEXT['CREATE_FOLDER'] = 'Dizin Yarat';
$TEXT['UPLOAD_FILES'] = 'Dosya Yükle';
$TEXT['CURRENT_FOLDER'] = 'Kullanýlan Dizin';
$TEXT['TO'] = 'To'; //needs to be translated
$TEXT['FROM'] = 'From'; //needs to be translated
$TEXT['INSTALL'] = 'Yükle';
$TEXT['UNINSTALL'] = 'Kaldýr';
$TEXT['VIEW_DETAILS'] = 'Detaylar';
$TEXT['DISPLAY_NAME'] = 'Görünüm Adý';
$TEXT['AUTHOR'] = 'Yazar';
$TEXT['VERSION'] = 'Versiyon';
$TEXT['DESIGNED_FOR'] = 'Düzenleyen';
$TEXT['DESCRIPTION'] = 'Açýklama';
$TEXT['EMAIL'] = 'Email'; //needs to be translated
$TEXT['LANGUAGE'] = 'Dil';
$TEXT['TIMEZONE'] = 'Zaman Dilimi';
$TEXT['CURRENT_PASSWORD'] = 'Kullanýlan Þifre';
$TEXT['NEW_PASSWORD'] = 'Yeni Þifre';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Tekrarla Yeni Þifre';
$TEXT['ACTIVE'] = 'Aktif';
$TEXT['DISABLED'] = 'Ýptal';
$TEXT['ENABLED'] = 'Ýzin Ver';
$TEXT['RETYPE_PASSWORD'] = 'Þifreyi Tekrarla';
$TEXT['GROUP'] = 'Grup';
$TEXT['SYSTEM_PERMISSIONS'] = 'Sistem Ýzinleri';
$TEXT['MODULE_PERMISSIONS'] = 'Modül Ýzinleri';
$TEXT['SHOW_ADVANCED'] = 'Ýleri Seçenekleri Göster';
$TEXT['HIDE_ADVANCED'] = 'Ýleri Seçenekleri Gizle';
$TEXT['BASIC'] = 'Baþlangýç';
$TEXT['ADVANCED'] = 'Ýleri';
$TEXT['WEBSITE'] = 'Website'; //needs to be translated
$TEXT['DEFAULT'] = 'Varsayýlan';
$TEXT['KEYWORDS'] = 'Keywords'; //needs to be translated
$TEXT['TEXT'] = 'Yazý';
$TEXT['HEADER'] = 'Üst Kýsým';
$TEXT['FOOTER'] = 'Alt Kýsým';
$TEXT['TEMPLATE'] = 'Kalýp';
$TEXT['INSTALLATION'] = 'Yükle';
$TEXT['DATABASE'] = 'Database'; //needs to be translated
$TEXT['HOST'] = 'Host'; //needs to be translated
$TEXT['INTRO'] = 'Demo';
$TEXT['PAGE'] = 'Sayfa';
$TEXT['SIGNUP'] = 'Kayýt Ol';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Hata Rapor Düzeyi';
$TEXT['ADMIN'] = 'Admin'; //needs to be translated
$TEXT['PATH'] = 'Yol';
$TEXT['URL'] = 'URL'; //needs to be translated
$TEXT['FRONTEND'] = 'Son Kullanýcý';
$TEXT['EXTENSION'] = 'Uzatma';
$TEXT['TABLE_PREFIX'] = 'Table Düzen Adý';
$TEXT['CHANGES'] = 'Deðiþiklikler';
$TEXT['ADMINISTRATION'] = 'Yönetici';
$TEXT['FORGOT_DETAILS'] = 'Detay Hatýrlat?';
$TEXT['LOGGED_IN'] = 'Giriþ Kaydet';
$TEXT['WELCOME_BACK'] = 'Hoþgeldiniz';
$TEXT['FULL_NAME'] = 'Tam Adýnýz';
$TEXT['ACCOUNT_SIGNUP'] = 'Kullýcý Kayýt Ol';
$TEXT['LINK'] = 'Link'; //needs to be translated
$TEXT['ANCHOR'] = 'Anchor'; //needs to be translated
$TEXT['TARGET'] = 'Hedef';
$TEXT['NEW_WINDOW'] = 'Yeni Pencere';
$TEXT['SAME_WINDOW'] = 'Ayný Pencere';
$TEXT['TOP_FRAME'] = 'Top Frame'; //needs to be translated
$TEXT['PAGE_LEVEL_LIMIT'] = 'Sayfa Alt Limiti';
$TEXT['SUCCESS'] = 'Ýþlem Baþarýldý';
$TEXT['ERROR'] = 'Hata';
$TEXT['ARE_YOU_SURE'] = 'eminmisin?';
$TEXT['YES'] = 'Evet';
$TEXT['NO'] = 'Hayýr';
$TEXT['SYSTEM_DEFAULT'] = 'Sistem Varsayýlaný';
$TEXT['PAGE_TITLE'] = 'Sayfa Baþlýðý';
$TEXT['MENU_TITLE'] = 'Menu Baþlýðý';
$TEXT['ACTIONS'] = 'Hareketler';
$TEXT['UNKNOWN'] = 'Bilinmeyen';
$TEXT['BLOCK'] = 'Blok';
$TEXT['SEARCH'] = 'Ara';
$TEXT['SEARCHING'] = 'Arama';
$TEXT['POST'] = 'Mesaj';
$TEXT['COMMENT'] = 'Yorum';
$TEXT['COMMENTS'] = 'Yorumlar';
$TEXT['COMMENTING'] = 'Yorum yapan';
$TEXT['SHORT'] = 'Kýsa';
$TEXT['LONG'] = 'Uzun';
$TEXT['LOOP'] = 'Sürekli';
$TEXT['FIELD'] = 'Alan';
$TEXT['REQUIRED'] = 'Gerekli';
$TEXT['LENGTH'] = 'Uzunluk';
$TEXT['MESSAGE'] = 'Mesaj';
$TEXT['SUBJECT'] = 'Konu';
$TEXT['MATCH'] = 'Bul';
$TEXT['ALL_WORDS'] = 'Bütün Kelimeler';
$TEXT['ANY_WORDS'] = 'Herhangi bir sözcük';
$TEXT['EXACT_MATCH'] = 'Tam Bul';
$TEXT['SHOW'] = 'Göster';
$TEXT['HIDE'] = 'Gizle';
$TEXT['START_PUBLISHING'] = 'Yayýna Baþla';
$TEXT['FINISH_PUBLISHING'] = 'Yayýný Bitir';
$TEXT['DATE'] = 'Tarih';
$TEXT['START'] = 'Baþla';
$TEXT['END'] = 'Son';
$TEXT['IMAGE'] = 'Resim';
$TEXT['ICON'] = 'Ikon';
$TEXT['SECTION'] = 'Kýsým';
$TEXT['DATE_FORMAT'] = 'Tarih Formatý';
$TEXT['TIME_FORMAT'] = 'Saat Formatý';
$TEXT['RESULTS'] = 'Sonuçlar';
$TEXT['RESIZE'] = 'Tekrar Boyutlandýr';
$TEXT['MANAGE'] = 'Yönet';
$TEXT['CODE'] = 'Kod';
$TEXT['WIDTH'] = 'Geniþlik';
$TEXT['HEIGHT'] = 'Yükseklik';
$TEXT['MORE'] = 'Daha Çok';
$TEXT['READ_MORE'] = 'Oku';
$TEXT['CHANGE_SETTINGS'] = 'Ayarlarý Deðiþtir';
$TEXT['CURRENT_PAGE'] = 'Kullanýlan Sayfa';
$TEXT['CLOSE'] = 'Kapat';
$TEXT['INTRO_PAGE'] = 'Demo Sayfasý';
$TEXT['INSTALLATION_URL'] = 'Yükeleme URL';
$TEXT['INSTALLATION_PATH'] = 'Yükleme Yolu';
$TEXT['PAGE_EXTENSION'] = 'Sayfa Uzantýsý';
$TEXT['NO_RESULTS'] = 'Bulunamadý';
$TEXT['WEBSITE_TITLE'] = 'Website Baþlýðý';
$TEXT['WEBSITE_DESCRIPTION'] = 'Website Açýklamasý';
$TEXT['WEBSITE_KEYWORDS'] = 'Website Keywords'; //needs to be translated
$TEXT['WEBSITE_HEADER'] = 'Website Üst Kýsým';
$TEXT['WEBSITE_FOOTER'] = 'Website Alt Kýsým';
$TEXT['RESULTS_HEADER'] = 'Bulunduðunda Üst Kýsým';
$TEXT['RESULTS_LOOP'] = 'Bulunduðunda Döngü';
$TEXT['RESULTS_FOOTER'] = 'Bulunduðunda Alt Kýsým';
$TEXT['LEVEL'] = 'Limit';
$TEXT['NOT_FOUND'] = 'Bulunamadý';
$TEXT['PAGE_SPACER'] = 'Sayfa Boþluðu';
$TEXT['MATCHING'] = 'Bulunanlar';
$TEXT['TEMPLATE_PERMISSIONS'] = 'Kalýp Ýzinleri';
$TEXT['PAGES_DIRECTORY'] = 'Sayfa Dizini';
$TEXT['MEDIA_DIRECTORY'] = 'Resim Dizini';
$TEXT['FILE_MODE'] = 'Dosya Ýzini';
$TEXT['USER'] = 'Kullanýcý';
$TEXT['OTHERS'] = 'Diðerleri';
$TEXT['READ'] = 'Oku';
$TEXT['WRITE'] = 'Yaz';
$TEXT['EXECUTE'] = 'Çalýþtýr';
$TEXT['SMART_LOGIN'] = 'Güvenli Giriþ';
$TEXT['REMEMBER_ME'] = 'Hazýrla';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Dosya Sistemi Ýzinleri';
$TEXT['DIRECTORIES'] = 'Dizinler';
$TEXT['DIRECTORY_MODE'] = 'Dizin Modu';
$TEXT['LIST_OPTIONS'] = 'Liste seçenekleri';
$TEXT['OPTION'] = 'Seçenekler';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Çoklu seçimlere izin ver';
$TEXT['TEXTFIELD'] = 'Textfield'; //needs to be translated
$TEXT['TEXTAREA'] = 'Textarea'; //needs to be translated
$TEXT['SELECT_BOX'] = 'Seçmeli Menü';
$TEXT['CHECKBOX_GROUP'] = 'Týklamalý Seçim';
$TEXT['RADIO_BUTTON_GROUP'] = 'Radyo Düðmeleri';
$TEXT['SIZE'] = 'Boyut';
$TEXT['DEFAULT_TEXT'] = 'Varsayýlan Yazý';
$TEXT['SEPERATOR'] = 'Bölücü';
$TEXT['BACK'] = 'Geri';
$TEXT['UNDER_CONSTRUCTION'] = 'Yapým Aþamasýnda';
$TEXT['MULTISELECT'] = 'Çoklu Seçim';
$TEXT['SHORT_TEXT'] = 'Kýsa Yazý';
$TEXT['LONG_TEXT'] = 'Uzun Yazý';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Ana sayfa yönlendir';
$TEXT['HEADING'] = 'Baþlýk';
$TEXT['MULTIPLE_MENUS'] = 'Çoklu menüler';
$TEXT['REGISTERED'] = 'Kayýtlý Kullanýcý';
$TEXT['START'] = 'Baþlat';
$TEXT['SECTION_BLOCKS'] = 'Kýsým bloklarý';
$TEXT['REGISTERED_VIEWERS'] = 'Ýzleyiciler kaydetti';
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers'; //needs to be translated
$TEXT['SUBMISSION_ID'] = 'Sunuþlar ID';
$TEXT['SUBMISSIONS'] = 'Sunuþlar';
$TEXT['SUBMITTED'] = 'Gönderildi';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Maksimum Saat Baþý Sunum';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Sunuþlar, veritabanýnda depoladý';
$TEXT['EMAIL_ADDRESS'] = 'Email Adresi';
$TEXT['CUSTOM'] = 'Custom'; //needs to be translated
$TEXT['ANONYMOUS'] = 'Bilinmeyen';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Server Ýþletim Sistemi';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'Yazýlabilir dosya izinleri';
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix tabanlý';
$TEXT['WINDOWS'] = 'Windows'; //needs to be translated
$TEXT['HOME_FOLDER'] = 'Ana Dizin';
$TEXT['HOME_FOLDERS'] = 'Ana Dizinler';
$TEXT['PAGE_TRASH'] = 'Sayfayý Sil';
$TEXT['INLINE'] = 'In-line'; //needs to be translated
$TEXT['SEPARATE'] = 'Ayýrýcý';
$TEXT['DELETED'] = 'Silindi';
$TEXT['VIEW_DELETED_PAGES'] = 'Silinen Sayfayý Göster';
$TEXT['EMPTY_TRASH'] = 'Çöp kutusu boþ';
$TEXT['TRASH_EMPTIED'] = 'Çöp kutusu boþaltýldý';
$TEXT['ADD_SECTION'] = 'Kýsým Ekle';
$TEXT['POST_HEADER'] = 'Üst Mesajý';
$TEXT['POST_FOOTER'] = 'Alt Mesaj';
$TEXT['POSTS_PER_PAGE'] = 'Sayfa baþýna mesajlar';
$TEXT['RESIZE_IMAGE_TO'] = 'Boyutlandýr resimi';
$TEXT['UNLIMITED'] = 'Sýnýrsýz';
$TEXT['OF'] = 'Of'; //needs to be translated
$TEXT['OUT_OF'] = 'Dýþarý';
$TEXT['NEXT'] = 'Sonraki';
$TEXT['PREVIOUS'] = 'Önceki';
$TEXT['NEXT_PAGE'] = 'Sonraki Sayfa';
$TEXT['PREVIOUS_PAGE'] = 'Önceki Sayfa';
$TEXT['ON'] = 'On'; //needs to be translated
$TEXT['LAST_UPDATED_BY'] = 'Son Güncelleyen';
$TEXT['RESULTS_FOR'] = 'Sonuçlar';
$TEXT['TIME'] = 'Saat';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style'; //needs to be translated
$TEXT['WYSIWYG_EDITOR'] = "WYSIWYG Editor"; //needs to be translated
$TEXT['SERVER_EMAIL'] = 'Server Email'; //needs to be translated
$TEXT['MENU'] = 'Menu'; //needs to be translated
$TEXT['MANAGE_GROUPS'] = 'Grup Yönetimi';
$TEXT['MANAGE_USERS'] = 'Kullanýcý Yönetimi';
$TEXT['PAGE_LANGUAGES'] = 'Sayfa Dili';
$TEXT['HIDDEN'] = 'Gizli';
$TEXT['MAIN'] = 'Ana';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Yüklenen dosyanýn adýný deðiþtir';
$TEXT['APP_NAME'] = 'Application Adý';
$TEXT['SESSION_IDENTIFIER'] = 'Session Identifier'; //needs to be translated
$TEXT['BACKUP'] = 'Yedek Al';
$TEXT['RESTORE'] = 'Yedeði yükle';
$TEXT['BACKUP_DATABASE'] = 'Database Yedekle';
$TEXT['RESTORE_DATABASE'] = 'Database Geri Yükle';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup all tables in database'; //needs to be translated
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup only WB-specific tables'; //needs to be translated
$TEXT['BACKUP_MEDIA'] = 'Media Yedekle';
$TEXT['RESTORE_MEDIA'] = 'Media Geri Yükle';
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
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Üzgünüm, bu sayfayý görüntülemeye yetkiniz yok';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display'; //needs to be translated

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Insufficient privelliges to be here'; //needs to be translated

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Kullanýcý adý ve þifre giriniz';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'Lütfen kullancý adý girin';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'Lütfen þifre girin';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'Kullanýcý adý çok kýsa';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'Þifreniz çok kýsa';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'Kullanýcý adýnýz çok uzun';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'Þifreniz çok uzun';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Kullanýcý adý ve þifreniz yanlýþ';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'Bir email adresi girmelisiniz.';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'Lütfen email adresini girin';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'Bu email adresi veritabanýnda bulunamadý';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'Uygunsuz email þifresi, Lütfen Yönetici ile Kontak kurun';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'Sizin kullanýcý adýnýz ve þifreniz email adresinize gönderildi';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'Paralonuzu 1 saat aralýklarla deðiþtirebilirsiniz.';

$MESSAGE['START']['WELCOME_MESSAGE'] = 'Hoþgeldiniz Website Baker Yönetimine';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Uyarý! Yükleme dizini halen duruyor!';
$MESSAGE['START']['CURRENT_USER'] = 'Sizin kullandýðýnýz giriþ ismi:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'Unable to open the configuration file'; //needs to be translated
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'Cannot write to configuration file'; //needs to be translated
$MESSAGE['SETTINGS']['SAVED'] = 'Ayarlar baþarýlý bir þekilde kayýt edildi';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Not Edin: Bu buton bütün deðiþiklikleri ilk haline geri getirir';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Please note: this is only recommended for testing environments'; //needs to be translated

$MESSAGE['USERS']['ADDED'] = 'Kullanýcý, baþarýlý bir þekilde ekledi';
$MESSAGE['USERS']['SAVED'] = 'Kullanýcý, baþarýlý bir þekilde kayýt edildi';
$MESSAGE['USERS']['DELETED'] = 'Kullanýcý, baþarýlý bir þekilde silindi';
$MESSAGE['USERS']['NO_GROUP'] = 'Hiçbir grup seçilmedi';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'Girdiðiniz kullanýcý adý kýsa';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'Girdiðiniz þifre kýsa';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'Girdiðiniz þifre bulunamadý';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'Girdiðiniz email adresi geçersiz';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'Girdiðiniz email baþkasý tarafýndan kullanýlýyor';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'Girdiðiniz kullanýcý adý baþkasý tarafýndan kullanýlýyor';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Not Edin: Sen sadece yukarýdaki alanlara deðerleri gir. Eðer bu kullanýcýlarý dile deðiþtirseydin.';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Seçtiðiniz kullanýcýlarý silmek istediðinizden eminmisiniz?';

$MESSAGE['GROUPS']['ADDED'] = 'Grup, baþarýlý bir þekilde ekledi';
$MESSAGE['GROUPS']['SAVED'] = 'Grup, baþarýlý bir þekilde kayýt edildi';
$MESSAGE['GROUPS']['DELETED'] = 'Grup, baþarýlý bir þekilde silindi';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = 'Grup adý boþ';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Seçtiðiniz grubu silmek istediðinizden eminmisiniz? (ve bu gruba ekli kullanýcýlarý)?';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'Hiçbir grup bulmadý';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Bu grup adý zaten var';

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Ayrýntýlar, baþarýlý bir þekilde kayýt edildi';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'Email, baþarýlý bir þekilde güncelleþtirdi';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'Girdiðiniz þifre yanlýþ';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'Parola, baþarýlý bir þekilde deðiþtirdi';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Please note: to change the template you must go to the Settings section'; //needs to be translated

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'Giremezsiniz ../ içindeki dizin adý';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Directory does not exist'; //needs to be translated
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'Cannot have ../ in the folder target'; //needs to be translated
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'Giremezsiniz ../ ismine';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'index.php isimini kullanamazsýnýz';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'No media found in the current folder'; //needs to be translated
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'Dosya Bulunamadý';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'Dosya, baþarýlý bir þekilde silindi';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Dizin, baþarýlý bir þekilde silindi';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Dosya ve dizinleri silmek istediðinizden eminmisiniz?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'Seçtiðiniz dosya silinemiyor';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'Seçtiðiniz dizin silinemiyor';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'Mutlaka bir isim girmelisiniz';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'Mutlaka bir uzantý girmelisinz';
$MESSAGE['MEDIA']['RENAMED'] = 'Yeni isim ver baþarýlý.';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Yeni isim ver baþarýsýz';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Girmiþ olduðunuz dosya zaten var';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Girmiþ olduðunuz dizin zaten var';
$MESSAGE['MEDIA']['DIR_MADE'] = 'Dizin, baþarýlý bir þekilde yarattý';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'Dizin yaratma baþarýsýz';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' Dosya baþarýlý bir þekilde yüklendi';
$MESSAGE['MEDIA']['UPLOADED'] = ' Dosyalar baþarýlý bir þekilde yüklendi';

$MESSAGE['PAGES']['ADDED'] = 'Sayfa, baþarýlý bir þekilde ekledi';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Üst sayfa, baþarýlý bir þekilde ekledi';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Bu sayfa veya dosya zaten var.';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Yaratýrken hatalý giriþ /pages dizini için (Yetersiz yetki)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Silinirken hatalý giriþ /pages dizini için (Yetersiz yetki)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'Sayfa bulunamadý';
$MESSAGE['PAGES']['SAVED'] = 'Sayfa, baþarýlý bir þekilde kayýt edildi';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Sayfa ayarlarý baþarýlý bir þekilde kayýt edildi';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Kayýt edilen sayfa hatalý';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Seçtiðiniz sayfayý silmek istediðinizden eminmisiniz (Bütün alt sayfalar silinecektir)';
$MESSAGE['PAGES']['DELETED'] = 'Sayfa, baþarýlý bir þekilde silindi';
$MESSAGE['PAGES']['RESTORED'] = 'Sayfa, baþarýlý bir þekilde kurtarýldý';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'Lütfen sayfa baþlýðýný girin';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'Lütfen menü baþlýðýný girin';
$MESSAGE['PAGES']['REORDERED'] = 'Baþarýlý biçimde yenilendi';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Yenilenen sayfada hata var';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'Sizin bu sayfayý deðiþtirme izininiz yok';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'Dosyaya yazýlamýyor /pages/intro.php (Yetersiz yetki)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'Giriþ sayfasý baþarýlý bir þekilde kayýt edildi';
$MESSAGE['PAGES']['LAST_MODIFIED'] = 'Son deðiþiklik yapan';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Buraya týklayarak Giriþ Sayfasýný Düzenleye Bilirsiniz.';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Section properties saved successfully'; //needs to be translated
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Sayfaya Git';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'Lütfen geri dönüp bütün alanlarý doldurunuz';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'Yüklediðin dosyanýn izin verilen dosya olmasýna dikkat edin:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'Yüklediðin dosyalarýn izin verilen dosya olmasýna dikkat edin:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'Dosya Yüklenemiyor';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'Daha önce yüklenmiþti';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'Yüklenemiyor';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'Kaldýrýlamýyor';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'Dosya unzip edilemiyor';
$MESSAGE['GENERIC']['INSTALLED'] = 'Baþarýlý bir þekilde yerleþtirildi';
$MESSAGE['GENERIC']['UPGRADED'] = 'Güncelleme baþarýlý birþekilde yapýldý';
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Baþarýlý bir þekilde kaldýrýldý';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'Uygunsuz, hedef dizin yazýlamýyor';
$MESSAGE['GENERIC']['INVALID'] = 'Senin yüklediðin dosya, geçersizdir';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'Kaldýrama: Seçilen dosya, kullanýmdadýr';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONTRUCTION'] = 'Website Yapým Aþamasýnda';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'Lütfen daha sonra kontrol edin...';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Ol hasta memnun et, bu, bir anda alabilirdi.';
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Dosya açarken hata.';

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'You must enter details for the following fields'; //needs to be translated
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Sorry, this form has been submitted too many times so far this hour. Please retry in the next hour.'; //needs to be translated
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'The verification number (also known as Captcha) that you entered is incorrect. If you are having problems reading the Captcha, please email: '.SERVER_EMAIL; //needs to be translated

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'Please selected which add-ons you would like to have reloaded'; //needs to be translated
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'Modül, baþarýlý bir þekildeninkini tekrar yüklendi';
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Kalýplar, baþarýlý bir þekildeninkini tekrar yüklendi';
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Diller, baþarýlý bir þekildeninkini tekrar yüklendi';
?>