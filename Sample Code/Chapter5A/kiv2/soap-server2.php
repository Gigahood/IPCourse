<?php
require_once 'Events.php';

$server = new SoapServer("wsdl"); // wsdl file name
$server->setClass('Events');
$server->handle();

