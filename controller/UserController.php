<?php


class UserController
{
    public $userDB;

    public function __construct()
    {
        $conn = new DBConnection("mysql:host=localhost;dbname=case_study", "root", "Khongba0.");
        $this->userDB = new UserDB($conn->connect());
    }

    public function login()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $result = $this->userDB->get($username, $password);
        if ($result) {
            $_SESSION['user'] = $result;
            header('Location: ../');
        }
    }

        public function logout()
        {
            unset($_SESSION['user']);
        }
    }