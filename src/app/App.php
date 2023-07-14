<?php
class App {
    private $__controller, $__action, $__params, $__routes;

    static public $app;
    function __construct() {

        global $routes, $config;

        self::$app = $this;

        $this->__routes = new Route();

        if (!empty($routes['default_controller'])) {
            $this->__controller = $routes['default_controller'];
        }
        $this->__action = 'index';
        $this->__params = [];

        $this->handleUrl();

//        echo '<pre>';
//        print_r($config);
//        echo '</pre>';
    }

    function getUrl() {
        if (!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }

    public function handleUrl() {
        $url = $this->getUrl();

        $url = $this->__routes->handleRoute($url);

        // echo $url;

        $urlArray = array_filter(explode('/',$url));
        $urlArray = array_values($urlArray);

        // Controllers process
        if (!empty($urlArray[0])) {
            $this->__controller = ucfirst($urlArray[0]);
        } else {
            $this->__controller = ucfirst($this->__controller);
        }

        if (file_exists('app/controllers/'.($this->__controller).'.php')){
            require_once 'controllers/'.($this->__controller).'.php';
            // Check if $this->__controller is existed
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArray[0]);
            } else {
                $this->loadError();
            }

        } else {
            $this->loadError();
        }

        // Action process
        if (!empty($urlArray[1])) {
            $this->__action = $urlArray[1];
            unset($urlArray[1]);
        }

        // Params process
        $this->__params = array_values($urlArray);
        // Check if method exist
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action],  $this->__params);
        } else {
            $this->loadError();
        }
        //        echo '<pre>';
        //        print_r($this->__params);
        //        echo '</pre>';
    }

    public function loadError($name='404', $data=[]) {
        extract($data);
        require_once 'errors/'.$name.'.php';
    }
}