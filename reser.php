<?php
require_once("config.php");
require_once("class/User.php");
require_once("class/Client.php");
session_start();
$client = new Client;


if(!isset($_SESSION['userID']))
die('{"login":"false"}');

if(isset($_SESSION['admin']))
die('{"admin":"true"}');

if(isset($_POST['begin'])){

die($client->addReservation(trim($_POST['modelID']),trim($_POST['begin']),trim($_POST['end'])));
}
else{

die($client->deleteReservation(trim($_POST['reservationID'])));
}

?>