<?php
include('init.php');

if (empty($_POST) === false) {
  $required = array('Name', 'Password', 'confirm_password');
  foreach($_POST as $key=>$value) {
    if (empty($value) && in_array($key, $required) === true) {
      $errors[] = "Fields marked with * are required.<br>";
      break 1;
    }
  }
  if (true){
    if (user_exists($_POST['Name']) === true) {
      $errors[] = 'Sorry, the username \'' . $_POST['Name'] . '\' already exists.<br />';
    }
    if (strlen($_POST['Name']) > 32) {
      $errors[] = "The username you entered is too long.<br />";
    }
    if (preg_match("/\\s/", $_POST['Name']) == true) {
      $errors[] = "Your username may not contain spaces.<br />";
    }
    if (strlen($_POST['Password']) < 6) {
      $errors[] = "Passwords must be at least 6 charactars.<br />";
    }
    if ($_POST['Password'] != $_POST['confirm_password']) {
      $errors[] = 'The passwords did not match.<br />';
    }
    //if (email_exists($_POST['email']) === true) {
      //$errors[] = "There is already an account assoicated with that email address.";
    //}
  }
}
if (empty($_POST) === false && empty($errors) === true) {
  $register_data = array(
    'Name' => $_POST['Name'],
    'Password' => $_POST['Password']//,
    //'email' => $_POST['Email']
  );
  register_user($register_data);
  header('Location: register.php?YES');
  exit();
} 
else if (empty($errors) === false){
  echo output_errors($errors);
}
if (isset($_GET['YES']) && empty($_GET['YES'])) {
  echo 'Welcome to the club!';
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

if (isset($_GET['YES']) && empty($_GET['YES'])) {
  echo '<h1>Welcome to the club!</h1>';
  echo 'Back to <a href="index.php">main page</a>';
}

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
