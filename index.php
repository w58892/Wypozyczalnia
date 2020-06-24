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
  <header>
  <a id="href" href="index.php"><img src='images/logo.png'/></a>
    <nav>
        <?php if (isset($_SESSION['admin'])){  ?>
          <a id="href" href="adminPanel.php">Panel administratora</a>
          <a id="href" href="logout.php">Wyloguj</a>
        <?php }else if(isset($_SESSION['userID'])){ ?>
          <a id="href" href="userPanel.php">Moje Rezerwacje</a>
          <a id="href" href="logout.php">Wyloguj</a>
        <?php }else{ ?>
          <a id="href" href="log.php">Zaloguj</a>
        <?php } ?> 
    </nav>
  </header>

  <section class="slider">
    <img src="images/slider.jpg">
  </section>
  <h1>Przyczepy kempingowe na wynajem</h1>
  <div class="grid">

    <?php
      for($i = 0;$i<count($caravanModels);$i++)
      { ?>
        <div class="caravan">
          <?php 
            $adres = $caravanModels[$i]->getPicture();
            echo "<img src='images/caravans/$adres'/> ";

            echo "<h3>".$caravanModels[$i]->getProducer()." ".$caravanModels[$i]->getModel()."</h3>";
            echo "<p class='price'>".$caravanModels[$i]->getPrice()." PLN/dzień</p>";
            echo "<p>Długość : ".$caravanModels[$i]->getLength()."mm</p>";

            echo "<p>Liczba miejsc : ".$caravanModels[$i]->getPeople()."</p>";
            echo "<p>masa : ".$caravanModels[$i]->getWeight()."kg</p>";

            $id =  $caravanModels[$i]->getModelID();
            echo "<a id='href' href='caravanPage.php?id=$id'><button>Więcej</button></a>";
        echo "</div>";
      } ?>  
  </div>
  <link rel="stylesheet" href="css/styles.css">
</body>
</html>