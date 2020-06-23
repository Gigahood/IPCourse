<?php

class Subject {
  private $observers;
  private $state;
  
  function __construct() {
    $this->observers = new SplObjectStorage();
  }
  
  public function getState() {
    return $this->state;
  }

  public function setState($state) {
    $this->state = $state;
    $this->notifyAllObservers();
  }
  
  public function attach($observer) {
    $this->observers->attach($observer);
  }
  
  public function notifyAllObservers() {
    foreach ($this->observers as $observer) {
      $observer->update();
    }
  }


}
