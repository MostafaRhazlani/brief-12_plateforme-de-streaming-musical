<?php
    class User {
        protected $id;
        protected $fullName;
        protected $username;
        protected $email;
        protected $password;
        protected $role;
        private $conn;

        public function __construct($id, $fullName, $username, $email, $password, $role)
        {
            $this->conn = Database::connect();
            $this->id = $id;
            $this->fullName = $fullName;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->role = $role;
        }
        
        public function checkUserExist() {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $this->conn, PDO::PARAM_STR);
        }
        
    }


?>