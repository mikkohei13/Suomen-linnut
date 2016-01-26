<?php
header('Content-Type: text/html; charset=utf-8');

?>
<style>

div
{
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
}

.species
{
	position: relative;
	float: left;
	width: 220px;
	max-width: 50%;
	height: 185px;
	overflow: hidden;
}

.speciesImage
{
	display: block;
	width: 200px;
	height: 133px;
	overflow: hidden;
}

.icon
{
	position: absolute;
	top: 125px;
	left: 2px;
	width: 25px;
	height: 25px;
}

.bluestar
{
	left: 27px;
}

.greenstar
{
	left: 54px;
}

h4
{
	margin: 15px 0 0 0;
}

h2
{
	clear: both;
}

</style>

<?php

// This returns a div containing trhe species and grid data

require_once "species.php";

$species = new Species();

echo "
<div id='varmat'>
<h2>Varmat</h2>
";
echo $species->getSpeciesHtmlForPV(4);
echo "
</div>
";

echo "
<div id='todennakoiset'>
<h2>Todennäköiset</h2>";
echo $species->getSpeciesHtmlForPV(3);
echo "
</div>
";

echo "
<div id='mahdolliset'>
<h2>Mahdolliset</h2>";
echo $species->getSpeciesHtmlForPV(2);
echo "
</div>
";


echo "END";



