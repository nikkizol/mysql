<?php


class Student_loader extends DatabaseConnection
{
    private array $students = [];


    public function __construct()
    {
        $handle = $this->Connection()->prepare("SELECT * FROM student");
        $handle->execute();
        foreach ($handle->fetchAll() as $student) {
            $this->students[$student["id"]] = new Student($student['id'], $student['first_name'], $student['last_name'], $student['email'], $student["created_at"]);
        }
    }

    /**
     * @return array
     */
    public function getStudents(): array
    {
        return $this->students;
    }


}
