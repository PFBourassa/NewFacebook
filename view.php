<?php

include('dbconnect.php');

$query = "SELECT * FROM Post ORDER BY time DESC";
$result = mysql_query($query) or die(mysql_error());

echo "<div class='feed'>";
while($row = mysql_fetch_array($result)){
	   echo "<div class='post'><p class='name'>".$row['Owner']."</p><p class = 'post_content'>".$row['Content']."</p><span class='post_time'>".$row['Time']."</span></div>";
	   echo "<br />";
}
echo "</div><!--feed-->";

echo "</body><!--container--></html>";
?>