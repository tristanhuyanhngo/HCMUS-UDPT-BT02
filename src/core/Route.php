<?php
class Route {
    function __construct() {
        echo 'Route';
    }
    function handleRoute() {
        global $routes;
        unset($routes['default_controller']);
    }
}