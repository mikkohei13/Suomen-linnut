
// http://html5doctor.com/finding-your-position-with-geolocation/

document.addEventListener("DOMContentLoaded", determineLocation);

function determineLocation(event)
{
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      handlePosition, 
      displayError,
      {
        enableHighAccuracy: false,
        timeout: 10000, // ms
        maximumAge: 10000 // ms
      }
    );
    $( "#error-container" ).html( "<div>Sijaintiasi haetaan, odota hetki ole hyvä...</div>" );  
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
      $( "#error-container" ).html( "<div>Tarkkaa sijaintiasi ei saatu selville, joten ao. lintuluettelo ei välttämättä ole aivan oikealta alueelta. Jos käytät tietokonetta, kokeile mielummin älypuhelimella jossa on GPS! (virhesäde " + position.coords.accuracy + " m)</div>" );

      logData.error = "inaccurate";
    }

    logData.accuracy = position.coords.accuracy;
    logData.altitude = position.coords.altitude;
    logData.altitudeAccuracy = position.coords.altitudeAccuracy;
    logData.latitude = position.coords.latitude;
    logData.longitude = position.coords.longitude;

    // TODO: failure callback?
    $.getJSON(
      "http://192.168.56.10/suomen-linnut/conversionwrapper.php?n=" + position.coords.latitude + "&e=" + position.coords.longitude,
      updatePage
    );

//    console.log(position);
  }

  function updatePage(data)
  {
//      console.log(data);
//      console.log("Success!");
//      $( "#error-container" ).html(""); // Problem: clears accuracy information also
      $( "#main-container" ).load( "allspecies.php?grid=" + data.N + ":" + data.E );

      logData.N = data.N;
      logData.E = data.E;
      logData.error = "success";
      logger();
  }

  function displayError(error) {
    var errors = { 
      1: 'Olet kieltänyt paikannustiedon käytön. Salli se ja yritä uudelleen.',
      2: 'Sijaintia ei pystytty hakemaan. Siirry paikkaan, josta on esteettömämpi näkymä taivaalle.',
      3: 'Sijainnin hakeminen kesti liian kauan. Tarkista että puhelimesi GPS on päällä.'
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

  console.log(navigator);
  console.log(window);

  $.post( "logger.php", logData, function( loggerResponse ) {
    console.log(loggerResponse);
  });
}
