<?php
$Owner = $_POST['Owner'];
$Content = $_POST['Content'];

mysql_connect("localhost", "kaninepe_neat", "venasuar?") or die(mysql_error());
mysql_select_db("kaninepe_neat") or die(mysql_error());

mysql_query("INSERT INTO Post (Owner, Content) VALUES('$Owner', '$Content') ") or die(mysql_error());

#echo "It worked!";
#echo $Owner;
#echo $Content;

include("view.php");
?>