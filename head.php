<?php
session_start();
require_once("config.php");
require_once("class/User.php");
require_once("class/Client.php");
require_once("class/Worker.php");
require_once("class/Caravan.php");
require_once("class/Reservation.php");
require_once("caravanList.php");
?>
<!DOCTYPE html>
<html lang="pl">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Wypożyczalnia przyczep kempingowych</title>

    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="main.js"></script>

</head>

<body>
  <header>
  <a id="href" href="index.php"><img src='images/logo.png'/></a>
    <nav class="menu">
      <ul>
        <?php if (isset($_SESSION['admin'])){  ?>
          <li><a id="href" href="adminPanel.php">Panel administratora</a></li>
          <li><a id="href" href="logout.php">Wyloguj</a></li>
        <?php }else if(isset($_SESSION['userID'])){ ?>
          <li><a id="href" href="userPanel.php">Moje Konto</a></li>
          <li><a id="href" href="logout.php">Wyloguj</a></li>
        <?php }else{ ?>
          <li><a id="href" href="login.html">Zaloguj</a></li>
        <?php } ?> 
      </ul>
    </nav>
  </header>