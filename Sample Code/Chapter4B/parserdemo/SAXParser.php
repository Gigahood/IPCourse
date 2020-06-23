<?php
require_once 'Employee.php';

class SAXParser {

  private $employees; // list of Employee objects
  private $filename;
  private $employeeTmp; // Employee object
  private $tmpValue;

  public function __construct($filename) {
    $this->filename = $filename;
    $this->employees = array();
    $this->parseDocument();
    $this->printData();
  }
  
  public function startElement($parser, $name, $attr) {
    if (!empty($name)) {
      if ($name == 'EMPLOYEE') {
        // if current element is employee, create new Employee object
        $this->employeeTmp = new Employee();
        if (!empty($attr['ID'])) {
          $this->employeeTmp->setId($attr['ID']);
        }
      }
    }
  }

  public function endElement($parser, $name) {
    if ($name == 'EMPLOYEE') {
      $this->employees[] = $this->employeeTmp;
    } elseif ($name == 'FIRSTNAME') {
      $this->employeeTmp->setFirstName($this->tmpValue);
    } elseif ($name == 'LASTNAME') {
      $this->employeeTmp->setLastName($this->tmpValue);
    } elseif ($name == 'LOCATION') {
      $this->employeeTmp->setLocation($this->tmpValue);
    }
  }

  public function characters($parser, $data) {
    if (!empty($data)) {
      $this->tmpValue = trim($data);
    }
  }

  private function parseDocument() {
    $parser = xml_parser_create();
    xml_set_element_handler($parser, 
                            array($this, "startElement"), 
                            array($this, "endElement"));
    
    xml_set_character_data_handler($parser, array($this, "characters"));
    
    if (!($handle = fopen($this->filename, "r"))) {
      die("could not open XML input");
    }

    while ($data = fread($handle, 4096)) {
      xml_parse($parser, $data);
    }

  }
  
  public function printData() {
    foreach ($this->employees as $emp) {
      print $emp . "<br />";
    }
  }

}

$worker = new SAXParser("employee.xml");
?>

