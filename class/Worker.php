<?php

class Worker extends User
{
  public function addCaravan($numberPlate,$modelID){
    global $db;

    if($numberPlate=="")
      die('{"numberPlate":"empty"}');
    else if(strlen($numberPlate) != 7)
      die('{"numberPlate":"length"}');

    if($modelID==0)
      die('{"modelID":"empty"}');

    
    $sth = $db->prepare('SELECT * FROM caravans WHERE numberPlate=:numberPlate limit 1');
    $sth->bindValue(':numberPlate', $numberPlate, PDO::PARAM_STR);
    $sth->execute();
    $caravan = $sth->fetch(PDO::FETCH_ASSOC);
    if ($caravan)
      die('{"caravan":"exist"}');
     


    $sth = $db->prepare('INSERT INTO caravans VALUE (NULL,:numberPlate,:modelID)');
    $sth->bindValue(':numberPlate', $numberPlate, PDO::PARAM_STR);
    $sth->bindValue(':modelID', $modelID, PDO::PARAM_INT);

    $caravan = $sth->execute();
        
    if ($caravan == true) 
      die('{"success":"true"}');
    else
      die('{"success":"false"}');    
  }

  public function addCaravanModel($producer,$model,$price,$weight,$length,$lengthInside,$width,$widthInside,$people,$water,$hotwater,$shower,$fridge,$picture){

    if($producer=="")
        $response['producer'] = "empty";

    if($model=="")
      $response['model'] = "empty";

    if($price=="")
      $response['price'] = "empty";

    else if(!is_numeric($price))
    $response['price'] = "notNumber";

    if($weight=="")
    $response['weight'] = "empty";

    else if(!is_numeric($weight))
    $response['weight'] = "notNumber";

    if($length=="")
    $response['length'] = "empty";

    else if(!is_numeric($length))
    $response['length'] = "notNumber";

    if($lengthInside=="")
    $response['lengthInside'] = "empty";

    else if(!is_numeric($lengthInside))
    $response['lengthInside'] = "notNumber";

    if($lengthInside=="")
    $response['lengthInside'] = "empty";

    else if(!is_numeric($lengthInside))
    $response['lengthInside'] = "notNumber";


    if($width=="")
    $response['width'] = "empty";

    else if(!is_numeric($width))
    $response['width'] = "notNumber";


    if($widthInside=="")
    $response['widthInside'] = "empty";
    else if(!is_numeric($widthInside))
    $response['widthInside'] = "notNumber";


    if($people=="")
    $response['people'] = "empty";

    else if(!is_numeric($people))
    $response['people'] = "notNumber";

    if($water=="")
    $response['water'] = "empty";

    else if(!is_numeric($water))
    $response['water'] = "notNumber";

    if (!empty($response))
    die(json_encode($response));

    global $db;

    $sth = $db->prepare('SELECT * FROM caravanmodels WHERE producer=:producer AND model=:model limit 1');
    $sth->bindValue(':producer', $producer, PDO::PARAM_STR);
    $sth->bindValue(':model', $model, PDO::PARAM_STR);
    $sth->execute();
    $caravan = $sth->fetch(PDO::FETCH_ASSOC);
    if ($caravan) {
      $response['caravan'] = "exist";
      die($response);      
    }

    $sth = $db->prepare('INSERT INTO caravanmodels VALUE (NULL,:producer,:model,:price,:weight,:length,:lengthInside,:width,:widthInside,:people,:water,:hotwater,:shower,:fridge,:picture)');
    $sth->bindValue(':producer', $producer, PDO::PARAM_STR);
    $sth->bindValue(':model', $model, PDO::PARAM_STR);
    $sth->bindValue(':price', $price, PDO::PARAM_STR);
    $sth->bindValue(':weight', $weight, PDO::PARAM_STR);
    $sth->bindValue(':length', $length, PDO::PARAM_STR);
    $sth->bindValue(':lengthInside', $lengthInside, PDO::PARAM_STR);
    $sth->bindValue(':width', $width, PDO::PARAM_STR);
    $sth->bindValue(':widthInside', $widthInside, PDO::PARAM_STR);
    $sth->bindValue(':people', $people, PDO::PARAM_STR);
    $sth->bindValue(':water', $water, PDO::PARAM_STR);
    $sth->bindValue(':hotwater', $hotwater, PDO::PARAM_STR);
    $sth->bindValue(':shower', $shower, PDO::PARAM_STR);
    $sth->bindValue(':fridge', $fridge, PDO::PARAM_STR);
    $sth->bindValue(':picture', $picture, PDO::PARAM_STR);

    $caravan = $sth->execute();
        
    if ($caravan == true)
      die('{"success":"true"}');
    else
      die('{"success":"false"}');
  }
}
?>