<?php
require_once 'Connection.php';

class MySqlConnection extends Connection{
  function __construct() {
  }

  public function description() {
    return "MySQL Community Server 8.0.20";
  }
}
