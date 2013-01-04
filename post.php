<?php
$Owner = $_POST['Owner'];
$Content = $_POST['Content'];
$Time = date("r");

mysql_connect("localhost", "kaninepe_neat", "venasuar?") or die(mysql_error());
mysql_select_db("kaninepe_neat") or die(mysql_error());

mysql_query("INSERT INTO Post (Owner, Content, Time) VALUES('$Owner', '$Content', NOW() ) ") or die(mysql_error());

header( 'Location: http://www.kaninepete.com/NewFacebook/view.php');

#echo "It worked!";
#echo $Owner;
#echo $Content;

#include("view.php");
?>