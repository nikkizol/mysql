<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once "Model/DatabaseConnection.php";
require_once "Model/Student.php";
require_once "Model/Student_Insert.php";
require_once "Model/Student_loader.php";
require_once "Controller/insert_controller.php";
require_once "Controller/table_controller.php";





$controller = new insert_controller();


if(isset($_POST['all_users'])) {
    $controller = new table_controller();
    if (isset($_POST['back'])) {
        $controller = new insert_controller();
    }
}
$controller->display();


