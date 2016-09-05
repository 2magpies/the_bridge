
<!DOCTYPE html>

<html lang="en">
<!--Call to PHP constants-->
<?php $thisPage="Contact"; ?>


<!--Stylesheet-->  
<link rel="stylesheet" type="text/css" href="includes/styles/the_bridge.css">	


<head>
	<meta charset="UTF-8" /> 
    
	<title>Contact Us</title>
	

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
			<h3>Contact Us</h3>
			
			<p>	The Bridge <br />
				1234 Bay Street<br />
				San Jose, CA 11530 <br />
 			</p>
			
			
			<p>(516) 123-5678</p>
			<p>	<b>Office Hours</b> <br />
				Monday to Friday: 9am to 6pm<br />
				Saturday and Sunday: Closed <br />
				
			<p><a href="mailto:kdarko@iastate.edu,dmintz@iastate.edu"?target="_top">
Send us an email</a>, we'd love to hear from you.</p><br><br>
				
		</div><!--closes Content Wrapper div-->

	
	</div><!--closes Wrapper div-->
		
	
	
	<div id="footer">
	
<!--Call to Footer in Constants file-->
<?php include 'includes/constant/footer.php'; ?>

	</div>

</div>	
		
</body>	
</html>