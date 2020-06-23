<?php

$host = 'localhost';
$dbName = 'collegeDB';
$user = 'root';
$password = 'secret';

$coded = $_POST['code'];
$title = trim($_POST["title"]);
$credit = $_POST["creditValue"];
$yos = $_POST["yearOfStudy"];

// set up DSN
$dsn = "mysql:host=$host;dbname=$dbName";

try {
    $db = new PDO($dsn, $user, $password);
    $pstmt = $db->prepare("Insert into subjects (code, title, credit, yearOfStudy) Values (?,?,?,?)");
    $pstmt->bindParam(1, $coded, PDO::PARAM_STR);
    $pstmt->bindParam(2, $title, PDO::PARAM_STR);
    $pstmt->bindParam(3, $credit, PDO::PARAM_INT);
    $pstmt->bindParam(4, $yos, PDO::PARAM_INT);
    $pstmt->execute();

    renderUI($db);
} catch (Exception $ex) {
    
}

function renderUI($db) {
    $query = "SELECT * FROM subjects";
    $resultSet = $db->query($query);

    echo "Updated Record : <br/><br/>";
    
    $table = "<table>";
    $table .= "<th>Code</th>"
            . "<th>Title</th>"
            . "<th>Credit</th>"
            . "<th>Year Of Study</th>";

    foreach ($resultSet as $value) {
        $table .= "<tr>"
                . "<td>$value[code]</td>"
                . "<td>$value[title]</td>"
                . "<td>$value[credit]</td>"
                . "<td>$value[yearOfStudy]</td>";
    }

    $table .= "</table>";


    echo $table;
}
