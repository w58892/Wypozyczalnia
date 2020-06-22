<?php
session_start();
require_once("config.php");
require_once("class/User.php");
require_once("class/Client.php");
require_once("class/Worker.php");

if(!isset($_POST['addmodel'])){
    $worker = new Worker();
    $worker->addCaravan(trim($_POST['numberPlate']),trim($_POST['modelID']));
    
}
try {
   

    if (
        !isset($_FILES['file']['error']) ||
        is_array($_FILES['file']['error'])
    ) {
		die('{"file":"empty"}');
    }

    switch ($_FILES['file']['error']) {
		case UPLOAD_ERR_OK:
            break;
		case UPLOAD_ERR_NO_FILE:
			die('{"file":"empty"}');
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
            die('{"file":big}');
		default:
			die('{"file":"unknown"}');    
		}

    if ($_FILES['file']['size'] > 1000000) {
		
        die('{"file":"big"}');
    }


    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['file']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ),
        true
    )) {
		
        throw new RuntimeException('Invalid file format.');
    }

	

    if (!move_uploaded_file(
        $_FILES['file']['tmp_name'],
        sprintf('./images/caravans/%s.%s',
            $_FILES['file']['name'],
            $ext
        )
    )) {

        throw new RuntimeException('Failed to move uploaded file.');
	}
	$name=$_FILES['file']['name'].".".$ext;


$worker = new Worker();

$worker->addCaravanModel($_POST['producer'], $_POST['model'], $_POST['price'], $_POST['weight'], $_POST['length'], $_POST['lengthInside'], $_POST['width'], $_POST['widthInside'], $_POST['people'], $_POST['water'], $_POST['hotWater'], $_POST['shower'], $_POST['fridge'], $name);

} catch (RuntimeException $e) {

    echo $e->getMessage();

}


?>