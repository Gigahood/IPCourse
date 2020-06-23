<?php
/**
 * WesternName: This is the class used by the foreign company
 *
 * @author Kat Tan
 */
class WesternName {
  private $firstName;
  private $lastName;
  
  public function __construct($firstName="", $lastName="") {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }
  
  public function getFirstName() {
    return $this->firstName;
  }

  public function getLastName() {
    return $this->lastName;
  }

  public function setFirstName($firstName) {
    $this->firstName = $firstName;
  }

  public function setLastName($lastName) {
    $this->lastName = $lastName;
  }

  public function __toString() {
    return $this->lastName . ", " . $this->firstName;
  }


}
