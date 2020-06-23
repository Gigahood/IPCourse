<?php
require_once 'Events.php';

if (isset($_GET['method'])) {
  switch ($_GET['method']) {
    case "eventList":
      $events = new Events();
      $data = $events->getEvents();
      break;
    case "event":
      $eventId = (int) $_GET['eventId'];
      $events = new Events();
      $data = $events->getEventsById($eventId);
      break;
    default:
      http_response_code(400);
      $data = array("error" => "bad request");
      break;
  }
} else {
  http_response_code(400);
  $data = array("error" => "bad request");
}

header("Content-Type: application/json");
echo json_encode($data);



