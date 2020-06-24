<?php 
/**
 * Zawiera informacje o modelu danej przyczepy
 */
class CaravanModel
{
  private $modelID,$producer,$model,$price,$weight,$length,$lengthInside,$width,$widthInside,$people,$water,$hotWater,$shower,$fridge,$picture;

    public function caravanModel($modelID,$producer,$model,$price,$weight,$length,$lengthInside,$width,$widthInside,$people,$water,$hotWater,$shower,$fridge,$picture){
      $this->modelID = $modelID;
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
      $this->hotWater = $hotWater;
      $this->shower = $shower;
      $this->fridge = $fridge;
      $this->picture = $picture;
    }
/**
 * zwarca ID modelu
 */
    public function getModelID(){
      return $this->modelID;
    }


  /**
 * zwarca producenta
 */
    public function getProducer(){
      return $this->producer;
    }


/**
 * zwarca nazwę modelu
 */
    public function getModel(){
      return $this->model;
    }

/**
 * zwarca cenę wynajmu za dzień
 */
    public function getPrice(){
      return $this->price;
    }

  /**
 * zwarca wagę przyczepy w kg
 */
    public function getWeight(){
      return $this->weight;
    }

/**
 * zwarca długość całkowitą przyczepy w mm
 */
    public function getLength(){
      return $this->length;
    }

/**
 * zwarca Idługość wnętrza przyczepy w mm
 */
    public function getLengthInside(){
      return $this->lengthInside;
    }

/**
 * zwarca szerokość całkowitą przyczepy w mm
 */
    public function getWidth(){
      return $this->width;
    }

/**
 * zwarca szerokość wnętrza przyczepy w mm
 */
    public function getWidthInside(){
      return $this->widthInside;
    }

/**
 * zwarca ilość miejsc w przyczepie
 */
    public function getPeople(){
      return $this->people;
    }

/**
 * zwarca pojemość zbiornika na wodę w litrach
 */
    public function getWater(){
      return $this->water;
    }

/**
 * zwraca czy ma ciepłą wodę
 */
    public function getHotWater(){
      return $this->hotWater;
    }

/**
 * zwraca czy ma prysznic
 */
    public function getShower(){
      return $this->shower;
    }

/**
 * zwraca czy ma lodówkę
 */
    public function getFridge(){
      return $this->fridge;
    }

/**
 * zwraca nazwę zdjęcia przyczepy, które jest umieszczone na serwerze
 */
    public function getPicture(){
      return $this->picture;
    }
  }

?>