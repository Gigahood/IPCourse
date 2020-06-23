<?php
require_once 'Events.php';

$options = array("uri" => "http://localhost");
$server = new SoapServer(null, $options);
$server->setClass('Events');
$server->handle();

