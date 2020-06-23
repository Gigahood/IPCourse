<?php
require_once ('vendor/autoload.php');
require_once 'Events.php';

$gen = new \PHP2WSDL\PHPClass2WSDL("Events", "http://localhost/Chapter5A/soapws/soap-server2.php");
$gen->generateWSDL();

file_put_contents("wsdl", $gen->dump());