<?php
/**
 * @author Kat Tan
 */

function __autoload($class_name) {
  include $class_name . '.php';
}

class DecoratorDemo {
  private $myBook;
  
  public function __construct() {
    $this->myBook = new Book("The Cat in the Hat", "Dr. Seuss");
    
    $description = $this->myBook->getBookDetails();
    echo "<p>Before applying 'decorations': $description</p>";
    
    $this->myBook = $this->wrapComponent($this->myBook);
    $description = $this->myBook->getBookDetails();
    echo "Recommended Book: $description";
  }
  
  private function wrapComponent(BookInterface $component) {
    $component = new KeywordsDecorator($component, "A classic children's book!");
    $component = new BoldDecorator($component);
    return $component;
  }
  
}

$worker = new DecoratorDemo();

?>
