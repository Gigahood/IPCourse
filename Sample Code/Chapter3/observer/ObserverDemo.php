<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'BinaryObserver.php';
    require_once 'HexaObserver.php';
    require_once 'OctalObserver.php';
    require_once 'Subject.php';
    
    $subject = new Subject();
    
    new BinaryObserver($subject);
    new HexaObserver($subject);
    new OctalObserver($subject);
    
    echo "First state change: 15<br />";
    $subject->setState(15);
    echo "<br/>Second state change: 10<br />";
    $subject->setState(10);
    
    ?>
  </body>
</html>
