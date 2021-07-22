<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypozyczalnia przyczep</title>
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
<header>

    <a id="href" href="index.php"><img src='images/logo.png'/></a>
    <nav>
        <a id="href" href="userPanel.php">Moje Rezerwacje</a>
        <a id="href" href="logout.php">Wyloguj</a>
    </nav>
</header>

<?php
session_start();
require_once("config.php");
require_once("class/User.php");
require_once("class/Client.php");
require_once("class/Worker.php");
require_once("class/Caravan.php");
require_once("class/Reservation.php");
require("caravanList.php");

if(isset($_SESSION['userID'])){
    //global $db;
    $stmt = $db->query('SELECT * FROM reservations WHERE userID=:userID');
    $stmt->bindValue(':userID', $_SESSION['userID'], PDO::PARAM_INT);       
    $stmt->execute();

    
    if ($stmt->rowCount() > 0) {
        $i = 0;
        echo '<div><table class="ReservationList">';

        foreach ($stmt as $row) {
            $reservations[$i] = new Reservation($row['reservationID'],$row['reservationDate'],$row['begin'],$row['end'],$row['userID'],$row['caravanID']);
            for($j= 0;$j<count($caravans);$j++)
            {
                if($caravans[$j]->getcaravanID() == $reservations[$i]->getcaravanID())
                {
                    for($k= 0;$k<count($caravanModels);$k++)
                    {
                        if($caravanModels[$k]->getModelID() == $caravans[$j]->getModelID())
                        {
                            ?>
                                <tr>
                                    <td>Producent : <?php echo $caravanModels[$k]->getProducer(); ?></td>
                                    <td>Model : <?php echo $caravanModels[$k]->getModel();?></td>
                                    <td>Początek : <?php echo $reservations[$i]->getBegin();?></td>
                                    <td>Koniec : <?php echo $reservations[$i]->getEnd();?></td>
                                    <td><button onclick='remove(<?php echo $reservations[$i]->getReservationID(); ?>)'>USUŃ</button></td>
                                </tr>
                           
                            <?php
                        }
                    }
                }
            }

            $i++;
        }
        echo " </table>";
    } else
        return('{"reservations":"none"}');

}
else
    header("Location: index.php"); 
?>
</body>
<script type="text/javascript" src="js/removeReservation.js"></script>

</html>