<?php


class EmployeeDB
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM employees";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $employee = new Employee($result['emp_id'], $result['emp_name'], $result['email'], $result['phone'], $result['address'], $result['position']);
    }




}