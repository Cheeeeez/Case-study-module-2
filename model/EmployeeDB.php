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
        $sql = "INSERT INTO employees VALUES(null, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->conn->prepare($sql);
        $name = $employee->getName();
        $email = $employee->getEmail();
        $phone = $employee->getPhone();
        $address = $employee->getAddress();
        $gender = $employee->getGender();
        $position = $employee->getPosition();
        $avatar = $employee->getAvatar();
        $statement->bindParam(1, $name);
        $statement->bindParam(2, $gender);
        $statement->bindParam(3, $email);
        $statement->bindParam(4, $phone);
        $statement->bindParam(5, $address);
        $statement->bindParam(6, $position);
        $statement->bindParam(7, $avatar);
        return $statement->execute();
    }

    public function getByID($id)
    {
        $sql = "SELECT * FROM employees WHERE emp_id = ?";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $employee = new Employee ($row['emp_name'], $row['gender'], $row['email'], $row['phone'], $row['address'],
            $row['pos_id']);
        $employee->setEmployeeId($row['emp_id']);
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
        $sql = "SELECT emp_id, emp_name, gender, email, phone, address, position.name AS position , avatar FROM employees JOIN position ON employees.pos_id = position.id";
        $statement = $this->conn->query($sql);
        $result = $statement->fetchAll();
        $employees = [];
        foreach ($result as $item) {
            $employee = new Employee($item['emp_name'], $item['gender'], $item['email'], $item['phone'],
                $item['address'], $item['position']);
            $employee->setEmployeeId($item['emp_id']);
            $employee->setAvatar($item['avatar']);
            $employees[] = $employee;
        }
        return $employees;
    }

    public function getPositionList()
    {
        $sql = "SELECT name, coefficients FROM position";
        $statement = $this->conn->query($sql);
        return $statement->fetchAll();
    }
}






