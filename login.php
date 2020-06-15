<?php

session_start();
require_once("config.php");
require_once("User.php");

if (isset($_SESSION['userID']))
{
  $response = [];
  $response['success'] = "true";
  die(json_encode($response));
}

if (isset($_POST['login']))
{
  $user = new User;
  $resp = ( $user->login(trim($_POST['email']), trim($_POST['password'])));
  die(json_encode($resp));
}

$user = new User;
$resp = ( $user->register(trim($_POST['email']), trim($_POST['password']),trim($_POST['password2'])));
die(json_encode($resp));

?>