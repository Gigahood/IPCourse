<?php
require 'lib/nusoap.php';

$client = new nusoap_client("http://localhost/Chapter5A/soapws/nusoap-server.php?wsdl"); // Create a instance for nusoap client
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SOAP Web Service Client Side Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container">
      <h2>SOAP Web Service Client Side Demo</h2>
      <form class="form-inline" action="" method="POST">
        <div class="form-group">
          <label for="name">Event ID</label>
          <input type="text" name="id" class="form-control"  placeholder="Enter Event ID"/>
        </div>
        <button type="submit" name="getAll" class="btn btn-default">Get All Events</button>
        <button type="submit" name="getEventByID" class="btn btn-default">Get Event by ID</button>
      </form>
      <p>&nbsp;</p>
      <h3>
        <?php
        if (isset($_POST['getAll'])) {
          $response = $client->call('Events.getEvents', array());
         
          if (empty($response))
            echo "No events available";
          else {
            echo "<h3>Events:<br />";
            $eventsArray = explode("|", $response);
            $i = 1;
            foreach($eventsArray as $event) {
              if ($event != "") {
                echo "$i. $event<br/>";
                $i++;
              }
            }
            echo "</h3>";
          }
        } elseif (isset($_POST['getEventByID'])) {
          $id = $_POST['id'];

          $response = $client->call('Events.getEventsById', array("id" => $id));

          if (empty($response))
            echo "No event with eventID $id";
          else {
            echo "<h3>Event information: <br/>" . $response . "</h3>";
          }
        }
        ?>
      </h3>
    </div>
  </body>
</html>


