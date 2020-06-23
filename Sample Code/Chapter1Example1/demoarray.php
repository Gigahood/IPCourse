<!-- demoarray.php -->

<!DOCTYPE html>
<html>
  <head>
    <title>Demonstrating PHP Arrays</title>
  </head>
  <body>
    <?php
      echo 'Numerically Indexed Arrays:';
      $products = array('Table', 'Chair', 'Tent');
      for ($i = 0; $i < count($products); $i++) {
          echo $products[$i] . " ";
      }

      echo "<br />Shorthand Index for Creating Arrays:";
      $dessert = ['ice-cream', 'cake', 'jelly', 'pudding'];
      for ($i = 0; $i < count($dessert); $i++) {
          echo $dessert[$i] . " ";
      }

      echo "<br />Creating Arrays Using range():";
      $numbers = range(1, 10);
      $odds = range(1, 10, 2);
      $letters = range('a', 'z');

      echo "<br /><p>Associative Arrays";
      $prices = array('Table'=>20, 'Chair'=>5, 'Tent'=>50);
      $prices['Backdrop'] = 250;

      echo "<br />Displaying associative array using foreach loop: <br />";
      foreach ($prices as $key => $value) {
          echo $key."-".$value."<br />";
      }

      echo "</p><p>Displaying associative array using the each() construct:<br />";
      while ($element = each($prices)) {
          echo $element['key']." - ".$element['value'];
          echo "<br />";
      }

      echo "</p><p>Displaying associative array using the list() construct and the each() function: <br />";
      reset($prices);
      while (list($product, $price) = each($prices)) {
          echo $product . " - " . $price . "<br />";
      }
      
      echo "</p><p>Creating 2D arrays: <br />";
      $productTable = array(array('TAB', 'Table', 20),
                            array('CHA', 'Chair', 5),
                            array('TEN', 'Tent', 50));
      for ($i = 0; $i < count($productTable); $i++) {
          for ($j = 0; $j < count($productTable[$i]); $j++) {
              echo $productTable[$i][$j] . ", ";
          }
          echo "<br />";
      }

      echo "</p><p>Creating 2D array with column names: <br />";
      $productTable = array(array('Code' => 'RT',
                                  'Description' => 'Round Table',
                                  'Price' => 20
                                  ),
                            array('Code' => 'BC',
                                  'Description' => 'Banquet Chair',
                                  'Price' => 10
                                  )
                                );
      for ($row = 0; $row < count($productTable); $row++) {
          echo $productTable[$row]['Code'].', '.$productTable[$row]['Description'].', '.$productTable[$row]['Price'].'<br />';
      }

      echo "</p><p>Sorting arrays<br />";
      $products = array('Table', 'Chair', 'Tent');
      sort($products);
      for ($i = 0; $i < count($products); $i++) {
          echo $products[$i] . " ";
      }
      
      echo "</p><p>Sorting associative array by values: <br />";
      $prices = array('Table'=>80, 'Chair'=>5, 'Tent'=>50);
      $prices['Backdrop'] = 250;
      asort($prices);
      foreach ($prices as $key => $value) {
          echo $key."-".$value."<br />";
      }

      echo "</p><p>Sorting associative array by keys: <br />";
      ksort($prices);
      foreach ($prices as $key => $value) {
          echo $key."-".$value."<br />";
      }
      echo "</p>"
    ?>
  </body>
</html>