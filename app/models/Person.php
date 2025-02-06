<?php
    class Person {
        protected $id;
        protected $fullName;
        protected $username;
        protected $email;
        protected $password;
        protected $role;
        private $conn;

        public function __construct($id = "", $fullName = "", $username = "", $email = "", $password = "", $role = "")
        {
            $this->conn = Database::connect();
            $this->id = $id;
            $this->fullName = $fullName;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->role = $role;
        }

        public function getId() {
            return $this->id;
        }

        public function getFullName() {
            return $this->fullName;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getRole() {
            return $this->role;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setFullName($fullName) {
            $this->fullName = $fullName;
        }

        public function setUsername($username) {
            $this->username = $username;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function setRole($role) {
            $this->role = $role;
        }
        
        public function create() {
            $sql = "INSERT INTO users(fullName, username, email, password, role) VALUES(?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $this->fullName, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->username, PDO::PARAM_STR);
            $stmt->bindValue(3, $this->email, PDO::PARAM_STR);
            $stmt->bindValue(4, $this->password, PDO::PARAM_STR);
            $stmt->bindValue(5, $this->role, PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function checkEmailExist() {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $this->email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    }
?>