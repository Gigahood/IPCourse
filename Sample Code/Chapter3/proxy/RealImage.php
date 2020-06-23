<?php
require_once 'Image.php';

class RealImage implements Image {
  private $filename;
  
  public function __construct($filename) {
    $this->filename = $filename;
    echo "<p>Loading $filename</p>";
  }
  
  public function displayImage() {
    echo "<p>Diplaying $this->filename</p>";
  }
}
