<?php

class HomeModel {
    protected $_table = 'products';

    public function getList(){
        return [
            'Item 1',
            'Item 2',
            'Item 3'
        ];
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