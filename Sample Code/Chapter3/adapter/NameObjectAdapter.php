<?php
/**
 * Description of NameObjectAdapter
 *
 * @author Kat Tan
 */
require_once 'NameInterface.php';
require_once 'WesternName.php';

class NameObjectAdapter implements NameInterface {
  private $westernName;
  
  public function __construct($westernName="") {
    $this->westernName = $westernName;
  }

  public function getName() {
    return $this->westernName->getFirstName() . " " . $this->westernName->getLastName();
  }

  public function setName($name) {
    $tokenArray = explode(" ", $name);
    $arraySize = sizeof($tokenArray);
    $firstName = "";
    for ($i = 0; $i < $arraySize - 1; $i++) {
      $firstName .= $tokenArray[$i];
    }
    
    $this->westernName->setFirstName($firstName);
    $this->westernName->setLastName($tokenArray[$arraySize-1]);
  }

}
