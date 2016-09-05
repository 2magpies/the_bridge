
<!DOCTYPE html>

<html lang="en">

<!--Call to PHP constants-->
<?php require 'includes/constant/constants.php'; ?>
<?php $thisPage="Home"; ?>


<!--Call to stylesheet-->  
<link rel="stylesheet" type="text/css" href="includes/styles/the_bridge.css">	


<!--Call to JQuery library-->  
<script src="includes/js/jquery-1.10.2.js"></script>

<head>
	<meta charset="UTF-8" /> 
    
	<title>The Bridge Home</title>
	

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
	<?php include_once 'includes/constant/pagetop_nav.php'; ?>

	</div>
	
	
	<div id="content-wrapper">

		<div id="leftsidebar">
		<img src="images/logo_color.png" height="290" style="position:relative; left:0px; top:15px;">
		</div>
	
<!--JQuery to refresh displayed time once every minute-->
<script>
	setInterval("my_function();",1000); 
    function my_function(){
      $('#refresh').load(location.href + ' #time');
    }
</script>
		
		<div id="content">
		
			<div id="refresh">

			<p id="time"><b> Today is <?php 
			date_default_timezone_set('America/New_York');
			echo date("l, F j, Y, g:i a") . "<br>"; ?>
			</b></p>
			
			</div>
			
	
		<p> 
			<?php //query to get event and headline 
			require  'includes/constant/event_query.php';?>
		</p>
				
	<blockquote>	<p>Click a button:</p>
		
		<!--Call to main button navigation in constants file (was there|remember|don't remember)-->
		<?php require 'includes/constant/mainbutton_nav.php'; ?>
		
				<br></blockquote>
			
		</div><!--closes Content Wrapper div-->

	
	</div><!--closes Wrapper div-->
	
	
	<div id="footer">
	
<!--Call to Footer in Constants file-->
<?php include 'includes/constant/footer.php'; ?>

	</div>

</div>	
		
</body>	
</html>

