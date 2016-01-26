<?php
header('Content-Type: text/html; charset=utf-8');

// This returns a div containing trhe species and grid data

require_once "species.php";

$species = new Species();

echo $species->getHtml();
echo "END";



