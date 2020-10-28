<?php

class profile_controller extends DatabaseConnection
{

    public function display()
    {
        $delete = '';
        $form = "";
        $update = '';
        function searchGroupsArray($array, $value)
        {
            foreach ($array as $student) {
                if ($student->getId() == $value) {
                    return $student;
                }
            }
        }

        $getStudents = new Student_Loader();
        $students = $getStudents->getStudents();
        if (isset($_GET['user'])) {
            $userID = $_GET['user'];
        } else $userID = end($students)->getId();

        searchGroupsArray($students, $userID);

        $data = @file_get_contents('https://api.thecatapi.com/v1/images/search');
        $dataDecode = json_decode($data, true);
        $img = $dataDecode[0]['url'];


        if ($_SESSION["id"] == $userID) {
            $delete = "<button type='submit' name='delete' class='btn btn-primary'>Delete</button>";
            $update = "<button type='submit' name='update' class='btn btn-primary'>Update</button>";
        }
        if (isset($_POST['delete'])) {
            $handle = $this->Connection()->prepare('DELETE FROM student WHERE id = :id');
            $handle->bindValue(':id', $_SESSION["id"]);
            $handle->execute();
            session_destroy();
            header("Location: http://mysql-challenge.localhost/");
        }

        if (isset($_POST['update'])) {
            $form = "
<form method='post'>
<div class='form-row'>
                <div class='form-group col-md-6'>
                    <label for='f_name'>First Name:</label>
                    <input type='text' name='f_name' id='f_name' class='form-control' value=''>
</div>
            <div class='form - group col - md - 6'>
    <label for='lname'>Last Name:</label>
    <input type='text' name='lname' id='lname' class='form-control' value=''>
</div>
</div>
<button type='submit' name='confirm' class='btn btn-primary'>Confirm</button>
</form>";
        }
            if (isset($_POST['confirm'])) {
                    $fname = $_POST["f_name"];
                    $lname = $_POST["lname"];
                    var_dump($lname);
                $handle = $this->Connection()->prepare('UPDATE student SET first_name = :firstname, last_name = :lastname WHERE id = :id');
                $handle->bindValue(':id', $userID);
                $handle->bindValue(':firstname', $fname);
                $handle->bindValue(':lastname', $lname);
                $handle->execute();
                header("Location: http://mysql-challenge.localhost/index.php?user=$userID");
            }

        require "view/profile_view.php";

        return $userID;
    }

}