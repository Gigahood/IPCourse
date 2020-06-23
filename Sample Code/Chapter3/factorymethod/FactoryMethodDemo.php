<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'DBConnectionFactory.php';
    
    $factory = new DBConnectionFactory("sql server");
    $connection = $factory->createConnection();
    
    echo "You're connecting with " . $connection->description();
    ?>
  </body>
</html>
