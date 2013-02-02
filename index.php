<?php
session_start();
?>

<html>

<?php
include('head.php');
?>

<body>
<div id="container">

<?php 
include('header.php');

//$_SESSION['user_id'] = "foo";
if(Isset($_SESSION['user_id'])){
  include('loggedin.php');}
else{
  include('login_widget.php');}

include('post.html');
include('view.php');
?>

</div><!--container-->
</body>
</html>