<script type="text/javascript">

function showLocation(position) {
	console.log(position);
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;

  var url = "https://nominatim.openstreetmap.org/reverse?format=json&lat=" + latitude + "&lon=" + longitude;

// Create a new XMLHttpRequest object
var xhr = new XMLHttpRequest();

// Set the request method and the URL
xhr.open("GET", url);

// Set the response type to JSON
xhr.responseType = "json";

// Define what to do when the request is successful
xhr.onload = function() {
  // Check if the status code is 200 (OK)
  if (xhr.status == 200) {
    // Get the response data
    var data = xhr.response;
    // Display the address information
    console.log(data.display_name);
    document.getElementById("test").innerHTML = data.display_name;

  
  alert(data.display_name);
}
};
xhr.send();

}

function errorHandler(err) {
  if(err.code == 1) {
    alert("Error: Access is denied!");
  }else if( err.code == 2) {
    alert("Error: Position is unavailable!");
  }
}
function getLocation(){

   if(navigator.geolocation){
      // timeout at 60000 milliseconds (60 seconds)
      var options = {timeout:60000};
      navigator.geolocation.getCurrentPosition(showLocation, 
                                               errorHandler,
                                               options);
   }else{
      alert("Sorry, browser does not support geolocation!");
   }
}
</script>
HTML button to call function

   <form>
     <input type="button" onclick="getLocation();" value="Get Location"/><br>
     <label id='test'></label>
   </form>