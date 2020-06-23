<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'ShapeFactory.php';
    
    $shapeFactory = new ShapeFactory();
    
    // Get a Circle object and call its draw method
    $shape1 = $shapeFactory->getShape("CIRCLE");
    $shape1->draw();
    
    // Get a Rectangle object and call its draw method
    $shape2 = $shapeFactory->getShape("RECTANGLE");
    $shape2->draw();
    
    // Get a Square object and call its draw method
    $shape3 = $shapeFactory->getShape("SQUARE");
    $shape3->draw();
    ?>
  </body>
</html>
