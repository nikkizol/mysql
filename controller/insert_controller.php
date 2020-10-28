<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


class insert_controller
{
    public function display()
    {
//        session_start();

        $email = "";
        $fname = "";
        $lname = "";

        $emailErr = $f_nameErr = $lnameErr = $passwordErr = $cpasswordErr = "";
        $emailG = $f_nameG = $lnameG = $passwordG = "";


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
            if (!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
                $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
                $cpassword = $_POST["cpassword"];
                if (strlen($_POST["password"]) <= '8') {
                    $passwordErr = "Your Password Must Contain At Least 8 Characters!";
                } elseif (!preg_match("#[0-9]+#", $password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Number!";
                } elseif (!preg_match("#[A-Z]+#", $password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
                } elseif (!preg_match("#[a-z]+#", $password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                }
            } elseif (!empty($_POST["password"])) {
                $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
            } else {
                $passwordErr = "Please enter password ";
            }


            $_SESSION["email"] = $email;
            $_SESSION["f_name"] = $fname;
            $_SESSION["l_name"] = $lname;


            if (isset($_POST['submit'])) {
                if (empty($emailErr) && empty($f_nameErr) && empty($lnameErr) && empty($passwordErr) && empty($cpasswordErr)) {
                    $students = new Student_Insert($fname, $lname, $email, $password);
                    $controller = new profile_controller();
                    $userId = $controller->display();
                    header("Location: http://mysql-challenge.localhost/index.php?user=$userId");
                }
            }


        }
        require "view/insert_view.php";
    }
}