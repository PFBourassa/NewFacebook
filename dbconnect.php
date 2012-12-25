<?php
mysql_connect("localhost", "kaninepe_neat", "venasaur?") or die(mysqlerror());
mysql_select_db("kaninepe_neat") or die(mysql_error());
echo "Connected to database"
?>