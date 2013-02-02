<?php
session_start();
?>

<html>

<?php 
include('header.php');
?>

<body>

<?php
//$_SESSION['user_id'] = "foo";
if(Isset($_SESSION['user_id'])){
  echo "Welcome back - <a href='logout.php'>Logout</a> ";}
else{
  include('login_widget.php');}

include('view.php');
?>
</html>
