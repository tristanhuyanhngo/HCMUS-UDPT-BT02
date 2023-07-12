<?php

class HomeModel extends Model {
    protected $_table = 'task';

//    function __construct() {
//        parent::__construct();
//    }

    public function getList(){
       $data = $this->db->query("SELECT * FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
       return $data;
    }

    public function getDetail($id) {
        $data = [
            'Item 1',
            'Item 2',
            'Item 3'
        ];
        return $data[$id];
    }
}