<?php
	// process client request (VIA URL)
	// pass in name of book via url and return the price or an error message
	header("Content-Type:application/json");
	include("functions.php");
	if(!empty($_GET['name']))
		{
		$name = $_GET['name'];
		//$price = get_price($name);
		$bookDetails = get_price($name);

		if(empty($bookDetails))
			
			deliver_response(201,"book not found",NULL);
		else
			deliver_response(200,"book found",$bookDetails);
		}
	else
		{
			deliver_response(400,"Invalid request",NULL);
		}
		
	function deliver_response($status,$status_message,$data)
		{
			header("HTTP/1.1 $status $status_message");
			
			$response['status'] = $status;
			$response['status_message'] = $status_message;
			$response['data'] = $data;
			
			$json_response = json_encode($response);
			echo $json_response;
		}
?>

