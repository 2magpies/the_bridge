<?php
//base URL of site defined as a constant
define ("BASE", "http://".$_SERVER['HTTP_HOST']."/the_bridge_golden");
?>

<! Site navigation menu-->
<div id="topnav">

<nav id="top-menu">
    <ul>
        <li<?php if ($thisPage=="Home") echo " id=\"currentpage\"index.php"; ?>><a href="index.php">Home</a></li>
        
        <li<?php if ($thisPage=="Archive") echo " id=\"currentpage\"archive.php"; ?>><a href="archive.php">Archive</a></li>
        
        	<li<?php if ($thisPage=="Suggest") echo " id=\"currentpage\"suggest.php"; ?>><a href="suggest.php">Suggest an Event</a></li>
        	
       	<li<?php if ($thisPage=="Contact") echo " id=\"currentpage\"contact.php"; ?>><a href="contact.php">Contact Us</a></li>
         
    </ul>
</nav>

</div>