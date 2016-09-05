
<!DOCTYPE html>

<html lang="en">
<!--Call to PHP constants-->
<?php require 'includes/constant/constants.php'; ?>

<!--Stylesheet-->  
<link rel="stylesheet" type="text/css" href="includes/styles/the_bridge.css">	


<head>
	<meta charset="UTF-8" /> 
    
	<title>Remember Event</title>
	

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
		
		<p>Number of people reporting they remember this event:<b> <?php require 'includes/constant/remembered_counter.php';?></b></p>
		
		
			<?php //query to get event and headline 
			require  'includes/constant/event_query.php';?>
	
		
		<p> 
			<?php //query to id and count 
			require  'includes/constant/remembered_counter_insert.php';?>
		</p>
		
	<blockquote>	<p>Click a button:</p>
		<!--Call to main button navigation in constants file (was there|remember|don't remember)-->
		<?php require 'includes/constant/subbutton_nav.php'; ?>
		
			<br></blockquote>
						
				
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