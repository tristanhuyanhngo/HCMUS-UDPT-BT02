<?php
class TaskModel
{
    public function getTasksList() {
        return [
            'Task 1',
            'Task 2'
        ];
    }
    public function getDetailTask($id) {
        $data = [
            'Task 1',
            'Task 2',
            'Task 3'
        ];
        return $data[$id];
    }
}