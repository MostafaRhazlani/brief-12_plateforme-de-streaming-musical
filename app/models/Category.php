<?php
    class Category {
        private $id;
        private $nameCategory;
        private $conn;

        public function __construct($id = "", $nameCategory = "")
        {
            $this->conn = Database::connect();
            $this->id = $id;
            $this->nameCategory = $nameCategory;
        }

        public function index() {
            $sql = "SELECT * FROM categories";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>