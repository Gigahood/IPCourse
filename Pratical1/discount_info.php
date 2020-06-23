<?php

$discount_array = array(
    25 => 5,
    50 => 10,
    100 => 15,
    150 => 20,
    200 => 25,
    300 => 30
);

function display_discount() {
    global $discount_array;
    echo "<p><h3> Discount Information </h3></p>";
    echo "<table>";
    echo "<tr><th>Order Volume</th><th>Discount</th></tr>";

    foreach ($discount_array as $key => $value) {
        echo "<tr><td>&#8805; " . $key . "bags</td><td>" . $value .
        "% of total price </td></tr>";
    }
    echo "</table>";
}

// to sort reversely
krsort($discount_array);

function getDiscountRate($quantity) {
    global $discount_array;
    
    // using for each to compare every discount value
    foreach ($discount_array as $key => $value) {
        if ($quantity >= $key) {
            return $value;
        }
    }
    
}

