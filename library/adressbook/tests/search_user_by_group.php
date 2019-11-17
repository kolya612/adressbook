<?php
require_once '../adressbook.php';

$obj = NEW AdressBook();

echo '<h3><a href="' . $_SERVER["HTTP_REFERER"] . '">BACK</a></h3>';
echo '<hr />';

echo '<p>Search users by group_id  -  searchData(\'UsersByGroup\', 4):</p>';
echo '<p>Users:</p><pre>';
print_r($obj->searchData('UsersByGroup', 4));
echo '</pre>';