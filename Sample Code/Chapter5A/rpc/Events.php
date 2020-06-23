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
    return $this->events;
  }
  
  public function getEventsById($eventId) {
    if (isset($this->events[$eventId])) {
      return $this->events[$eventId];
    } else {
      throw new Exception("Event not found");
    }
  }
}



