<?php
require_once 'FoodItem.php';
require_once 'StationaryItem.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$itemArray[] = new FoodItem(1001, "sandwithch", 123, "asc");
$itemArray[] = new StationaryItem(123, "Pen1", "sayt2", 1231);
$itemArray[] = new StationaryItem(124, "Pen2", "sayt2", 1232);
$itemArray[] = new StationaryItem(125, "Pen3", "sayt2", 1233);
$itemArray[] = new FoodItem(101, "cake", 13, "ascdd");

// for each loop
foreach ($itemArray as $value) {
    echo $value;
}
