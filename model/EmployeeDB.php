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
        $sql = "INSERT INTO employees VALUES(null ,? ,?,?,?,?,?)";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1, $employee->getName());
        $statement->bindParam(2, $employee->getEmail());
        $statement->bindParam(3, $employee->getPhone());
        $statement->bindParam(4, $employee->getAddress());
        $statement->bindParam(5, $employee->getGender());
        $statement->bindParam(6, $employee->getPosition());
        return $statement->execute();
    }

    //get element by id
    public function getByID($id)
    {
        $sql = "SELECT * FROM employees WHERE emp_id = ?";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $employee = new Employee($row['emp_name'], $row['email'], $row['phone'], $row['address'], $row['gender'],
            $row['pos_id']);
        $employee->emp_id = $row['emp_id'];
        return $employee;
    }

    //delete by id
    public function deleteById($id)
    {
        $sql = "DELETE FROM employees WHERE emp_id = ?";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    //update employee
    public function updateById($id, $employee)
    {
        $sql = "UPDATE employees SET emp_name = ?,email = ?,phone = ? ,address= ?, gender = ?,pos_id = ? WHERE emp_id = ?";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1, $employee->getName());
        $statement->bindParam(2, $employee->getEmail());
        $statement->bindParam(3, $employee->getPhone());
        $statement->bindParam(4, $employee->getAddress());
        $statement->bindParam(5, $employee->getGender());
        $statement->bindParam(6, $employee->getPosition());
        $statement->bindParam(7, $employee->$id);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM employees";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $employee = new Employee($result['emp_id'], $result['emp_name'], $result['email'], $result['phone'],
            $result['address'], $result['position']);
    }


}