<?php
session_start();
require_once("config.php");
require_once("class/User.php");
require_once("class/Client.php");
require_once("class/Worker.php");
require_once("class/Caravan.php");
require_once("class/Reservation.php");
require_once("caravanList.php");
?>
<html>
<body>
  <header id="header">
  <a href="index.php"><img id = "logo" src='images/logoBlack.png'/></a>
    <nav>
        <?php if (isset($_SESSION['admin'])){  ?>
          <a class="color" href="adminPanel.php">Panel administratora</a>
          <a class="color" href="logout.php">Wyloguj</a>
        <?php }else if(isset($_SESSION['userID'])){ ?>
          <a class="color" href="userPanel.php">Moje Rezerwacje</a>
          <a class="color" href="logout.php">Wyloguj</a>
        <?php }else{ ?>
          <a class="color" href="log.php">Zaloguj</a>

        <?php } ?>           
        <input type="button" id="colorBTN" class="light" value="Ciemny">
    </nav>
  </header>

  <section class="slider">
    <img src="images/slider.jpg">
  </section>
  <h1>Przyczepy kempingowe na wynajem</h1>
  <h2>Hobby</h2>
  <div class="grid">

    <?php

    $hobby = new CaravanModelFactory();
    $hobby = $hobby->MakeCaravan("Hobby");
    $hobby =  $hobby->GetCaravans();
      for($i = 0;$i<count($hobby);$i++)
      { ?>
        <div class="caravan">
          <?php 
            $adres = $hobby[$i]->getPicture();
            echo "<img src='images/caravans/$adres'/> ";

            echo "<h3>".$hobby[$i]->getProducer()." ".$hobby[$i]->getModel()."</h3>";
            echo "<p class='price'>".$hobby[$i]->getPrice()." PLN/dzień</p>";
            echo "<p>Długość : ".$hobby[$i]->getLength()."mm</p>";

            echo "<p>Liczba miejsc : ".$hobby[$i]->getPeople()."</p>";
            echo "<p>masa : ".$hobby[$i]->getWeight()."kg</p>";

            $id =  $hobby[$i]->getModelID();
            echo "<a id='href' href='caravanPage.php?id=$id'><button>Więcej</button></a>";
        echo "</div>";
      } ?>  
  </div>

  <h2>Buersnter</h2>
  <div class="grid">

    <?php

    $buersnter = new CaravanModelFactory();
    $buersnter = $buersnter->MakeCaravan("Buersnter");
    $buersnter =  $buersnter->GetCaravans();
      for($i = 0;$i<count($buersnter);$i++)
      { ?>
        <div class="caravan">
          <?php 
            $adres = $buersnter[$i]->getPicture();
            echo "<img src='images/caravans/$adres'/> ";

            echo "<h3>".$buersnter[$i]->getProducer()." ".$buersnter[$i]->getModel()."</h3>";
            echo "<p class='price'>".$buersnter[$i]->getPrice()." PLN/dzień</p>";
            echo "<p>Długość : ".$buersnter[$i]->getLength()."mm</p>";

            echo "<p>Liczba miejsc : ".$buersnter[$i]->getPeople()."</p>";
            echo "<p>masa : ".$buersnter[$i]->getWeight()."kg</p>";

            $id =  $buersnter[$i]->getModelID();
            echo "<a id='href' href='caravanPage.php?id=$id'><button>Więcej</button></a>";
        echo "</div>";
      } ?>  
  </div>
  <link rel="stylesheet" href="css/styles.css">
  <script type="text/javascript" src="js/color.js"></script>
</body>
</html>