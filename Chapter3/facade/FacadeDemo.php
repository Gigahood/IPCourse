<?php
require_once 'TravelFacade.php';
$facade = new TravelFacade();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <h1>Risky Travel Agent</h1>
    <form method = "POST">
      Enter the start date and end date for your trip.
      <p>Start Date:<input type="text" name="startDate" value="" size="20" /></p>
      <p>End date: <input type="text" name="endDate" value="" /><br/></p>
      <p><input type="submit" value="Submit" name="submit"/></p>
    </form >
    <?php
    if (isset($_POST["submit"])) {
      $from = trim($_POST["startDate"]);
      $to = trim($_POST["endDate"]);
      $facade->getFlightsAndHotels($from, $to);
    }
    ?>
  </body>
</html>
