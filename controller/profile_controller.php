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
        if(isset($_GET['user'])){
            $userID = $_GET['user'];
        }
        searchGroupsArray($students, $userID);

        require "view/profile_view.php";


    }

}