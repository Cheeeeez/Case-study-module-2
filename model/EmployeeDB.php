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

    //get element by id




    public function getAll()
    {
        $sql = "SELECT * FROM employees";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $employee = new Employee($result['emp_id'], $result['emp_name'], $result['email'], $result['phone'], $result['address'], $result['position']);
    }





}