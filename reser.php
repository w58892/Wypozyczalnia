<?php
require_once("config.php");
require_once("User.php");
require_once("Client.php");

$client = new Client;
die(json_encode($client->addReservation($_POST['producer'],$_POST['model'],$_POST['begin'],$_POST['end'])));

?>