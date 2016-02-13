<?php
header('Content-Type: application/json; charset=utf-8');


$n = $_GET['n'];
$e = $_GET['e'];

$conversionServiceUrl = "http://koivu.luomus.fi/projects/coordinateservice/json/?from=WGS84&to=YKJ&n=". $n . "&e=" . $e;
$json = file_get_contents($conversionServiceUrl);

echo $json;



