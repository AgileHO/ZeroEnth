<?php
	function get_price($find)
	{
		$books = array(
			"java"=>12.99,
			"c"=>33.48,
			"php"=>52.67	
			);
	
	foreach($books as $book => $price)
		{
			if($book == $find)
				{
				return $price;
				break;
				}
		}
	}
?>

