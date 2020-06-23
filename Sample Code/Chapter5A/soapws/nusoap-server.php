<?php

require_once 'lib/nusoap.php';
require_once 'Events.php';

//$events = new Events();
//echo $events->getEvents();
//echo "<p>", $events->getEventsById(1);

$server = new nusoap_server(); // Create a instance for nusoap server
$server->configureWSDL("eventservice", "http://www.kat-events.com"); // Configure WSDL file

$server->register(
        "Events.getEvents", // name of function
        array(), // inputs
        array("return" => "xsd:string"), // outputs
        "http://www.kat-events.com/eventservice",
        "http://www.kat-events.com/eventservice#getEvents",
        "rpc", "encoded", "Retrieve all events");

$server->register(
        "Events.getEventsById", // name of function
        array("id" => "xsd:integer"), // inputs
        array("return" => "xsd:string"), // outputs
        "http://www.kat-events.com/eventservice",
        "http://www.kat-events.com/eventservice#getEventsById",
        "rpc", "encoded", "Retrieve event by ID");

$server->service(file_get_contents("php://input"));



