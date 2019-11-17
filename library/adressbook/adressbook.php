<?php
require_once 'main.php';

class AdressBook extends MainClass
{
    /**
     * PUBLIC METHODS
     */

    public function getData($listName, $id = false)
    {
        return $this->getDataFromApi($listName, $id);
    }

    public function addData($contentName, $fields)
    {
        return $this->addDataToApi($contentName, $fields);
    }

    public function searchData($searchType, $field)
    {
        return $this->searchDataInApi($searchType, $field);
    }
}
