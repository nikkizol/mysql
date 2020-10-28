<?php

class profile_controller extends DatabaseConnection
{

    public function display()
    {
        $delete = '';
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
        }
        if (isset($_POST['delete'])) {
            $handle = $this->Connection()->prepare('DELETE FROM student WHERE id = :id');
            $handle->bindValue(':id', $_SESSION["id"]);
            $handle->execute();
            session_destroy();
            header("Location: http://mysql-challenge.localhost/");
        }

        require "view/profile_view.php";

        return $userID;
    }

}