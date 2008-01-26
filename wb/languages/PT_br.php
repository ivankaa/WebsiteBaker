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
$language_code = 'PT_br';
$language_name = 'Portuguese (Brazil)';
$language_version = '2.7';
$language_platform = '2.7.x';
$language_author = 'Daniel Neto';
$language_license = 'GNU General Public License';

// Menu titles
$MENU['START'] = 'In�cio';
$MENU['PAGES'] = 'P�ginas';
$MENU['MEDIA'] = 'M�dia';
$MENU['ADDONS'] = 'Add-ons'; //needs to be translated
$MENU['MODULES'] = 'M�dulos';
$MENU['TEMPLATES'] = 'Temas (Templates)';
$MENU['LANGUAGES'] = 'Idiomas';
$MENU['PREFERENCES'] = 'Prefer�ncias';
$MENU['SETTINGS'] = 'Configura��es';
$MENU['ADMINTOOLS'] = 'Admin-Tools'; //needs to be translated
$MENU['ACCESS'] = 'Acessos';
$MENU['USERS'] = 'Usu�rios';
$MENU['GROUPS'] = 'Grupos';
$MENU['HELP'] = 'Ajuda';
$MENU['VIEW'] = 'Visualizar';
$MENU['LOGOUT'] = 'Log-out'; //needs to be translated
$MENU['LOGIN'] = 'Login'; //needs to be translated
$MENU['FORGOT'] = 'Receber Detalhes do Login';

// Section overviews
$OVERVIEW['START'] = 'Vis�o Geral da Administra��o';
$OVERVIEW['PAGES'] = 'Gerencie as P�ginas do seu site...';
$OVERVIEW['MEDIA'] = 'Gerencie os arquivos armazenados na pasta Media...';
$OVERVIEW['MODULES'] = 'Gerencie os M�dulos do Website Baker...';
$OVERVIEW['TEMPLATES'] = 'Altere a apar�ncia do seu site com temas(templates)...';
$OVERVIEW['LANGUAGES'] = 'Gerencie os idiomas do seu website...';
$OVERVIEW['PREFERENCES'] = 'Altere suas prefer�ncias como email, senha, etc... ';
$OVERVIEW['SETTINGS'] = 'Altere as configura��es do Website Baker...';
$OVERVIEW['USERS'] = 'Gerencie os usu�rios que podem logar no Website Baker...';
$OVERVIEW['GROUPS'] = 'Gerencie os grupos de usu�rios e suas permiss�es de sistema...';
$OVERVIEW['HELP'] = 'D�vidas? Encontre respostas...';
$OVERVIEW['VIEW'] = 'Visualize e navegue em seu website atrav�s de uma nova janela...';

// Headings
$HEADING['MODIFY_DELETE_PAGE'] = 'Modificar/Apagar P�gina';
$HEADING['DELETED_PAGES'] = 'P�ginas apagadas';
$HEADING['ADD_PAGE'] = 'Adicionar P�gina';
$HEADING['ADD_HEADING'] = 'Adicionar Cabe�alho';
$HEADING['MODIFY_PAGE'] = 'Modificar P�gina';
$HEADING['MODIFY_PAGE_SETTINGS'] = 'Modificar Configura��es da P�gina';
$HEADING['MODIFY_ADVANCED_PAGE_SETTINGS'] = 'Modificar Configura��es Avan�adas da P�gina';
$HEADING['MANAGE_SECTIONS'] = 'Gerenciar Sess�es';
$HEADING['MODIFY_INTRO_PAGE'] = 'Modificar P�gina de Introdu��o';

$HEADING['BROWSE_MEDIA'] = 'Navegar pela M�dia';
$HEADING['CREATE_FOLDER'] = 'Criar Pasta';
$HEADING['UPLOAD_FILES'] = 'Enviar Arquivo(s)';

$HEADING['INSTALL_MODULE'] = 'Instalar M�dulo';
$HEADING['UNINSTALL_MODULE'] = 'Desinstalar M�dulo';
$HEADING['MODULE_DETAILS'] = 'Detalhes do M�dulo';

$HEADING['INSTALL_TEMPLATE'] = 'Instalar Tema (Template)';
$HEADING['UNINSTALL_TEMPLATE'] = 'Desinstalar Tema (Template)';
$HEADING['TEMPLATE_DETAILS'] = 'Detalhes do Tema (Template)';

$HEADING['INSTALL_LANGUAGE'] = 'Instalar Idioma';
$HEADING['UNINSTALL_LANGUAGE'] = 'Desinstalar Idioma';
$HEADING['LANGUAGE_DETAILS'] = 'Detalhes do Idioma';

$HEADING['MY_SETTINGS'] = 'Minhas Configura��es';
$HEADING['MY_EMAIL'] = 'Meu Email';
$HEADING['MY_PASSWORD'] = 'Minha Senha';

$HEADING['GENERAL_SETTINGS'] = 'Configura��es Gerais';
$HEADING['DEFAULT_SETTINGS'] = 'Configura��es Padr�o';
$HEADING['SEARCH_SETTINGS'] = 'Configura��es de Busca';
$HEADING['FILESYSTEM_SETTINGS'] = 'Configura��es de Sistema de Arquivos';
$HEADING['SERVER_SETTINGS'] = 'Configura��es do Servidor';
$HEADING['WBMAILER_SETTINGS'] = 'Mailer Settings'; //needs to be translated
$HEADING['ADMINISTRATION_TOOLS'] = 'Ferramentas de Administra��o';

