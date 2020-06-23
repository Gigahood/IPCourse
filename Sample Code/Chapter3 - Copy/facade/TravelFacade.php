<?php
require_once 'HotelBooker.php';
require_once 'FlightBooker.php';

class TravelFacade {
  private $hotelBooker;   
  private $flightBooker;
  
  function __construct() {
    $this->hotelBooker = new HotelBooker();
    $this->flightBooker = new FlightBooker();
  }
  
  public function getFlightsAndHotels($from, $to) { 
    $flights = $this->flightBooker->getFlightsFor($from, $to);
    $hotels = $this->hotelBooker->getHotelsFor($from, $to); 
    
    // process and return
    echo "<p>For travelling $from to $to:<br/>";
    echo "<br />List of hotels available: <br />$hotels<br />"; 
    echo "<br />List of flights available: <br />$flights<br /></p>";
  }
}

