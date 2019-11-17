<?php
require_once '../adressbook.php';

$obj = NEW AdressBook();

echo '<h3><a href="' . $_SERVER["HTTP_REFERER"] . '">BACK</a></h3>';
echo '<hr />';

echo '<p>If we try to use missing method, for example "Userzs" we will have this result:</p>';
echo '<pre>';
print_r($obj->getData('Userzs'));
echo '</pre>';