$HEADING['MODIFY_DELETE_USER'] = 'Modificar/Apagar Usu�rio';
$HEADING['ADD_USER'] = 'Adicionar Usu�rio';
$HEADING['MODIFY_USER'] = 'Modificar Usu�rio';

$HEADING['MODIFY_DELETE_GROUP'] = 'Modificar/Apagar Grupo';
$HEADING['ADD_GROUP'] = 'Adicionar Grupo';
$HEADING['MODIFY_GROUP'] = 'Modificar Grupo';

// Other text
$TEXT['ADD'] = 'Adicionar';
$TEXT['MODIFY'] = 'Modificar';
$TEXT['SETTINGS'] = 'Configura��es';
$TEXT['DELETE'] = 'Apagar';
$TEXT['SAVE'] = 'Salvar';
$TEXT['RESET'] = 'Redefinir';
$TEXT['LOGIN'] = 'Login'; //needs to be translated
$TEXT['RELOAD'] = 'Recarregar';
$TEXT['CANCEL'] = 'Cancelar';
$TEXT['NAME'] = 'Nome';
$TEXT['PLEASE_SELECT'] = 'Por Favor escolha';
$TEXT['TITLE'] = 'T�tulo';
$TEXT['PARENT'] = 'Parent'; //needs to be translated
$TEXT['TYPE'] = 'Tipo';
$TEXT['VISIBILITY'] = 'Visibilidade';
$TEXT['PRIVATE'] = 'Privado';
$TEXT['PUBLIC'] = 'P�blico';
$TEXT['NONE'] = 'Nenhum';
$TEXT['NONE_FOUND'] = 'Nada Encontrado';
$TEXT['CURRENT'] = 'Atual';
$TEXT['CHANGE'] = 'Alterar';
$TEXT['WINDOW'] = 'Window'; //needs to be translated
$TEXT['DESCRIPTION'] = 'Descri��o';
$TEXT['KEYWORDS'] = 'Keywords (Palavras-Chave)';
$TEXT['ADMINISTRATORS'] = 'Administrators'; //needs to be translated
$TEXT['PRIVATE_VIEWERS'] = 'Private Viewers'; //needs to be translated
$TEXT['EXPAND'] = 'Expand'; //needs to be translated
$TEXT['COLLAPSE'] = 'Collapse'; //needs to be translated
$TEXT['MOVE_UP'] = 'Mover para Cima';
$TEXT['MOVE_DOWN'] = 'Mover para Baixo';
$TEXT['RENAME'] = 'Renomear';
$TEXT['MODIFY_SETTINGS'] = 'Modificar Configura��es';
$TEXT['MODIFY_CONTENT'] = 'Modificar Conte�do';
$TEXT['VIEW'] = 'Ver';
$TEXT['UP'] = 'Cima';
$TEXT['FORGOTTEN_DETAILS'] = 'Esqueceu suas credenciais?';
$TEXT['NEED_TO_LOGIN'] = 'Precisar fazer log-in?';
$TEXT['SEND_DETAILS'] = 'Enviar credenciais';
$TEXT['USERNAME'] = 'Usu�rio';
$TEXT['PASSWORD'] = 'Senha';
$TEXT['HOME'] = 'Home'; //needs to be translated
$TEXT['TARGET_FOLDER'] = 'Pasta Alvo';
$TEXT['OVERWRITE_EXISTING'] = 'Substituir Existente';
$TEXT['FILE'] = 'Arquivo';
$TEXT['FILES'] = 'Arquivos';
$TEXT['FOLDER'] = 'Pasta';
$TEXT['FOLDERS'] = 'Pastas';
$TEXT['CREATE_FOLDER'] = 'Criar Pasta';
$TEXT['UPLOAD_FILES'] = 'Enviar Arquivo(s)';
$TEXT['CURRENT_FOLDER'] = 'Pasta Atual';
$TEXT['TO'] = 'Para';
$TEXT['FROM'] = 'De';
$TEXT['INSTALL'] = 'Instalar';
$TEXT['UNINSTALL'] = 'Desinstalar';
$TEXT['VIEW_DETAILS'] = 'Ver Detalhes';
$TEXT['DISPLAY_NAME'] = 'Nome de Exibi��o';
$TEXT['AUTHOR'] = 'Autor';
$TEXT['VERSION'] = 'Vers�o';
$TEXT['DESIGNED_FOR'] = 'Designado para';
$TEXT['DESCRIPTION'] = 'Descri��o';
$TEXT['EMAIL'] = 'Email'; //needs to be translated
$TEXT['LANGUAGE'] = 'Idioma';
$TEXT['TIMEZONE'] = 'Fuso Hor�rio';
$TEXT['CURRENT_PASSWORD'] = 'Senha Atual';
$TEXT['NEW_PASSWORD'] = 'Nova Senha';
$TEXT['RETYPE_NEW_PASSWORD'] = 'Confirme a Nova Senha';
$TEXT['ACTIVE'] = 'Ativo';
$TEXT['DISABLED'] = 'Desabilitado';
$TEXT['ENABLED'] = 'Habilitado';
$TEXT['RETYPE_PASSWORD'] = 'Confirme a Senha';
$TEXT['GROUP'] = 'Grupo';
$TEXT['SYSTEM_PERMISSIONS'] = 'Permiss�es de Sistema';
$TEXT['MODULE_PERMISSIONS'] = 'Permiss�es de M�dulo';
$TEXT['SHOW_ADVANCED'] = 'Exibir Op��es Avan�adas';
$TEXT['HIDE_ADVANCED'] = 'Ocultar Op��es Avan�adas';
$TEXT['BASIC'] = 'B�sico';
$TEXT['ADVANCED'] = 'Avan�ado';
$TEXT['WEBSITE'] = 'Website'; //needs to be translated
$TEXT['DEFAULT'] = 'Padr�o';
$TEXT['KEYWORDS'] = 'Keywords'; //needs to be translated
$TEXT['TEXT'] = 'Texto';
$TEXT['HEADER'] = 'Cabe�alho';
$TEXT['FOOTER'] = 'Rodap�';
$TEXT['TEMPLATE'] = 'Tema (Template)';
$TEXT['INSTALLATION'] = 'Instala��o';
$TEXT['DATABASE'] = 'Banco de Dados';
$TEXT['HOST'] = 'Host'; //needs to be translated
$TEXT['INTRO'] = 'Introdu��o';
$TEXT['PAGE'] = 'P�gina';
$TEXT['SIGNUP'] = 'Inscrever';
$TEXT['PHP_ERROR_LEVEL'] = 'PHP Error Reporting Level'; //needs to be translated
$TEXT['ADMIN'] = 'Admin'; //needs to be translated
$TEXT['PATH'] = 'Caminho';
$TEXT['URL'] = 'URL'; //needs to be translated
$TEXT['FRONTEND'] = 'Front-end'; //needs to be translated
$TEXT['EXTENSION'] = 'Extens�o';
$TEXT['TABLE_PREFIX'] = 'Prefixo da Tabela';
$TEXT['CHANGES'] = 'Altera��es';
$TEXT['ADMINISTRATION'] = 'Administra��o';
$TEXT['FORGOT_DETAILS'] = 'Esqueceu as credenciais?';
$TEXT['LOGGED_IN'] = 'Logado';
$TEXT['WELCOME_BACK'] = 'Bem-Vindo';
$TEXT['FULL_NAME'] = 'Nome Completo';
$TEXT['ACCOUNT_SIGNUP'] = 'Assinatura de Conta';
$TEXT['LINK'] = 'Link'; //needs to be translated
$TEXT['ANCHOR'] = 'Anchor'; //needs to be translated
$TEXT['TARGET'] = 'Target'; //needs to be translated
$TEXT['NEW_WINDOW'] = 'New Window'; //needs to be translated
$TEXT['SAME_WINDOW'] = 'Same Window'; //needs to be translated
$TEXT['TOP_FRAME'] = 'Top Frame'; //needs to be translated
$TEXT['PAGE_LEVEL_LIMIT'] = 'Limite de N�veis de P�gina';
$TEXT['SUCCESS'] = 'Sucesso';
$TEXT['ERROR'] = 'Erro';
$TEXT['ARE_YOU_SURE'] = 'Voc� tem certeza?';
$TEXT['YES'] = 'Sim';
$TEXT['NO'] = 'N�o';
$TEXT['SYSTEM_DEFAULT'] = 'Padr�o do Sistema';
$TEXT['PAGE_TITLE'] = 'T�tulo da P�gina';
$TEXT['MENU_TITLE'] = 'T�tulo do Menu';
$TEXT['ACTIONS'] = 'A��es';
$TEXT['UNKNOWN'] = 'Desconhecido';
$TEXT['BLOCK'] = 'Block'; //needs to be translated
$TEXT['SEARCH'] = 'Busca';
$TEXT['SEARCHING'] = 'Buscando';
$TEXT['POST'] = 'Post'; //needs to be translated
$TEXT['COMMENT'] = 'Coment�rio';
$TEXT['COMMENTS'] = 'Coment�rios';
$TEXT['COMMENTING'] = 'Coment�rios';
$TEXT['SHORT'] = 'Curto';
$TEXT['LONG'] = 'Longo';
$TEXT['LOOP'] = 'La�o de Repeti��o';
$TEXT['FIELD'] = 'Campo';
$TEXT['REQUIRED'] = 'Requerido';
$TEXT['LENGTH'] = 'Tamanho';
$TEXT['MESSAGE'] = 'Mensagem';
$TEXT['SUBJECT'] = 'Assunto';
$TEXT['MATCH'] = 'Possua';
$TEXT['ALL_WORDS'] = 'Todas as Palavras';
$TEXT['ANY_WORDS'] = 'Qualquer Palavra';
$TEXT['EXACT_MATCH'] = 'Express�o Exata';
$TEXT['SHOW'] = 'Exibir';
$TEXT['HIDE'] = 'Ocultar';
$TEXT['START_PUBLISHING'] = 'Start Publishing'; //needs to be translated
$TEXT['FINISH_PUBLISHING'] = 'Finish Publishing'; //needs to be translated
$TEXT['DATE'] = 'Data';
$TEXT['START'] = 'In�cio';
$TEXT['END'] = 'Fim';
$TEXT['IMAGE'] = 'Imagem';
$TEXT['ICON'] = '�cone';
$TEXT['SECTION'] = 'Sess�o';
$TEXT['DATE_FORMAT'] = 'Formato de Data';
$TEXT['TIME_FORMAT'] = 'Formato de Hora';
$TEXT['RESULTS'] = 'Resultados';
$TEXT['RESIZE'] = 'Redimentsionar';
$TEXT['MANAGE'] = 'Gerenciar';
$TEXT['CODE'] = 'C�digo';
$TEXT['WIDTH'] = 'Altura';
$TEXT['HEIGHT'] = 'Largura';
$TEXT['MORE'] = 'Mais';
$TEXT['READ_MORE'] = 'Leia Mais';
$TEXT['CHANGE_SETTINGS'] = 'Alterar Configura��es';
$TEXT['CURRENT_PAGE'] = 'P�gina Atual';
$TEXT['CLOSE'] = 'Fechar';
$TEXT['INTRO_PAGE'] = 'P�gina de Introdu��o';
$TEXT['INSTALLATION_URL'] = 'URL de Instala��o';
$TEXT['INSTALLATION_PATH'] = 'Caminho de Instala��o';
$TEXT['PAGE_EXTENSION'] = 'Extens�o da P�gina';
$TEXT['NO_RESULTS'] = 'Sem Resultados';
$TEXT['WEBSITE_TITLE'] = 'T�tulo do Website';
$TEXT['WEBSITE_DESCRIPTION'] = 'Descri��o do Website';
$TEXT['WEBSITE_KEYWORDS'] = 'Website Keywords'; //needs to be translated
$TEXT['WEBSITE_HEADER'] = 'Cabe�alho do Website';
$TEXT['WEBSITE_FOOTER'] = 'Rodap� do Website';
$TEXT['RESULTS_HEADER'] = 'Cabe�alho dos Resultados';
$TEXT['RESULTS_LOOP'] = 'La�o de Repeti��o dos Resultados';
$TEXT['RESULTS_FOOTER'] = 'Rodap� dos Resultados';
$TEXT['LEVEL'] = 'N�vel';
$TEXT['NOT_FOUND'] = 'N�o Encotnrado';
$TEXT['PAGE_SPACER'] = 'Espa�ador de P�gina';
$TEXT['MATCHING'] = 'Matching'; //needs to be translated
$TEXT['TEMPLATE_PERMISSIONS'] = 'Permiss�es do Tema (Template)';
$TEXT['PAGES_DIRECTORY'] = 'Diret�rio de P�ginas';
$TEXT['MEDIA_DIRECTORY'] = 'Diret�rio de M�dia';
$TEXT['FILE_MODE'] = 'Modo de Arquivo';
$TEXT['USER'] = 'Usu�rio';
$TEXT['OTHERS'] = 'Outros';
$TEXT['READ'] = 'Ler';
$TEXT['WRITE'] = 'Escrever';
$TEXT['EXECUTE'] = 'Executar';
$TEXT['SMART_LOGIN'] = 'Login Inteligente';
$TEXT['REMEMBER_ME'] = 'Lembrar-me';
$TEXT['FILESYSTEM_PERMISSIONS'] = 'Permiss�es de Sistema de Arquivos';
$TEXT['DIRECTORIES'] = 'Diret�rios';
$TEXT['DIRECTORY_MODE'] = 'Modo de Diret�rio';
$TEXT['LIST_OPTIONS'] = 'Op��es de Lista';
$TEXT['OPTION'] = 'Op��o';
$TEXT['ALLOW_MULTIPLE_SELECTIONS'] = 'Permitir Multipla Sele��o';
$TEXT['TEXTFIELD'] = 'Textfield'; //needs to be translated
$TEXT['TEXTAREA'] = 'Textarea'; //needs to be translated
$TEXT['SELECT_BOX'] = 'Select Box'; //needs to be translated
$TEXT['CHECKBOX_GROUP'] = 'Checkbox Group'; //needs to be translated
$TEXT['RADIO_BUTTON_GROUP'] = 'Radio Button Group'; //needs to be translated
$TEXT['SIZE'] = 'Tamanho';
$TEXT['DEFAULT_TEXT'] = 'Testo Padr�o';
$TEXT['SEPERATOR'] = 'Separador';
$TEXT['BACK'] = 'Volta';
$TEXT['UNDER_CONSTRUCTION'] = 'Em Constru��o';
$TEXT['MULTISELECT'] = 'Multipla-Sele��o';
$TEXT['SHORT_TEXT'] = 'Texto Curto';
$TEXT['LONG_TEXT'] = 'Texto Longo';
$TEXT['HOMEPAGE_REDIRECTION'] = 'Redirecionamento de P�gina';
$TEXT['HEADING'] = 'Cabe�alho';
$TEXT['MULTIPLE_MENUS'] = 'M�ltiplos Menus';
$TEXT['REGISTERED'] = 'Registrado';
$TEXT['START'] = 'In�cio';
$TEXT['SECTION_BLOCKS'] = 'Section Blocks'; //needs to be translated
$TEXT['REGISTERED_VIEWERS'] = 'Registered Viewers'; //needs to be translated
$TEXT['ALLOWED_VIEWERS'] = 'Allowed Viewers'; //needs to be translated
$TEXT['SUBMISSION_ID'] = 'Submission ID'; //needs to be translated
$TEXT['SUBMISSIONS'] = 'Submiss�es';
$TEXT['SUBMITTED'] = 'Submetido';
$TEXT['MAX_SUBMISSIONS_PER_HOUR'] = 'Max. Submiss�es por Hora';
$TEXT['SUBMISSIONS_STORED_IN_DATABASE'] = 'Submiss�es armazenadas no banco de dados';
$TEXT['EMAIL_ADDRESS'] = 'Endre�or de Email';
$TEXT['CUSTOM'] = 'Pr�prio';
$TEXT['ANONYMOUS'] = 'An�nimo';
$TEXT['SERVER_OPERATING_SYSTEM'] = 'Sistema Operacional do Servidor';
$TEXT['WORLD_WRITEABLE_FILE_PERMISSIONS'] = 'World-writeable file permissions'; //needs to be translated
$TEXT['LINUX_UNIX_BASED'] = 'Linux/Unix based'; //needs to be translated
$TEXT['WINDOWS'] = 'Windows'; //needs to be translated
$TEXT['HOME_FOLDER'] = 'Home Folder'; //needs to be translated
$TEXT['HOME_FOLDERS'] = 'Home Folders'; //needs to be translated
$TEXT['PAGE_TRASH'] = 'Page Trash'; //needs to be translated
$TEXT['INLINE'] = 'In-line'; //needs to be translated
$TEXT['SEPARATE'] = 'Separado';
$TEXT['DELETED'] = 'Apagado';
$TEXT['VIEW_DELETED_PAGES'] = 'Exibir P�ginas Exclu�das';
$TEXT['EMPTY_TRASH'] = 'Esvaziar Lixeira';
$TEXT['TRASH_EMPTIED'] = 'Lixiera Vazia';
$TEXT['ADD_SECTION'] = 'Adicionar Sess�o';
$TEXT['POST_HEADER'] = 'Cabe�alho do Post';
$TEXT['POST_FOOTER'] = 'Rodap� do Post';
$TEXT['POSTS_PER_PAGE'] = 'Posts por P�gina';
$TEXT['RESIZE_IMAGE_TO'] = 'Redimensionar Imagem Para';
$TEXT['UNLIMITED'] = 'Ilimitado';
$TEXT['OF'] = 'de';
$TEXT['OUT_OF'] = 'Out Of'; //needs to be translated
$TEXT['NEXT'] = 'Pr�ximo';
$TEXT['PREVIOUS'] = 'Anterior';
$TEXT['NEXT_PAGE'] = 'Pr�xima P�gina';
$TEXT['PREVIOUS_PAGE'] = 'P�gina Anterior';
$TEXT['ON'] = 'On'; //needs to be translated
$TEXT['LAST_UPDATED_BY'] = '�ltima atualiza��o por';
$TEXT['RESULTS_FOR'] = 'Resultados para';
$TEXT['TIME'] = 'Hora';
$TEXT['WYSIWYG_STYLE'] = 'WYSIWYG Style'; //needs to be translated
$TEXT['WYSIWYG_EDITOR'] = "WYSIWYG Editor"; //needs to be translated
$TEXT['SERVER_EMAIL'] = 'Servidor de Email';
$TEXT['MENU'] = 'Menu'; //needs to be translated
$TEXT['MANAGE_GROUPS'] = 'Gerenciar Grupos';
$TEXT['MANAGE_USERS'] = 'Gerenciar Usu�rios';
$TEXT['PAGE_LANGUAGES'] = 'Idioma da P�gina';
$TEXT['HIDDEN'] = 'Oculto';
$TEXT['MAIN'] = 'Principal';
$TEXT['RENAME_FILES_ON_UPLOAD'] = 'Renomear Arquivos ao Enviar';
$TEXT['APP_NAME'] = 'Nome da Aplica��o';
$TEXT['SESSION_IDENTIFIER'] = 'Identificador de Sess�o';
$TEXT['BACKUP'] = 'Backup'; //needs to be translated
$TEXT['RESTORE'] = 'Restaurar';
$TEXT['BACKUP_DATABASE'] = 'Backup do Banco de Dados';
$TEXT['RESTORE_DATABASE'] = 'Restaurar Banco de Dados';
$TEXT['BACKUP_ALL_TABLES'] = 'Backup de Todas as Tabelas no Banco de Dados';
$TEXT['BACKUP_WB_SPECIFIC'] = 'Backup somente tabelas espec�ficas';
$TEXT['BACKUP_MEDIA'] = 'Backup M�dia';
$TEXT['RESTORE_MEDIA'] = 'Restaurar M�dia';
$TEXT['ADMINISTRATION_TOOL'] = 'Ferramenta de Administra��o';
$TEXT['CAPTCHA_VERIFICATION'] = 'Verifica��o Captcha';
$TEXT['VERIFICATION'] = 'Verifica��o';
$TEXT['DEFAULT_CHARSET'] = 'Codifica��o Padr�o';
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
$MESSAGE['FRONTEND']['SORRY_NO_VIEWING_PERMISSIONS'] = 'Desculpe, voc� n�o tem permiss�o para ver essa p�gina';
$MESSAGE['FRONTEND']['SORRY_NO_ACTIVE_SECTIONS'] = 'Sorry, no active content to display'; //needs to be translated

