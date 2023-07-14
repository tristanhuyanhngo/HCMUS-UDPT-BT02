<?php
class TaskModel extends Model {
    private $__table = 'task';

    public function getAll(){
        $sql = "SELECT * FROM {$this->__table}";
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getAllWithCategory() {
        $sql = "SELECT t.*, c.name as categoryName
        FROM $this->__table t
        JOIN category c ON t.category_id = c.id
        ORDER BY t.id";
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getDetailTask($id) {
        $sql = "SELECT * FROM $this->__table WHERE id = $id";
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getNumberOfRecords()
    {
        $sql = "SELECT count(*) as numberOfRecords FROM {$this->__table}";
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['numberOfRecords'];
    }


    public function deleteTask($id) {
        try {
            $sql = "DELETE FROM $this->__table WHERE id = $id";
            $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            echo "Task deleted successfully!";
            return true;
        } catch (PDOException $e) {
            echo "Error deleting task: " . $e->getMessage();
            return false;
        }
    }

    public function updateTask($taskId, $name, $description, $status, $startDate, $dueDate, $finishedDate, $category) {
        $sql = "UPDATE $this->__table SET name = :name, description = :description, status = :status, start_date = :start_date, due_date = :due_date, finished_date = :finished_date, category_id = :category_id WHERE id = :task_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':due_date', $dueDate);
        $stmt->bindParam(':finished_date', $finishedDate);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':task_id', $taskId);
        $stmt->execute();
    }

    public function deleteAllTasks() {
        $sql = "DELETE FROM $this->__table";
        $stmt = $this->db->query($sql);

        return $stmt->rowCount() > 0;
    }

    public function addTask($name, $description, $status, $startDate, $dueDate, $finishedDate, $category)
    {
        $sql = "INSERT INTO $this->__table (name, description, status, start_date, due_date, finished_date, category_id) VALUES (:name, :description, :status, :start_date, :due_date, :finished_date, :category)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':due_date', $dueDate);
        $stmt->bindParam(':finished_date', $finishedDate);
        $stmt->bindParam(':category', $category);

        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

}