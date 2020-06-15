<?php
echo '<?xml version="1.0" encoding="iso-8859-2"?>';
?>
<html>
    <head>
        <title>Upload plików w PHP</title>
        <meta charset="utf-8">
		<script src="upload.js"></script>
    </head>
    <body>

    <h1>Dodaj przyczepę</h1>
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
    <input type="button" id="btn_loguj" class="send" value="Zaloguj">

    <form enctype="multipart/form-data" action="upload.php" method="post">
        <input type="file" name="plik" id="plik">
        <input type="button" value="Wyślij" onclick="wyslijPlik()">
    </form>
	<section>
		<h3>Postęp wysyłania</h3>
		<output id="status">Wybierz plik i naciśnij <i>Wyślij</i>.</output>
		<progress value="0" max="100" id="postep"></progress>
	</section>
    </body>
</html>

</body>
</html>