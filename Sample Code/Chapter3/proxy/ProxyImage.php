<?php
require_once 'Image.php';
require_once 'RealImage.php';

class ProxyImage implements Image {
  
  private $filename;
  private $image;
  
  public function __construct($filename) {
    $this->filename = $filename;
  }
  
  public function displayImage() {
    if ($this->image == null) { // load only on demand
      $this->image = new RealImage($this->filename);
    }
    $this->image->displayImage(); // delegate request to real subject
  }
}
