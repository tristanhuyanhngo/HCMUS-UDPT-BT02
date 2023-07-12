<?php

class Task extends Controller {
    public $data = [];
    public function index() {
        $this->listTasks();
    }

    public function listTasks() {
        $task = $this->model('TaskModel');
        $dataTask = $task->getTasksList();

        $title = 'Danh sach task hom nay';

        $this->data['sub_content']['task_list'] = $dataTask;
        $this->data['sub_content']['task_title'] = $title;
        $this->data['page_title'] = $title;
        $this->data['content'] = 'tasks/list';

        // Render Views
        $this->render('layouts/user_layout', $this->data);
    }

    public function detailTask($id=0) {
        $task = $this->model('TaskModel');
        // Muốn gửi dữ liệu từ Controller sang bên View thông qua
        // layout thì phải thêm dạng mảng 2 chiều
        $this->data['sub_content']['description'] = $task->getDetailTask($id);
        $this->data['sub_content']['title'] = 'Chi tiet task';
        $this->data['page_title'] = 'Chi tiet task';
        $this->data['content'] = 'tasks/detail';
        // Render Views
        $this->render('layouts/user_layout', $this->data);
    }
}

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';