$MESSAGE['ADMIN']['INSUFFICIENT_PRIVELLIGES'] = 'Privil�gios Insuficientes para estar aqui';

$MESSAGE['LOGIN']['BOTH_BLANK'] = 'Favor inserir usu�rio e senha abaixo';
$MESSAGE['LOGIN']['USERNAME_BLANK'] = 'Favor Inserir o usu�rio';
$MESSAGE['LOGIN']['PASSWORD_BLANK'] = 'Favor Inserir a senha';
$MESSAGE['LOGIN']['USERNAME_TOO_SHORT'] = 'O usu�rio fornecido � curto demais';
$MESSAGE['LOGIN']['PASSWORD_TOO_SHORT'] = 'A senha fornecida � curta demais';
$MESSAGE['LOGIN']['USERNAME_TOO_LONG'] = 'O usu�rio fornecido � longo demais';
$MESSAGE['LOGIN']['PASSWORD_TOO_LONG'] = 'A senha fornecida � longa demais';
$MESSAGE['LOGIN']['AUTHENTICATION_FAILED'] = 'Usu�rio ou senha incorretos';

$MESSAGE['SIGNUP']['NO_EMAIL'] = 'Voc� precisa informar um endere�o de email';

$MESSAGE['FORGOT_PASS']['NO_DATA'] = 'Favor inserir seu email abaixo';
$MESSAGE['FORGOT_PASS']['EMAIL_NOT_FOUND'] = 'O email informado n�o pode ser encontrado no banco de dados';
$MESSAGE['FORGOT_PASS']['CANNOT_EMAIL'] = 'N�o foi poss�vel enviar a senha, favor contatar o administrador do sistema';
$MESSAGE['FORGOT_PASS']['PASSWORD_RESET'] = 'Seu usu�rio e senha foram enviados para seu endere�o de email';
$MESSAGE['FORGOT_PASS']['ALREADY_RESET'] = 'A senha n�o pode ser redefinida mais de uma vez por hora, desculpe';

