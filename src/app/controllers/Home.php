<?php
class Home extends Controller {
    public $model_home;

    public function __construct() {
        $this->model_home = $this->model('HomeModel');
    }

    public function index() {
        $this->render('home/home');
    }
}