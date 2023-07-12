<?php
const __DIR_ROOT = __DIR__;

// HTTP Root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}

require_once 'configs/routes.php';
require_once 'core/Route.php';
require_once 'app/App.php'; // Load app
require_once 'core/Controller.php'; // Load base controller