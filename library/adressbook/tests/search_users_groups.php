<?php
require_once '../adressbook.php';

$obj = NEW AdressBook();

echo '<h3><a href="' . $_SERVER["HTTP_REFERER"] . '">BACK</a></h3>';
echo '<hr />';

echo '<p>Search users groups by user_id  -  searchData(\'GroupsByUser\', 1):</p>';
echo '<p>Groups:</p><pre>';
print_r($obj->searchData('GroupsByUser', 1));
echo '</pre>';