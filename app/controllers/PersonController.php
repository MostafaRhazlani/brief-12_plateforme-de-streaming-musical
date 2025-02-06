<?php 

    class PersonController extends Controller {
        private $userModel;
        private $errors;

        public function __construct()
        {
            $this->userModel = new Person;
            $this->errors = [];
        }

        public function createUser () {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->userModel->setFullName($_POST['fullName']);
                $this->userModel->setUsername($_POST['username']);
                $this->userModel->setEmail($_POST['email']);

                $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->userModel->setPassword($password_hash);
                $role = isset($_POST['role']) ? 'Artist' : 'User';
                $this->userModel->setRole($role);

                if(empty($this->userModel->getFullName()) || empty($this->userModel->getUsername()) || empty($this->userModel->getEmail()) || empty($this->userModel->getPassword())) {
                    $this->errors = 1;
                }

                if($this->userModel->checkEmailExist()) {
                    $this->errors = 1;
                }

                if(!password_verify($_POST['confirm_password'], $this->userModel->getPassword())) {
                    $this->errors = 1;
                }

                if(empty($this->errors)) {
                    $this->redirect('auth/login');
                    return $this->userModel->create();
                } else {
                    $this->redirect('auth/register');
                }
                
            }
        }
    }