<?php

include('menu.php');
#include('dbconnect.php')

mysql_connect("localhost", "kaninepe_neat", "venasuar?") or die(mysql_error());
mysql_select_db("kaninepe_neat") or die(mysgl_error());

#echo "veiw.php<br />";

$query = "SELECT * FROM Post ORDER BY time DESC";
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	   echo "<div class='post'><p class='name'>".$row['Owner']."</p><p class = 'post_content'>".$row['Content']."</p></div>";
	   echo "<br />";
}

?>