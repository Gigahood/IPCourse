<?php

abstract class Shape {
  private $color;
  
  public function __construct($color) {
    $this->color = $color;
  }
  
  public function __set($name, $value) {
    $this->$name = $value;
  }
  
  public function __get($name) {
    return $this->$name;
  }
  
  public abstract function getArea();
  public abstract function getPerimeter();
  
  public function __toString() {
    return "Color: $this->color<br />";
  }
}
