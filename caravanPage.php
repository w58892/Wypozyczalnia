<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
<header id="header">
    
    <a id="href" href="index.php"><img id="logo" src='images/logoBlack.png'/></a>
    <nav>
    <?php
    session_start();

    if(isset($_SESSION['userID']))
    {?>
        <a class="color" href="userPanel.php">Moje Rezerwacje</a>
        <a class="color" href="logout.php">Wyloguj</a>
    <?php
    }else{ ?>
        <a class="color" href="log.php">Zaloguj</a>
    <?php } ?>
    <input type="button" id="colorBTN" class="light" value="Ciemny">

    </nav>
</header>

<?php



require_once("caravanList.php");

for($i = 0;$i<count($caravanModels);$i++)
{
    if($caravanModels[$i]->getModelID() ==$_GET['id'])
    {
        $id=$i;
        break;
    }
}

 echo "<h1>".$caravanModels[$id]->getProducer()." ".$caravanModels[$id]->getModel()."</h1>";
?>

<table class="specyfication">

<tr> 
    <td>Masa </td>
    <td>
        <?php echo $caravanModels[$id]->getWeight();?>kg
    </td> 
</tr>
<tr> 
    <td>Długość całkowita  </td>
    <td>
        <?php echo $caravanModels[$id]->getLength();?>mm
    </td>
</tr>
<tr> 
    <td>Długość wnętrza  </td>
    <td>
        <?php echo $caravanModels[$id]->getLengthInside();?>mm
    </td>
</tr>
<tr> 
    <td>Szerokość całkowita  </td>
    <td>
        <?php echo $caravanModels[$id]->getWidth();?>mm
    </td> 
</tr>
<tr> 
    <td>Szerokość wnętrza  </td>  
    <td>
        <?php echo $caravanModels[$id]->getWidthInside();?>mm
    </td> 
</tr>
<tr> 
    <td>Ilość miejsc  </td>  
    <td>
        <?php echo $caravanModels[$id]->getPeople();?>
    </td>
</tr>
<tr>  
    <td>Woda  </td>  
    <td>
        <?php echo $caravanModels[$id]->getWater();?>l
    </td> 
</tr>
<tr> 
    <td>Ciepła woda  </td>  
    <td>
        <?php
            if($caravanModels[$id]->getHotWater()=="1")
                echo "jest";
            else
                echo "nie ma";
         ?>
    </td> 
</tr>
<tr> 
    <td>Prysznic  </td>  
    <td>
        <?php 
        if ($caravanModels[$id]->getshower() == "1")
            echo "jest";
        else
            echo "nie ma";?>
    </td>
</tr>
<tr>     
    <td>Lodówka  </td>  
    <td>
        <?php 
            if($caravanModels[$id]->getFridge() == "1")
                echo "jest";
            else
                echo "nie ma";
        ?>
    </td> 
</tr>
</table>
<img class="caravanIMG" src='images/caravans/<?php echo $caravanModels[$id]->getPicture(); ?>'/> 

<section class="reservation">
            <p><?php echo $caravanModels[$id]->getPrice();?>PLN/dzień</p>
          <label>Początek<input type="date" id="begin" name="begin">
          <div class = "error" id="errorBegin"></div>
         </label>
        

        <label>Koniec <input type="date" id="end" name="end">
        <div class = "error" id="errorEnd"></div>
         </label>
        <input type="button" id="addReservation" value="Rezerwuj">  
</section>

</body>
<script type="text/javascript" src="js/color.js"></script>
<script type="text/javascript" src="js/res.js"></script>

</html>
