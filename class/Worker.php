<?php

class Worker extends User
{

    public function addCaravan($numberPlate, $producer,$model,$price,$weight,$length,$lengthInside,$width,$widthInside,$people,$water,$hotwater,$shower,$fridge){
        global $db;

        $sth = $db->prepare('SELECT * FROM caravans WHERE producer=:producer AND model=:model limit 1');
        $sth->bindValue(':producer', $producer, PDO::PARAM_STR);
        $sth->bindValue(':model', $model, PDO::PARAM_STR);
        $sth->execute();
        $caravan = $sth->fetch(PDO::FETCH_ASSOC);
        if ($caravan) {
          $response['caravan'] = "exist";
          return(json_encode($response));
        }
        
        $caravan = new Caravan($numberPlate,$producer,$model,$price,$weight,$length,$lengthInside,$width,$widthInside,$people,$water,$hotwater,$shower,$fridge);

        
        $sth = $db->prepare('INSERT INTO caravans VALUE (NULL,:numberPlate,:producer,:model,:price,:weight,:length,:lengthInside,:width,:widthInside,:people,:water,:hotwater,:shower,:fridge)');
        $sth->bindValue(':numberPlate', $numberPlate, PDO::PARAM_STR);
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

        $caravan = $sth->execute();
        if ($caravan == true) {
            $response['success'] = 'true';
            return(json_encode($response));
          }
          
    }
}
?>