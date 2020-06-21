<?php 
require_once("CaravanModel.php");

class Caravan extends CaravanModel
{
  private $caravanID,$numberPlate,$modelID;

    public function caravan($caravanID,$numberPlate,$modelID){
      $this->caravanID = $caravanID;
      $this->numberPlate = $numberPlate;
      $this->modelID = $modelID;
    }

    public function getCaravanID(){
      return $this->caravanID;
    }

    public function getNumberPlate(){
      return $this->numberPlate;
    }

    public function getModelID(){
      return $this->modelID;
    }
  }

?>