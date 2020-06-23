<?php
require_once 'Connection.php';

class OracleConnection extends Connection {
  function __construct() {
  }
  
  public function description() {
    return "Oracle Database 19c (Release version 19.1.9)";
  }
}
