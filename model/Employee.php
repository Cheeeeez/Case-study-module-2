<?php


class Employee
{
    private $employeeId;
    private $name;
    private $gender;
    private $email;
    private $phone;
    private $address;
    private $position;

    public function __construct($name, $gender, $email, $phone, $address, $position)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->position = $position;
    }

    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPosition()
    {
        return $this->position;
    }


}

