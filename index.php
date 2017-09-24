<!DOCTYPE html>
<html>
<head>
  <title> Determining User Location with HTML5</title>
  <style type="text/css">
  button{
    background: #333;
    padding: 20px 30px;
    border: 1px solid #333;
    border-radius: 40px;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
  }

  button:hover{
    background: #fff;
    color: #333;
    transition: all 0.5s;
  }
  </style>

  <script>
  function getUserLocation(){
    //Check if geolocation is supported
    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(displayLocation, displayError);
    }else{
      document.getElementById("locationData").innerHTML = "Sorry, your broswer doesn't support geolocation!";
    }
  }

  function displayLocation(position){
    var data = "User Cordinates: <br/>Latitude: " + position.coords.latitude + "<br/>Longitude: " + position.coords.longitude;
    document.getElementById("locationData").innerHTML = data;
    var coords = position.coords.latitude + ", " + position.coords.longitude;
    document.getElementById("locationMap").setAttribute('src', 'https://maps.google.co.in?q=' + coords + '&output=embed');
  }

  function displayError(error){
    locationData = document.getElementById("locationData");

    switch(error.code){
      case error.PERMISSION_DENIED:
        locationData.innerHTML = "Permission was denied!";
        break;
      case error.POSITION_UNAVAILABLE:
        locationData.innerHTML = "Location data is not available";
        break;
      case error.TIMEOUT:
        locationData.innerHTML = "Location request timeout";
        break;
      case error.UNKNOWN_ERROR:
          locationData.innerHTML = "Unknow error occured";
          break;
      default:
        locationData.innerHTML = "Error Occured!";
        break;
    }
  }
  </script>
</head>

<body>

<div style="width: 500px; margin: auto;">
<center><button type="button" onclick="getUserLocation()">Get Location</button></center>
<p id="locationData"></p>
<iframe id="locationMap" width="500" height="500" frameborder=0 scrolling=0 src="https://maps.google.co.in?output=embed"></iframe>
</div>

</body>
</html>