$MESSAGE['START']['WELCOME_MESSAGE'] = 'Bem-Vindo � Administra��o do Website Baker';
$MESSAGE['START']['INSTALL_DIR_EXISTS'] = 'Aviso, O diret�rio "INSTALL" ainda existe!';
$MESSAGE['START']['CURRENT_USER'] = 'Voc� est� logado como:';

$MESSAGE['SETTINGS']['UNABLE_OPEN_CONFIG'] = 'N�o foi possivel abrir o arquivo de configura��o';
$MESSAGE['SETTINGS']['UNABLE_WRITE_CONFIG'] = 'N�o foi possivel gravar no aquivo de configura��o';
$MESSAGE['SETTINGS']['SAVED'] = 'Altera��es armazenadas com sucesso';
$MESSAGE['SETTINGS']['MODE_SWITCH_WARNING'] = 'Aten��o: Pressionando esse bot�o, todas as altera��es n�o salvas, ser�o perdidas';
$MESSAGE['SETTINGS']['WORLD_WRITEABLE_WARNING'] = 'Aten��o: Somente recomendado para ambientes de teste';

$MESSAGE['USERS']['ADDED'] = 'Usu�rio adicionado com sucesso';
$MESSAGE['USERS']['SAVED'] = 'Usu�rio armazenado com sucesso';
$MESSAGE['USERS']['DELETED'] = 'Usu�rio apagado com sucesso';
$MESSAGE['USERS']['NO_GROUP'] = 'Nenhum grupo selecionado';
$MESSAGE['USERS']['USERNAME_TOO_SHORT'] = 'O usu�rio fornecido � curto demais';
$MESSAGE['USERS']['PASSWORD_TOO_SHORT'] = 'A senha fornecida � curta demais';
$MESSAGE['USERS']['PASSWORD_MISMATCH'] = 'As senhas fornecidas n�o conferem';
$MESSAGE['USERS']['INVALID_EMAIL'] = 'O email fornecido � inv�lido';
$MESSAGE['USERS']['EMAIL_TAKEN'] = 'O endere�o de email informado j� est� sendo utilizado';
$MESSAGE['USERS']['USERNAME_TAKEN'] = 'O usu�rio informado j� est� sendo utilizado';
$MESSAGE['USERS']['CHANGING_PASSWORD'] = 'Aten��o: Voc� deve preencher os campos abaixo se deseja alterar a senha';
$MESSAGE['USERS']['CONFIRM_DELETE'] = 'Voc� tem certeza que deseja apagar o usu�rio selecionado?';

