<?php

session_start();

require_once("config.php");
require_once("class/User.php");
require_once("class/Worker.php");
require_once("caravanList.php");


  /**
   * Panel administratora
   */
if(isset($_SESSION['admin'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
    <body>
    <header>
        <a id="href" href="index.php"><img src='images/logo.png'/></a>
        <nav>
            <a id="href" href="logout.php">Wyloguj</a>
        </nav>
    </header> 
        <h1>Dodaj przyczepę</h1>

    <section class="admin">   
    <label>
    <select id="caravan-list">
        <option value="0">Wybierz model przyczepy</option>
        <option value="new">Dodaj nowy model</option>
        
        <?php
            for($i = 0;$i<count($caravanModels);$i++)
            { 
                $model = $caravanModels[$i]->getProducer()." ".$caravanModels[$i]->getModel();
                $id = $caravanModels[$i]->getModelID();
                echo "<option value='$id'>$model</option>";
            } 
        ?>  
        
    </select>
    <div class = "error" id="errorModelID"></div>
        </label>
    <label id="labelNumberPlate">
    <input type="text" id="numberPlate" placeholder="Numer rejestracyjny">
        <div class = "error" id="errorNumberPlate"></div>
    </label>

    <label id="labelProducer">
        <input type="text" id="producer" placeholder="Producent">
        <div class = "error" id="errorProducer"></div>
    </label>

    <label id="labelModel">
        <input type="text" id="model" placeholder="Model">
        <div class = "error" id="errorModel"></div>
    </label>

    <label id="labelPrice">
        <input type="text" id="price" placeholder="Cena">
        <div class = "error" id="errorPrice"></div>
    </label>

    <label id="labelWieght">
        <input type="text" id="weight" placeholder="Waga">
        <div class = "error" id="errorWeight"></div>
    </label>

    <label id="labelLength">
        <input type="text" id="length" placeholder="Długość całkowita">
        <div class = "error" id="errorLength"></div>
    </label>

    <label id="labelLengthInside">
        <input type="text" id="lengthInside" placeholder="Długość wnętrza">
        <div class = "error" id="errorLengthInside"></div>
    </label>

    <label id="labelWidth">
        <input type="text" id="width" placeholder="Szerokość">
        <div class = "error" id="errorWidth"></div>
    </label>

    <label id="labelInside">
        <input type="text" id="widthInside" placeholder="Szerokość wnętrza">
        <div class = "error" id="errorWidthInside"></div>
    </label>

    <label id="labelPeople">
        <input type="text" id="people" placeholder="Ilość miejsc">
        <div class = "error" id="errorPeople"></div>
    </label>

    <label id="labelWater">
        <input type="text" id="water" placeholder="Woda">
        <div class = "error" id="errorWater"></div>
    </label>

    <div id="checkbox" >
        <label><input type="checkbox" id="checkHotWater" name="hotWater" value="1">Ciepła woda</label>
        <label><input type="checkbox" id="checkShower" name="shower" value="1">Prysznic</label>
        <label><input type="checkbox" id="checkFridge" name="fridge" value="1">Lodówka</label>
    </div>
    <div id="divFile">
    <label id="fileLabel">Dołącz zdjęcie
        <input type="file" name="file" id="file" size="60">
     </label>   
    <div id="errorFile"></div>
</div>
    
        <input id="btnAdd" type="button" value="Dodaj">
</section>



    </body>
    <script src="js/upload.js"></script>

</html>
<?php

}else{
    header("Location: index.php"); 
}
?>