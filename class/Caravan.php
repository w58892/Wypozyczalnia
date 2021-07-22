<?php 
require_once("CaravanModel.php");
//require_once("../config.php");

/**
 * Zawiera informacje o danej przyczepie
 */

class Caravan extends CaravanModel
{
  private $caravanID,$numberPlate,$modelID;

  /**
   * konstruktor przypisuje ID przyczepy, numer rejestracyjny i ID modelu 
   */
    public function caravan($caravanID,$numberPlate,$modelID){
      $this->caravanID = $caravanID;
      $this->numberPlate = $numberPlate;
      $this->modelID = $modelID;
    }

    /**
     * zwraca ID przyczepy
     */
    public function getCaravanID(){
      return $this->caravanID;
    }

    /**
     * zwraca numer jestracyjny
     */
    public function getNumberPlate(){
      return $this->numberPlate;
    }


    /**
     * zwraca ID modelu przyczepy
     */
    public function getModelID(){
      return $this->modelID;
    }
  }

?>
