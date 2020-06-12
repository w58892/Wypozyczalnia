<?php 

try {

  $stmt = $db->query('SELECT * FROM caravans ');

  if ($stmt->rowCount() > 0) {
      $i = 0;
      foreach ($stmt as $row) {

          $caravans[$i] = new Caravan($row['numberPlate'],$row['producer'], $row['model'], $row['price'], $row['weight'], $row['length'], $row['lengthInside'], $row['width'], $row['widthInside'], $row['people'], $row['water'], $row['hotWater'], $row['shower'], $row['fridge']);
          $i++;
      }
  } else
      die(json_encode("error"));
  echo $caravans[0]->getModel();
} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int) $e->getCode());
}


class Caravan
{
  private $numberPlate,$producer,$model,$price,$weight,$length,$lengthInside,$width,$widthInside,$people,$water,$hotwater,$shower,$fridge;

    public function caravan($numberPlate,$producer,$model,$price,$weight,$length,$lengthInside,$width,$widthInside,$people,$water,$hotwater,$shower,$fridge){
      $this->numberPlate = $numberPlate;
      $this->producer = $producer;
      $this->model = $model;
      $this->price = $price;
      $this->weight = $weight;
      $this->length = $length;
      $this->lengthInside = $lengthInside;
      $this->width = $width;
      $this->widthInside = $widthInside;
      $this->people = $people;
      $this->water = $water;
      $this->hotwater = $hotwater;
      $this->shower = $shower;
      $this->fridge = $fridge;
  
    }

    public function getProducer(){
      return $this->producer;
    }

    public function getModel(){
      return $this->model;
    }

    public function getPrice(){
      return $this->price;
    }

    public function getWeight(){
      return $this->weight;
    }

    public function getLength(){
      return $this->length;
    }

    public function getLengthInside(){
      return $this->LengthInside;
    }

    public function getWidth(){
      return $this->width;
    }

    public function getwWidthInside(){
      return $this->widthInside;
    }

    public function getPeople(){
      return $this->people;
    }

    public function getWater(){
      return $this->water;
    }

    public function getHotWater(){
      return $this->hotWater;
    }

    public function getShower(){
      return $this->shower;
    }

    public function getFridge(){
      return $this->fridge;
    }


  }

?>