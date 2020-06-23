<!DOCTYPE html>
<html>
  <head>
    <title>Outdoor Event Supplies Search Results</title>
  </head>
  <body>
    <h1>Outdoor Event Supplies Search Results</h1>
    <?php
    $searchterm = trim($_POST['searchterm']);

    if (!$searchterm) {
        echo '<p>You have not entered what you would like to search for.<br />
            Please go back and try again.</p>';
        exit;
    }

    $host = 'localhost';
    $dbName = 'mydb';
    $user = 'root';
    $password = 'secret';

    // set up DSN
    $dsn = "mysql:host=$host;dbname=$dbName";

    try {
        $db = new PDO($dsn, $user, $password);
        echo "<p>Connection to database successful</p>";
    } catch (PDOException $ex) {
        echo "<p>ERROR: " . $ex->getMessage() . "</p>";
        exit;
    }

    $query = "SELECT * FROM Products WHERE ProductName = ?";

    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $searchterm, PDO::PARAM_STR);
    $stmt->execute();

    $totalrows = $stmt->rowCount();
    if ($totalrows == 0) {
        echo "Could not find any product named $searchterm.";
        exit;
    }
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);
    print("\n");
    $db = null;
    ?>
  </body>

</html>
