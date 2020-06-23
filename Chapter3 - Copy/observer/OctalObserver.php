<?php

class OctalObserver extends Observer {
  
  function __construct($subject) {
    $this->subject = $subject;
    $this->subject->attach($this);
  }
  
  public function update() {
    echo "Octal string: " . decoct($this->subject->getState()) . "<br />";
  }
}
