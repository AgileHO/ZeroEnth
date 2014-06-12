<!DOCTYPE HTML> 
<?php
// echo 'Success';

	function tester($dummy)
	{
		if ($dummy == 5)
		{
			//echo 'So true';
			return true;
		}
		else
		{
			//echo 'False';
			return false;
		}
	}	
	//$x = tester(4);
	//var_dump($x);	
	if (tester(65))
	{
		echo 'True';
	}
	
	function telly()
	{
		$x = (4 + 3);
		return $x;
	}	
	echo telly();

?>

<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 


</body>
</html>