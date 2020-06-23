<?php

class SimpleXMLXPath {
  private $xml;
  
  public function __construct($filename) {
    $this->xml = simplexml_load_file($filename);
  }
  
  public function listAll() {
    $employees = $this->xml->xpath("/employees/employee");
    print_r($employees);
    
    echo "<p><h2>List of Employees</h2>";
    foreach ($employees as $emp) {
      $nodes = $emp->children();
      $attributes = $emp->attributes();
      echo "<p>";
      foreach ($attributes as $attrName => $attrValue) {
        echo $attrName . ": " . $attrValue . "<br />";
      }
      
      foreach ($nodes as $nodeName => $nodeValue) {
        echo $nodeName . ": " . $nodeValue . "<br />";
      }
      echo "</p>";
    }
    
  }
}

$worker = new SimpleXMLXPath("employee.xml");
$worker->listAll();
?>
