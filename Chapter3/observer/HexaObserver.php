<?php

class HexaObserver extends Observer {
  function __construct($subject) {
    $this->subject = $subject;
    $this->subject->attach($this);
  }
  
  public function update() {
    echo "Hex string: " . strtoupper(dechex($this->subject->getState())) . "<br />";
  }

}
