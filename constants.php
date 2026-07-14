<?php

$config = parse_ini_file(__DIR__ . '/config.ini');

define('APP_URL',  $config['APP_URL'] ?? 'localhost/user');
define('DB_HOST',  $config['DB_HOST'] ?? 'localhost');
define('DB_USER',  $config['DB_USER'] ?? 'root');
define('DB_PASS',  $config['DB_PASS'] ?? '');
define('DB_DATABASE',  $config['DB_DATABASE'] ?? 'user_permissions');
define('SESSION_FILES_PATH',  dirname(__DIR__) . "/user/public/session_files/");
define('AES_KEY',  $config['AES_KEY'] ?? '');
