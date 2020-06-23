<?php

try {
  $client = new SoapClient("http://localhost/Chapter5A/soapws/wsdl");
  var_dump($client);
  $events = $client->getEvents();
  echo "In client2<br />";
  var_dump($events);
  print_r($events);
//  foreach ($events as $e) {
//    echo implode($e) . "<br />";
//  }
    
} catch (SoapFault $ex) {
  var_dump($ex);
}

