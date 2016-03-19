
// http://html5doctor.com/finding-your-position-with-geolocation/

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
}
else {
  $( "#error-container" ).prepend( "<div>Selaimesi ei valitettavasti tue paikannusta.</div>" );
  console.log("navigator.geolocation not supported");
}

function handlePosition(position) {
  if (position.coords.accuracy > 500)
  {
    $( "#error-container" ).prepend( "<div>Tarkkaa sijaintiasi ei saatu selville, joten ao. lintuluettelo ei välttämättä ole aivan oikealta alueelta. Jos käytät tietokonetta, kokeile mielummin älypuhelimella jossa on GPS! (virhesäde " + position.coords.accuracy + " m)</div>" );
  }

  $.getJSON(
    "http://192.168.56.10/suomen-linnut/conversionwrapper.php?n=" + position.coords.latitude + "&e=" + position.coords.longitude,
    updatePage
  );
  console.log(position);
  console.log(position.coords);
}

function updatePage(data)
{
    // Coordinates is a JSON string
    console.log(data);

    $( "#main-container" ).load( "allspecies.php?grid=" + data.N + ":" + data.E );
}

function displayError(error) {
  var errors = { 
    1: 'Olet kieltänyt paikannustiedon käytön. Salli se ja yritä uudelleen.',
    2: 'Sijaintia ei pystytty hakemaan. Siirry paikkaan, josta on esteettömämpi näkymä taivaalle.',
    3: 'Sijainnin hakeminen kesti liian kauan. Tarkista että puhelimesi GPS on päällä.'
  };
  console.log(errors[error.code]);
  $( "#error-container" ).prepend("<div>" + errors[error.code] + "</div>");
}

/*
    1: 'Permission denied',
    2: 'Position unavailable',
    3: 'Request timeout'
*/