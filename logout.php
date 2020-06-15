<?php
require_once("User.php");
session_start();

    $user = new User;
    $user->logout();

header("Location: index.php"); 
?>