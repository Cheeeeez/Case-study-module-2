<?php
include "../model/DBConnection.php";
include "../model/UserDB.php";
include "../controller/UserController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userController = new UserController();
    $userController->login();
}
?>