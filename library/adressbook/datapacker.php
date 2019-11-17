<?php
require_once 'mass.php';
require_once 'interfaces\datainterfaces.php';

class DataPacker implements interfaces\DataInterfaces
{
    /**
     *  PUBLIC METHOD
     */

    public function assistant($type, $name, $parametr = false)
    {
        switch ($type) {
            case 'GET':
                $method = 'get'.$name;
                break;
            case 'ADD':
                $method = 'add'.$name;
                break;
            case 'SEARCH':
                $method = 'search'.$name;
                break;
        }

        return $this->$method($parametr);
    }


    /**
     * PRIVATE METHODS
     *
     * There should be methods for accessing the API.
     * But since this is a test case, I return data from arrays.
     *
     *
     * GET DATA
     */

    private function getUsers()
    {
        global $mass;
        return $mass['users'];
    }

    private function getUser($userId)
    {
        global $mass;
        $res = $mass['users'];

        if(empty($res[$userId])) {
            return ['error' => 'The user is missing'];
        }
        return $res[$userId];
    }

    private function getGroups($userId=false)
    {
        global $mass;

        if (!$userId) {
            return $mass['groups'];
        }

        if (empty($mass['users'][$userId]['groups'])) {
            return ['error' => 'The users is missing'];
        }

        return $mass['users'][$userId]['groups'];
    }

    private function getAddresses($userId)
    {
        global $mass;

        if (empty($mass['users'][$userId]['addresses'])) {
            return ['error' => 'The users is missing'];
        }

        return $mass['users'][$userId]['addresses'];
    }


    private function getPhones($userId)
    {
        global $mass;

        if (empty($mass['users'][$userId]['phones'])) {
            return ['error' => 'The users is missing'];
        }

        return $mass['users'][$userId]['phones'];
    }


    private function getEmails($userId)
    {
        global $mass;

        if (empty($mass['users'][$userId]['emails'])) {
            return ['error' => 'The users is missing'];
        }

        return $mass['users'][$userId]['emails'];
    }

    /**
     * ADD DATA
     */

    private function addUser($fields)
    {
        global $mass;

        $mass['users'][] = $fields;

        return true;

    }

    private function addGroup($fields)
    {
        global $mass;

        $mass['groups'][] = $fields;

        return true;

    }

    /**
     * SEARCH DATA
     */

    private function searchUsersByGroup($group_id)
    {
        global $mass;
        $users = [];

        foreach ($mass['users'] as $user_id=>$data) {
            foreach ($data['groups'] as $id => $group) {
                if ($group_id == $id) {
                    $users[] = $mass['users'][$user_id];
                }
            }
        }

        if (!$users) {
            return ['result' => 'Users is missing'];
        }

        return $users;
    }

    private function searchGroupsByUser($user_id)
    {
        global $mass;

        if (empty($mass['users'][$user_id]['groups'])) {
            return ['result' => 'Groups is missing'];
        }

        return $mass['users'][$user_id]['groups'];
    }

    private function searchUserByName($name)
    {
        global $mass;
        $users = [];

        $name = explode(" ", trim($name));

        foreach ($mass['users'] as $user_id=>$data) {
            if (in_array($data['name'], $name) || in_array($data['surname'], $name)) {
                $users[] = $mass['users'][$user_id];
            }
        }

        if (!$users) {
            return ['result' => 'Users is missing'];
        }

        return $users;
    }

    private function searchUserByEmail($field)
    {
        global $mass;
        $users = [];

        foreach ($mass['users'] as $user_id=>$data) {
            foreach ($data['emails'] as $email) {
                $position = stripos($email, $field);

                if ($position === 0 || $position) {
                    $users[] = $mass['users'][$user_id];
                }
            }
        }

        $users = array_unique($users, SORT_REGULAR);

        if (!$users) {
            return ['result' => 'Users is missing!!!'];
        }

        return $users;
    }
}