$MESSAGE['GROUPS']['ADDED'] = 'Grupo adicionado com sucesso';
$MESSAGE['GROUPS']['SAVED'] = 'Grupo armazenado com sucesso';
$MESSAGE['GROUPS']['DELETED'] = 'Grupo apagado com sucesso';
$MESSAGE['GROUPS']['GROUP_NAME_BLANK'] = 'O nome do grupo est� em branco';
$MESSAGE['GROUPS']['CONFIRM_DELETE'] = 'Voc� tem certeza que deseja apagar o grupo selecionado (e usu�rios pertencentes ao grupo)?';
$MESSAGE['GROUPS']['NO_GROUPS_FOUND'] = 'N�o foram encotrados grupos';
$MESSAGE['GROUPS']['GROUP_NAME_EXISTS'] = 'Nome do Grupo j� existe';

$MESSAGE['PREFERENCES']['DETAILS_SAVED'] = 'Detalhes armazenados  com sucesso';
$MESSAGE['PREFERENCES']['EMAIL_UPDATED'] = 'Email atualizado com sucesso';
$MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'] = 'A senha(atual) informada n�o est� correta';
$MESSAGE['PREFERENCES']['PASSWORD_CHANGED'] = 'Senha alterada com sucesso';

$MESSAGE['TEMPLATES']['CHANGE_TEMPLATE_NOTICE'] = 'Aten��o: para alterar o tema (template) voc� precisa ir at� a sess�o Configura��es';

