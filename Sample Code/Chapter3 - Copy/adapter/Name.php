<?php
/**
 * Name: The original class used in the organization
 *
 * @author Kat Tan
 */
require_once 'NameInterface.php';

class Name implements NameInterface {
  private $name;
  
  public function __construct($name="") {
    $this->name = $name;
  }

  
  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }
  
  public function __toString() {
    return $this->name;
  }


}
