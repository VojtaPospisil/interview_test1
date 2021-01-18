<?php

require 'Person.php';

class Group {

    public $group = array();

    private static $instance;

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Group();
            self::$instance->fillGroup();
        }

        return self::$instance;
    }

    /**
     * Fill group with persons from file
     *
     * @return array
     */
    public function fillGroup()
    {
        $users = array();

        $data = file_get_contents('data.txt');

        // convert data to json format
        $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE);

        // delete " around json array and split data by empty lines
        $personData = explode('\n\n', substr($jsonData, 1, -1));

        // prepare and clear data for each person
        foreach ($personData as $key => $data) {
            $users[] = explode(' ', str_replace(array('\n', '  '), ' ', $data));
        }

        foreach ($users as $key => $person) {
            $id = $key + 1;
            $this->group[$id] = new Person($id, $person);
        }

        return $this->group;
    }


    /**
     * return Person by id
     *
     * @param int $id
     * @return mixed
     */
    public function getPersonById(int $id)
    {
        if ($this->group[$id]) {
            return $this->group[$id];
        }

        return 'Uživatel neexistuje.';
    }

    /**
     * Return percentage of gender in group
     *
     * @return array
     */
    public function getGenderPercentage()
    {
        $genderArray = array();

        foreach ($this->group as $person)
        {
            $genderArray[] = $person->gender;
        }

        $total = count($genderArray);
        $gendersPercentage = array('celkem' => $total . ' lidí.');
        $genderCount = array_count_values($genderArray);
        $gendersType = array_keys($genderCount);

        foreach($gendersType as $type) {
            $gendersPercentage[$type] = $genderCount[$type] / ($total / 100) . ' %.';
        }

        return $gendersPercentage;
    }
}