<?php
class Events {
  protected $events = array(
      1 => array("name" => "Excellent PHP Event",
          "date" => "12-09-2020",
          "location" => "Amsterdam"),
      2 => array("name" => "Marvellous PHP Conference",
          "date" => "25-10-2020",
          "location" => "Toronto"),
      3 => array("name" => "Fantastic Community Meetup",
          "date" => "11-11-2020",
          "location" => "Johannesburg")
  );
 
  public function getEvents() {
    $outputStr = "";
    foreach($this->events as $event) {
      $outputStr .= $event['name'] . " on " . $event['date'] . " in " . $event['location'] . "|";
    }
    return $outputStr;
  }
  
  public function getEventsById($eventId) {
    if (isset($this->events[$eventId])) {
      $event = $this->events[$eventId];
      $outputStr = "";
      $outputStr .= $event['name'] . " on " . $event['date'] . " in " . $event['location'];
      return $outputStr;
    } else {
      throw new Exception("Event not found");
    }
  }
}



