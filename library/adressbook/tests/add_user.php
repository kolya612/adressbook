<?php
require_once '../adressbook.php';

$obj = NEW AdressBook();

echo '<h3><a href="' . $_SERVER["HTTP_REFERER"] . '">BACK</a></h3>';
echo '<hr />';


$fields = [
    "name" => "Piter",
    "surname" => "Parker",
    "emails" => ["parkerspi@gmail.com"],
    "groups" => [
        1 => "Relatives"
    ],
    "phones" => ["+380501111111"],
    "addresses" => ["Alchi str. 8 fl.22"]
];
echo '<p>$fields with date about user:</p><pre>';
print_r($fields);
echo '<pre>';


echo '<p>Add user "Piter Parker" with fields  -  addData(\'User\', $fields):</p>';

$obj->addData('User', $fields);

echo '<p>Get users with new:</p><pre>';
print_r($obj->getData('Users'));
echo '</pre>';
