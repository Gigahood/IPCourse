<!-- register.php -->

<!DOCTYPE html>
<html>
  <head>
    <title>User Registration</title>
  </head>
  <body>
    <?php
      if ((!isset($_POST['name'])) || !isset($_POST['password'])) {
          ?>
        <h1>User Registration</h1>
        <p><h3>Please enter your username and password</h3></p>
        <p>
          <form method="post" action="register.php">
            <p><label for="name">Username:</label>
            <input type="text" name="name" id="name" size="15" /></p>
            <p><label for="password">Password:</label>
            <input type="password" name="password" id="password" size="15" /></p>
            <button type="submit" name="register">Register</button>
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
        
          $query = "INSERT INTO Authorized_Users(username, passwd) VALUES (?, ?)";
          $stmt = $db->prepare($query);
          $stmt->bindParam(1, $username);
          $stmt->bindParam(2, $passwd);
          $stmt->execute();
          echo "<p>Registration successful!</p>";
          $db = null;
      }
      ?>
  </body>
</html>