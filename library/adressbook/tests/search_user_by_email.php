<?php
require_once '../adressbook.php';

$obj = NEW AdressBook();

echo '<h3><a href="' . $_SERVER["HTTP_REFERER"] . '">BACK</a></h3>';
echo '<hr />';

echo '<p>Search users by email or part of email  -  searchData("UserByEmail", "nikita"):</p>';
echo '<p>Users:</p><pre>';
print_r($obj->searchData("UserByEmail", "nikita"));
echo '</pre>';
