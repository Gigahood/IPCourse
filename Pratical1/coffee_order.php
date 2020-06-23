<?php
include 'discount_info.php';
define("UNIT_PRICE", 5.50);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>MyDot Coffee</h1>
        <form action="coffee_order.php" method="POST">
            <p>Number of bags : <input type="text" name="quantity" value="" size="15" /></p>
            <p><input type="submit" value="calculate" name="calculateButton" /> </p>
        </form>

        <?php
        // put your code here
        if (isset($_POST["quantity"])) {
            $quantity = trim($_POST["quantity"]);
            $total_charge = $quantity * UNIT_PRICE;
            
            echo "<p>Price for $quantity bags = RM" . number_format($total_charge, 2)
                    . "<br />";
            
            $discount = $total_charge * (getDiscountRate($quantity) / 100.0);
            
            echo "Discount = RM " . number_format($discount, 2) .
                    "<br />";
            
            $total_charge -= $discount;
            
            echo "Your total charge = RM " . number_format($total_charge, 2)
                    . "<br />";
            
            if ($total_charge > 1000) {
                echo "<b>You will get 1 Free Movie Ticker! &#128578" . 
                        "</b></p>";
            }
        }
        
        ?>
    </body>
</html>
