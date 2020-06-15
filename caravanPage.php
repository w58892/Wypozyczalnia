<?php
require_once("caravanList.php");

for($i = 0;$i<count($caravans);$i++)
{
    if($caravans[$i]->getCaravanID() ==$_GET['id'])
    {
        $id=$i;
        break;
    }
}

echo "<table border='1'>";

?>

<tr>
    <td>
        <?php echo $caravans[$id]->getModel();?>
    </td> 
    <td><?php 
        $adres = $caravans[$id]->getPicture();
        echo "<img src='upload/$adres' width='100px' height='100px' alt='' /> ";?>
    </td> 
                
    <td>
        <input type="button" id="addReservation" class="send" value="Rezerwuj">  
         <td> <label for="begin">Birthday:</label>
        <input type="date" id="begin" name="begin"> 
    </td>
</tr>
<tr>
    <td> 
        <label for="end">Birthday:</label>
        <input type="date" id="end" name="end"> 
    </td>
<tr>
<?php
echo $caravans[$id]->getNumberPlate();
  
echo "</table";

?>
<script type="text/javascript" src="res.js"></script>
