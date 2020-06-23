<?php
require_once 'GoAlgorithm.php';

abstract class Vehicle {
  private $goAlgorithm;
  
  function getGoAlgorithm() {
    return $this->goAlgorithm;
  }

  function setGoAlgorithm($goAlgorithm) {
    $this->goAlgorithm = $goAlgorithm;
  }
  
  function go() {
    $this->goAlgorithm->go();
  }
}
