<?php
require_once("config.php");
require_once("Caravan.php");

$stmt = $db->query('SELECT * FROM caravans ');

if ($stmt->rowCount() > 0) {
    $i = 0;
    foreach ($stmt as $row) {
        $caravans[$i] = new Caravan($row['caravanID'],$row['numberPlate'],$row['producer'], $row['model'], $row['price'], $row['weight'], $row['length'], $row['lengthInside'], $row['width'], $row['widthInside'], $row['people'], $row['water'], $row['hotWater'], $row['shower'], $row['fridge'], $row['picture']);
        $i++;
    }
} else
    die(json_encode("error"));
?>