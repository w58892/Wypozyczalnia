<?php
session_start();
require_once("config.php");
require_once("class/User.php");
require_once("class/Client.php");
require_once("class/Worker.php");

if(!isset($_POST['addmodel'])){
    $worker = new Worker();
    $worker->addCaravan($_POST['numberPlate'],$_POST['modelID']);
}
try {
   
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['file']['error']) ||
        is_array($_FILES['file']['error'])
    ) {
		die(json_encode('{"file":empty}'));
    }

    switch ($_FILES['file']['error']) {
		case UPLOAD_ERR_OK:
            break;
		case UPLOAD_ERR_NO_FILE:
			die(json_encode('{"file":empty}'));
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
            die(json_encode('{"file":big}'));
		default:
			die(json_encode('{"file":unknown}'));    
		}

    // You should also check filesize here.
    if ($_FILES['file']['size'] > 1000000) {
		
        die(json_encode('{"file":big}'));
    }

    // DO NOT TRUST $_FILES['file']['mime'] VALUE !!
    // Check MIME Type by yourself.
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

	
    // You should name it uniquely.
    // DO NOT USE $_FILES['file']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    if (!move_uploaded_file(
        $_FILES['file']['tmp_name'],
        sprintf('./images/caravans/%s.%s',
            $_FILES['file']['name'],
            $ext
        )
    )) {
		die(json_encode('{"file":big}'));

        throw new RuntimeException('Failed to move uploaded file.');
	}
	$name=$_FILES['file']['name'].".".$ext;
	//die(json_encode('{"file":success}'));

    //echo 'File is uploaded successfully.';

$worker = new Worker();

$worker->addCaravanModel($_POST['producer'], $_POST['model'], $_POST['price'], $_POST['weight'], $_POST['length'], $_POST['lengthInside'], $_POST['width'], $_POST['widthInside'], $_POST['people'], $_POST['water'], $_POST['hotWater'], $_POST['shower'], $_POST['fridge'], $name);

} catch (RuntimeException $e) {

    echo $e->getMessage();

}


?>