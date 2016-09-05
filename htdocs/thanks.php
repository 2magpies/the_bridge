
<!DOCTYPE html>

<html lang="en">
<!--Call to PHP constants-->
<?php require 'includes/constant/constants.php'; ?>

<!--Stylesheet-->  
<link rel="stylesheet" type="text/css" href="includes/styles/the_bridge.css">	


<head>
	<meta charset="UTF-8" /> 
    
	<title>Thank You</title>
	

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
		
		<h2>Thank You!</h2>
		
			<p>Thank you for reporting to <i>the Bridge</i> about this event:</p>
		
		<blockquote> 
			<?php //query to get event and headline 
			require  'includes/constant/event_query.php';?>
		</blockquote>
				
		
		<p>Check back with us to share what you remember about an event on <i>the Bridge</i>, where historic events are posted daily.</p>			
			<br><br><br><br><br><br>	
				
		
		</div><!--closes Content Wrapper div-->

	
	</div><!--closes Wrapper div-->
	
	<div id="footer">
	
	
<!--Call to Footer in Constants file-->
<?php include 'includes/constant/footer.php'; ?>

	</div>

</div>	
		
</body>	
</html>