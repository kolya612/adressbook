<?php
require_once '../adressbook.php';

$obj = NEW AdressBook();

echo '<h3><a href="' . $_SERVER["HTTP_REFERER"] . '">BACK</a></h3>';
echo '<hr />';

echo '<p>Search users by name or surname  -  searchData("UserByName", "Анатолий Пертовчан"):</p>';
echo '<p>Users:</p><pre>';
print_r($obj->searchData("UserByName", "Анатолий Пертровчан"));
echo '</pre>';
