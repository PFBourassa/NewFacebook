<?php

include('dbconnect.php');

function logged_in() {
  return (isset($_SESSION[user_id]) ? : ;
}

function sanitize($data) {
  return mysql_real_escape_string($data);
}

function user_exists($username){
	 $query = mysql_query("SELECT COUNT(`User_id`) FROM `User` WHERE `Name` = '$username'");
	 return (mysql_result($query, 0) == 1) ? true : false;
}

function user_id_from_username($username){
  $username = sanitize($username);
  return mysql_result(mysql_query("SELECT `User_id` FROM `User` WHERE `Name` = '$username'"), 0, 'User_id');
}

function login($username, $password) {
  $user_id = user_id_from_username($username);
  
  $username = sanitize($username);
  $password = md5($password);

  return (mysql_result(mysql_query("SELECT COUNT (`User_id`) FROM `User` WHERE `Name` = '$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}

if (empty($_POST) === false) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username) || empty($password)) {
     echo "You need to enter a username and password";
  }
  else if (user_exists($username) === false) {
       echo "We can't find that username. Have you registered?";
  }
  else {
    $login = login($username, $password);
    if ($login === false){
      echo "login failed. Password does not match.";
    }
    else {
      echo "login successfull!";
      $_SESSION['user_id'] = $login;
      header('Location: index.php');
      exit();
    }
  }
}

?>