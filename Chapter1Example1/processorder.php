<!-- processorder.php -->

<?php
$tableqty = (int) $_POST['tableqty'];
$chairqty = (int) $_POST['chairqty'];
$tentqty = (int) $_POST['tentqty'];
$document_root = $_SERVER['DOCUMENT_ROOT'] ;
$date = date('H:i, jS F Y');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Outdoor Events Supplies - Order Summary</title>
    </head>
    <body>
        <h1>Outdoor Events Supplies</h1>
        <h2>Order Summary</h2>

        <?php
            echo "<p>Order processed at $date </p>";
            echo "<p>Order Details</p>";

            define('TABLE_RATE', 30.00);
            define('CHAIR_RATE', 5.00);
            define('TENT_RATE', 80.00);

            $totalqty = $tableqty + $chairqty + $tentqty;
            if ($totalqty == 0) {
                echo "You did not order anything at all<br />";
            } else {
                if ($tableqty > 0) {
                    echo "$tableqty tables<br />";
                }
                if ($chairqty > 0) {
                    echo "$chairqty chairs<br />";
                }
                if ($tentqty > 0) {
                    echo "$tentqty tents<br />";
                }
                
                $totalamount = $tableqty * TABLE_RATE + $chairqty * CHAIR_RATE + $tentqty * TENT_RATE;
                echo "Total amount: RM " . number_format($totalamount,2) . " <br/>";

                $outputstring = $date . "\t" . $tableqty . " tables \t" . $chairqty . " chairs \t" . 
                                $tentqty . " tents \tRM" . $totalamount . "\t\n";

                // open file for apending
                echo "***TRACE: document_root = $document_root";
                @$fp = fopen("$document_root/../orders.txt", 'ab'); // open file for appending
                // @$fp = fopen("$document_root/../orders.txt", 'w');
                if (!$fp) {
                    echo "<p><strong> Your order could not be processed at this time. 
                          Please try again later.</strong></p>";
                    exit;
                }

                flock($fp, LOCK_EX);
                fwrite($fp, $outputstring, strlen($outputstring));
                flock($fp, LOCK_UN);
                fclose($fp);

                echo "<p>Order written.</p>";
            }
        ?>
    </body>
</html>


