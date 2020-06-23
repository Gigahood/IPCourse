<?php
require_once 'Shape.php';

class Rectangle extends Shape {
  private $length, $width;
  
  public function __construct($color, $length, $width) {
    parent::__construct($color);
    $this->length = $length;
    $this->width = $width;
  }
  
  public function __set($name, $value) {
    parent::__set($name, $value);
    $this->$name = $value;
  }
  
  public function __get($name) {
    return $this->$name;
  }
  
  public function getArea() {
    return $this->length * $this->width;
  }

  public function getPerimeter() {
    return 2 * ($this->length + $this->width);
  }
  
  public function __toString() {
    return parent::__toString()."Length: $this->length<br />Width: $this->width<br .>";
  }

}
