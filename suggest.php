
<!DOCTYPE html>

<html lang="en">

<!--Call to PHP constants-->
<?php $thisPage="Suggest"; ?>


<!--Call to stylesheet-->  
<link rel="stylesheet" type="text/css" href="includes/styles/the_bridge.css">	

<!--Call to JQuery library-->  
<script src="includes/js/jquery-1.10.2.js"></script>


<?php
//Include the database connection file (also contains the script to ouput entries)
include 'includes/constant/constants.php';

//Check for post data
if($_POST and $_GET)
{
	if ($_GET['cmd'] == 'add'){
	
		//Assign variables and sanitize POST data
		$nickname = mysql_real_escape_string($_POST['nickname']);
		$day = mysql_real_escape_string($_POST['day']);
		$place = mysql_real_escape_string($_POST['place']);
	 	$event = mysql_real_escape_string($_POST['event']);
	 
		//Build our query statement
		mysql_query("INSERT INTO " . kdarko_dmintz_user_events . " (
	   	nickname, 
	   	day, 
	   	place, 
	   	event, 
	   	time_added) 
		
		VALUES (
		'" . $nickname . "', 
		'" . $day . "', 
		'" . $place . "', 
		'" . $event . "', 
		NOW())"
		) 
		
		or die(mysql_error());
	 
		//End this portion of the script
		exit();
	}
		else if ($_GET['cmd'] == 'delete_all'){
		//Left for exercise
	
	}
}

?>

<head>
	<meta charset="UTF-8" /> 
    
	<title>Suggest an Event</title>
	
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
	
		
		<div id="content">	

		
<script>
$(function() //function that gets called whenever the document is loaded
{
	
	//what happens when mousing over the button?
	$("button").mouseenter(function(){
		$(this).css("background-color","#020f66");
		$(this).css("cursor","pointer");
	});
	
	$("button").mouseleave(function(){
		$(this).css("background-color","#003399");
		$(this).css("cursor","auto");
	});
	
	//what happens when focusing on the text field?
	$("input,textarea").focus(function(){
		$(this).css("background-color","#EBEAFF");
	});
	
	$("input,textarea").blur(function(){
		$(this).css("background-color","#ffffff");
	});
	
	//Detect click on area
	$(".submit").click( 
	
		function() //setup a function to be called whenever the button is clicked
		{
			//Step 1: get the inputs that the user entered
			var nickname = $("#nickname").val();
			var day = $("#day").val();
			var place = $("#place").val();
			var event = $("#event").val();
			
			//alert(nickname +"         "+day);
			
			//Step 2: check if all inputs are entered, e.g., if (a=='')
				//if entered, use ajax to call add.php asynchronously
				//if not, let the user know
				if (nickname =='' || 
					day =='' || 
					place =='' || 
					event =='')       {
				
				$(".error").fadeIn(400).show().html('<p class=error>Please fill out all fields.</p>');
			}
			else {
				var html_success = '<p class=success>Thank you!</p>';
				
				//this gets executed if both text and name were entered
				var post_data_string = 
				'nickname=' + nickname + 
				'&day=' + day + 
				'&place=' + place + 
				'&event=' + event;
				
				$.ajax(
					{
						type: "POST",
						url: "<?php echo $_SERVER['PHP_SELF']; ?>?cmd=add",
						data: post_data_string,
						success: 
							function()  {
								$("#nickname").val('');
								$("#day").val('');
								$("#place").val('');
								$("#event").val('');
								
								//hide the error message
								$(".error").fadeOut(2000).hide();
								
								//show success message for a bit then fade it out
								$(".success").fadeIn(100).show().html(html_success).fadeOut(2000);
							
							}
					}
				
				);

				//alert(post_data_string);
			
			}
			
			//We return false to prevent page refresh or reload
			return false;
		}
		
	);
});
</script>
    	

    	<h3>What story do you want to share?</h3>
    
       	<p> Let us know about an event you would like to share on <i>the Bridge</i>. We'll do our best to share this event with others on the appropriate day.</p>
        
    	<p>Just tell us when, where, and what happened. No need to provide your name &#151; a nickname is fine. After entering information in the following fields, click the <b>Suggest</b> button to to send us your event suggestion.</p><br>
    	
    <!--Formatting for form fields-->
	
	<form class="contact_form" action= "<?php echo BASE;?>/suggest.php" method="post" name="contact_form">
	

    <p><label>Your Nickname: </label>
    <input type="text" id="nickname" name="nickname" placeholder="Mustang Sally"/></p><br><br>
    
    <p><label>Event Date:</label>
    <input type="text" id="day" placeholder="YYYY-MM-DD"></p><br><br>
    
    <p><label>Event Place:</label>
    <input type="text" id="place" name="place" placeholder="Dearborn, Michigan"/></p><br><br>
    
    <p><label id="descriptionlabel">Event Description:</label><br><br>
    <textarea name="event" id="event" rows="10" cols="60" placeholder="I bought a Ford Mustang of the very first production line."> </textarea></p><br>

<p>
<span class="success" style="display:none;"></span>
<span class="error" style="display:none;"></span><br>
</p>

    <button type="submit" class="submit" value="insert">Suggest</button><br>
    
	</form>

	<br><br><br>
	
	
			
		</div><!--closes Content Wrapper div-->
		
	</div><!--closes Wrapper div-->
	
	
	<div id="footer">
	
<!--Call to Footer in Constants file-->
<?php include 'includes/constant/footer.php'; ?>

	</div>

</div>
		
</body>	
</html>

