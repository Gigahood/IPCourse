<?php

$options = array("location" => "http://localhost/Chapter5A/soapws/soap-server.php",
    "uri" => "http://localhost");

try {
  $client = new SoapClient(null, $options);
  $response = $client->getEvents();
  echo "<h3>Events:<br />";
  $eventsArray = explode("|", $response);
  $i = 1;
  foreach ($eventsArray as $event) {
    if ($event != "") {
      echo "$i. $event<br/>";
      $i++;
    }
  }
  echo "</h3>";
} catch (SoapFault $ex) {
  var_dump($ex);
}

