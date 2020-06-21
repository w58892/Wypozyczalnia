<?php
require_once("config.php");
require_once("class/User.php");
require_once("class/Client.php");

$client = new Client;
die(json_encode($client->addReservation($_POST['modelID'],$_POST['begin'],$_POST['end'])));

?>