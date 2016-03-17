<?php
header('Content-Type: text/html; charset=utf-8');


// This returns a div containing all species and grid data

require_once "allspecies_class.php";
$allspecies = new Allspecies();

echo $allspecies->getGridHtml();

echo "<div class=\"main wrapper clearfix\" id=\"content\">";

	echo "
	<div id='varmat'>
	<h2>Varmasti pesivät</h2>
	";
	echo $allspecies->getSpeciesHtmlForPV(4);
	echo "
	</div>
	";

	echo "
	<div id='todennakoiset'>
	<h2>Todennäköisesti pesivät</h2>";
	echo $allspecies->getSpeciesHtmlForPV(3);
	echo "
	</div>
	";

	echo "
	<div id='mahdolliset'>
	<h2>Mahdollisesti pesivät</h2>";
	echo $allspecies->getSpeciesHtmlForPV(2);
	echo "
	</div>
	";


echo "</div> <!-- #content -->";



