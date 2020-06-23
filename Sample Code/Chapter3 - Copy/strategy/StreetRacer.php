<?php
require_once 'GoByDriving.php';
require_once 'Vehicle.php';

class StreetRacer extends Vehicle {
  
  function __construct() {
    $this->setGoAlgorithm(new GoByDriving());
  }
}
