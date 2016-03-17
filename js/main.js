
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

  $.getJSON("http://192.168.56.10/suomen-linnut/conversionwrapper.php?n=" + position.coords.latitude + "&e=" + position.coords.longitude, function(data) {
    //data is the JSON string
    console.log(data);

    $( "#content" ).load( "allspecies.php?grid=" + data.N + ":" + data.E );
    $( "#pagetitle" ).html( "Ruutu " + data.N + ":" + data.E ); // TODO: load metadata class


});

//  alert("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);
}

function displayError(error) {
  var errors = { 
    1: 'Olet kieltänyt paikannustiedon käytön',
    2: 'Sijainti ei ole saatavilla',
    3: 'Toiminnon aikakatkaisu'
  };
  var errorMessage = "Virhe: " + errors[error.code] + " koodi " + error.code;
  console.log(errorMessage);
  alert(errorMessage); // TODO: write into document
}

/*
    1: 'Permission denied',
    2: 'Position unavailable',
    3: 'Request timeout'
*/