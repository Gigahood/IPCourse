<?php
require_once 'Circle.php';
require_once 'Rectangle.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $c = new Circle("Blue", 5);
    echo $c;
    
    $c2 = new Circle();
    echo $c2;
    
    $c->color = "Red";
    echo "<p>Updated circle color: $c->color<br />";
    $c->radius = 10;
    echo "Updated radius: $c->radius<br />";
    echo "Area = ".$c->getArea()."<br />";
    echo "Perimeter = ".$c->getPerimeter(). "</p>";
    
    echo "<p>Creating the rectangle now<br />";
    $r = new Rectangle("Green", 6, 8);
    echo $r;
    echo "Area = ".$r->getArea()."<br />";
    echo "Perimeter = ".$r->getPerimeter(). "</p>";
    
    $c->radius = 20;
    echo "Printing details<br />";
    $c->printDetails();
    
    ?>
  </body>
</html>
