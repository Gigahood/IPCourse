<?php
require_once 'Observer.php';

class BinaryObserver extends Observer {
  
  function __construct($subject) {
    $this->subject = $subject;
    $this->subject->attach($this);
  }
  
  public function update() {
    echo "Binary string: " . decbin($this->subject->getState()) . "<br />";
  }

}
