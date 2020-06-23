<?php
require_once 'OracleConnection.php';
require_once 'SqlServerConnection.php';
require_once 'MySqlConnection.php';

class DBConnectionFactory {
  protected $type;
  
  function __construct($type) {
    $this->type = $type;
  }
  
  function createConnection() {
    $tokenArray = explode(" ", strtoupper($this->type));
    $dbChoice = implode("", $tokenArray);
   
    if ($dbChoice == "ORACLE") 
      return new OracleConnection();
    elseif ($dbChoice == "SQLSERVER")
      return new SqlServerConnection();
    else
      return new MySqlConnection();
  }
}
