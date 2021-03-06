<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

require_once "Model/DatabaseConnection.php";
require_once "Model/Student.php";
require_once "Model/Student_Insert.php";
require_once "Model/Student_loader.php";
require_once "Controller/insert_controller.php";
require_once "Controller/table_controller.php";
require_once "Controller/profile_controller.php";
require_once "Controller/login_controller.php";



$controller = new login_controller();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: http://mysql-challenge.localhost/");
}

if (isset($_GET['register'])) {
    $controller = new insert_controller();
}

if (isset($_POST['loginPage'])) {
    header("Location: http://mysql-challenge.localhost/");
}
if (isset($_GET['user'])) {
    $userID = $_GET['user'];
    $controller = new profile_controller();
}
if (isset($_POST['backToAllUSers'])) {
    $controller = new table_controller();
}

if (isset($_GET['page'])){
    $controller = new table_controller();
}

var_dump($_SESSION);


$controller->display();


