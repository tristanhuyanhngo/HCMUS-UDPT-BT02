<?php
class Home extends Controller {
    public $model_home;

    public function __construct() {
        $this->model_home = $this->model('HomeModel');
    }

    public function index() {
        $data = $this->model_home->getList();
        echo '<pre>';
        print_r($data);
        echo '</pre>';

        $detail = $this->model_home->getDetail(0);
        echo '<pre>';
        print_r($detail);
        echo '</pre>';
    }
}