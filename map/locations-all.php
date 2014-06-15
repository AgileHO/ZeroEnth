<!DOCTYPE html>
<?php

// create a 2d array with some map data in it.  In php, 2d arrays are arrays of arrays.

$locations = array(
					    array('Colins flat', 51.564335, -0.1320235),
    					array('Somewhere in Bromley', 51.4321171,-0.016429),
 );

// take php array and turn it into json object

$json = json_encode($locations);

//inject the json object into js as a variable.

echo <<<END
  <script type="text/javascript">
	 var myData = $json;

  </script>
END;

?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<script>
//declare variables
var marker;
var infoWindow;
var map;
var mapOptions;

// set map options (size and centre)
mapOptions = {
zoom: 11,
center: new google.maps.LatLng(51.564335,-0.1320235),
};

// do stuff with maps
function initialize() {

// put the map on the page where the map-canvas div is.
map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

// create markers and info windows at the specified positions on map 
	for (var i = 0; i < myData.length; i++) 
		{ 
			marker = new google.maps.Marker(
				{
				position: new google.maps.LatLng(myData[i][1], myData[i][2]), 
				map: map,
				}
			);	
			var label=myData[i][0].toString();
			infoWindow = new google.maps.InfoWindow(
				{
				content:label
				}
			);
			infoWindow.open(map,marker);
		}
}
// run initialize when the the page has loaded
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<html>
<head>

<title>Simple Map</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">

<style>
html, body, #map-canvas {
height: 100%;
margin: 0px;
padding: 0px
}
</style>
</head>
<body>
<div id="map-canvas"></div>
  
</body>
</html>