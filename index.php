<!doctype>
<html>
  <head>
	<title></title>
	<meta charset="utf-8" />
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script>
    function writeAddressName(latLng) {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({
        "location": latLng
      },
      function(results, status) {
        if (status == google.maps.GeocoderStatus.OK)
          document.getElementById("address").innerHTML = results[0].formatted_address;
        else
          document.getElementById("error").innerHTML += "Unable to retrieve your address" + "<br />";
      });
    }

    function geolocationSuccess(position) {
      var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      // Write the formatted address
      writeAddressName(userLatLng);

      var myOptions = {
        zoom : 16,
        center : userLatLng,
        mapTypeId : google.maps.MapTypeId.ROADMAP
      };
      // Draw the map
      var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
      // Place the marker
      new google.maps.Marker({
        map: mapObject,
        position: userLatLng
      });
      // Draw a circle around the user position to have an idea of the current localization accuracy
      var circle = new google.maps.Circle({
        center: userLatLng,
        radius: position.coords.accuracy,
        map: mapObject,
        fillColor: '#0000FF',
        fillOpacity: 0.5,
        strokeColor: '#0000FF',
        strokeOpacity: 1.0
      });
      mapObject.fitBounds(circle.getBounds());
    }

    function geolocationError(positionError) {
      document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
    }

    function geolocateUser() {
      // If the browser supports the Geolocation API
      if (navigator.geolocation)
      {
        var positionOptions = {
          enableHighAccuracy: true,
          timeout: 10 * 1000 // 10 seconds
        };
        navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
      }
      else
        document.getElementById("error").innerHTML += "Your browser doesn't support the Geolocation API";
    }

    window.onload = geolocateUser;
  </script>
  </script>
  <style type="text/css">
    #map {
      width: 500px;
      height: 500px;
    }
  </style>
  </head>
    <body background="img/login.jpg">
      <center>
        <h1>Bienvenidos a mi sitio web</h1>
        <h2>Ingrese usuario y contraseña</h2>
        <form action="login.php" method="post">   	
      	     <input type="text" name="name" placeholder="Nombre" required="true"><br>
      	     <input type="password" name="pass" placeholder="Contraseña" required="true"><br><br>
             <div class="g-recaptcha" data-sitekey="6Le9yBwTAAAAALmjR4nG0yMAcqsSH-TxWC_2Mbay" required="true"></div>
      	     <input type="submit" value="Ingresar" name="submit">
             <a href="form.php">Registrar</a>
      	</form>
        <div id="map"></div>
        <p><b>Direccion</b>: <span id="address"></span></p>
        <p id="error"></p>
      </center>
    </body>
</html>