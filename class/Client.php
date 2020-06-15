<?php

class Client extends User
{
  public function addReservation($producer,$model,$begin,$end){

    global $db;

    if($begin>$end)
    {
      $response['date'] = "wrong";
      return $response;
    }
    
    $sth = $db->prepare('SELECT caravans.* FROM caravans LEFT JOIN (SELECT caravans.caravanID FROM caravans INNER JOIN reservations ON 
      reservations.caravanID = caravans.caravanID WHERE caravans.producer=:producer AND caravans.model=:model AND reservations.end > :begin
      AND reservations.begin < :end ) as t2 ON caravans.caravanID = t2.caravanID WHERE caravans.producer=:producer AND caravans.model=:model AND t2.caravanID IS NULL LIMIT 1');
    
    $sth->bindValue(':producer', $producer, PDO::PARAM_STR);
    $sth->bindValue(':model', $model, PDO::PARAM_STR);
    $sth->bindValue(':begin', $begin, PDO::PARAM_STR);
    $sth->bindValue(':end', $end, PDO::PARAM_STR);
    $sth->execute();
    
    if ($sth->rowCount() > 0) {
      foreach ($sth as $row) {
        $caravanID = $row['caravanID'];
      };
      $userID=1;
          
      $sth = $db->prepare('INSERT INTO reservations (begin, end, userID, caravanID) VALUE (:begin,:end,:userID,:caravanID)');
      $sth->bindValue(':begin', $begin, PDO::PARAM_STR);
      $sth->bindValue(':end', $end, PDO::PARAM_STR);
      $sth->bindValue(':userID', $userID, PDO::PARAM_INT);        
      $sth->bindValue(':caravanID', $caravanID, PDO::PARAM_INT);
      $res = $sth->execute();
    
      if ($res == true) 
        $response['success'] = "true";
      return $response;
    }else
      return "Ten model nie jest dostępny w danym zakresie czasowym";
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
      return "success";
    else
      return "fail";
  }
    
  public function deleteReservation($reservationID){
    global $db;
    $sth = $db->prepare('DELETE FROM reservations WHERE reservationID=:reservationID');
    $sth->bindValue(':reservationID', $reservationID, PDO::PARAM_INT);
    $del = $sth->execute();
    if($del == true)
      return "success";
    else
      return "fail";
  }
}