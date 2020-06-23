<?php
require_once 'GoByDriving.php';
require_once 'Vehicle.php';

class FormulaOne extends Vehicle {
  
  function __construct() {
    $this->setGoAlgorithm(new GoByDriving());
  }
}

