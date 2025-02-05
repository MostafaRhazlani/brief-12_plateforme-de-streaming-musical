<?php
    class Database {
        public static function connect() {
            $conn = new PDO("pgsql:host=localhost;dbname=musiqa", "postgres", "password");
            return $conn;
        }
    }


?>