<?php
$routes['default_controller'] = 'home';
/*
 * Duong dan ao => Duong dan that
 */
$routes['cong-viec'] = 'task/index';
$routes['trang-chu'] = 'home';
$routes['tin-tuc/.+-(\d+).html'] = 'news/category/$1';
?>