$MESSAGE['MEDIA']['DIR_DOT_DOT_SLASH'] = 'N�o foi poss�vel incluir ../ no nome da pasta';
$MESSAGE['MEDIA']['DIR_DOES_NOT_EXIST'] = 'Diret�rio n�o existe';
$MESSAGE['MEDIA']['TARGET_DOT_DOT_SLASH'] = 'N�o pode possuir ../ na pasta alvo';
$MESSAGE['MEDIA']['NAME_DOT_DOT_SLASH'] = 'N�o foi possivel incluir ../ no nome';
$MESSAGE['MEDIA']['NAME_INDEX_PHP'] = 'N�o � possivel usar index.php como nome';
$MESSAGE['MEDIA']['NONE_FOUND'] = 'Nenhuma arquivo de m�dia encontrado na pasta atual';
$MESSAGE['MEDIA']['FILE_NOT_FOUND'] = 'Arquivo n�o encontrado';
$MESSAGE['MEDIA']['DELETED_FILE'] = 'Arquivo apagado com sucesso';
$MESSAGE['MEDIA']['DELETED_DIR'] = 'Pasta apagada com sucesso';
$MESSAGE['MEDIA']['CONFIRM_DELETE'] = 'Tem certeza que deseja apagar o seguinte arquivo ou pasta?';
$MESSAGE['MEDIA']['CANNOT_DELETE_FILE'] = 'N�o foi poss�vel apagar o arquivo selecionado';
$MESSAGE['MEDIA']['CANNOT_DELETE_DIR'] = 'N�o foi poss�vel apagar a pasta selecionada';
$MESSAGE['MEDIA']['BLANK_NAME'] = 'Voc� n�o inseriu um nome novo';
$MESSAGE['MEDIA']['BLANK_EXTENSION'] = 'Voc� n�o inseriou uma extens�o de arquivo';
$MESSAGE['MEDIA']['RENAMED'] = 'Renomeado com sucesso';
$MESSAGE['MEDIA']['CANNOT_RENAME'] = 'Erro ao Renomear';
$MESSAGE['MEDIA']['FILE_EXISTS'] = 'Um arquivo com esse nome j� existe';
$MESSAGE['MEDIA']['DIR_EXISTS'] = 'Uma pasta com esse nome j� existe';
$MESSAGE['MEDIA']['DIR_MADE'] = 'Pasta criada com sucesso';
$MESSAGE['MEDIA']['DIR_NOT_MADE'] = 'N�o foi poss�vel criar a pasta';
$MESSAGE['MEDIA']['SINGLE_UPLOADED'] = ' arquivo enviado com sucesso';
$MESSAGE['MEDIA']['UPLOADED'] = ' arquivos enviados com sucesso';

