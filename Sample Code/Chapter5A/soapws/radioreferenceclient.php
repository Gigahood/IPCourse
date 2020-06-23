<?php
$client = new SoapClient('http://api.radioreference.com/soap2/?wsdl&v=latest');
$countries = $client->getCountryList();
print_r($countries);

