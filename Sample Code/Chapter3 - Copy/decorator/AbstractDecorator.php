<?php
/**
 * @author Kat Tan
 */
require_once 'BookInterface.php';

abstract class AbstractDecorator implements BookInterface {
  protected $book;
  
  public function __construct($book) {
    $this->book = $book;
  }
  
  public function getBook() {
    return $this->book;
  }

  public function setBook($book) {
    $this->book = $book;
  }
  
  public abstract function decorate();

}
