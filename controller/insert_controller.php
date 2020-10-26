<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


class insert_controller
{
    public function display()
    {
        require_once "view/insert_view.php";
        if (!empty($_POST['f_name']) && !empty($_POST['l_name'] && !empty($_POST['email']))) {
            $fname= $_POST['f_name'];
            $lname = $_POST['l_name'];
            $email =$_POST['email'];
            $students = new Student_Insert($fname, $lname, $email);
            return $students;

        }
    }
}