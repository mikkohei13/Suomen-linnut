
// http://html5doctor.com/finding-your-position-with-geolocation/

if (navigator.geolocation) {
  var timeoutVal = 10 * 1000 * 1000;
  navigator.geolocation.getCurrentPosition(
    handlePosition, 
    displayError,
    { enableHighAccuracy: true, timeout: timeoutVal, maximumAge: 0 }
  );
}
else {
  alert("Geolocation is not supported by this browser");
}

function handlePosition(position) {
//	http://127.0.0.1:4567/suomenlinnut/conversionwrapper.php?n=60&e=25

  $.getJSON("http://192.168.56.10/suomen-linnut/conversionwrapper.php?n=" + position.coords.latitude + "&e=" + position.coords.longitude, function(data) {
    //data is the JSON string
    console.log(data)
//    alert("Latitude: " + data.N + ", Longitude: " + data.E);

    $( "#content" ).load( "allspecies.php?grid=" + data.N + ":" + data.E );
    $( "#pagetitle" ).html( "Ruutu " + data.N + ":" + data.E );


});

//  alert("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);
}

function displayError(error) {
  var errors = { 
    1: 'Permission denied',
    2: 'Position unavailable',
    3: 'Request timeout'
  };
  alert("Error: " + errors[error.code]);
}
