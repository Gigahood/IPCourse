<?php
require_once 'Shape.php';

class Square implements Shape {
  
  public function draw() {
    echo "Inside Square::draw() method<br />";
  }

}

?>
