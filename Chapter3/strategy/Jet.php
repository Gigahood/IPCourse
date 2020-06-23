<?php
require_once 'GoByFlyingFast.php';
require_once 'Vehicle.php';

class Jet extends Vehicle {
  
  function __construct() {
    $this->setGoAlgorithm(new GoByFlyingFast());
  }
  
}