<?php
require_once '../adressbook.php';

$obj = NEW AdressBook();

echo '<h3><a href="' . $_SERVER["HTTP_REFERER"] . '">BACK</a></h3>';
echo '<hr />';

echo '<p>Addresses by user_id - getData(\'Addresses\', 1):</p><pre>';
print_r($obj->getData('Addresses', 1));
echo '</pre>';

echo '<p>Phones by user_id - getData(\'Phones\', 2):</p><pre>';
print_r($obj->getData('Phones', 2));
echo '</pre>';

echo '<p>Emails by user_id - getData(\'Emails\', 1):</p><pre>';
print_r($obj->getData('Emails', 1));
echo '</pre>';
