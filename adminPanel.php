<?php

session_start();

require_once("config.php");
require_once("class/User.php");
require_once("class/Worker.php");
require_once("caravanList.php");

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

    <label id="labelNumberPlate">
    <input type="text" id="numberPlate" placeholder="numberPlate">
        <div id="errorNumberPlate"></div>
    </label>

    <label id="labelProducer">
        <input type="text" id="producer" placeholder="producer">
        <div id="errorProducer"></div>
    </label>

    <label id="labelModel">
        <input type="text" id="model" placeholder="model">
        <div id="errorModel"></div>
    </label>

    <label id="labelPrice">
        <input type="text" id="price" placeholder="price">
        <div id="errorPrice"></div>
    </label>

    <label id="labelWieght">
        <input type="text" id="weight" placeholder="weight">
        <div id="errorWeight"></div>
    </label>

    <label id="labelLength">
        <input type="text" id="length" placeholder="length">
        <div id="errorLength"></div>
    </label>

    <label id="labelLengthInside">
        <input type="text" id="lengthInside" placeholder="lengthInside">
        <div id="errorLengthInsider"></div>
    </label>

    <label id="labelWidth">
        <input type="text" id="width" placeholder="width">
        <div id="errorWidth"></div>
    </label>

    <label id="widthInside">
        <input type="text" id="widthInside" placeholder="widthInside">
        <div id="errorWidthInside"></div>
    </label>

    <label id="labelPeople">
        <input type="text" id="people" placeholder="people">
        <div id="errorPeople"></div>
    </label>

    <label id="labelWater">
        <input type="text" id="water" placeholder="water">
        <div id="errorWater"></div>
    </label>

    <label id="labelHotWater">
        <input type="text" id="hotWater" placeholder="hotWater">
        <div id="errorHotWater"></div>
    </label>

    <label id="labelShower">
        <input type="text" id="shower" placeholder="shower">
        <div id="errorShower"></div>
    </label>

    <label id="labelFridge">
        <input type="text" id="fridge" placeholder="fridge">
        <div id="errorFridge"></div>
    </label>

        <input type="file" name="file" id="file">
        <input type="button" value="Dodaj" onclick="add()">
</section>
    </body>
    <script src="upload.js"></script>

</html>
<?php

}else{
    header("Location: index.php"); 
}
?>