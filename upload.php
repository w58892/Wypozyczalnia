<?php
session_start();
require_once("config.php");
require_once("User.php");
require_once("Client.php");
require_once("Worker.php");
require_once("config.php");

$folder_upload="./upload";
$plik_nazwa=$_FILES['plik']['name'];
$plik_lokalizacja=$_FILES['plik']['tmp_name']; //tymczasowa lokalizacja pliku
$plik_mime=$_FILES['plik']['type']; //typ MIME pliku wysłany przez przeglądarkę
$plik_rozmiar=$_FILES['plik']['size'];
$plik_blad=$_FILES['plik']['error']; //kod błędu

if (!$plik_lokalizacja) {
	die("Nie wysłano żadnego pliku");
}

/* sprawdzenie błędów */
switch ($plik_blad) {
	case UPLOAD_ERR_OK:
		break;
	case UPLOAD_ERR_NO_FILE:
		exit("Brak pliku.");
		break;
	case UPLOAD_ERR_INI_SIZE:
	case UPLOAD_ERR_FORM_SIZE:
		exit("Przekroczony maksymalny rozmiar pliku.");
		break;
	default:
		exit("Nieznany błąd.");
		break;
}

$dozwolone_rozszerzenia=array("jpeg", "jpg", "tiff", "tif", "png", "gif");
$plik_rozszerzenie=pathinfo(strtolower($plik_nazwa), PATHINFO_EXTENSION);
if (!in_array($plik_rozszerzenie, $dozwolone_rozszerzenia, true)) {
	exit("Niedozwolone rozszerzenie pliku.");
}

if (!move_uploaded_file($plik_lokalizacja, $folder_upload."/".$plik_nazwa)) {
	exit("Nie udało się przenieść pliku.");
}

$worker = new Worker();

$worker->addCaravan($_POST['numberPlate'],$_POST['producer'], $_POST['model'], $_POST['price'], $_POST['weight'], $_POST['length'], $_POST['lengthInside'], $_POST['width'], $_POST['widthInside'], $_POST['people'], $_POST['water'], $_POST['hotWater'], $_POST['shower'], $_POST['fridge'], $plik_nazwa);

?>