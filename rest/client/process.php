<?php
	// process client request (VIA form)
	// pass in name of book via url and return the price or an error message
	header("Content-Type:application/json");
	include("../functions.php");
	
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
				
		// Resource address (api call)
		
		//$url = "http://localhost/rest/$name";
		$url = "localhost/ZeroEnth/rest/$name";
		//var_dump($url);
		
		// Send request to resource
		
		$client = curl_init($url);
		// var_dump($client);
		
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		
		// Get response from Resource
		
		$response = curl_exec($client);
		$result = json_decode($response);
		//var_dump($result);
		
		/*
		if(!is_null($result->data))
		{
			echo $result->data;
		}
		else
		{
			echo 'No book found';
		}
		*/
		
		// shorthand ternary version of commented out IF block above
		echo (!is_null($result->data) ? $result->data  : "No book found. Might be out of stock or lost or something");		
	
	}
	
?>	



