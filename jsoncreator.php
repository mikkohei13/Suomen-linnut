<?php
header('Content-Type: text/html; charset=utf-8');
echo "<pre>";

require_once "../../suomen-linnut.php";
if ($_GET['secret'] != $secret)
{
	exit("secret parameter needed");
}


$data = Array();

// ------------------------------------------
// Atlasdata nimet

$atlasNamesSpecies = file_get_contents("data/atlas-lajit.txt");

$atlasNamesSpeciesArr = explode("\n", $atlasNamesSpecies);

foreach ($atlasNamesSpeciesArr as $number => $row)
{
	$row = trim($row);
	$cells = explode(",", $row);

//	print_r ($cells);

	$sci = $cells[1];

	$data[$sci]['sci'] = $cells[1];
	$data[$sci]['fi'] = $cells[2];
	$data[$sci]['sv'] = $cells[3];
	$data[$sci]['en'] = $cells[4];
	$data[$sci]['abbr'] = $cells[0];

	$data[$sci]['atlas']['julkisuus'] = $cells[5];

}

//exit("DEBUG END");

// ------------------------------------------
// Atlasdata parimäärät

$atlasSpecies = file_get_contents("data/lintuatlas3-SIIVOTTU.txt");

$atlasSpeciesArr = explode("\n", $atlasSpecies);

foreach ($atlasSpeciesArr as $number => $row)
{
	$row = trim($row);
	$cells = explode("\t", $row);

//	print_r ($cells);

	$sci = $cells[3];

	$data[$sci]['jarjestys'] = $cells[0];

	$data[$sci]['atlas']['ruudutVarmoja'] = $cells[4];
	$data[$sci]['atlas']['ruudutTodennakoisia'] = $cells[5];
	$data[$sci]['atlas']['ruudutMahdollisia'] = $cells[6];
	$data[$sci]['atlas']['ruudutYht'] = $cells[7];
	$data[$sci]['atlas']['paritMin'] = $cells[8];
	$data[$sci]['atlas']['paritMax'] = $cells[9];
	$data[$sci]['atlas']['paritKa'] = $cells[10];

}


// ------------------------------------------
// Uhexdata luokat


$uhexSpecies = file_get_contents("data/uhex-luokat-SIIVOTTU.txt");

$uhexSpeciesArr = explode("\n", $uhexSpecies);

foreach ($uhexSpeciesArr as $number => $row)
{
	$row = trim($row);
	$cells = explode("\t", $row);

//	print_r ($cells);

	$sci = $cells[1] . " " . $cells[2];

	$data[$sci]['uhex']['luokka2015'] = $cells[3];
	$data[$sci]['uhex']['luokka2010'] = $cells[4];
	$data[$sci]['uhex']['luokka2000'] = $cells[5];
	$data[$sci]['uhex']['yksilot'] = $cells[6];
	$data[$sci]['uhex']['yksilotMin'] = $cells[7];
	$data[$sci]['uhex']['yksilotMax'] = $cells[8];
	$data[$sci]['uhex']['yksilotKa'] = $cells[9];
}


// ------------------------------------------
// Uhexdata liite 2


$uhex2Species = file_get_contents("data/uhex-liite2-SIIVOTTU.txt");

$uhex2SpeciesArr = explode("\n", $uhex2Species);

foreach ($uhex2SpeciesArr as $number => $row)
{
	$row = trim($row);
	$cells = explode("\t", $row);

//	print_r ($cells);

	$sci = $cells[1];

	$data[$sci]['uhex']['kriteerit'] = $cells[5];
	$data[$sci]['uhex']['elinymparisto'] = $cells[6];
	$data[$sci]['uhex']['elinymparisto-muut'] = $cells[7];
	$data[$sci]['uhex']['syyt'] = $cells[8];
	$data[$sci]['uhex']['uhat'] = $cells[9];
	$data[$sci]['uhex']['muutossyy'] = $cells[10];
}

// ------------------------------------------
// Järjestys
// Muuttaa keyn numeeriseksi!

// Parimäärä
uasort($data, function($a, $b) {
    return $b['atlas']['paritKa'] - $a['atlas']['paritKa'];
});

$i = 1;
foreach ($data as $key => $arr)
{
	$data[$key]['atlas']['paritKaJarjestys'] = $i;
	$i++;
}

// Ruutumäärä
uasort($data, function($a, $b) {
    return $b['atlas']['ruudutYht'] - $a['atlas']['ruudutYht'];
});

$i = 1;
foreach ($data as $key => $arr)
{
	$data[$key]['atlas']['ruudutYhtJarjestys'] = $i;
	$i++;
}




// ------------------------------------------
// Lopputoimet

// Remove non-species
foreach ($data as $species => $speciesData)
{
	$removables['SCI'] = 1;
	$removables['Genus Species'] = 1;
	$removables[' '] = 1;

	if (@$removables[$species] == 1 || empty($species))
	{
		unset($data[$species]);
	}
}

// print_r ($data); exit("DEBUG HERE");


// Use abbrs as key
$abbrData = Array();
foreach ($data as $key => $item)
{
	$abbrData[$item['abbr']] = $item;
}
$data = $abbrData;



// Write file
$json = json_encode($data);
file_put_contents("speciesdata-autogenerated.json", $json);

print_r ($data);

?>

END
