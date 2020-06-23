<?php
require_once 'Name.php';
require_once 'WesternName.php';
require_once 'NameObjectAdapter.php';


$name = new Name();
$name->setName("Pua Chu Kang");
echo "<p>Name: " . $name->getName() . "</p>";

$westernName = new WesternName();
$westernName->setFirstName("Jack"); 
$westernName->setLastName("Ryan");
echo "<p>Western Name: $westernName<br/>";
echo "First name: " . $westernName->getFirstName() . "<br/>";
echo "Last name : " . $westernName->getLastName() . "</p>";

$nameClassAdapter = new NameObjectAdapter($westernName);
$nameClassAdapter->setName("Jack Ryan");
echo "<p>Object-adapted name: " . $nameClassAdapter->getName() . "</p>";


