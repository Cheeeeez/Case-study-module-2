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
            $employees = $this->employeeDB->getAll();
            include "view/employee-list.php";
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $positionList = $this->employeeDB->getPositionList();
            include "view/add-employee.php";
        } else {
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $position = $_POST['position'];
            if ($_FILES['avatar']['name'] == "") {
                $avatarName = 'default.png';
            } else {
                $avatarName = time() . '-' . $_FILES['avatar']['name'];
            }
            $destination = "img/" . $avatarName;
            move_uploaded_file($_FILES['avatar']['tmp_name'], $destination);
            $employee = new Employee($name, $gender, $email, $phone, $address, $position);

            $employee->setAvatar($avatarName);
            $this->employeeDB->create($employee);
            header("Location: index.php");
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['id'];
            $this->employeeDB->deleteById($id);
            header('Location: index.php');
        }

    }

    public function edit(){
        if ($_SERVER['REQUEST_METHOD']== "GET"){
            $id=$_GET['id'];
            $employee= $this->employeeDB->getByID($id);
            $positionList = $this->employeeDB->getPositionList();

            include 'view/edit.php';
        }else{
            $id= $_POST['id'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $position = $_POST['position'];
            if ($_FILES['avatar']['name'] == "") {
                $avatarName = 'default.png';
            } else {
                $avatarName = time() . '-' . $_FILES['avatar']['name'];
            }
            $destination = "img/" . $avatarName;
            move_uploaded_file($_FILES['avatar']['tmp_name'], $destination);
            $employee = new Employee($name, $gender, $email, $phone, $address, $position);
            $employee->setAvatar($avatarName);
           // $employee= new Employee($_POST['name'],$_POST['gender'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['position']);
            $this->employeeDB->updateById($id,$employee);
            header('location:index.php');
        }
    }

    public function search(){
        if ($_SERVER['REQUEST_METHOD']=="GET"){
            $search= $_GET['search'];
            $employees=$this->employeeDB->search($search);
            include 'view/employee-list.php';
        }
    }

}