<?php

class profile_controller
{

    public function display()
    {
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
        }
        searchGroupsArray($students, $userID);

        $data = @file_get_contents('https://api.thecatapi.com/v1/images/search');
        $dataDecode = json_decode($data, true);
        $img = $dataDecode[0]['url'];

        require "view/profile_view.php";


    }

}