<?php
require_once 'GoByFlying.php';
require_once 'Vehicle.php';

class Helicopter extends Vehicle {
  
  function __construct() {
    $this->setGoAlgorithm(new GoByFlying());
  }
  
}
