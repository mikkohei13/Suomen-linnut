
// http://html5doctor.com/finding-your-position-with-geolocation/

if (navigator.geolocation) {
  var timeoutVal = 10 * 1000 * 1000;
  navigator.geolocation.getCurrentPosition(
    handlePosition, 
    displayError,
    {
      enableHighAccuracy: true,
      timeout: timeoutVal,
      maximumAge: 0
    }
  );
}
else {
  $( ".header-container" ).append( "<span class='alert'>Selaimesi ei valitettavasti tue paikannusta</span>" );
  console.log("navigator.geolocation not supported");
}

function handlePosition(position) {
//	e.g. ... conversionwrapper.php?n=60&e=25
  $.getJSON(
    "http://192.168.56.10/suomen-linnut/conversionwrapper.php?n=" + position.coords.latitude + "&e=" + position.coords.longitude,
    updatePage
  );
}

function updatePage(data)
{
    //data is a JSON string
    console.log(data);

    $( "#content" ).load( "allspecies.php?grid=" + data.N + ":" + data.E );
    $( "#pagetitle" ).html( "Ruutu " + data.N + ":" + data.E ); // TODO: load metadata class 
}

function displayError(error) {
  var errors = { 
    1: 'Olet kieltänyt paikannustiedon käytön. Salli se ja yritä uudelleen.',
    2: 'Sijaintia ei pystytty hakemaan. Siirry paikkaan, josta on esteettömämpi näkymä taivaalle.',
    3: 'Sijainnin hakeminen kesti liian kauan. Tarkista että puhelimesi GPS on päällä.'
  };
  console.log(errors[error.code]);
  $( ".header-container" ).append( "<span class='alert'>" +  errors[error.code] + "</span>" );
}

/*
    1: 'Permission denied',
    2: 'Position unavailable',
    3: 'Request timeout'
*/