<?php
require_once 'app/models/CategoryModel.php';

class Task extends Controller {
    public $data = [];
    public function index() {
        $this->listTasks();
    }

    public function listTasks() {
        $task = $this->model('TaskModel');
        $dataTask = $task->getAllWithCategory();

        $title = 'Tasks';

        $this->data['sub_content']['task_list'] = $dataTask;
        $this->data['sub_content']['task_title'] = $title;
        $this->data['content'] = 'tasks/list';

        $this->render('layouts/user_layout', $this->data);
    }

    public function detail($id=0) {
        $task = $this->model('TaskModel');
        // Muốn gửi dữ liệu từ Controller sang bên View thông qua
        // layout thì phải thêm dạng mảng 2 chiều
        $dataTask = $task->getDetailTask($id);

        $title = 'Detail Task';

        $this->data['sub_content']['task_title'] = $title;
        $this->data['sub_content']['task_detail'] = $dataTask;
        $this->data['content'] = 'tasks/detail';

        $this->render('layouts/user_layout', $this->data);
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy giá trị task_id từ request POST
            $taskId = $_POST['task_id'];

            // Gọi phương thức xóa task trong model (TaskModel) dựa trên taskId
            $taskModel = $this->model('TaskModel');
            $taskModel->deleteTask($taskId);

            // Chuyển hướng người dùng trở lại trang danh sách task
            header('Location: /task');
            exit();
        }
    }

    public function edit($id) {
        $task = $this->model('TaskModel');
        $dataTask = $task->getDetailTask($id);

        $title = 'Edit Task';

        $this->data['sub_content']['task_title'] = $title;
        $this->data['sub_content']['task'] = $dataTask;
        $this->data['content'] = 'tasks/edit';

        $this->render('layouts/user_layout', $this->data);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ request POST
            $taskId = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $startDate = $_POST['start_date'];
            $dueDate = $_POST['due_date'];
            $finishedDate = $_POST['finished_date'];
            $category = $_POST['category'];

            // Cập nhật công việc trong model (TaskModel)
            $taskModel = $this->model('TaskModel');
            $taskModel->updateTask($taskId, $name, $description, $status, $startDate, $dueDate, $finishedDate, $category);

            // Chuyển hướng người dùng trở lại trang danh sách công việc
            header('Location: /task');
            exit();
        }
    }

    public function deleteAll()
    {
        // Gọi đến Model để xóa tất cả các task
        $taskModel = $this->model('TaskModel');
        $result = $taskModel->deleteAllTasks();

        if ($result) {
            // Xóa thành công, trả về response thành công
            http_response_code(200);
        } else {
            // Xóa thất bại, trả về response lỗi
            http_response_code(500);
        }
    }

    public function add() {
        $title = 'Add Task';
        $this->data['content'] = 'tasks/add';
        $this->data['sub_content']['task_title'] = $title;
        $this->render('layouts/user_layout', $this->data);
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ request POST
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $startDate = $_POST['start_date'];
            $dueDate = $_POST['due_date'];
            $finishedDate = $_POST['finished_date'];
            $category = $_POST['category'];

            // Tạo instance của TaskModel
            $taskModel = $this->model('TaskModel');

            // Thêm task vào database
            $taskId = $taskModel->addTask($name, $description, $status, $startDate, $dueDate, $finishedDate, $category);

            if ($taskId) {
                // Chuyển hướng người dùng đến trang danh sách task
                header('Location: /task');
                exit();
            } else {
                // Xử lý lỗi nếu có
                echo 'Error adding task.';
            }
        } else {
            // Hiển thị view để người dùng nhập thông tin task
            $task_title = 'Add Task';
            $task = array(); // Khởi tạo mảng task rỗng
            $this->view('add', compact('task_title', 'task'));
        }
    }

}

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';