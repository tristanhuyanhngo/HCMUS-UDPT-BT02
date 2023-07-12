<?php
const __DIR_ROOT = __DIR__;

// HTTP Root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}

/*
 * Tu dong load configs
 * */
$configs_dir = scandir('configs');
if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/'.$item)) {
            require_once 'configs/'.$item;
        }
    }
}
require_once 'core/Route.php'; // Load Route Class
require_once 'app/App.php'; // Load app
// Kiem tra config va load db
if (!empty($config['database'])) {
    $db_config = array_filter($config['database']);
    if (!empty($db_config)) {
        require_once 'core/Connection.php';
        require_once 'core/Database.php';
    }
}
require_once 'core/Model.php'; // Load model
require_once 'core/Controller.php'; // Load base controller