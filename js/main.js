
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
  $( "#main-container" ).prepend( "<span class='alert'>Selaimesi ei valitettavasti tue paikannusta</span>" );
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

    $( "#main-container" ).load( "allspecies.php?grid=" + data.N + ":" + data.E );

    var griN = data.N.toString();
    var griE = data.E.toString();
    $( "#pagetitle" ).html( "Ruutu " + griN.substring(0, 3) + ":" + griN.substring(0, 3) ); // TODO: load metadata class 
}

function displayError(error) {
  var errors = { 
    1: 'Olet kieltänyt paikannustiedon käytön. Salli se ja yritä uudelleen.',
    2: 'Sijaintia ei pystytty hakemaan. Siirry paikkaan, josta on esteettömämpi näkymä taivaalle.',
    3: 'Sijainnin hakeminen kesti liian kauan. Tarkista että puhelimesi GPS on päällä.'
  };
  console.log(errors[error.code]);
  $( "#main-container" ).prepend( "<span class='alert'>" +  errors[error.code] + "</span>" );
}

/*
    1: 'Permission denied',
    2: 'Position unavailable',
    3: 'Request timeout'
*/