<?php
require 'lib/nusoap.php';

$client = new nusoap_client("http://www.dataaccess.com/webservicesserver/numberconversion.wso?wsdl"); // Create a instance for nusoap client
// $client = new SoapClient('http://www.dataaccess.com/webservicesserver/numberconversion.wso?wsdl');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Free Web Service Client Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container">
      <h2>SOAP Free Web Service Demo</h2>
      <form class="form-inline" action="" method="POST">
        <div class="form-group">
          <p>
            <label for="name">Number</label>
            <input type="text" name="number" class="form-control"  placeholder="Enter a number" required/>
          </p>
        </div>
        <p><p>
          <button type="submit" name="inWords" class="btn btn-default">In Words</button>
          <button type="submit" name="toDollars" class="btn btn-default">To Dollars</button>
        </p></p>
      </form>
      <p>&nbsp;</p>
      <h3>
        <?php
        if (isset($_POST['inWords'])) {
          $number = intval($_POST['number']);
          $response = $client->call('NumberToWords', array("ubiNum" => $number), "http://www.dataaccess.com/webservicesserver/");

          if (empty($response))
            echo "Error";
          else
            echo "<h3>$number in words is <br/>" . $response . "</h3>";
        } elseif (isset($_POST['toDollars'])) {
          $number = doubleval($_POST['number']);
          $response = $client->call('NumberToDollars', array("dNum" => $number), "http://www.dataaccess.com/webservicesserver/");

          if (empty($response))
            echo "Error";
          else
            echo "<h3>$number is <br/>" . $response . "</h3>";
        }
        ?>
      </h3>
    </div>
  </body>
</html>


