<?php
//// Lấy yêu cầu hiện tại
//use app\controllers\CategoryController;
//use app\controllers\TaskController;
//
//$request = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
//$requestParts = explode('/', $request);
//
//// Xử lý routing và điều phối yêu cầu
//switch ($requestParts[1]) {
//    case '/':
//        // Trang chủ
//        require './views/index.php';
//        break;
//    case '/tasks':
//        // Danh sách công việc
//        require './controllers/TaskController.php';
//        $controller = new TaskController();
//        break;
//    case '/categories':
//        // Danh sách danh mục
//        require 'controllers/CategoryController.php';
//        $controller = new CategoryController();
//        $controller->index();
//        break;
//    default:
//        // Trang không tồn tại (404)
//        http_response_code(404);
//        echo 'Error 404: Page not found';
//        break;
//}
//
session_start();
require_once 'bootstrap.php';
$app = new App();

