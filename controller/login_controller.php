<?php


class login_controller extends DatabaseConnection
{
    public function display()
    {
        $view = "view/login_view.php";
//        session_start();

        $email = "";
        $ERROR = "";

        if (!isset($_SESSION["email"])) {
            $_SESSION["email"] = "";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset ($_POST["email"])) {
                $email = $_POST["email"];
                $stmt = $this->Connection()->prepare("SELECT * FROM student WHERE email=?");
                $stmt->execute([$email]);
                $user = $stmt->fetch();
                if ($user) {
                    if (isset ($_POST["password"]) && ($_POST["email"]) && ($_POST["email"] !== "") && ($_POST["password"] !== "")) {
                        $password = $_POST["password"];
                        $stmt = $this->Connection()->prepare("SELECT password FROM student WHERE email='$email'");
                        $stmt->execute([$password]);
                        $passwordDB = $stmt->fetch();
                        $psDb = $passwordDB['password'];
                        if (password_verify($password, $psDb)) {
                        } else {
                            $ERROR = "Check your password or email";
                        }
                    } elseif ($_POST["password"] == "") {
                        $ERROR = "Check your password or email";
                    }
                } else {
                    $ERROR = "Check your password and/or email";
                }
            }

            if (empty($ERROR)) {
                $stmt = $this->Connection()->prepare("SELECT id FROM student WHERE email='$email'");
                $stmt->execute();
                $id = $stmt->fetch();
                $_SESSION["id"] = $id['id'];
                $info = $_GET['page'] = 'info';
                header("Location: http://mysql-challenge.localhost/?page=$info");
            }
            $_SESSION["email"] = $email;



        }

        require $view;
    }
}