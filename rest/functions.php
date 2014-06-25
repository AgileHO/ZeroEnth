<?php
	function get_price($find)
	{
		/*
		$books = array(
			"java"=>12.99,
			"c"=>33.48,
			"php"=>52.67	
			);

		*/
		
		$books = array (
			"java"  => array("price" => "17.98", "publisher" => "random house", "name" => "Java"),
			"php" => array("price" => "33.50", "publisher" => "penguin", "name" => "PHP"),
			"c"   => array("price" => "172.18", "publisher" => "oxford university press", "name" => "C")
		);

	foreach($books as $bookName => $bookValues)
		{
			if($bookName == $find)
				{
				return $bookValues;
				break;
				}
		}
	}
	
	
	

?>

