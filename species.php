<?php

// base class with member properties and methods
class Species {

  var $gridArr = Array();
  var $speciesArr = Array();
  var $imagesArr = Array();
  var $html = "<!-- begin -->";

  function __construct()
  {
    // Todo: security
    $grid = $_GET['grid'];
    $this->gridArr = explode(":", $grid);

    $this->speciesArr = $this->getJsonData("speciesdata-autogenerated.json");
    $this->imagesArr = $this->getJsonData("images/speciesimagedata-autogenerated.json");
    $this->gridArr = $this->getJsonData("griddata/" . $this->gridArr[0] . $this->gridArr[1] . ".json");

    foreach ($this->gridArr['species'] as $abbr => $singleSpeciesArr)
    {
      $speciesHtml = $this->generateSpeciesHtml($abbr);
      $this->html .= $speciesHtml;
    }

  }

  function getJsonData($jsonFilename)
  {
    $json = file_get_contents($jsonFilename);
    $dataArr = json_decode($json, TRUE);

    //  print_r ($dataArr); // debug

    return $dataArr;
  }

  function getHtml()
  {
    return $this->html;
  }


  function generateSpeciesHtml($abbr)
  {
    $localHtml = "";

    // If not in species list (= rare species that are not breeding)
    if (! isset($this->speciesArr[$abbr]))
    {
      return "\n<!-- No speciesdata for $abbr -->\n\n";
    }

    $fi = $this->speciesArr[$abbr]['fi'];
    $sci = $this->speciesArr[$abbr]['sci'];

    $localHtml .= "
      <h4>$fi ($sci)</h4>
    ";
    $localHtml .= $this->getImageHtml($sci);
    $localHtml .= $this->getIconsHtml($abbr);

    return $localHtml;

  }

  function getImageHtml($sci)
  {
    $imageUrl = "images/species/200/" . $sci . ".jpg";
    return "<img src='$imageUrl' alt='' />";
  }

  function getIconsHtml($abbr)
  {
    $localHtml = "";

    if ($this->speciesArr[$abbr]['atlas']['paritKaJarjestys'] > 170)
    {
      $localHtml .= "
        <img src='images/star-green.png'>
      ";
    }
    if ($this->speciesArr[$abbr]['atlas']['ruudutYhtJarjestys'] > 170)
    {
      $localHtml .= "
        <img src='images/star-blue.png'>
      ";
    }
    if (@$this->speciesArr[$abbr]['uhex']['luokka2015'] == "CR")
    {
      $localHtml .= "
        <img src='images/cr.png'>
      ";
    }
    if (@$this->speciesArr[$abbr]['uhex']['luokka2015'] == "EN")
    {
      $localHtml .= "
        <img src='images/en.png'>
      ";
    }
    if (@$this->speciesArr[$abbr]['uhex']['luokka2015'] == "VU")
    {
      $localHtml .= "
        <img src='images/vu.png'>
      ";
    }

    return $localHtml;
  }


} // end of class Vegetable
