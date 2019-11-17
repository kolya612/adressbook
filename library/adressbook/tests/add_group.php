<?php
require_once '../adressbook.php';

$obj = NEW AdressBook();

echo '<h3><a href="' . $_SERVER["HTTP_REFERER"] . '">BACK</a></h3>';
echo '<hr />';

echo '<p>Add group "friends"  -  addData("Group", "Friends"):</p>';

$obj->addData("Group", "Friends");

echo '<p>Groups:</p><pre>';
print_r($obj->getData('Groups'));
echo '</pre>';
