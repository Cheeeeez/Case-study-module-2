<?php


class UserController
{
    public $userDB;

    public function __construct()
    {
        $conn = new DBConnection("mysql:host=localhost;dbname=case_study", "root", "Abc123456@");
        $this->userDB = new UserDB($conn->connect());
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $result = $this->userDB->get($username, $password);
            if ($result) {
                $_SESSION['user'] = $result;
                header('Location: ./');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: ./');
    }
}