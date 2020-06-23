<?php
/**
 * Description of NameClassAdapter
 *
 * @author Kat Tan
 */
require_once 'NameInterface.php';
require_once 'WesternName.php';

class NameClassAdapter extends WesternName implements NameInterface {
  public function __construct() {
  }
    
  public function getName() {
    return $this->getFirstName() . " " . $this->getLastName();
  }

  public function setName($name) {
    $tokenArray = explode(" ", $name);
    $arraySize = sizeof($tokenArray);
    $firstName = "";
    for ($i = 0; $i < $arraySize - 1; $i++) {
      $firstName .= $tokenArray[$i];
    }
    
    $this->setFirstName($firstName);
    $this->setLastName($tokenArray[$arraySize-1]);
  }

}
