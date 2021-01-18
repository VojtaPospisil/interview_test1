<?php

class Person {
    protected $id;
    protected $firstName;
    protected $lastName;
    public $gender;
    protected $dateOfBirth;

    public function __construct(int $id, array $personData)
    {
        $this->id = $id;
        $this->firstName = $personData[0];
        $this->lastName = $personData[1];
        $this->gender = $personData[2];
        $this->dateOfBirth = $personData[3];
    }

    /**
     * Count days of persons life
     *
     * @return string
     * @throws Exception
     */
    public function getDaysOfLife(): string
    {
        $personDateTime = DateTime::createFromFormat('d.m.Y', $this->dateOfBirth);
        $diff = date_diff($personDateTime, new DateTime() );

        return $diff->format("%a dní");
    }

    /**
     * return persons full name
     *
     * @return string
     */
    public function getFullName()
    {
        return "$this->firstName $this->lastName";
    }
}