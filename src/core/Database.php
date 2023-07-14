<?php

class PreparedStatement {
    private $__conn;
    private $__stmt;

    function __construct($conn, $sql) {
        $this->__conn = $conn;
        $this->__stmt = $this->__conn->prepare($sql);
    }

    function bindParam($param, &$variable) {
        $this->__stmt->bindParam($param, $variable);
    }

    function execute() {
        $this->__stmt->execute();
        return $this->__stmt;
    }

    function fetchColumn()
    {
        return $this->__stmt->fetch(PDO::FETCH_COLUMN);
    }
}

class Database {
    private $__conn;

    // Ket noi du lieu
    function __construct() {
        global $db_config;
        $this->__conn = Connection::getInstance($db_config);
    }

    // Them du lieu
    function insert($table, $data) {
        if (!empty($data)) {
            $fieldStr = '';
            $valueStr = '';
            foreach ($data as $key => $value) {
                $fieldStr.=$key.',';
                $valueStr.="'".$value."',";
            }
            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $table($fieldStr) VALUES ($valueStr)";

            $status = $this->query($sql);

            if ($status) {
                return true;
            }
        }
        return false;
    }

    // Update du lieu
    function update($table, $data, $condition='') {
        if (!empty($data)) {
            $updateStr = '';
            foreach ($data as $key => $value) {
                $updateStr.="$key='$value',";
            }

            $updateStr = rtrim($updateStr, ',');

            if (!empty($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            } else {
                $sql = "UPDATE $table SET $updateStr";
            }

            $status = $this->query($sql);

            if ($status) {
                return true;
            }
        }

        return false;
    }

    // Xoa du lieu
    function delete($table, $condition='') {
        if (!empty($condition)) {
            $sql = 'DELETE FROM '.$table.' WHERE '.$condition;
        } else {
            $sql = 'DELETE FROM '.$table;
        }

        $status = $this->query($sql);

        if ($status) {
            return true;
        }

        return false;
    }

    // Truy van cau lenh SQL
    function query($sql) {
        try {
            $statement = $this->__conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            $data['message'] = $mess;
            App::$app->loadError('database', $data);
            die();
        }
        return $statement;
    }

    // Tra ve ID moi nhat sau khi da Insert
    function lastInsertId() {
        return $this->__conn->lastInsertId();
    }

    function prepare($sql) {
        return new PreparedStatement($this->__conn, $sql);
    }
}