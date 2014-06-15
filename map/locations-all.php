<!DOCTYPE html>
<?php

$locations = array();
// Create connection
$con=mysqli_connect("localhost","anonymous","horizon","test");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// run query
$result = mysqli_query($con,"SELECT * FROM locations");

/* loop through the result set, for every row in the set create an array that represents the location, then push the location into
the locations (NB plural) array */
$location=array();
while($row = mysqli_fetch_array($result)) { 	
  $location[0] = $row['name'];
  $location[1] = $row['lat'];
  $location[2] = $row['long'];
  $locations[] = $location;
}

// take php array and turn it into json object
$json = json_encode($locations);

//inject the json object into js as a variable called locationsData.
echo <<<END
  <script type="text/javascript">
	 var locationsData = $json;
  </script>
END;

?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<script>
//declare variables
var marker; 	// a google maps marker, aka a 'pin'
var infoWindow; // a google maps info window, you can attach it to a marker and stick html inside
var map; 		// a google maps map
var mapOptions; // configuration options for the google maps map

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
	for (var i = 0; i < locationsData.length; i++) 
		{ 
			//create a marker.  When you do this it adds to the map at the point you assign a map, so you can re-use the same marker object in the next iteration.
			marker = new google.maps.Marker(
				{
				position: new google.maps.LatLng(locationsData[i][1], locationsData[i][2]), // read the coordinates of the location
				map: map,
				}
			);	
			var label=locationsData[i][0].toString();  		//read the name of the location
			infoWindow = new google.maps.InfoWindow( 	
				{
				content:label
				}
			);
			infoWindow.open(map,marker);				//put the info window on the map. You can then re-use the object in the next iteration.
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