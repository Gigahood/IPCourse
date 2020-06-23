<?php
/*
 *
 * @author Kat Tan
 */
class BoldDecorator extends AbstractDecorator {
  
  public function __construct($book) {
    parent::__construct($book);
  }

  public function decorate() {
    return "<strong>" . $this->book->getBookDetails() . "</strong>";
  }
  
  public function getBookDetails() {
    return $this->decorate(); 
  }

}
