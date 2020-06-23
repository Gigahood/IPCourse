<?php

require_once 'Shape.php';
require_once 'Displayable.php';

class Circle extends Shape implements Displayable {

  private $radius;

  public function __construct($color = "", $radius = 1) {
    parent::__construct($color);
    $this->radius = $radius;
  }

  public function __set($name, $value) {
    if (property_exists($this, $name))
      $this->$name = $value;
    else
      parent::__set($name, $value);
  }

  public function __get($name) {
    if (property_exists($this, $name))
      return $this->$name;
    else
      return parent::__get($name);
  }

  public function getArea() {
    return pi() * $this->radius * $this->radius;
  }

  public function getPerimeter() {
    return 2 * pi() * $this->radius;
  }

  public function __toString() {
    return parent::__toString() . "Radius: $this->radius<br />";
  }

  function printDetails() {
    echo "<p>$this" . "Area: " . number_format($this->getArea(), 2) .
    "</br>Perimeter: " . number_format($this->getPerimeter(), 2) . "</p>";
  }

}
