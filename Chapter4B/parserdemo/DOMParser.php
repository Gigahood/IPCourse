<?php

require_once 'Employee.php';

class DOMParser {

  private $employees;

  public function __construct($filename) {
    $this->employees = new SplObjectStorage();
    $this->readFromXML($filename);
    $this->display();
  }

  public function readFromXML($filename) {
    $xml = simplexml_load_file($filename);
    $empList = $xml->employee; // retrieve all the employee nodes

    foreach ($empList as $emp) {
      $attr = $emp->attributes();
      $empTemp = new Employee($attr->id, 
                              $emp->firstName, 
                              $emp->lastName, 
                              $emp->location);
      
      $this->employees->attach($empTemp);
    }
  }

  public function display() {
    echo "<h2>Employee Listing </h2>";
    foreach ($this->employees as $emp) {
      print $emp . "<br />";
    }
  }

}

$worker = new DOMParser("employee.xml");
?>
