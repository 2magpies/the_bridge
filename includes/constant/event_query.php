<?php
	//query to get event and headline
	$q = "SELECT * FROM " . kdarko_dmintz_events ." WHERE 
	
	month(kdarko_dmintz_events.day) = month(now()) 
	and 
	day(kdarko_dmintz_events.day) = day(now()) 
	and 
	post_state = 'in_the_box';";
		
	//execute it
	$result = mysql_query($q) or die("Oops! We are preparing the next daily post. Wait just a few seconds and try again." . 							mysql_error());


	$row = mysql_fetch_assoc($result);
	while( $row )
	{

		echo "<h4>";echo $row['headline'] . "<br>"; echo "</h4>";
		echo "<p>";echo $row['event'] . " "; echo "</p>";
	 
		echo "<br>"; //Added line break below each record
	
	$row = mysql_fetch_assoc($result);
	}

	//free up the memory that was used to hold the result
	mysql_free_result($result);
		
?>

