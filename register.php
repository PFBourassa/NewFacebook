<?php
include('init.php');

if (empty($_POST) === false) {
  $required = array('Name', 'Password', 'confirm_password');
  foreach($_POST as $key=>$value) {
    if (empty($value) && in_array($key, $required) === true) {
      echo "Fields marked with * are required.<br>";
      break 1;
    }
  }
  if (true){
    if (user_exists($_POST['Name']) === true) {
      echo 'Sorry, the username \'' . $_POST['Name'] . '\' already exists.<br />';
    }
    if (strlen($_POST['Name']) > 32) {
      echo "The username you entered is too long.<br />";
    }
    if (preg_match("/\\s/", $_POST['Name']) == true) {
      echo "Your username may not contain spaces.<br />";
    }
    if (strlen($_POST['Password']) < 6) {
      echo "Passwords must be at least 6 charactars.<br />";
    }
    if ($_POST['Password'] != $_POST['confirm_password']) {
      echo 'The passwords did not match.<br />';
    }
    if (email_exists($_POST['email']) === true) {
      echo "There is already an account assoicated with that email address.";
    }
  }
}

?>
<html>

<?php
include('head.php');
?>

<body>
<div id="container">
<?php 
include('header.php');
?>

<h1>Register</h1>
<form action="" method="post">
  <ul>
    <li>
      Username*:<br />
      <input type="text" name="Name">  
    </li>
    <li>
      Password*:<br />
      <input type="password" name="Password">
    </li>
    <li>
      Password*:<br />
      <input type="password" name="confirm_password">
    </li>
    <!--<li>
      Email*:<br />
      <input type="email" name="email">
    </li>-->
    <li>
      <input type="submit" value="Register">
    </li>
  </ul>
</form>

</div><!--container-->
</body>
</html>
