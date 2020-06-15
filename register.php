<?php
require_once("config.php");
require_once("User.php");
session_start();

$user = new User;
$user->register(trim($_POST['email']), trim($_POST['password']), trim($_POST['password2']));

?>

