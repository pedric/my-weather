<?php

$url ="https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/13.028/lat/55.5918/data.json";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result=curl_exec($ch);
curl_close($ch);

$json_obj = json_decode($result);

echo $json_obj->timeSeries[0]->parameters[1]->values[0];

?>