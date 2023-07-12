<?php
class Connection {
    private static $instance = null, $conn = null;

    private function __construct($config) {
        // DB Connection
        try {
            // Cau hinh DSN
            $dsn = 'mysql:dbname='.$config['db'].';host='.$config['host'];

            // Cau hinh $options
            /*
             * - Cau hinh utf8
             * - Cau hinh ngoai le khi truy van loi
             * */
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            // Cau lenh ket noi
            $con = new PDO($dsn, $config['user'], $config['pass'], $options);
            self::$conn = $con;

        } catch (Exception $exception) {
            $mess = $exception->getMessage();

            die($mess);
//            if (preg_match('/Access denied for user/', $mess)) {
//                die('Loi ket noi co so du lieu');
//            }
//
//            if (preg_match('/Unknown database/', $mess)) {
//                die('Khong tim thay co so du lieu');
//            }
        }
    }

    public static function getInstance($config) {
        if (self::$instance === null) {
            $connection = new Connection($config);
            self::$instance =  self::$conn;
        }

        return self::$instance;
    }
}