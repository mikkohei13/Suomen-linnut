
// Based on code by Ian Devlin
// http://html5doctor.com/finding-your-position-with-geolocation/

document.addEventListener("DOMContentLoaded", determineLocation);

function determineLocation(event)
{
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      handlePosition, 
      displayError,
      {
        enableHighAccuracy: true,
        timeout: 60000, // ms
        maximumAge: 30000 // ms
      }
    );
    $( "#error-container" ).html( "<div>Sijaintiasi haetaan...</div>" );  
  }
  else {
    $( "#error-container" ).html( "<div>Selaimesi ei valitettavasti tue paikannusta.</div>" );
//    console.log("navigator.geolocation not supported");

    logData.error = "not supported";
    logger();

  }

  function handlePosition(position) {
    if (position.coords.accuracy > 500)
    {
      $( "#message-container" ).html( "<div>Tarkkaa sijaintiasi ei saatu selville, joten ao. lintuluettelo ei välttämättä ole aivan oikealta alueelta. Jos käytät tietokonetta, kokeile mielummin älypuhelimella jossa on GPS! <span class='additional'>(virhesäde " + position.coords.accuracy + " m)</span></div>" );

      logData.error = "inaccurate";
    }

    logData.accuracy = position.coords.accuracy;
    logData.altitude = position.coords.altitude;
    logData.altitudeAccuracy = position.coords.altitudeAccuracy;
    logData.latitude = position.coords.latitude;
    logData.longitude = position.coords.longitude;

    $.getJSON(
      (rootUrl + "conversionwrapper.php?n=" + position.coords.latitude + "&e=" + position.coords.longitude),
      updatePage
    );

//    console.log(position);
  }

  function updatePage(data)
  {
//      console.log(data);
//      console.log("Success!");
      $( "#error-container" ).html("");
      $( "#main-container" ).load( "allspecies.php?grid=" + data.N + ":" + data.E );

      logData.N = data.N;
      logData.E = data.E;
      logData.error = "success";
      logger();
  }

  function displayError(error) {
    var errors = { 
      1: 'Olet kieltänyt paikannustiedon käytön selaimessa tai käyttöjärjestelmässä. Salli se ja yritä uudelleen.',
      2: 'Sijaintia ei pystytty hakemaan. Siirry paikkaan, josta on esteettömämpi näkymä taivaalle.',
      3: 'Sijainnin hakeminen kesti liian kauan. Tarkista että puhelimesi paikannustoiminto on päällä.'
    };
//    console.log(errors[error.code]);
    $( "#error-container" ).html("<div>" + errors[error.code] + "</div>");

    logData.error = "error " + error.code;
    logger();
  }

  /*
      1: 'Permission denied',
      2: 'Position unavailable',
      3: 'Request timeout'
  */
}

function logger()
{
  logData.userAgent = navigator.userAgent;
  logData.innerHeight = window.innerHeight;
  logData.innerWidth = window.innerWidth;

//  console.log(navigator);
//  console.log(window);

  $.post( "logger.php", logData, function( loggerResponse ) {
    console.log(loggerResponse);
  });
}

// Help link
$( "#helplink" ).click(function() {

  $( "#help-container" ).slideToggle( 200, function() {
    console.log("Help toggle");
  });


});
