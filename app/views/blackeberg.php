<?php

$url ="https://www.yr.no/sted/Sverige/Stockholm/Blackeberg/varsel.xml";

$xml_obj = simplexml_load_file($url);

echo $xml_obj->location->name;

?>