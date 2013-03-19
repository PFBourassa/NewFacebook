<?php
session_start();
include('init.php');
?>
<html>

<?php
include('head.php');
?>

<body>
<div id="container">

<?php 
include('header.php');

//RUssel was here
if(logged_in()){
  include('loggedin.php');

  include('newpost.php');
}
else{
  include('login_widget.php');
}

include('view.php');
?>

</div><!--container-->
</body>
</html>
