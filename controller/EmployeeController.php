<?php


class EmployeeController
{
    public $employeeDB;

    public function __construct()
    {
        $conn = new DBConnection("mysql:host=localhost;dbname=case_study", "root", "Abc123456@");
        $this->employeeDB = new EmployeeDB($conn->connect());
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $employees = $this->employeeDB->getAll();
            include "view/employee-list.php";
        }
    }

}