<?php
			//query to get event and headline
			$q = "SELECT do_not_remember FROM " . kdarko_dmintz_events ." WHERE month(kdarko_dmintz_events.day) = month(now()) and day(kdarko_dmintz_events.day) = day(now()) and post_state = 'in_the_box';";
		
			//execute it
				$result = mysql_query($q) or die("Failed to retrieve rows: " . 							mysql_error());


				$row = mysql_fetch_assoc($result);
				while( $row )
				{

				echo $row['do_not_remember'] . "<br>"; 

				$row = mysql_fetch_assoc($result);
				}

				//free up the memory that was used to hold the result
mysql_free_result($result);
		
?>