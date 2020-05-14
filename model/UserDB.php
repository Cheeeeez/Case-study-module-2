<?php


class UserDB
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        return $stmt->fetch();
    }
}