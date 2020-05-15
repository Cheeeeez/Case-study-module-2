<?php
session_start();

include "model/DBConnection.php";
include "model/Employee.php";
include "model/UserDB.php";
include "model/EmployeeDB.php";
include "controller/UserController.php";
include "controller/EmployeeController.php";

if (!isset($_SESSION['user'])) {
    header('location: view/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<header class="row">
    <div class="col-sm-12">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3b5998">
            <a class="navbar-brand" href="">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/mvc-exercise">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">Action</a>
                            <a class="dropdown-item" href="">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">

                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo "Welcome, " . $_SESSION["user"]["username"]; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">Action</a>
                            <a class="dropdown-item" href="./index.php?page=change-password">Change password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="view/login.php">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<?php
$userController = new UserController();
$employeeController = new EmployeeController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
switch ($page) {
    case 'add-employee':
        $employeeController->add();
        break;
    case 'delete-employee':
        $employeeController->delete();
        break;
    case 'edit-employee':
        $employeeController->edit();
        break;
    case 'search-list':
        $employeeController->search();
        break;
    default:
        $employeeController->index();
}
?>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/animsition/js/animsition.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<script src="js/main.js"></script>
</body>
</html>
