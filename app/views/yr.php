<?php

$url ="https://www.yr.no/sted/Sverige/Skåne/Malmö/forecast_hour_by_hour.xml";
$xml_obj = simplexml_load_file($url);
$json_obj = json_encode($xml_obj);
// Make object
$json_obj = json_decode($json_obj);

$yr_obj = [];
$i = 0;
foreach ($json_obj->forecast->tabular->time as $value) {
	$yr_obj[$i] = $value->temperature->{'@attributes'}->value;
	$i++;	
}

$return_data = json_encode($yr_obj);
echo $return_data;
