<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


class table_controller
{
    public function display()
    {
        $getStudents = new Student_Loader();
        $students = $getStudents->getStudents();
        require "view/table_view.php";

    }

}
