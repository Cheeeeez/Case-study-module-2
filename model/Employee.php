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
    private $avatar;

    public function __construct($name, $gender, $email, $phone, $address, $position,$avatar)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->position = $position;
        $this->avatar=$avatar;
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

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }


}

