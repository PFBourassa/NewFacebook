<?php
mysql_connect("localhost", "kaninepe_neat", "venasuar?") or die(mysql_error());
mysql_select_db("kaninepe_neat") or die(mysql_error());
echo "Connected to database"
?>