<?php

require_once 'Circle.php';
require_once 'Rectangle.php';
require_once 'Square.php';

class ShapeFactory {

  // Use getShape() function to get object of type shape
  public function getShape($shapeType) {
    if ($shapeType == null)
      return null;

    if (strcasecmp($shapeType, "CIRCLE") == 0)
      return new Circle();
    
    if (strcasecmp($shapeType, "RECTANGLE") == 0)
      return new Rectangle();
    
    if (strcasecmp($shapeType, "SQUARE") == 0)
      return new Square();
    
    return null;
  }

}
