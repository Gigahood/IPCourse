<?php
    $document_root = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Outdoor Event Supplies - Customer Orders</title>

        <style type="text/css">
        table, th, td {
            border-collapse: collapse;
            border: 1px solid black;
            padding: 6px;
        }

        th {
            background: #ccccff;
        }
        </style>       
    </head>
    <body>
        <h1>Outdoor Event Supplies</h1>
        <h2>Customer Orders</h2>

        <?php
        // Read the entire file; each order becomes an eleemnt in the array
        $orders = file("$document_root/../orders.txt");

        $number_of_orders = count($orders);

        if ($number_of_orders == 0) {
            echo ("<p><strong>No orders pending <br /></strong></p>");
            exit;
        }

        echo "<table>\n";
        echo "<tr>
                <th>Order Date</th>
                <th>Tables</th>
                <th>Chairs</th>
                <th>Tents</th>
                <th>Total</th>
              <tr>";

        for ($i = 0; $i < $number_of_orders; $i++) {
            $line = explode("\t", $orders[$i]); // split up each line

            // keep only the number of items ordered
            $line[1] = intval($line[1]);
            $line[2] = intval($line[2]);
            $line[3] = intval($line[3]);

            // output each order
            echo "<tr>
                <td>".$line[0]."</td>
                <td style=\"text-align: right;\">".$line[1]."</td>
                <td style=\"text-align: right;\">".$line[2]."</td>
                <td style=\"text-align: right;\">".$line[3]."</td>
                <td style=\"text-align: right;\">".$line[4]."</td>
                </tr>";
        }
        echo "</table>";
    ?>
    </body>
</html>
