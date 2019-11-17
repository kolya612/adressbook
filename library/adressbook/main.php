<?php
require_once 'datapacker.php';

abstract class MainClass
{
    const GET_METHODS = [
        "Users" => "users",
        "User" => "user",
        "Groups" => "groups",
        "Addresses" => "addresses",
        "Phones" => "phones",
        "Emails" => "emails",
    ];
    const ADD_METHODS = [
        "User" => "user",
        "Group" => "group",
    ];
    const SEARCH_METHOD = [
        "UsersByGroup" => "usersbygroup",
        "GroupsByUser" => "groupsbyuser",
        "UserByName" => "userbyname",
        "UserByEmail" => "userbyemail",
    ];

    private $dataPacker;

    protected $type;

    function __construct()
    {
        $this->dataPacker = NEW DataPacker;
    }

    /**
     * ABSTRACT METHODS
     */

    public abstract function getData($listName, $id = false);

    public abstract function addData($contentName, $fields);

    public abstract function searchData($searchType, $field);

    /**
     * PROTECTED METHODS
     */

    protected function getDataFromApi($name, $id = false)
    {
        $this->type = 'GET';

        $name = $this->checkName($name,self::GET_METHODS);
        if (!$name) {
            return ['error' => 'This method is missing'];
        }

        return $this->dataPacker->assistant($this->type, $name, $id);
    }

    protected function addDataToApi($name, $fields)
    {
        $this->type = 'ADD';

        $name = $this->checkName($name,self::ADD_METHODS);
        if (!$name) {
            return ['error' => 'This method is missing'];
        }

        $result = $this->dataPacker->assistant($this->type, $name, $fields);

        return $result;
    }

    protected function searchDataInApi($name, $field)
    {
        $this->type = 'SEARCH';

        $name = $this->checkName($name,self::SEARCH_METHOD);
        if (!$name) {
            return ['error' => 'This method is missing'];
        }

        $result = $this->dataPacker->assistant($this->type, $name, $field);

        return $result;
    }

    /**
     * PRIVATE METHODS
     */
    private function checkName($name, $check)
    {
        if(!in_array(mb_strtolower($name), $check)) {
            return false;
        }

        return array_search(mb_strtolower($name), $check);
    }
}
