<?php
session_start();
require_once("config.php");
require_once("User.php");
require_once("Client.php");
require_once("Worker.php");
require_once("Caravan.php");
require_once("Reservation.php");
require_once("caravanList.php");


if (isset($_SESSION['admin']))
{
  echo '<a id="href" href="admin.php">Panel administratora</a>';
  echo '<a id="href" href="logout.php">Wyloguj</a>';
  $worker = new  Worker;
  echo $worker->addCaravan("RZ8429D","Hobby","lolol",200,2000,5000,4500,2500,2000,4,25,1,1,1,"wtf.jpg");
}else if(isset($_SESSION['userID'])){
  echo "user";
  echo '<a id="href" href="logout.php">Wyloguj</a>';
  $client = new Client;
  echo $client->addReservation("Hobby","lolol","2020-06-15","2020-06-20");
  echo $client->deleteReservation(1);
  echo $client->modifyReservation("2020-08-15","2020-08-20",2,2);
}else
{
  $user = new User;

  echo '<a id="href" href="login.html">Zaloguj</a>';
}

echo "<table border='1'>";
for($i = 0;$i<count($caravans);$i++)
{?>
  <tr>
    <td><?php echo $caravans[$i]->getModel();?></td> 
    <td><?php 
      $adres = $caravans[$i]->getPicture();
      echo "<img src='upload/$adres' width='100px' height='100px' alt='' /> ";?>
    </td> 
    <td><?php 
      $id =  $caravans[$i]->getCaravanID();
      echo $id;
      echo "<a id='href' href='caravanPage.php?id=$id'>Rezerwuj</a>";?>
    </td> 
    <td>3</td>
  </tr>
  <?php
  echo $caravans[$i]->getNumberPlate();
}
  echo "</table";

?>

<div id="preview-container">
  <button id="upload-dialog">Choose Image</button>
  <input type="file" id="image-file" accept="image/jpg,image/png" style="display:none" />
  <img id="preview-image" style="display:none" />
<div>

<form action="upload.php" method="post" enctype="multipart/form-data" target="uploadTarget" onsubmit="startUpload();" >
  <p id="uploadProcess">Uploading...<br/><img src="assets/loader.gif" /><br/></p>
  <p id="uploadForm" align="center"><br/>
    <label>
      File: <input name="myfile" type="file" size="30" />
    </label>
    <label>
      <input type="submit" name="submitBtn" class="sbtn" value="Upload" />
    </label>
  </p>
  <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
</form>
<!-- Uploaded file preview -->
<div>
  <embed id="UploadedFile" src="" width="390px" height="160px">
</div>

    script src="upload.js"></script>
<?php

$zdjecie1 = "1.png";
echo "<img src='$zdjecie1' width='100px' height='100px' alt='' /> ";

//require_once("index.html");

?>