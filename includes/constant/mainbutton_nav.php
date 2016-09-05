<?php
//base URL of site defined as a constant
define ("BASE", "http://".$_SERVER['HTTP_HOST']."/the_bridge_golden");
?>

<! Main button (was there, remember, do not remember) navigation-->

   	<a href="was_there.php" class="button" action="was_there_counter_insert.php">I was there!</a><br>
						
	<a href="remember.php" class="button" action="remembered_counter_insert.php">I remember that!</a><br>
					
	<a href="dont_remember.php" class="button" action="do_not_remember_counter_insert.php">I don't remember that!</a><br>
