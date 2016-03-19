<?php
header('Content-Type: text/html; charset=utf-8');


// This returns a div containing all species and grid data

require_once "allspecies_class.php";
$allspecies = new Allspecies();

echo $allspecies->getMetaHtml();

echo "<div class=\"main wrapper clearfix\" id=\"content\">";

	echo "
	<div id='varmat' class='status-container'>
	<h2>Varmasti pesivät</h2>
	<p>Näiden lajien munapesä tai vastakuoriutuneet poikaset on löydetty alueelta.</p>
	";
	echo $allspecies->getSpeciesHtmlForPV(4);
	echo "
	</div>
	";

	echo "
	<div id='todennakoiset' class='status-container'>
	<h2>Todennäköisesti pesivät</h2>
	<p>Näistä lajeista on havaittu pesä mutta ei tiedetä onko pesää käytetty.</p>
	";
	echo $allspecies->getSpeciesHtmlForPV(3);
	echo "
	</div>
	";

	echo "
	<div id='mahdolliset' class='status-container'>
	<h2>Mahdollisesti pesivät</h2>
	<p>Nämä lajit on havaittu alueella niille sopivassa pesimäympäristössä, mutta pesää tai poikasia ei ole löydetty.</p>
	";
	echo $allspecies->getSpeciesHtmlForPV(2);
	echo "
	</div>
	";


echo "</div> <!-- #content -->";



