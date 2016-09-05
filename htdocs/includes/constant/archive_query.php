<?php //require 'includes/constant/constants.php'; ?>
<?php
	//query to get archives and headline
	$q = "SELECT * FROM  kdarko_dmintz_archive ";
		
	//execute it
	$result = mysql_query($q) or die("Failed to retrieve rows: " . 							mysql_error());


	$row = mysql_fetch_assoc($result);
	while( $row )
	{
		echo "<div align=right><h5> Posted on:" . $row['time_added'] . "</h5></div>";
	//	echo $row['day'] . "<br>"; 
		echo "<h4>" . $row['headline'] . "<br>" . "</h4>";
		echo "<p>" . $row['event'] . "<p>"; 

		
		echo "<br>"; //Added line break below each record
		echo "<br>"; //Added additional line break below each record
	
	$row = mysql_fetch_assoc($result);
	}

	//free up the memory that was used to hold the result
	mysql_free_result($result);
		
?>