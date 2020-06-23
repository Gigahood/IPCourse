<!-- index.php  -->
<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
  </head>
  <body>
    <?php 
    if ((!isset($_POST['name'])) || !isset($_POST['password'])) {
        ?>
    <h1>Please Log In</h1>
    <p><h3>Please enter your username and password</h3></p>
    <p>
      <form method="post" action="index.php">
        <p><label for="name">Username:</label>
        <input type="text" name="name" id="name" size="15" /></p>
        <p><label for="password">Password:</label>
        <input type="password" name="password" id="password" size="15" value=""/></p>
        <button type="submit" name="login">Login</button>
    </form>
<?php
    } else {
        $host = 'localhost';
        $dbName = 'sample_DB';
        $dbuser = 'root';
        $dbpassword = 'secret';

        // set up DSN
        $dsn = "mysql:host=$host;dbname=$dbName";

        try {
            $db = new PDO($dsn, $dbuser, $dbpassword);
            echo "<p>Connection to database successful</p>";
        } catch (PDOException $ex) {
            echo "<p>ERROR: " . $ex->getMessage() . "</p>";
            exit;
        }
        $username = trim($_POST['name']);
        $passwd = sha1(trim($_POST['password']));
        $query = "SELECT * FROM authorized_users WHERE username = ? AND passwd = ?";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->bindParam(2, $passwd, PDO::PARAM_STR);
        $stmt->execute();

        $totalrows = $stmt->rowCount();
        if ($totalrows == 0) {
            echo "<p>Unauthorized user. </p>";
            echo "<p><a href='register.php'>Click here to register as a new user</a></p>";
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "<p><h2>Welcome $username!</h2></p>";
            echo "<p><a href='search.html'>Search Products</a></p>";
        }
        $db = null;
    }
  ?>
  </body>
</html>