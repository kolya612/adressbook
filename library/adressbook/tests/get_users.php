<?php
require_once '../adressbook.php';

$obj = NEW AdressBook();

echo '<h3><a href="' . $_SERVER["HTTP_REFERER"] . '">BACK</a></h3>';
echo '<hr />';

echo "<p>Get users - getData('Users'):</p><pre>";
print_r($obj->getData('Users'));
echo '</pre>';
echo '<hr />';
echo "<p>Get user by user_id - getData('User', 1):</p><pre>";
print_r($obj->getData('User', 1));
echo '</pre>';
