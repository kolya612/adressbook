<?php
require_once '../adressbook.php';

$obj = NEW AdressBook();

echo '<h3><a href="' . $_SERVER["HTTP_REFERER"] . '">BACK</a></h3>';
echo '<hr />';

echo "<p>Groups - getData('Groups'):</p><pre>";
print_r($obj->getData('Groups'));
echo '</pre>';

echo "<p>Groups by user_id - getData('Groups', 1):</p><pre>";
print_r($obj->getData('Groups', 1));
echo '</pre>';


