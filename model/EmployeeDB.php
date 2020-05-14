<?php


class EmployeeDB
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($employee)
    {
        $sql = "INSERT INTO employee VALUES(null ,? ,?,?,?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $employee->getName());
        $statement->bindParam(2, $employee->getEmail());
        $statement->bindParam(3, $employee->getPhone());
        $statement->bindParam(4, $employee->getAddress());
        $statement->bindParam(5, $employee->getGender());
        $statement->bindParam(6, $employee->getPosition());
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM employees";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $employees = [];
        foreach ($result as $item) {
            $employee = new Employee($item['emp_name'], $item['gender'], $item['email'], $item['phone'], $item['address'], $item['pos_id']);
            $employee->setEmployeeId($item['emp_id']);
            $employees[] = $employee;
        }
        return $employees;
    }
}