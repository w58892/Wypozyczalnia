<?php
session_start();

if($_POST['color']=="get")
{
    if(isset($_SESSION['color']))
        die('{"color":"'.$_SESSION['color'].'"}');
    else
        die('{"color":"Ciemny"}');
}
    $_SESSION['color'] = $_POST['color'];


?>