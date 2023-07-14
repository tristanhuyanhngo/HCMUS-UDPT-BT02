<?php
class CategoryModel extends Model {
    private $__table = 'category';

    public function getAll(){
        $data = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function canDeleteCategory($categoryId)
    {
        // Thực hiện truy vấn để đếm số lượng công việc tham chiếu đến category
        $sql = "SELECT COUNT(*) FROM $this->__table WHERE id = :categoryId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        // Kiểm tra số lượng công việc tham chiếu
        if ($count > 0) {
            return false; // Không thể xóa category
        }

        return true; // Có thể xóa category
    }
    

    public function deleteCategory($categoryId)
    {
        $sql = "DELETE FROM $this->__table WHERE id = :categoryId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId);
        return $stmt->execute();
    }
}