<?php

// base class with member properties and methods
class Allspecies {

  var $gridArr = Array();
  var $speciesArr = Array();
  var $imagesArr = Array();

  var $speciesHtmlArr = Array();
  var $html = "<!-- begin -->";

  function __construct()
  {
    // Todo: security
    $grid = $_GET['grid'];
    $gridCoord = explode(":", $grid);
    $n = substr($gridCoord[0], 0, 3);
    $e = substr($gridCoord[1], 0, 3);

    $this->speciesArr = $this->getJsonData("speciesdata-autogenerated.json");
    $this->imagesArr = $this->getJsonData("images/speciesimagedata-autogenerated.json");
    $this->gridArr = $this->getJsonData("griddata/" . $n . $e . ".json");

    foreach ($this->gridArr['species'] as $abbr => $singleSpeciesArr)
    {
      $withImage = TRUE;
      $this->generateSingleSpeciesHtml($abbr, $withImage);
    }

  }

  function getJsonData($jsonFilename)
  {
    $json = file_get_contents($jsonFilename);
    $dataArr = json_decode($json, TRUE);

    //  print_r ($dataArr); // debug

    return $dataArr;
  }

  function getSpeciesHtmlForPV($pvluokka)
  {
    if (isset($this->speciesHtmlArr[$pvluokka]))
    {
      return $this->speciesHtmlArr[$pvluokka];
    }
    else
    {
      return "<span class='nospecies'>Ei lajeja</span>";
    }
  }


  function generateSingleSpeciesHtml($abbr, $withImage = TRUE)
  {
    $localHtml = "";

    // If not in species list (= rare species that are not breeding)
    if (! isset($this->speciesArr[$abbr]))
    {
      return "\n<!-- No speciesdata for $abbr -->\n\n";
    }

    $fi = $this->speciesArr[$abbr]['fi'];
    $sci = $this->speciesArr[$abbr]['sci'];
    $pvluokka = $this->gridArr['species'][$abbr]['pvluokka'];

    $localHtml .= "<div class='species' id='$abbr'>\n";
    if ($withImage)
    {
      $localHtml .= $this->getImageHtml($abbr, $sci);
    }
    $localHtml .= $this->getIconsHtml($abbr);
    $localHtml .= "  <h4 id='h4$abbr'>$fi</h4>\n";
    $localHtml .= "</div>\n\n";

    @$this->speciesHtmlArr[$pvluokka] .= $localHtml;
  }

  function getImageHtml($abbr, $sci)
  {
    // Return image only for species with large enough pvluokka
    /*
    if ($this->gridArr['species'][$abbr]['pvluokka'] < 3)
    {
      return "<!--  Not image for this species -->\n";
    }
    else
    */
    {
      $imageUrl = "images/species/200/" . $sci . ".jpg";
      return "  <span class='speciesImage'><img src='$imageUrl' alt='' /></span>\n";
    }
  }

  function getIconsHtml($abbr)
  {
    $localHtml = "";

    if ($this->speciesArr[$abbr]['atlas']['paritKaJarjestys'] > 180)
    {
      $localHtml .= "  <img src='images/star-green.png' alt='harvalukuinen' class='icon greenstar'>\n";
    }
    if ($this->speciesArr[$abbr]['atlas']['ruudutYhtJarjestys'] > 180)
    {
      $localHtml .= "  <img src='images/star-blue.png' alt='harvinainen' class='icon bluestar'>\n";
    }

    if (@$this->speciesArr[$abbr]['uhex']['luokka2015'] == "CR")
    {
      $localHtml .= "  <img src='images/cr.png' alt='äärimmäisen uhanalainen' class='icon cr'>\n";
    }
    elseif (@$this->speciesArr[$abbr]['uhex']['luokka2015'] == "EN")
    {
      $localHtml .= "  <img src='images/en.png' alt='erittäin uhanalainen' class='icon en'>\n";
    }
    elseif (@$this->speciesArr[$abbr]['uhex']['luokka2015'] == "VU")
    {
      $localHtml .= "  <img src='images/vu.png' alt='vaarantunut' class='icon vu'>\n";
    }

    return $localHtml;
  }


} // end of class Vegetable
