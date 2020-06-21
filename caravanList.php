<?php
require_once("config.php");
require_once("class/Caravan.php");

$stmt = $db->prepare('SELECT * FROM caravans ');
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $i = 0;
    foreach ($stmt as $row) {
        $caravans[$i] = new Caravan($row['caravanID'],$row['numberPlate'],$row['modelID']);
        $i++;
    }
} else
    return(json_encode("brak przyczep"));


    $stmt = $db->prepare('SELECT * FROM caravanmodels');
    $stmt->execute();

if ($stmt->rowCount() > 0) {
    $i = 0;
    foreach ($stmt as $row) {
        $caravanModels[$i] = new CaravanModel($row['modelID'],$row['producer'], $row['model'], $row['price'], $row['weight'], $row['length'], $row['lengthInside'], $row['width'], $row['widthInside'], $row['people'], $row['water'], $row['hotWater'], $row['shower'], $row['fridge'], $row['picture']);
        $i++;
    }
} else
    return(json_encode("brak modeli przyczep"));
?>