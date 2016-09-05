
<!DOCTYPE html>

<html lang="en">
<!--Call to PHP constants-->
<?php require 'includes/constant/constants.php'; ?>
<?php $thisPage="Archive"; ?>


<!--Stylesheet-->  
<link rel="stylesheet" type="text/css" href="includes/styles/the_bridge.css">	

<!--Call to JQuery library-->  
<script src="includes/js/jquery-1.10.2.js"></script>


<head>
	<meta charset="UTF-8" /> 
    
	<title>Archive</title>
	

</head>

	<body>		

<div id="wrapper">

	<div id="header">
	<img src="images/logo_text.png" height="65" align="left" style="position:relative; left:0px; top:0px;">
	<h5><br><br><br>Historic events posted daily at 2:00PM and midnight <?php date_default_timezone_set('America/New_York');
 echo date("T") . "<br>"; ?> </h5>

	</div>
	
	<!--Call to top navigation in constants file-->
	<div id="topnav">
	<?php require 'includes/constant/pagetop_nav.php'; ?>

	</div>
	
	
	<div id="content-wrapper">

		<div id="leftsidebar">
		<img src="images/logo_color.png" height="290" style="position:relative; left:0px; top:15px;">
		</div>
	
	
		<div id="content">
		
		
		<!--Form for Search feaure-->
		
		<br><form name="search" method="post" action="">
		<div><input type="text" style="width: 300px" name="keyword" placeholder="Search the archive for past posts"></div>
		
		<div id=sbutton><input type="submit" name="search" value="Search"></div>
	
		</form>

		
		<!--Search query-->
		<?php
		
		if (isset ($_POST['search'])) {
			$word=$_POST['keyword'];
			$query=mysql_query ("SELECT * FROM kdarko_dmintz_archive WHERE MATCH (event) AGAINST ('+".$word."' in boolean mode) ORDER BY id DESC");
		
		if(mysql_num_rows($query)>0) {
		while ($fetch=mysql_fetch_assoc($query))
		{
		echo"<div id=match>".$fetch['event']."</div>";	
		} }else{echo '<p style="color:red; text-align:right">No match found.</p>';}
		
		}
		?>
		
		
		<!--List of archived events-->
		
		<br><br><br><h2>Stroll through the past</h2>
		<p>Take a stroll through the past and read the following list of events that <i>the Bridge</i> has featured in the past two weeks. Or use the above search feature to search our entire archive for a specific event.</p><br>
	
		
		<p><?php //query to get archived events
			require 'includes/constant/archive_query.php'?></p>
			
			<br><br>
				
		</div><!--closes Content Wrapper div-->

	
	</div><!--closes Wrapper div-->
	
	
	<div id="footer">
	
<!--Call to Footer in Constants file-->
<?php include 'includes/constant/footer.php'; ?>

	</div>

</div>	
		
</body>	
</html>