$MESSAGE['PAGES']['ADDED'] = 'P�gina adicionada com sucesso';
$MESSAGE['PAGES']['ADDED_HEADING'] = 'Cabe�alho da P�gina adicionado com sucesso.';
$MESSAGE['PAGES']['PAGE_EXISTS'] = 'Uma p�gina com o mesmo nome ou similar j� existe';
$MESSAGE['PAGES']['CANNOT_CREATE_ACCESS_FILE'] = 'Erro ao criar o arquivo no diret�rio /pages (Privil�gios Insuficientes)';
$MESSAGE['PAGES']['CANNOT_DELETE_ACCESS_FILE'] = 'Erro ao apagar o arquivo no diret�rio /pages (Privil�gios Insuficientes)';
$MESSAGE['PAGES']['NOT_FOUND'] = 'P�gina n�o encontrada';
$MESSAGE['PAGES']['SAVED'] = 'P�gina armazenada com sucesso';
$MESSAGE['PAGES']['SAVED_SETTINGS'] = 'Configura��es de P�gina armazenadas com sucesso';
$MESSAGE['PAGES']['NOT_SAVED'] = 'Erro ao armazenar a p�gina';
$MESSAGE['PAGES']['DELETE_CONFIRM'] = 'Tem certeza que deseja apagar a p�gina selecionada(e todas as suas sub-p�ginas)';
$MESSAGE['PAGES']['DELETED'] = 'P�gina apagada com sucesso';
$MESSAGE['PAGES']['RESTORED'] = 'Pagina Restaurada com sucesso';
$MESSAGE['PAGES']['BLANK_PAGE_TITLE'] = 'Favor Inserir T�tulo da P�gina';
$MESSAGE['PAGES']['BLANK_MENU_TITLE'] = 'Favor Inserir T�tulo do Menu';
$MESSAGE['PAGES']['REORDERED'] = 'Re-ordena��o feita com sucesso';
$MESSAGE['PAGES']['CANNOT_REORDER'] = 'Erro na re-ordena��o da p�gina';
$MESSAGE['PAGES']['INSUFFICIENT_PERMISSIONS'] = 'Voc� n�o tem permiss�o para Modificar essa p�gina';
$MESSAGE['PAGES']['INTRO_NOT_WRITABLE'] = 'N�o foi poss�vel gravar o arquivo /pages/intro.php (Privil�gios Insuficientes)';
$MESSAGE['PAGES']['INTRO_SAVED'] = 'P�gina de Introdu��o armazenada com sucesso';
$MESSAGE['PAGES']['LAST_MODIFIED'] = '�ltima modifica��o por';
$MESSAGE['PAGES']['INTRO_LINK'] = 'Clique AQUI para modificar a P�gina de Introdu��o';
$MESSAGE['PAGES']['SECTIONS_PROPERTIES_SAVED'] = 'Propriedades da Sess�o foram armazenadas com sucesso';
$MESSAGE['PAGES']['RETURN_TO_PAGES'] = 'Retornar � P�ginas';

