<?php
require_once "./app/config/config.php";
class DbHelper
{

    public static function connect_db()
    {
        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASS);
            return $conn;
        } catch (PDOException $e) {
            $conn = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
            $sql = "CREATE DATABASE " . DB_NAME;
            $conn->exec($sql);

            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASS);

        }
    }
}    
