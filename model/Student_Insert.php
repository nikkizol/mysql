<?php


class Student_Insert extends DatabaseConnection
{

    public function __construct($name, $lastname, $email, $password)
    {
        $sql = $this->Connection()->prepare("INSERT INTO student (first_name, last_name, email, password)
VALUES (:firstname, :lastname, :email, :password)");
        $sql->bindValue(':firstname', $name);
        $sql->bindValue(':lastname', $lastname);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
        $sql->execute();

    }

}


