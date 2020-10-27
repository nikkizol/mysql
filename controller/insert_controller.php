<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


class insert_controller
{
    public function display()
    {
        session_start();

        $email = "";
        $fname = "";
        $lname = "";

        $emailErr = $f_nameErr = $lnameErr = "";
        $emailG = $f_nameG = $lnameG = "";


        if (!isset($_SESSION["email"])) {
            $_SESSION["email"] = "";
        }
        if (!isset($_SESSION["f_name"])) {
            $_SESSION["f_name"] = "";
        }
        if (!isset($_SESSION["l_name"])) {
            $_SESSION["l_name"] = "";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset ($_POST["email"])) {
                $email = $_POST["email"];
                if (!empty (filter_var($email, FILTER_VALIDATE_EMAIL))) {
                    $emailG = "Good";
                } else {
                     $emailErr = "* is not a valid email address";
                }
            }
            if (isset ($_POST["f_name"])) {
                $fname = $_POST["f_name"];
                if (!empty (preg_match("/^[a-zA-Z\s]+$/", $fname))) {
                    $f_nameG = "Good";
                } else {
                     $f_nameErr = "* is a required field";
                }
            }

            if (isset ($_POST["l_name"])) {
                $lname = $_POST["l_name"];
                if (!empty (preg_match("/^[a-zA-Z\s]+$/", $lname))) {
                    $lnameG = "Good";
                } else {
                     $lnameErr = "* is a required field";
                }
            }
            $_SESSION["email"] = $email;
            $_SESSION["f_name"] = $fname;
            $_SESSION["l_name"] = $lname;


            if (isset($_POST['submit'])) {
                if (empty($emailErr) && empty($f_nameErr) && empty($lnameErr)) {
                    $students = new Student_Insert($fname, $lname, $email);
//                    return $students;
                }
            }


        }
        require "view/insert_view.php";
    }
}