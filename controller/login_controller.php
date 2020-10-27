<?php


class login_controller extends DatabaseConnection
{
    public function display()
    {

        session_start();

        $email = "";

        $ERROR = "";



        if (!isset($_SESSION["email"])) {
            $_SESSION["email"] = "";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

//            if (isset ($_POST["email"])) {
//                $email = $_POST["email"];
//                $stmt = $this->Connection()->prepare("SELECT * FROM student WHERE email=?");
//                $stmt->execute([$email]);
//                $user = $stmt->fetch();
//                if ($user) {
////                    $ERROR = "email found";
//                } else {
//                    $ERROR = "Check your email";
//                }
//            }
            if (isset ($_POST["password"])) {


                $stmt = $this->Connection()->prepare("SELECT * FROM student WHERE email = ?");
                $stmt->execute([$_POST['email']]);
                $user = $stmt->fetch();

                if ($user && password_verify($_POST['password'])) {
                    echo "valid!";
                } else {
                    echo "invalid";
                }
            }
            $_SESSION["email"] = $email;


//            if (isset($_POST['submit'])) {
//                if (empty($Err)) {
//                    $controller = new profile_controller();
//                    $userId = $controller->display();
//                    header("Location: http://mysql-challenge.localhost/index.php?user=$userId");
//                }
//            }


        }
        require "view/login_view.php";
    }
}