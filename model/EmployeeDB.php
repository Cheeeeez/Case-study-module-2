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


    public function deleteById($id)
    {
        $sql = "DELETE FROM employees WHERE emp_id = ?";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }


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
        $employees = [];
        foreach ($result as $item) {
            $employee = new Employee($item['emp_name'], $item['gender'], $item['email'], $item['phone'],
                $item['address'], $item['pos_id']);
            $employee->setEmployeeId($item['emp_id']);
            $employees[] = $employee;
        }

    }
}






