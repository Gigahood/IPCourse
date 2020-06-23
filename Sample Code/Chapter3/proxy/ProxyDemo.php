<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'ProxyImage.php';
    
    $images[] = new ProxyImage("HiRes_10MB_Photo1");
    $images[] = new ProxyImage("HiRes_10MB_Photo2");
    $images[] = new ProxyImage("HiRes_10MB_Photo3");
    
    $images[0]->displayImage();
    $images[1]->displayImage();
    $images[0]->displayImage(); // already loaded
    ?>
  </body>
</html>
