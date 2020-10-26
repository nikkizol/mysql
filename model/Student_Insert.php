<?php


class Student_Insert extends DatabaseConnection
{

    public function __construct($name, $lastname, $email)
    {
        $sql = $this->Connection()->prepare("INSERT INTO student (first_name, last_name, email)
VALUES (:firstname, :lastname, :email)");
        $sql->bindValue(':firstname', $name);
        $sql->bindValue(':lastname', $lastname);
        $sql->bindValue(':email', $email);
        $sql->execute();

    }

}


