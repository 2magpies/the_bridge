<?php

//SQL credentials
define ("DB_HOST", "localhost");
define ("DB_USER", "hci573");
define ("DB_PASS", "hci573");
define ("DB_NAME", "hci573");
define ("USER_EVENTS", "kdarko_dmintz_user_events");
define ("ARCHIVE", "kdarko_dmintz_archive");
define ("EVENTS", "kdarko_dmintz_events");

//DB names
$dbhost = "localhost";
$dbuser = "hci573";
$dbpass = "hci573";
$dbname = "hci573";

//table names
$events = "kdarko_dmintz_events";
$archive = "kdardo_dmintz_archive";
$user_events = "kdarko_dmintz_user_events";

//connect to the SQL database
$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");


?>

