<?php

include('menu.php');
#include('dbconnect.php')

mysql_connect("localhost", "kaninepe_neat", "venasuar?") or die(mysql_error());
mysql_select_db("kaninepe_neat") or die(mysgl_error());

echo "HEllo WorLD";

?>