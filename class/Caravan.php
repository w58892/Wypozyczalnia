<?php 

class Caravan
{
  private $caravanID,$numberPlate,$producer,$model,$price,$weight,$length,$lengthInside,$width,$widthInside,$people,$water,$hotwater,$shower,$fridge,$picture;

    public function caravan($caravanID,$numberPlate,$producer,$model,$price,$weight,$length,$lengthInside,$width,$widthInside,$people,$water,$hotwater,$shower,$fridge,$picture){
      $this->caravanID = $caravanID;
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
      $this->picture = $picture;
    }

    public function getCaravanID(){
      return $this->caravanID;
    }

    public function getNumberPlate(){
      return $this->numberPlate;
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

    public function getPicture(){
      return $this->picture;
    }
  }

?>