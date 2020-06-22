<?php

class Client extends User
{
  public function addReservation($modelID,$begin,$end){

    global $db;

    if($begin>$end)
      return '{"date":"wrong"}';
    
    $sth = $db->prepare('SELECT caravans.* FROM caravans LEFT JOIN (SELECT caravans.caravanID FROM caravans INNER JOIN reservations ON 
      reservations.caravanID = caravans.caravanID WHERE caravans.modelID=:modelID AND reservations.end > :begin
      AND reservations.begin < :end ) as t2 ON caravans.caravanID = t2.caravanID WHERE caravans.modelID=:modelID AND t2.caravanID IS NULL LIMIT 1');
    
    $sth->bindValue(':modelID', $modelID, PDO::PARAM_STR);
    $sth->bindValue(':begin', $begin, PDO::PARAM_STR);
    $sth->bindValue(':end', $end, PDO::PARAM_STR);
    $sth->execute();
    
    if ($sth->rowCount() > 0) {
      foreach ($sth as $row) {
        $caravanID = $row['caravanID'];
      };
          
      $sth = $db->prepare('INSERT INTO reservations (begin, end, userID, caravanID) VALUE (:begin,:end,:userID,:caravanID)');
      $sth->bindValue(':begin', $begin, PDO::PARAM_STR);
      $sth->bindValue(':end', $end, PDO::PARAM_STR);
      $sth->bindValue(':userID', $_SESSION['userID'], PDO::PARAM_INT);        
      $sth->bindValue(':caravanID', $caravanID, PDO::PARAM_INT);
      $res = $sth->execute();
    
      if ($res == true) 
        return '{"success":"true"}';
    }else
        return '{"available":"false"}';
  }
    
  public function modifyReservation($begin,$end,$caravanID,$reservationID){
    global $db;
    $sth = $db->prepare('UPDATE reservations SET begin=:begin,end=:end,caravanID=:caravanID WHERE reservationID=:reservationID');
    $sth->bindValue(':begin', $begin, PDO::PARAM_STR);
    $sth->bindValue(':end', $end, PDO::PARAM_STR);
    $sth->bindValue(':caravanID', $caravanID, PDO::PARAM_INT);
    $sth->bindValue(':reservationID', $reservationID, PDO::PARAM_INT);
    $mod = $sth->execute();
    if($mod == true)
      return '{"success":"true"}';
    else
      return '{"success":"fail"}';
  }
    
  public function deleteReservation($reservationID){
    
    global $db;
    
    $sth = $db->prepare('DELETE FROM reservations WHERE reservationID=:reservationID');
    $sth->bindValue(':reservationID', $reservationID, PDO::PARAM_INT);
    $del = $sth->execute();
    
    if($del == true)
    die ('{"success":"true"}');
    else
      return '{"success":"fail"}';
  }
}