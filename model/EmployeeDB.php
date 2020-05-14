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
        $employees = [];
        foreach ($result as $item) {
            $employee = new Employee($item['emp_name'],$item['gender'], $item['email'], $item['phone'], $item['address'], $item['pos_id']);
            $employee->setEmployeeId($item['emp_id']);
            $employees[] = $employee;
        }
        return $employees;
    }
}