<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="/index.php">Home</a>

        <a href="/aboutus.php">About us</a>

        <a href="/services.php">Services</a>

        <a href="/contactus.php">Contact Us</a>
        <?php
        // put your code here
        $color = array(0 => 1,
            1 => 2,
            2 => 3,
            3 => 4);
        
        echo $color[3];
        ?>
    </body>
</html>
