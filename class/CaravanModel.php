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



interface ICaravanModel
{
    public function GetCaravans();
}

class Hobby implements ICaravanModel
{
    public function GetCaravans()
    {
      $db = SingletonDB::getInstance();

      $stmt = $db->query('SELECT * FROM caravanmodels WHERE producer = "Hobby"');
      $stmt->execute();
  
      if ($stmt->rowCount() > 0) {
        $i = 0;
        foreach ($stmt as $row) {
          $caravanModels[$i] = new CaravanModel($row['modelID'],$row['producer'], $row['model'], $row['price'], $row['weight'], $row['length'], $row['lengthInside'], $row['width'], $row['widthInside'], $row['people'], $row['water'], $row['hotWater'], $row['shower'], $row['fridge'], $row['picture']);
          $i++;
        }
        return $caravanModels;
      }
    }
}

class Buersnter  implements ICaravanModel
{
  public function GetCaravans()
  {
    $db = SingletonDB::getInstance();

    $stmt = $db->query('SELECT * FROM caravanmodels WHERE producer = "Buersnter"');
    $stmt->execute();
    $caravanModels = [];
    if ($stmt->rowCount() > 0) {
        $i = 0;
        foreach ($stmt as $row) {
            $caravanModels[$i] = new CaravanModel($row['modelID'],$row['producer'], $row['model'], $row['price'], $row['weight'], $row['length'], $row['lengthInside'], $row['width'], $row['widthInside'], $row['people'], $row['water'], $row['hotWater'], $row['shower'], $row['fridge'], $row['picture']);
            $i++;
        }
      }
    return $caravanModels;
  }
}

interface ICaravanModelFactory
{
    public function MakeCar(string $name);
}

class CaravanModelFactory implements ICaravanModelFactory
{

 
    public function MakeCar(string $name)
    {
      switch ($name)
      {
          case "Hobby":
              return new Hobby();
          case "Buersnter":
              return new Buersnter();
          default:
              throw new NotSupportedException();
      }
    }
}

?>