$MESSAGE['GENERIC']['FILL_IN_ALL'] = 'Favor retornar e preencher todos os campos';
$MESSAGE['GENERIC']['FILE_TYPE'] = 'O arquivo a ser enviado precisa ser do seguinte formato:';
$MESSAGE['GENERIC']['FILE_TYPES'] = 'O arquivo a ser enviado precisa ser de algum dos seguintes formatos:';
$MESSAGE['GENERIC']['CANNOT_UPLOAD'] = 'N�o foi poss�vel enviar o arquivo';
$MESSAGE['GENERIC']['ALREADY_INSTALLED'] = 'J� est� instalado';
$MESSAGE['GENERIC']['NOT_INSTALLED'] = 'N�o Instalado';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL'] = 'N�o foi poss�vel desinstalar';
$MESSAGE['GENERIC']['CANNOT_UNZIP'] = 'N�o foi poss�vel descompactar';
$MESSAGE['GENERIC']['INSTALLED'] = 'Instalado com Sucesso';
$MESSAGE['GENERIC']['UPGRADED'] = 'Atualizado com Sucesso';
$MESSAGE['GENERIC']['UNINSTALLED'] = 'Desinstalado com Sucesso';
$MESSAGE['GENERIC']['BAD_PERMISSIONS'] = 'N�o foi poss�vel gravar no diret�rio de destino';
$MESSAGE['GENERIC']['INVALID'] = 'O arquivo enviado � inv�lido';
$MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE'] = 'N�o foi poss�vel desinstalar: O arquivo selecionado est� em uso';
$MESSAGE['GENERIC']['WEBSITE_UNDER_CONSTRUCTION'] = 'Website Em Constru��o';
$MESSAGE['GENERIC']['PLEASE_CHECK_BACK_SOON'] = 'Favor retornar em breve...';
$MESSAGE['GENERIC']['PLEASE_BE_PATIENT'] = 'Aguarde, isso pode levar algum tempo.';
$MESSAGE['GENERIC']['ERROR_OPENING_FILE'] = 'Erro ao abrir o arquivo.';

$MESSAGE['MOD_FORM']['REQUIRED_FIELDS'] = 'Voc� precisa preencher os seguintes campos';
$MESSAGE['MOD_FORM']['EXCESS_SUBMISSIONS'] = 'Desculpe, este formul�rio foi submetido v�rias vezes nessa hora. Favor tentar novamente dentro de uma hora.';
$MESSAGE['MOD_FORM']['INCORRECT_CAPTCHA'] = 'O N�mero de Verifica��o (conhecido como Captcha) que voc� entrou, � inv�lido. Se estiver tendo problemas usando o Captcha, envie uma mensagem para: '.SERVER_EMAIL;

$MESSAGE['MOD_RELOAD']['PLEASE_SELECT'] = 'Favor selecionar quais add-ons deseja recarregar';
$MESSAGE['MOD_RELOAD']['MODULES_RELOADED'] = 'M�dulos recarregados com sucesso';
$MESSAGE['MOD_RELOAD']['TEMPLATES_RELOADED'] = 'Temas (Templates) recarregados com sucesso';
$MESSAGE['MOD_RELOAD']['LANGUAGES_RELOADED'] = 'Idiomas recarregados com sucesso';
?>