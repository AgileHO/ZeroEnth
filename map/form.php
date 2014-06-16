<!DOCTYPE HTML> 
<?php
include("config.php");
?>

<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<?php
// define variables and set to empty values
$nameErr = $latErr = $longErr  = "";
$name = $lat = $long ="";
$nameValid = 0;
$latValid = 0;
$longValid = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) 
   {
     $nameErr = "Name is required";
   } 
   else 
   {
     // if name field is not empty this assignment will always happen
	 $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
		{
			$nameErr = "Only letters and white space allowed"; 
		}
		else 
		{
			$nameValid = 1;
		}
   }
   
   if (empty($_POST["lat"])) {
     $latErr = "Latitude is required";
   } else {
     $lat = test_input($_POST["lat"]);
     // check if latitude address syntax is valid
     if (!preg_match('/^[0-9]{1,}/',$lat)) {
       $latErr = "Invalid latitude format";
     }
	 else 
	{
		$latValid = 1;
	}
	
   }
     
   if (empty($_POST["long"])) {
     $longErr = "Longitude is required";
   } else 
   {
     $long = test_input($_POST["long"]);
     // check if longitude address syntax is valid
		 if (!preg_match('/^[0-9,-\.]{1,50}$/',$long)) 
		 {
		   $longErr = "Invalid longitude format"; 
		 }
		 else 
		{
			$longValid = 1;
		}
   }
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

	if ($nameValid == 1 && $latValid == 1 && $longValid == 1)
	{
	//echo 'The form is ready to be processed';
	$sql = "INSERT INTO `locations` (`name`, `lat`, `long`) VALUES ('$name', '$lat', '$long')";
	//mysqli_query($sql, $connMySQL);
	mysqli_query($connMySQL, $sql);
	echo 'You are now looped in';

	}
?>

<h2>Looped in</h2>
<!--p><span class="error">* required field.</span></p-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" role="form"> 
 <div class="form-group">
 <span class="error">* required field.</span>
    <label for="name" class="col-sm-2 control-label">Name</label>
 <div class="col-sm-6">   
   <input type="text" name="name" value="<?php echo $name;?>" class="form-control">
   <span class="error">* <?php echo $nameErr;?></span>
   </div></div><br><br>
<div class="form-group">
    <label for="lat" class="col-sm-2 control-label">Latitude</label>   
 <div class="col-sm-6">    
   <input type="text" name="lat" value="<?php echo $lat;?>" class="form-control" placeholder="eg 51.5643">
   <span class="error">* <?php echo $latErr;?></span>
   </div></div><br><br>
    <div class="form-group">
    <label for="long" class="col-sm-2 control-label">Longitude</label>
    <div class="col-sm-6"> 
   <input type="text" name="long" value="<?php echo $long;?>" class="form-control" placeholder="eg -0.132023">
   <span class="error">* <?php echo $longErr;?></span>
   </div><br><br>
   <input type="submit" name="submit" value="Submit" class="btn btn-success">
	<!--input type="reset" name="clear" value="Clear"--> 
</form>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		echo "<h2>Your Input:</h2>";
		echo $name;
		echo "<br>";
		echo $lat;
		echo "<br>";
		echo $long;
		echo "<br>";
	}
?>

</body>
</html>