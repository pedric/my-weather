<?php

// Get YR object
$url ="https://www.yr.no/sted/Sverige/Skåne/Malmö/forecast_hour_by_hour.xml";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result=curl_exec($ch);
curl_close($ch);

$xml_obj = simplexml_load_string($result);
$json_encode_obj = json_encode($xml_obj);
$yr_json_obj = json_decode($json_encode_obj);

// Get SMHI object
$url ="https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/13.028/lat/55.5918/data.json";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result=curl_exec($ch);
curl_close($ch);

$smhi_json_obj = json_decode($result);

// Set vars
$time_obj = [];
$smhi_obj = [];
$yr_obj = [];

// Create time and temp array from SMHI
$i = 0;
foreach ($smhi_json_obj->timeSeries as $value) {
	$time = date_create($value->validTime);
	if($i<24) {
		$time_obj[$i] = 'kl' . date_format($time, 'h');
		$smhi_obj[$i] = intval($value->parameters[1]->values[0]);
	}
	$i++;
}

// Create temp array from YR (time will trust SMHI data)
$i = 0;
foreach ($yr_json_obj->forecast->tabular->time as $value) {
	$yr_obj[$i] = $value->temperature->{'@attributes'}->value;
	$i++;	
}

// JSON encode arrays
$time_obj = json_encode($time_obj);
$smhi_obj = json_encode($smhi_obj);
$yr_obj = json_encode($yr_obj);

// Make json return as string
$return_data = "{\"time\":" . $time_obj . ",\"smhi\":" . $smhi_obj . ",\"yr\":" . $yr_obj . "}";
echo $return_data;

