<?php
$Owner = $_POST['Owner'];
$Content = $_POST['Content'];
$Time = date("r");

include('dbconnect.php');

mysql_query("INSERT INTO Post (Owner, Content, Time) VALUES('$Owner', '$Content', NOW() ) ") or die(mysql_error());

header( 'Location: http://www.kaninepete.com/NewFacebook/view.php');

?>