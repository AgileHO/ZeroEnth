<!DOCTYPE html>
<?php
include("config.php");
?>
<?php
// query database to get locations

$locations = array();
$sql = 'SELECT * FROM locations';
$result = mysql_query($sql, $connMySQL);

while ($location = mysql_fetch_assoc($result))
	{
	$locations[] = $location;
	}

// take php array and turn it into json object

$json = json_encode($locations);

echo <<<END
  <script type="text/javascript">
    var myData = $json;
	//x = typeof(myData[0].id);
	//x = typeof(myData[0]);
	//alert(x);
  </script>
END;
?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>

function initialize() {

// set map options (size and centre)
var mapOptions = {
zoom: 14,
center: new google.maps.LatLng(51.564335,-0.1320235),
//styles: styleArray
};

// create the map 
map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

// create markers and info windows at the specified positions on map 
var marker;
var markers = new Array();

	for (var i = 0; i < myData.length; i++) 
		{ 
		marker = new google.maps.Marker(
		{
		//position: new google.maps.LatLng(latLans[i][1], latLans[i][2]), 
		position: new google.maps.LatLng(myData[i].lat, myData[i].long), 	
		map: map,
		}
		);	

	var infoWindow = new google.maps.InfoWindow(
		{
		//content:latLans[i][0]
		content:myData[i].name	
		}
		);
		infoWindow.open(map,marker);

		//markers.push(marker);
	}

}

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