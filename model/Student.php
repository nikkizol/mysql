<?php


class Student
{
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private $created_at;

    /**
     * Student constructor.
     * @param int $id
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param $created_at
     */
    public function __construct(int $id, string $first_name, string $last_name, string $email, $created_at)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->created_at = $created_at;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }


}

