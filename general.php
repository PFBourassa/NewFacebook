<?php

function user_data($user_id){
  $data = array();
  $user_id = (int)$user_id;

  $func_num_args = func_num_args();
  $func_get_args = func_get_args();

  if ($func_num_args > 1) {
    unset($func_get_args[0]);
    $fields = '`' . implode('`, `', $func_get_args) . '`';
    $data = mysql_fetch_assoc(mysql_query("SELECT * FROM `User` WHERE `User_id` = $user_id"));
    return $data;
  }
  echo $fields;
}

function logged_in() {
  return (Isset($_SESSION[user_id])) ? true : false;
}

function sanitize($data) {
  return mysql_real_escape_string($data);
}

function user_exists($username){
  $username = sanitize($username);
  $query = mysql_query("SELECT COUNT(`User_id`) FROM `User` WHERE `Name` = '$username'");
	 return (mysql_result($query, 0) == 1) ? true : false;
}

function email_exists($email){
  $email = sanitize($email);
  $query = mysql_query("SELECT COUNT(`Email`) FROM `User` WHERE `Email` = '$email'");
  return (mysql_result($query, 0) == 1) ? true : false;
}

function user_id_from_username($username){
  $username = sanitize($username);
  return mysql_result(mysql_query("SELECT `User_id` FROM `User` WHERE `Name` = '$username'"), 0, 'User_id');
}

function output_errors($errors) {
  return '<ul><li>' . implode('</li><li>', $errors) . '</li><ul>';
}

function array_sanitize(&$item) {
  $item = mysql_real_escape_string($item);
}

function register_user($register_data) {
  //array_walk($register_data,'array_sanitize()');
  $register_data['Password'] = md5($register_data['Password']);

  $fields = '`' . implode('`, `', array_keys($register_data)) . '`';
  $data = '\'' . implode('\', \'', $register_data) . '\'';
  //echo $fields;

  mysql_query("INSERT INTO `User` ($fields) VALUES ($data)");
}

?>
