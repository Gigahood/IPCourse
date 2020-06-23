<?php

class Employee {

  private $id, $firstName, $lastName, $location;

  public function __construct($id="", $firstName="", $lastName="", $location="") {
    $this->id = $id;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->location = $location;
  }

  public function getId() {
    return $this->id;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  public function getLastName() {
    return $this->lastName;
  }

  public function getLocation() {
    return $this->location;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setFirstName($firstName) {
    $this->firstName = $firstName;
  }

  public function setLastName($lastName) {
    $this->lastName = $lastName;
  }

  public function setLocation($location) {
    $this->location = $location;
    }

    public function __toString() {
    return $this->firstName . " " . $this->lastName . ", (" . $this->id . "), " . $this->location;
  }

}
