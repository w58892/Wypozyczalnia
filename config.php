<?php
try{
  $db = new PDO('mysql:host=localhost;port=3306;dbname=wypozyczalnia', 'root', '');
}
catch (PDOException $e){
  die ("Error connecting to database!");
}
?>