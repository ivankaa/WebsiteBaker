<?php

error_reporting(E_ALL);

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'wb');
define('TABLE_PREFIX', 'test');

define('WB_PATH', dirname(__FILE__));
define('WB_URL', 'http://localhost/wbsvn/wb');
define('ADMIN_PATH', WB_PATH.'/admin');
define('ADMIN_URL', 'http://localhost/wbsvn/wb/admin');

require_once(WB_PATH.'/framework/initialize.php');

?>