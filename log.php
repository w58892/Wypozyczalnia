<?php 
session_start();

if(isset($_SESSION['userID']))
header("Location: index.php"); 

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
  </header>

    <section class="login">
<form>
    <h1>Logowanie</h1>
    <label id="labelEmail">
        <input type="text" id="email" placeholder="Email">
        <div id="errorEmail"></div>
    </label>
    <label id="labelPassword">
        <input type="password" id="password" placeholder="Hasło">
        <div id="errorPassword"></div>
    </label>
    <input type="button" id="btn_loguj" class="send" value="Zaloguj">
</form>

<form>
    <h1>Rejestracja</h1>
    <label id="labelEmail">
        <input type="text" id="emailReg" placeholder="Email">
        <div id="errorEmailReg"></div>
    </label>
    <label id="labelPassword">
        <input type="password" id="passwordReg" placeholder="Hasło">
        <div id="errorPasswordReg"></div>
    </label>
    <label id="labelPassword2">
        <input type="password" id="passwordReg2" placeholder="Hasło">
        <div id="errorPasswordReg2"></div>
    </label>
    <input type="button" id="btn_reg" class="send" value="Załóż konto">
</form>
</section>


</body>

<!--<script type="text/javascript" src="JS/skrypt.js"></script>-->
    <script type="text/javascript" src="menu.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />

</html>