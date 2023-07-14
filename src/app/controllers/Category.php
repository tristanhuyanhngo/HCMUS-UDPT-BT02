<?php

class Category extends Controller
{
    public $data = [];
    public function index() {
        $this->listCategories();
    }

    public function listCategories() {
        $category = $this->model('CategoryModel');
        $dataCategory = $category->getAll();

        $title = 'Categories';

        $this->data['sub_content']['category_list'] = $dataCategory;
        $this->data['sub_content']['category_title'] = $title;
        $this->data['content'] = 'categories/list';

        $this->render('layouts/user_layout', $this->data);
    }

    public function delete($categoryId)
    {
        $categoryModel = $this->model('CategoryModel');

        // Kiểm tra xem category có thể bị xóa hay không
        if ($categoryModel->canDeleteCategory($categoryId)) {
            // Xóa category từ cơ sở dữ liệu
            $result = $categoryModel->deleteCategory($categoryId);

            if ($result) {
                // Xóa thành công, chuyển hướng về trang danh sách category
                header('Location: /category');
                exit();
            } else {
                // Xóa không thành công, hiển thị thông báo lỗi
                echo 'Error deleting category.';
            }
        } else {
            // Category không thể xóa, hiển thị thông báo
            echo 'Cannot delete category as it is referenced by multiple tasks.';
        }
    }
}