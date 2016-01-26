<?php
header('Content-Type: text/html; charset=utf-8');

// This returns a div containing trhe species and grid data

require_once "species.php";

$species = new Species();

echo "<h2>Varmat</h2>";
echo $species->getSpeciesHtmlForPV(4);

echo "<h2>Todennäköiset</h2>";
echo $species->getSpeciesHtmlForPV(3);

echo "<h2>Mahdolliset</h2>";
echo $species->getSpeciesHtmlForPV(2);


echo "END";



