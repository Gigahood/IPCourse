<?php

$errorMsg = "";

if (empty($_POST['name'])) {
    $errorMsg .= "Name Is Required!! <br />";
}

if (empty($_POST["mobile"])) {
    $errorMsg .= "Mobile Phone Number Is Required!! <br />";
}

if (empty($_POST["gender"])) {
    $errorMsg .= "Gender Is Required!! <br />";
}

if (strcmp($errorMsg, "") != 0) {
    echo $errorMsg;
} else {
    $name = $_POST["name"];
    $number = $_POST["mobile"];
    $gender = $_POST["gender"];

    if (!preg_Match("/^[a-zA-Z ]+$/", $name)) {
        $errorMsg .= "Only letters and white space allowed for name <br />";
    }

    if (!preg_match("/^[0-9-]+$/", $number)) {
        $errorMsg .= "Mobile Phone number only can contain numeric digit! <br />";
    }

    if (strcmp($errorMsg, "") != 0) {
        echo $errorMsg;
    } else {
        echo "<h1>Registration Sucessful</h1>";
        if ($gender == "m") {
            $name = "Mr " . $name;
        } else {
            $name = "Ms " . $name;
        }

        echo "<p><b>$name<br/>";
        echo "Mobile Number : $number</b></p>";
    }
}



