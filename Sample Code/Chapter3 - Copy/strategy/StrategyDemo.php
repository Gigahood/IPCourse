<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'StreetRacer.php';
    require_once 'FormulaOne.php';
    require_once 'Helicopter.php';
    require_once 'Jet.php';
    
    $streetRacer = new StreetRacer();
    $formulaOne = new FormulaOne();
    $helicopter = new Helicopter();
    $jet = new Jet();
    
    $streetRacer->go();
    $formulaOne->go();
    $helicopter->go();
    $jet->go();
    ?>
  </body>
</html>
