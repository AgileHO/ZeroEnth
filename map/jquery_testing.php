<html>

<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="jquery-ui.min.js"></script>
<script src="ddslick.js"></script>
<?php

include("config.php");

$locations = array();

// run query
//$result = mysql_query($conn,"SELECT * FROM locations");
$result = mysqli_query($connMySQL,"SELECT * FROM locations");

/* loop through the result set, for every row push the location into
the locations array */
$locations=array();
while($row = mysqli_fetch_array($result)) { 	
  array_push($locations, $row['name']);
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

<script>

var ddData = [
    {
        text: "Under 5",
        value: 1,
        description: "Janet street porter",
        imageSrc: "http://static.guim.co.uk/sys-images/Media/Pix/pictures/2001/04/11/Street-Porter1.jpg"
    },
    {
        text: "6 to 8",
        value: 2,
        description: "Jeremy Clarkson",
        imageSrc: "http://static.guim.co.uk/sys-images/Media/Pix/pictures/2007/07/03/clarksonl.jpg"
    },
    {
        text: "9",
        value: 3,
        description: "Ornella Mutti",
        imageSrc: "http://imalbum.aufeminin.com/album/D20080716/446715_GBQ6ISIC2IOAXXECJYX2JQOYN2YIVY_156_H105203_S.jpg"
    },
    {
        text: "10",
        value: 4,
        description: "Pele",
        imageSrc: "http://i.imgur.com/aEGiK.png"
    }
];

var availableTags = locationsData;


$(
 	function() 
 	{

		$( "#where" ).autocomplete({source: availableTags});
		
		$( "#clickme" ).click(function()
		{
		
		$( "#optionspanel" ).toggle( "slow", function() {})
		;}
		);
		
		$('#myDropdown').ddslick(
		{data:ddData,width:300,selectText: "How fun?",imagePosition:"right",onSelected: function(selectedData){
		}   
		});

		$('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
		});
    

	}
);







</script>



</head>




<body>

<h1>
Jquery testing
</h1>


<form>
<label for="where">Where are you?</label>






<input type="text" id="where">

<div id="clickme">show/hide options</div>
<div id="optionspanel" style="display:none">

<p>
Here are some options
</p>

	 <div id="myDropdown"></div>


</div>
<ul class="chk-container">
<li><input type="checkbox" id="selecctall"/> Selecct All</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item1"> This is Item 1</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item2"> This is Item 2</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item3"> This is Item 3</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item4"> This is Item 4</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item5"> This is Item 5</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item6"> This is Item 6</li>
<li><input class="checkbox2" type="checkbox" name="check[]" value="item6"> Do not select this</li>
</ul>

<input type="submit" />


</form>





</body>


</html>