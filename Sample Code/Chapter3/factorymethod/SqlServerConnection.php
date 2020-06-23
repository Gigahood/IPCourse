<?php

require_once 'Connection.php';

class SqlServerConnection extends Connection {

  function __construct() {
    
  }

  public function description() {
    return "SQL Server 2019 (RTM version 15.0.2000.5)";
  }

}
