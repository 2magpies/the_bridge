<?php
			//query to update counter when user clicks I was there! button
			$q = "UPDATE kdarko_dmintz_events SET do_not_remember = do_not_remember + 1 WHERE month(kdarko_dmintz_events.day) = month(now()) and day(kdarko_dmintz_events.day) = day(now()) and post_state = 'in_the_box';";
		
			//execute it
				$result = mysql_query($q) or die("Failed to retrieve rows: " . 							mysql_error());


				$row = mysql_fetch_assoc($result);
				while( $row )
				{

				echo $row['id'] . "<br>"; 
				echo $row['do_not_remember'] . " "; 
	 
				echo "<br>"; //Added line break below each record
	
				$row = mysql_fetch_assoc($result);
				}

				//free up the memory that was used to hold the result
mysql_free_result($result);
		
?>